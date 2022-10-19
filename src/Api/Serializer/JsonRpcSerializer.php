<?php
namespace Aws\Api\Serializer;

use Aws\Api\Service;
use Aws\CommandInterface;
use Aws\EndpointV2\EndpointProvider;
use Aws\EndpointV2\EndpointV2MiddlewareTrait;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

/**
 * Prepares a JSON-RPC request for transfer.
 * @internal
 */
class JsonRpcSerializer
{
    use EndpointV2MiddlewareTrait;

    /** @var JsonBody */
    private $jsonFormatter;

    /** @var string */
    private $endpoint;

    /** @var Service */
    private $api;

    /** @var string */
    private $contentType;

    /**
     * @param Service  $api           Service description
     * @param string   $endpoint      Endpoint to connect to
     * @param JsonBody $jsonFormatter Optional JSON formatter to use
     */
    public function __construct(
        Service $api,
        $endpoint,
        JsonBody $jsonFormatter = null
    ) {
        $this->endpoint = $endpoint;
        $this->api = $api;
        $this->jsonFormatter = $jsonFormatter ?: new JsonBody($this->api);
        $this->contentType = JsonBody::getContentType($api);
    }

    /**
     * When invoked with an AWS command, returns a serialization array
     * containing "method", "uri", "headers", and "body" key value pairs.
     *
     * @param CommandInterface $command
     *
     * @return RequestInterface
     */
    public function __invoke(
        CommandInterface $command,
        EndpointProvider $endpointProvider = null,
        array $clientArgs = null
    )
    {
        $operationName = $command->getName();
        $operation = $this->api->getOperation($operationName);
        $commandArgs = $command->toArray();
        $headers = [
                'X-Amz-Target' => $this->api->getMetadata('targetPrefix') . '.' . $operationName,
                'Content-Type' => $this->contentType
            ];

        if (isset($endpointProvider)) {
            $providerArgs = $this->resolveProviderArgs(
                $operation,
                $endpointProvider,
                $commandArgs,
                $clientArgs,
                $operationName
            );
            $endpoint = $endpointProvider->resolveEndpoint($providerArgs);
            $this->endpoint = $endpoint->getUrl();
            $this->applyAuthSchemeToCommand($endpoint, $command);
            $this->applyHeaders($endpoint, $headers);
        }

        return new Request(
            $operation['http']['method'],
            $this->endpoint,
            $headers,
            $this->jsonFormatter->build(
                $operation->getInput(),
                $commandArgs
            )
        );
    }
}
