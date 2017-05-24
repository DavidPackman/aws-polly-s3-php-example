<?php
#Setup and Credential settings
require_once 'aws/aws-autoloader.php';
$awsAccessKeyId = 'XXXXXX';
$awsSecretKey   = 'XXXXXX';
$credentials    = new \Aws\Credentials\Credentials($awsAccessKeyId, $awsSecretKey);

#Polly Text to Speach Code
$client_polly         = new \Aws\Polly\PollyClient([
  'version'     => '2016-06-10',
  'credentials' => $credentials,
  'region'      => 'us-east-1'
]);

$result_polly         = $client_polly->synthesizeSpeech([
  'OutputFormat' => 'mp3',
  'Text'         => "Hello, this is an example PHP script which saves an mp3 file created by AWS Polly to your choosen S3 bucket.",
  'TextType'     => 'text',
  'VoiceId'      => 'Amy'
]);

#Returned audio data
$resultData_polly     = $result_polly->get('AudioStream')->getContents();

#Save MP3 to S3
$s3bucket = 'bucketname';
$s3region = 'yourbucketregion'
$filename = time().'-polly.mp3';

$client_s3 = new Aws\S3\S3Client([
  'version'     => 'latest',
  'credentials' => $credentials,
  'region'      => $s3region
]);

$result_s3 = $client_s3->putObject([
  'Key'         => $filename,
  'ACL'         => 'public-read',
  'Body'        => $resultData_polly,
  'Bucket'      => $s3bucket,
  'ContentType' => 'audio/mpeg',
  'SampleRate'  => '8000'
]);

?>
<html>
<body>
  <audio controls>
    <source src="<?php echo $result_s3['ObjectURL'] ?>" type="audio/mpeg">
  </audio>
</body>
</html>
