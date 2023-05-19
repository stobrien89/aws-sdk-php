<?php
namespace Aws\RequestCompression;

use Aws\CommandInterface;
use GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Used to compress request payloads if the service/operation support it.
 *
 * IMPORTANT: this middleware must be added after the "build" step.
 *
 * @internal
 */
class RequestCompressionMiddleware
{
    const REQUEST_MIN_COMPRESSION_SIZE_BYTES = 10240;

    private $api;
    private $minimumCompressionSize;
    private $nextHandler;
    private $encodings;
    private $encoding;
    private $encodingMap = [
        'gzip' => 'gzencode'
    ];

    /**
     * Create a middleware wrapper function.
     *
     * @return callable
     */
    public static function wrap(array $config)
    {
        return function (callable $handler) use ($config) {
            return new self($handler, $config);
        };
    }

    public function __construct(callable $nextHandler, $config)
    {
        $this->api = $config['api'];
        $this->minimumCompressionSize = $this->determineMinimumCompressionSize($config);
        $this->nextHandler = $nextHandler;
    }

    public function __invoke(CommandInterface $command, RequestInterface $request)
    {
        if (isset($command['@request_min_compression_size_bytes'])
            && is_int($command['@request_min_compression_size_bytes'])
            && $this->isValidCompressionSize($command['@request_min_compression_size_bytes'])
        ) {
            $this->minimumCompressionSize = $command['@request_min_compression_size_bytes'];
        }
        $nextHandler = $this->nextHandler;
        $operation = $this->api->getOperation($command->getName());
        $requestBodySize = $request->getBody()->getSize();
        $compressionTrait = $operation->getTrait('requestCompression');

        if (!$this->shouldCompressRequestBody(
            $compressionTrait,
            $command,
            $operation,
            $requestBodySize
        )) {
            return $nextHandler($command, $request);
        }

        $this->encodings = $compressionTrait['encodings'];
        $request = $this->compressRequestBody($request);

        return $nextHandler($command, $request);
    }

    private function compressRequestBody(
        RequestInterface $request
    ) {
        $fn = $this->determineEncoding();
        if (is_null($fn)) {
            return $request;
        }

        $body = $request->getBody()->getContents();
        $compressedBody = $fn($body);

        return $request->withBody(Psr7\Utils::streamFor($compressedBody))
            ->withHeader('content-encoding', $this->encoding);
    }

    private function determineEncoding()
    {
        foreach ($this->encodings as $encoding) {
            if (isset($this->encodingMap[$encoding])) {
                $this->encoding = $encoding;
                return $this->encodingMap[$encoding];
            }
        }
        return null;
    }

    private function shouldCompressRequestBody(
        $compressionTrait,
        $command,
        $operation,
        $requestBodySize
    ){
        if ($compressionTrait) {
            if (isset($command['@disable_request_compression'])
                && $command['@disable_request_compression'] === true
            ) {
                return false;
            } elseif ($this->hasStreamingTraitWithoutRequiresLength($command, $operation)
                || $requestBodySize >= $this->minimumCompressionSize
            ) {
                return true;
            }
        }
        return false;
    }

    private function hasStreamingTraitWithoutRequiresLength($command, $operation)
    {
        $hasStreaming = false;
        $requiresLength = false;
        foreach ($operation->getInput()->getMembers() as $name => $member) {
            if (!empty($member['streaming']) && isset($command[$name])) {
                $hasStreaming = true;
                if (!empty($member['requiresLength'])) {
                    $requiresLength = true;
                }
            }
        }

        return $hasStreaming && !$requiresLength;
    }

    private function determineMinimumCompressionSize($config) {
        if (isset($config['request_min_compression_size_bytes'])) {
            $minCompressionSz = is_numeric($config['request_min_compression_size_bytes'])
                ? $config['request_min_compression_size_bytes']
                : $config['request_min_compression_size_bytes']()->wait()->getMinCompressionSize();

            if ($this->isValidCompressionSize($minCompressionSz)) {
                return $minCompressionSz;
            }
        }

        return self::REQUEST_MIN_COMPRESSION_SIZE_BYTES;
    }

    private function isValidCompressionSize($compressionSize)
    {
        if (is_numeric($compressionSize)
            && ($compressionSize >= 0 && $compressionSize <= 10240)
        ) {
            return true;
        }

        throw new \InvalidArgumentException(
            'The minimum request compression size must be a '
            . 'non-negative integer value between 0 and 10485760 bytes, inclusive.'
        );
    }
}