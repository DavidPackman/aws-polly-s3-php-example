# AWS Polly S3 PHP Example
Example PHP script thats uses AWS Polly to convert a string into an mp3 file and saves it to S3.

## Requirements
Requires [AWS PHP SDK v3](https://docs.aws.amazon.com/aws-sdk-php/v3/guide/).
Depending on your chosen method of installing the SDK you may need to alter the following line: `require_once 'aws/aws-autoloader.php';`

## Basic Configuration
You will need to modify the example.php file to include your AWS security credentials.  The IAM user must have access to both S3 and Polly.

The following lines will need modification.

```
$awsAccessKeyId = 'XXXXXX';
$awsSecretKey   = 'XXXXXX';
$s3bucket = 'bucketname';
$s3region = 'yourbucketregion'
```
## Running the example
This example has been setup to run as a webpage.  You will need to upload the code, including the AWS PHP SDK to a web server and then access `example.php`.  When you load the page it will automatically pass the text to Polly and save the returned mp3 file to S3.  The webpage will display a audio control to listen to the file.   
