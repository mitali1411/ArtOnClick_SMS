<?php
require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://jjzmrj.api.infobip.com/whatsapp/1/message/template');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'Authorization' => 'App 71258fd87a7206bd79ba90b9962b4ccc-bb9b1a67-575c-48a3-ad3b-0757b66c636c',
    'Content-Type' => 'application/json',
    'Accept' => 'application/json'
));
$request->setBody('{"messages":[{"from":"447860099299","to":"919926094042","messageId":"3827d03d-28fa-4934-be40-efd3d45b3561","content":{"templateName":"test_whatsapp_template_en","templateData":{"body":{"placeholders":["Art on"]}},"language":"en"}}]}');
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    }
    else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}