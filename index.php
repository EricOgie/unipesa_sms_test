<?php

include_once 'Request.php';
include_once 'Router.php';


$router = new Router(new Request);

$router->get('/', function ($request) {
    return "WE ARE LIVE";
});

$router->post('/send-sms', function ($request) {

    $input = $request->getBody();


    if (($input['phone'][0] !== '0')) {
        http_response_code(422);
        return json_encode([
            'error' => 'invalid phone',
            'message' => 'Phone must be 11 digit and must start with 0'
        ]);
    }

    $phoneWithCode = $input['country_code'] . substr($input['phone'], 1);

    $payload = [
        'messages' => [
            [
                "channel" => "sms",
                "to" => $phoneWithCode,
                "content" => "Unipesa Test-1234"
            ]
        ]
    ];

    $headerData = [
        "Content-Type: application/json", "Accept: application/json", "Authorization: wu2gnmtaT_iHe_a-9GJOdg=="
    ];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://platform.clickatell.com/v1/message');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headerData);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));


    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
});
