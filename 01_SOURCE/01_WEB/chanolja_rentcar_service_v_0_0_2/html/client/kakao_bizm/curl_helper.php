<?php

function curl($url, $post_data, &$http_status, &$header = null) {
//   echo "
// <br><br>curl>>>>>>>>>><br>
//   ";
    $ch=curl_init();
    // basic
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    // post_data
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    if (!is_null($header)) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    $response = curl_exec($ch);

    $body = null;
    if (!$response) {
        $body = curl_error($ch);
        $http_status = -1;
        echo("CURL Error: = " . $body."\n");
    } else {
        //parsing http status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (!is_null($header)) {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        } else {
            $body = $response;
        }
    }
    curl_close($ch);
    return $body;

}
