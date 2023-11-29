<?php
// This file was auto-generated from sdk-root/src/data/runtime.sagemaker/2017-05-13/docs-2.json
return [ 'version' => '2.0', 'service' => '<p> The Amazon SageMaker runtime API. </p>', 'operations' => [ 'InvokeEndpoint' => '<p>After you deploy a model into production using Amazon SageMaker hosting services, your client applications use this API to get inferences from the model hosted at the specified endpoint. </p> <p>For an overview of Amazon SageMaker, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/how-it-works.html">How It Works</a>. </p> <p>Amazon SageMaker strips all POST headers except those supported by the API. Amazon SageMaker might add additional headers. You should not rely on the behavior of headers outside those enumerated in the request syntax. </p> <p>Calls to <code>InvokeEndpoint</code> are authenticated by using Amazon Web Services Signature Version 4. For information, see <a href="https://docs.aws.amazon.com/AmazonS3/latest/API/sig-v4-authenticating-requests.html">Authenticating Requests (Amazon Web Services Signature Version 4)</a> in the <i>Amazon S3 API Reference</i>.</p> <p>A customer\'s model containers must respond to requests within 60 seconds. The model itself can have a maximum processing time of 60 seconds before responding to invocations. If your model is going to take 50-60 seconds of processing time, the SDK socket timeout should be set to be 70 seconds.</p> <note> <p>Endpoints are scoped to an individual account, and are not public. The URL does not contain the account ID, but Amazon SageMaker determines the account ID from the authentication token that is supplied by the caller.</p> </note>', 'InvokeEndpointAsync' => '<p>After you deploy a model into production using Amazon SageMaker hosting services, your client applications use this API to get inferences from the model hosted at the specified endpoint in an asynchronous manner.</p> <p>Inference requests sent to this API are enqueued for asynchronous processing. The processing of the inference request may or may not complete before you receive a response from this API. The response from this API will not contain the result of the inference request but contain information about where you can locate it.</p> <p>Amazon SageMaker strips all POST headers except those supported by the API. Amazon SageMaker might add additional headers. You should not rely on the behavior of headers outside those enumerated in the request syntax. </p> <p>Calls to <code>InvokeEndpointAsync</code> are authenticated by using Amazon Web Services Signature Version 4. For information, see <a href="https://docs.aws.amazon.com/AmazonS3/latest/API/sig-v4-authenticating-requests.html">Authenticating Requests (Amazon Web Services Signature Version 4)</a> in the <i>Amazon S3 API Reference</i>.</p>', 'InvokeEndpointWithResponseStream' => '<p>Invokes a model at the specified endpoint to return the inference response as a stream. The inference stream provides the response payload incrementally as a series of parts. Before you can get an inference stream, you must have access to a model that\'s deployed using Amazon SageMaker hosting services, and the container for that model must support inference streaming.</p> <p>For more information that can help you use this API, see the following sections in the <i>Amazon SageMaker Developer Guide</i>:</p> <ul> <li> <p>For information about how to add streaming support to a model, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/your-algorithms-inference-code.html#your-algorithms-inference-code-how-containe-serves-requests">How Containers Serve Requests</a>.</p> </li> <li> <p>For information about how to process the streaming response, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/realtime-endpoints-test-endpoints.html">Invoke real-time endpoints</a>.</p> </li> </ul> <p>Before you can use this operation, your IAM permissions must allow the <code>sagemaker:InvokeEndpoint</code> action. For more information about Amazon SageMaker actions for IAM policies, see <a href="https://docs.aws.amazon.com/service-authorization/latest/reference/list_amazonsagemaker.html">Actions, resources, and condition keys for Amazon SageMaker</a> in the <i>IAM Service Authorization Reference</i>.</p> <p>Amazon SageMaker strips all POST headers except those supported by the API. Amazon SageMaker might add additional headers. You should not rely on the behavior of headers outside those enumerated in the request syntax. </p> <p>Calls to <code>InvokeEndpointWithResponseStream</code> are authenticated by using Amazon Web Services Signature Version 4. For information, see <a href="https://docs.aws.amazon.com/AmazonS3/latest/API/sig-v4-authenticating-requests.html">Authenticating Requests (Amazon Web Services Signature Version 4)</a> in the <i>Amazon S3 API Reference</i>.</p>', ], 'shapes' => [ 'BodyBlob' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$Body' => '<p>Provides input data, in the format specified in the <code>ContentType</code> request header. Amazon SageMaker passes all of the data in the body to the model. </p> <p>For information about the format of the request body, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/cdf-inference.html">Common Data Formats-Inference</a>.</p>', 'InvokeEndpointOutput$Body' => '<p>Includes the inference provided by the model. </p> <p>For information about the format of the response body, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/cdf-inference.html">Common Data Formats-Inference</a>.</p> <p>If the explainer is activated, the body includes the explanations provided by the model. For more information, see the <b>Response section</b> under <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/clarify-online-explainability-invoke-endpoint.html#clarify-online-explainability-response">Invoke the Endpoint</a> in the Developer Guide.</p>', 'InvokeEndpointWithResponseStreamInput$Body' => '<p>Provides input data, in the format specified in the <code>ContentType</code> request header. Amazon SageMaker passes all of the data in the body to the model. </p> <p>For information about the format of the request body, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/cdf-inference.html">Common Data Formats-Inference</a>.</p>', ], ], 'CustomAttributesHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$CustomAttributes' => '<p>Provides additional information about a request for an inference submitted to a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to provide an ID that you can use to track a request or to provide other metadata that a service endpoint was programmed to process. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://datatracker.ietf.org/doc/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function. </p> <p>This feature is currently supported in the Amazon Web Services SDKs but not in the Amazon SageMaker Python SDK. </p>', 'InvokeEndpointInput$CustomAttributes' => '<p>Provides additional information about a request for an inference submitted to a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to provide an ID that you can use to track a request or to provide other metadata that a service endpoint was programmed to process. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://datatracker.ietf.org/doc/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function. </p> <p>This feature is currently supported in the Amazon Web Services SDKs but not in the Amazon SageMaker Python SDK. </p>', 'InvokeEndpointOutput$CustomAttributes' => '<p>Provides additional information in the response about the inference returned by a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to return an ID received in the <code>CustomAttributes</code> header of a request or other metadata that a service endpoint was programmed to produce. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://tools.ietf.org/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). If the customer wants the custom attribute returned, the model must set the custom attribute to be included on the way back. </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function.</p> <p>This feature is currently supported in the Amazon Web Services SDKs but not in the Amazon SageMaker Python SDK.</p>', 'InvokeEndpointWithResponseStreamInput$CustomAttributes' => '<p>Provides additional information about a request for an inference submitted to a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to provide an ID that you can use to track a request or to provide other metadata that a service endpoint was programmed to process. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://datatracker.ietf.org/doc/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function. </p> <p>This feature is currently supported in the Amazon Web Services SDKs but not in the Amazon SageMaker Python SDK. </p>', 'InvokeEndpointWithResponseStreamOutput$CustomAttributes' => '<p>Provides additional information in the response about the inference returned by a model hosted at an Amazon SageMaker endpoint. The information is an opaque value that is forwarded verbatim. You could use this value, for example, to return an ID received in the <code>CustomAttributes</code> header of a request or other metadata that a service endpoint was programmed to produce. The value must consist of no more than 1024 visible US-ASCII characters as specified in <a href="https://tools.ietf.org/html/rfc7230#section-3.2.6">Section 3.3.6. Field Value Components</a> of the Hypertext Transfer Protocol (HTTP/1.1). If the customer wants the custom attribute returned, the model must set the custom attribute to be included on the way back. </p> <p>The code in your model is responsible for setting or updating any custom attributes in the response. If your code does not set this value in the response, an empty value is returned. For example, if a custom attribute represents the trace ID, your model can prepend the custom attribute with <code>Trace ID:</code> in your post-processing function.</p> <p>This feature is currently supported in the Amazon Web Services SDKs but not in the Amazon SageMaker Python SDK.</p>', ], ], 'EnableExplanationsHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$EnableExplanations' => '<p>An optional JMESPath expression used to override the <code>EnableExplanations</code> parameter of the <code>ClarifyExplainerConfig</code> API. See the <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/clarify-online-explainability-create-endpoint.html#clarify-online-explainability-create-endpoint-enable">EnableExplanations</a> section in the developer guide for more information. </p>', ], ], 'EndpointName' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$EndpointName' => '<p>The name of the endpoint that you specified when you created the endpoint using the <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/API_CreateEndpoint.html">CreateEndpoint</a> API.</p>', 'InvokeEndpointInput$EndpointName' => '<p>The name of the endpoint that you specified when you created the endpoint using the <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/API_CreateEndpoint.html">CreateEndpoint</a> API.</p>', 'InvokeEndpointWithResponseStreamInput$EndpointName' => '<p>The name of the endpoint that you specified when you created the endpoint using the <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/API_CreateEndpoint.html">CreateEndpoint</a> API.</p>', ], ], 'ErrorCode' => [ 'base' => NULL, 'refs' => [ 'ModelStreamError$ErrorCode' => '<p>This error can have the following error codes:</p> <dl> <dt>ModelInvocationTimeExceeded</dt> <dd> <p>The model failed to finish sending the response within the timeout period allowed by Amazon SageMaker.</p> </dd> <dt>StreamBroken</dt> <dd> <p>The Transmission Control Protocol (TCP) connection between the client and the model was reset or closed.</p> </dd> </dl>', ], ], 'Header' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$ContentType' => '<p>The MIME type of the input data in the request body.</p>', 'InvokeEndpointAsyncInput$Accept' => '<p>The desired MIME type of the inference response from the model container.</p>', 'InvokeEndpointAsyncOutput$InferenceId' => '<p>Identifier for an inference request. This will be the same as the <code>InferenceId</code> specified in the input. Amazon SageMaker will generate an identifier for you if you do not specify one.</p>', 'InvokeEndpointAsyncOutput$OutputLocation' => '<p>The Amazon S3 URI where the inference response payload is stored.</p>', 'InvokeEndpointAsyncOutput$FailureLocation' => '<p>The Amazon S3 URI where the inference failure response payload is stored.</p>', 'InvokeEndpointInput$ContentType' => '<p>The MIME type of the input data in the request body.</p>', 'InvokeEndpointInput$Accept' => '<p>The desired MIME type of the inference response from the model container.</p>', 'InvokeEndpointOutput$ContentType' => '<p>The MIME type of the inference returned from the model container.</p>', 'InvokeEndpointOutput$InvokedProductionVariant' => '<p>Identifies the production variant that was invoked.</p>', 'InvokeEndpointWithResponseStreamInput$ContentType' => '<p>The MIME type of the input data in the request body.</p>', 'InvokeEndpointWithResponseStreamInput$Accept' => '<p>The desired MIME type of the inference response from the model container.</p>', 'InvokeEndpointWithResponseStreamOutput$ContentType' => '<p>The MIME type of the inference returned from the model container.</p>', 'InvokeEndpointWithResponseStreamOutput$InvokedProductionVariant' => '<p>Identifies the production variant that was invoked.</p>', ], ], 'InferenceComponentHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$InferenceComponentName' => '<p>If the endpoint hosts one or more inference components, this parameter specifies the name of inference component to invoke.</p>', 'InvokeEndpointWithResponseStreamInput$InferenceComponentName' => '<p>If the endpoint hosts one or more inference components, this parameter specifies the name of inference component to invoke for a streaming response.</p>', ], ], 'InferenceId' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$InferenceId' => '<p>The identifier for the inference request. Amazon SageMaker will generate an identifier for you if none is specified. </p>', 'InvokeEndpointInput$InferenceId' => '<p>If you provide a value, it is added to the captured data when you enable data capture on the endpoint. For information about data capture, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/model-monitor-data-capture.html">Capture Data</a>.</p>', 'InvokeEndpointWithResponseStreamInput$InferenceId' => '<p>An identifier that you assign to your request.</p>', ], ], 'InputLocationHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$InputLocation' => '<p>The Amazon S3 URI where the inference request payload is stored.</p>', ], ], 'InternalDependencyException' => [ 'base' => '<p>Your request caused an exception with an internal dependency. Contact customer support. </p>', 'refs' => [], ], 'InternalFailure' => [ 'base' => '<p> An internal failure occurred. </p>', 'refs' => [], ], 'InternalStreamFailure' => [ 'base' => '<p>The stream processing failed because of an unknown error, exception or failure. Try your request again.</p>', 'refs' => [ 'ResponseStream$InternalStreamFailure' => '<p>The stream processing failed because of an unknown error, exception or failure. Try your request again.</p>', ], ], 'InvocationTimeoutSecondsHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$InvocationTimeoutSeconds' => '<p>Maximum amount of time in seconds a request can be processed before it is marked as expired. The default is 15 minutes, or 900 seconds.</p>', ], ], 'InvokeEndpointAsyncInput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointAsyncOutput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointInput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointOutput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointWithResponseStreamInput' => [ 'base' => NULL, 'refs' => [], ], 'InvokeEndpointWithResponseStreamOutput' => [ 'base' => NULL, 'refs' => [], ], 'LogStreamArn' => [ 'base' => NULL, 'refs' => [ 'ModelError$LogStreamArn' => '<p> The Amazon Resource Name (ARN) of the log stream. </p>', ], ], 'Message' => [ 'base' => NULL, 'refs' => [ 'InternalDependencyException$Message' => NULL, 'InternalFailure$Message' => NULL, 'InternalStreamFailure$Message' => NULL, 'ModelError$Message' => NULL, 'ModelError$OriginalMessage' => '<p> Original message. </p>', 'ModelNotReadyException$Message' => NULL, 'ModelStreamError$Message' => NULL, 'ServiceUnavailable$Message' => NULL, 'ValidationError$Message' => NULL, ], ], 'ModelError' => [ 'base' => '<p> Model (owned by the customer in the container) returned 4xx or 5xx error code. </p>', 'refs' => [], ], 'ModelNotReadyException' => [ 'base' => '<p>Either a serverless endpoint variant\'s resources are still being provisioned, or a multi-model endpoint is still downloading or loading the target model. Wait and try your request again.</p>', 'refs' => [], ], 'ModelStreamError' => [ 'base' => '<p> An error occurred while streaming the response body. This error can have the following error codes:</p> <dl> <dt>ModelInvocationTimeExceeded</dt> <dd> <p>The model failed to finish sending the response within the timeout period allowed by Amazon SageMaker.</p> </dd> <dt>StreamBroken</dt> <dd> <p>The Transmission Control Protocol (TCP) connection between the client and the model was reset or closed.</p> </dd> </dl>', 'refs' => [ 'ResponseStream$ModelStreamError' => '<p> An error occurred while streaming the response body. This error can have the following error codes:</p> <dl> <dt>ModelInvocationTimeExceeded</dt> <dd> <p>The model failed to finish sending the response within the timeout period allowed by Amazon SageMaker.</p> </dd> <dt>StreamBroken</dt> <dd> <p>The Transmission Control Protocol (TCP) connection between the client and the model was reset or closed.</p> </dd> </dl>', ], ], 'PartBlob' => [ 'base' => NULL, 'refs' => [ 'PayloadPart$Bytes' => '<p>A blob that contains part of the response for your streaming inference request.</p>', ], ], 'PayloadPart' => [ 'base' => '<p>A wrapper for pieces of the payload that\'s returned in response to a streaming inference request. A streaming inference response consists of one or more payload parts. </p>', 'refs' => [ 'ResponseStream$PayloadPart' => '<p>A wrapper for pieces of the payload that\'s returned in response to a streaming inference request. A streaming inference response consists of one or more payload parts. </p>', ], ], 'RequestTTLSecondsHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointAsyncInput$RequestTTLSeconds' => '<p>Maximum age in seconds a request can be in the queue before it is marked as expired. The default is 6 hours, or 21,600 seconds.</p>', ], ], 'ResponseStream' => [ 'base' => '<p>A stream of payload parts. Each part contains a portion of the response for a streaming inference request.</p>', 'refs' => [ 'InvokeEndpointWithResponseStreamOutput$Body' => NULL, ], ], 'ServiceUnavailable' => [ 'base' => '<p> The service is unavailable. Try your call again. </p>', 'refs' => [], ], 'StatusCode' => [ 'base' => NULL, 'refs' => [ 'ModelError$OriginalStatusCode' => '<p> Original status code. </p>', ], ], 'TargetContainerHostnameHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetContainerHostname' => '<p>If the endpoint hosts multiple containers and is configured to use direct invocation, this parameter specifies the host name of the container to invoke.</p>', 'InvokeEndpointWithResponseStreamInput$TargetContainerHostname' => '<p>If the endpoint hosts multiple containers and is configured to use direct invocation, this parameter specifies the host name of the container to invoke.</p>', ], ], 'TargetModelHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetModel' => '<p>The model to request for inference when invoking a multi-model endpoint.</p>', ], ], 'TargetVariantHeader' => [ 'base' => NULL, 'refs' => [ 'InvokeEndpointInput$TargetVariant' => '<p>Specify the production variant to send the inference request to when invoking an endpoint that is running two or more variants. Note that this parameter overrides the default behavior for the endpoint, which is to distribute the invocation traffic based on the variant weights.</p> <p>For information about how to use variant targeting to perform a/b testing, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/model-ab-testing.html">Test models in production</a> </p>', 'InvokeEndpointWithResponseStreamInput$TargetVariant' => '<p>Specify the production variant to send the inference request to when invoking an endpoint that is running two or more variants. Note that this parameter overrides the default behavior for the endpoint, which is to distribute the invocation traffic based on the variant weights.</p> <p>For information about how to use variant targeting to perform a/b testing, see <a href="https://docs.aws.amazon.com/sagemaker/latest/dg/model-ab-testing.html">Test models in production</a> </p>', ], ], 'ValidationError' => [ 'base' => '<p> Inspect your request and try again. </p>', 'refs' => [], ], ],];
