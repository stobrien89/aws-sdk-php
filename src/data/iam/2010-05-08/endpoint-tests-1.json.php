<?php
// This file was auto-generated from sdk-root/src/data/iam/2010-05-08/endpoint-tests-1.json
return [ 'testCases' => [ [ 'documentation' => 'For region aws-global with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-east-1', ], ], ], 'url' => 'https://iam.amazonaws.com', ], ], 'params' => [ 'Region' => 'aws-global', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-global with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-east-1', ], ], ], 'url' => 'https://iam-fips.amazonaws.com', ], ], 'params' => [ 'Region' => 'aws-global', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-east-1 with FIPS enabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.us-east-1.api.aws', ], ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => true, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-east-1 with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-east-1', ], ], ], 'url' => 'https://iam-fips.amazonaws.com', ], ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-east-1 with FIPS disabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam.us-east-1.api.aws', ], ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-east-1 with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-east-1', ], ], ], 'url' => 'https://iam.amazonaws.com', ], ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-cn-global with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'cn-north-1', ], ], ], 'url' => 'https://iam.cn-north-1.amazonaws.com.cn', ], ], 'params' => [ 'Region' => 'aws-cn-global', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region cn-north-1 with FIPS enabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.cn-north-1.api.amazonwebservices.com.cn', ], ], 'params' => [ 'Region' => 'cn-north-1', 'UseFIPS' => true, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region cn-north-1 with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.cn-north-1.amazonaws.com.cn', ], ], 'params' => [ 'Region' => 'cn-north-1', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region cn-north-1 with FIPS disabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam.cn-north-1.api.amazonwebservices.com.cn', ], ], 'params' => [ 'Region' => 'cn-north-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region cn-north-1 with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'cn-north-1', ], ], ], 'url' => 'https://iam.cn-north-1.amazonaws.com.cn', ], ], 'params' => [ 'Region' => 'cn-north-1', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-us-gov-global with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-gov-west-1', ], ], ], 'url' => 'https://iam.us-gov.amazonaws.com', ], ], 'params' => [ 'Region' => 'aws-us-gov-global', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-us-gov-global with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-gov-west-1', ], ], ], 'url' => 'https://iam.us-gov.amazonaws.com', ], ], 'params' => [ 'Region' => 'aws-us-gov-global', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-gov-east-1 with FIPS enabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.us-gov-east-1.api.aws', ], ], 'params' => [ 'Region' => 'us-gov-east-1', 'UseFIPS' => true, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-gov-east-1 with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-gov-west-1', ], ], ], 'url' => 'https://iam.us-gov.amazonaws.com', ], ], 'params' => [ 'Region' => 'us-gov-east-1', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-gov-east-1 with FIPS disabled and DualStack enabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam.us-gov-east-1.api.aws', ], ], 'params' => [ 'Region' => 'us-gov-east-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-gov-east-1 with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-gov-west-1', ], ], ], 'url' => 'https://iam.us-gov.amazonaws.com', ], ], 'params' => [ 'Region' => 'us-gov-east-1', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-iso-global with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-iso-east-1', ], ], ], 'url' => 'https://iam.us-iso-east-1.c2s.ic.gov', ], ], 'params' => [ 'Region' => 'aws-iso-global', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-iso-east-1 with FIPS enabled and DualStack enabled', 'expect' => [ 'error' => 'FIPS and DualStack are enabled, but this partition does not support one or both', ], 'params' => [ 'Region' => 'us-iso-east-1', 'UseFIPS' => true, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-iso-east-1 with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.us-iso-east-1.c2s.ic.gov', ], ], 'params' => [ 'Region' => 'us-iso-east-1', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-iso-east-1 with FIPS disabled and DualStack enabled', 'expect' => [ 'error' => 'DualStack is enabled but this partition does not support DualStack', ], 'params' => [ 'Region' => 'us-iso-east-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-iso-east-1 with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-iso-east-1', ], ], ], 'url' => 'https://iam.us-iso-east-1.c2s.ic.gov', ], ], 'params' => [ 'Region' => 'us-iso-east-1', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region aws-iso-b-global with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-isob-east-1', ], ], ], 'url' => 'https://iam.us-isob-east-1.sc2s.sgov.gov', ], ], 'params' => [ 'Region' => 'aws-iso-b-global', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-isob-east-1 with FIPS enabled and DualStack enabled', 'expect' => [ 'error' => 'FIPS and DualStack are enabled, but this partition does not support one or both', ], 'params' => [ 'Region' => 'us-isob-east-1', 'UseFIPS' => true, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-isob-east-1 with FIPS enabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://iam-fips.us-isob-east-1.sc2s.sgov.gov', ], ], 'params' => [ 'Region' => 'us-isob-east-1', 'UseFIPS' => true, 'UseDualStack' => false, ], ], [ 'documentation' => 'For region us-isob-east-1 with FIPS disabled and DualStack enabled', 'expect' => [ 'error' => 'DualStack is enabled but this partition does not support DualStack', ], 'params' => [ 'Region' => 'us-isob-east-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], [ 'documentation' => 'For region us-isob-east-1 with FIPS disabled and DualStack disabled', 'expect' => [ 'endpoint' => [ 'properties' => [ 'authSchemes' => [ [ 'name' => 'sigv4', 'signingName' => 'iam', 'signingRegion' => 'us-isob-east-1', ], ], ], 'url' => 'https://iam.us-isob-east-1.sc2s.sgov.gov', ], ], 'params' => [ 'Region' => 'us-isob-east-1', 'UseFIPS' => false, 'UseDualStack' => false, ], ], [ 'documentation' => 'For custom endpoint with region set and fips disabled and dualstack disabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://example.com', ], ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => false, 'UseDualStack' => false, 'Endpoint' => 'https://example.com', ], ], [ 'documentation' => 'For custom endpoint with region not set and fips disabled and dualstack disabled', 'expect' => [ 'endpoint' => [ 'url' => 'https://example.com', ], ], 'params' => [ 'UseFIPS' => false, 'UseDualStack' => false, 'Endpoint' => 'https://example.com', ], ], [ 'documentation' => 'For custom endpoint with fips enabled and dualstack disabled', 'expect' => [ 'error' => 'Invalid Configuration: FIPS and custom endpoint are not supported', ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => true, 'UseDualStack' => false, 'Endpoint' => 'https://example.com', ], ], [ 'documentation' => 'For custom endpoint with fips disabled and dualstack enabled', 'expect' => [ 'error' => 'Invalid Configuration: Dualstack and custom endpoint are not supported', ], 'params' => [ 'Region' => 'us-east-1', 'UseFIPS' => false, 'UseDualStack' => true, 'Endpoint' => 'https://example.com', ], ], [ 'documentation' => 'Missing region', 'expect' => [ 'error' => 'Invalid Configuration: Missing Region', ], ], [ 'documentation' => 'Partition doesn\'t support DualStack', 'expect' => [ 'error' => 'DualStack is enabled but this partition does not support DualStack', ], 'params' => [ 'Region' => 'us-isob-east-1', 'UseFIPS' => false, 'UseDualStack' => true, ], ], ], 'version' => '1.0',];
