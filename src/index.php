
 <?
 /* Copyright 2020 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 
 Permission is hereby granted, free of charge, to any person obtaining a copy of this
 software and associated documentation files (the "Software"), to deal in the Software
 without restriction, including without limitation the rights to use, copy, modify,
 merge, publish, distribute, sublicense, and/or sell copies of the Software, and to
 permit persons to whom the Software is furnished to do so.
 
 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. */
 

//handler function
function index($eventData) : array
{
    $response = ['msg' => 'hello from PHP '.PHP_VERSION];
    $response['eventData'] = $eventData;
    return APIResponse($response);
}

function APIResponse($body)
{
    $headers = array(
        "Content-Type"=>"application/json",
        "Access-Control-Allow-Origin"=>"*",
        "Access-Control-Allow-Headers"=>"Content-Type",
        "Access-Control-Allow-Methods" =>"OPTIONS,POST",
        "Moesif-Header" => true
    );
    return array(
        "headers"=>$headers,
        "body"=>$body
    );
}