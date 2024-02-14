<?php
// This file was auto-generated from sdk-root/src/data/supplychain/2024-01-01/docs-2.json
return [ 'version' => '2.0', 'service' => '<p> AWS Supply Chain is a cloud-based application that works with your enterprise resource planning (ERP) and supply chain management systems. Using AWS Supply Chain, you can connect and extract your inventory, supply, and demand related data from existing ERP or supply chain systems into a single data model. </p> <p>The AWS Supply Chain API supports configuration data import for Supply Planning.</p> <p> All AWS Supply chain API operations are Amazon-authenticated and certificate-signed. They not only require the use of the AWS SDK, but also allow for the exclusive use of AWS Identity and Access Management users and roles to help facilitate access, trust, and permission policies. </p>', 'operations' => [ 'CreateBillOfMaterialsImportJob' => '<p>CreateBillOfMaterialsImportJob creates an import job for the Product Bill Of Materials (BOM) entity. For information on the product_bom entity, see the AWS Supply Chain User Guide.</p> <p>The CSV file must be located in an Amazon S3 location accessible to AWS Supply Chain. It is recommended to use the same Amazon S3 bucket created during your AWS Supply Chain instance creation.</p>', 'GetBillOfMaterialsImportJob' => '<p>Get status and details of a BillOfMaterialsImportJob.</p>', ], 'shapes' => [ 'AccessDeniedException' => [ 'base' => '<p>You do not have the required privileges to perform this action.</p>', 'refs' => [], ], 'BillOfMaterialsImportJob' => [ 'base' => '<p>The BillOfMaterialsImportJob details.</p>', 'refs' => [ 'GetBillOfMaterialsImportJobResponse$job' => '<p>The BillOfMaterialsImportJob.</p>', ], ], 'ClientToken' => [ 'base' => '<p>Unique, case-sensitive identifier that you provide to ensure the idempotency of the request.</p>', 'refs' => [ 'CreateBillOfMaterialsImportJobRequest$clientToken' => '<p>An idempotency token.</p>', ], ], 'ConfigurationJobStatus' => [ 'base' => '<p>The status of the job.</p>', 'refs' => [ 'BillOfMaterialsImportJob$status' => '<p>The BillOfMaterialsImportJob ConfigurationJobStatus.</p>', ], ], 'ConfigurationS3Uri' => [ 'base' => NULL, 'refs' => [ 'BillOfMaterialsImportJob$s3uri' => '<p>The S3 URI from which the CSV is read.</p>', 'CreateBillOfMaterialsImportJobRequest$s3uri' => '<p>The S3 URI of the CSV file to be imported. The bucket must grant permissions for AWS Supply Chain to read the file.</p>', ], ], 'ConflictException' => [ 'base' => '<p>Updating or deleting a resource can cause an inconsistent state.</p>', 'refs' => [], ], 'CreateBillOfMaterialsImportJobRequest' => [ 'base' => '<p>The request parameters for CreateBillOfMaterialsImportJob.</p>', 'refs' => [], ], 'CreateBillOfMaterialsImportJobResponse' => [ 'base' => '<p>The response parameters of CreateBillOfMaterialsImportJob.</p>', 'refs' => [], ], 'GetBillOfMaterialsImportJobRequest' => [ 'base' => '<p>The request parameters for GetBillOfMaterialsImportJob.</p>', 'refs' => [], ], 'GetBillOfMaterialsImportJobResponse' => [ 'base' => '<p>The response parameters for GetBillOfMaterialsImportJob.</p>', 'refs' => [], ], 'InternalServerException' => [ 'base' => '<p>Unexpected error during processing of request.</p>', 'refs' => [], ], 'ResourceNotFoundException' => [ 'base' => '<p>Request references a resource which does not exist.</p>', 'refs' => [], ], 'ServiceQuotaExceededException' => [ 'base' => '<p>Request would cause a service quota to be exceeded.</p>', 'refs' => [], ], 'String' => [ 'base' => NULL, 'refs' => [ 'AccessDeniedException$message' => NULL, 'BillOfMaterialsImportJob$message' => '<p>When the BillOfMaterialsImportJob has reached a terminal state, there will be a message.</p>', 'ConflictException$message' => NULL, 'InternalServerException$message' => NULL, 'ResourceNotFoundException$message' => NULL, 'ServiceQuotaExceededException$message' => NULL, 'ThrottlingException$message' => NULL, 'ValidationException$message' => NULL, ], ], 'ThrottlingException' => [ 'base' => '<p>Request was denied due to request throttling.</p>', 'refs' => [], ], 'UUID' => [ 'base' => NULL, 'refs' => [ 'BillOfMaterialsImportJob$instanceId' => '<p>The BillOfMaterialsImportJob instanceId.</p>', 'BillOfMaterialsImportJob$jobId' => '<p>The BillOfMaterialsImportJob jobId.</p>', 'CreateBillOfMaterialsImportJobRequest$instanceId' => '<p>The AWS Supply Chain instance identifier.</p>', 'CreateBillOfMaterialsImportJobResponse$jobId' => '<p>The new BillOfMaterialsImportJob identifier.</p>', 'GetBillOfMaterialsImportJobRequest$instanceId' => '<p>The AWS Supply Chain instance identifier.</p>', 'GetBillOfMaterialsImportJobRequest$jobId' => '<p>The BillOfMaterialsImportJob identifier.</p>', ], ], 'ValidationException' => [ 'base' => '<p>The input does not satisfy the constraints specified by an AWS service.</p>', 'refs' => [], ], ],];
