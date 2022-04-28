<?php

const BASE_URL = "https://api.blacklistalliance.net/bulklookup";

$apiKey = getenv("API_KEY");

if (!$apiKey) {
    printf("Missing API_KEY variable\n");
    exit(-1);
}

$fields = array(
    "phones" => "2132133000,2132133001",
    "key" => $apiKey,
);

$requestHeader = array(
    "Content-Encoding: gzip",
    "Accept: application/json",
    "Accept-Encoding: gzip",
    "Content-Type: application/x-www-form-urlencoded; charset=utf-8"
);

$postquery = http_build_query($fields);
var_dump($postquery);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,BASE_URL);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$postquery);
curl_setopt($ch, CURLOPT_HTTPHEADER,$requestHeader);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_ENCODING , "gzip");

$server_output = curl_exec($ch);


var_dump($server_output);

curl_close ($ch);

?>