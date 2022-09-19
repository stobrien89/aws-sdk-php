<?php

namespace Aws\EndpointV2\Rule;

use Aws\EndpointV2\Ruleset\RulesetStandardLibrary;
use Aws\EndpointV2\Ruleset\RulesetEndpoint;

Class EndpointRule extends Rule
{
    /** @var array */
    private $endpoint;

    public function __construct(array $spec)
    {
        parent::__construct($spec);
        $this->endpoint = $spec['endpoint'];
    }

    /**
     * @return array
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * If all the rule's conditions are met, return the resolved
     * endpoint object.
     *
     * @return RulesetEndpoint | null
     */
    public function evaluate(array &$inputParameters, RulesetStandardLibrary $standardLibrary)
    {
        if ($this->evaluateConditions($inputParameters, $standardLibrary)) {
            return $this->resolve($inputParameters, $standardLibrary);
        }

        return null;
    }

    /**
     * Given input parameters, resolve an endpoint in its entirety.
     *
     * @return RulesetEndpoint
     */
    public function resolve(
        array $inputParameters,
        RulesetStandardLibrary $standardLibrary
    )
    {
        $uri = $standardLibrary->resolveValue($this->endpoint['url'], $inputParameters);
        $properties = isset($this->endpoint['properties'])
                ? $this->resolveProperties($this->endpoint['properties'], $inputParameters, $standardLibrary)
                : null;
        $headers = $this->resolveHeaders($inputParameters, $standardLibrary);

        return new RulesetEndpoint($uri, $properties, $headers);
    }

    /**
     * Recurse through an endpoint's `properties` attribute, resolving template
     * strings when found. Return the fully resolved attribute.
     *
     * @return array
     */
    public function resolveProperties(
        $properties,
        array $inputParameters,
        RulesetStandardLibrary $standardLibrary
    )
    {
        if (is_array($properties)) {
           $propertiesArr = [];
           foreach($properties as $key => $val) {
               $propertiesArr[$key] = $this->resolveProperties($val, $inputParameters, $standardLibrary);
           }
           return $propertiesArr;
        }else if ($standardLibrary->isTemplate($properties)) {
            return $standardLibrary->resolveTemplateString($properties, $inputParameters);
        }
        return $properties;
    }

    /**
     * If present, iterate through an endpoint's headers attribute resolving
     * values along the way. Return the fully resolved attribute.
     *
     * @return array
     */
    public function resolveHeaders(
        array $inputParameters,
        RulesetStandardLibrary $standardLibrary
    )
    {
        $headers = isset($this->endpoint['headers']) ? $this->endpoint['headers'] : null;
        if (is_null($headers)) {
            return null;
        }
        $resolvedHeaders = [];

        foreach($headers as $headerName => $headerValues) {
            $resolvedValues = [];
            foreach($headerValues as $value) {
                $resolvedValue = $standardLibrary->resolveValue($value, $inputParameters, $standardLibrary);
                $resolvedValues[] = $resolvedValue;
            }
            $resolvedHeaders[$headerName] = $resolvedValues;
        }
        return $resolvedHeaders;
    }
}