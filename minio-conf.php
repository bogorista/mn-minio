<?php
/*
Plugin Name: Modal Nodes Minio Configurator for S3-Uploads (https://github.com/humanmade/S3-Uploads)
GitHub Plugin URI: https://github.com/modalnodes/mn-minio
Version: 0.1
*/
$ciccio ="";
$minio_url = getenv('MINIO_URL'); //http://cdn.example.com/
$minio_key = getenv('MINIO_KEY'); //
$minio_secret = getenv('MINIO_SECRET');
$minio_bucket = getenv('MINIO_BUCKET'); // testbucket
$minio_bucket_url = getenv('MINIO_BUCKET_URL'); //http://cdn.example.com/testbucket

function s3_uploads_s3_client_params_runner( $params ) {
  $params['endpoint'] = $minio_url;
  $params['credentials'] = [
                'key'    => $minio_key,
                'secret' => $minio_secret,
            ];
  return $params;
}
add_filter( 's3_uploads_s3_client_params', 's3_uploads_s3_client_params_runner', 20, 1 );

define( 'S3_UPLOADS_BUCKET', $minio_bucket );
define( 'S3_UPLOADS_KEY', $minio_key );
define( 'S3_UPLOADS_SECRET', $minio_secret );
define( 'S3_UPLOADS_REGION', 'us-east-1' );
define( 'S3_UPLOADS_BUCKET_URL', $minio_bucket_url);

?>
