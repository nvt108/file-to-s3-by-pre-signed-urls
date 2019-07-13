<?php
defined('DS') || define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') || define('ROOT_PATH', dirname(__DIR__));
require ROOT_PATH. DS .'/vendor/autoload.php';
require ROOT_PATH. DS . '/src/AwsHelper.php';

$s3Client = AwsHelper::getS3Client();
$fileName = $_GET['filename'];
$cmd = $s3Client->getCommand('PutObject', [
    'Bucket' => AwsHelper::BUCKET,
    'Key' => $fileName,
    'ACL' => 'public-read',
    'ContentType' => "multipart/form-data"
]);
$request = $s3Client->createPresignedRequest($cmd, '+20 minutes');

$presignedUrl = (string)$request->getUri();
exit(json_encode(['url' => $presignedUrl]));
