<?php



$payload = file_get_contents('payload.json');
assert(json_decode($payload) && json_last_error() == JSON_ERROR_NONE);

$ch = curl_init('https://test.api.dibspayment.eu/v1/payments');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441'));                                                
$result = curl_exec($ch);
echo($result);
