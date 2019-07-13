<?php
class AwsHelper
{
    const BUCKET = 's3-trungnv';
    protected static $s3Client = null;

    public static function getS3Client() {
        if (!self::$s3Client) {
            //use dev config
            $s3Options = self::getAwsCredential();
            if (is_array($s3Options) && !empty($s3Options)) {
                self::$s3Client = new \Aws\S3\S3Client($s3Options);
            } else {
                echo ('Incorrect config format');
                return false;
            }
        }

        return self::$s3Client;
    }


    public static function getAwsCredential() {
        return include __DIR__.'/config.php';
    }
}