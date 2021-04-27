# Moesif AWS Lambda EXample for PHP with Docker

This project contains source code and supporting files for a serverless application that you can deploy with the AWS Serverless Application Model (AWS SAM) command line interface (CLI). It contains a custom runtime PHP Lambda function packaged as a docker contaier image. It deploys an Amazon HTTPs API endpoint to invoke the Lambda function. 

## Testing locally
1. Clone this repo and edit the `runtime/bootstrap` file to set your actual Moesif Application Id.

    Your Moesif Application Id can be found in the [_Moesif Portal_](https://www.moesif.com/).
    After signing up for a Moesif account, your Moesif Application Id will be displayed during the onboarding steps. 

    You can always find your Moesif Application Id at any time by logging 
    into the [_Moesif Portal_](https://www.moesif.com/), click on the top right menu,
    and then clicking _API Keys_.

2.	Build the previous custom runtime image using the Docker build command:
```bash 
docker build -t phpmyfunction .
```

3. Run the function locally using the Docker run command, bound to port 9000:
```bash 
docker run -d -p 9000:8080 phpmyfunction:latest
```

4. This command starts up a local endpoint at `localhost:9000/2015-03-31/functions/function/invocations`


5.	Post an event to this endpoint using a curl command. The Lambda function payload is provided by using the -d flag.  This is a valid Json object required by the Runtime Interface Emulator:

```bash 
curl "http://localhost:9000/2015-03-31/functions/function/invocations" -d '{"queryStringParameters": {"name":"Ben"}}'
```

Congratulations! If everything was done correctly, Moesif should now be tracking all network requests. If you have any issues with set up, please reach out to support@moesif.com.

## Limitations

Currently, Amazon AWS doesn't have support for PHP Lambda function, and due to the limitation of Runtime API, we can’t capture the request - uri, verb, headers, ip address etc. So have hardcoded few details to capture and send events to Moesif. Once AWS adds the support, we'll capture more details and update the example.


## Other integrations

To view more documentation on integration options, please visit __[the Integration Options Documentation](https://www.moesif.com/docs/getting-started/integration-options/).__
