# AWS Polly S3 PHP Example
Example PHP scripts thats use AWS Polly to convert a string into an mp3 file and save it to S3.  While these files will work they are provided for demonstration purposes and do not perform all the required checks needed for live production sites.

Example.php: Is a simple php file that submits a preset string you can play.

Example2.html: Is a more complex script that submits a form via JQuery Ajax to pollysubmit.php this script returns the URL to the mp3 to be played.

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
These example has been setup to run as webpages.  You will need to upload the code, including the AWS PHP SDK to a web server and then access them using  `example.php` or `example2.html`.
