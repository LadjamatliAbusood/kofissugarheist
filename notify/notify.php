<?php

function notify($to,$data){

    $api_key="AAAA-d0Gnh8:APA91bFRUSPo3XASGRP66nXAW2S8bK9stubx4siEc72_UDvNWYYb7bnYcFvyesMFlgMLbZwa9kdTydI3s9lHE9qfR6MrEuytbU6AaKCGerA_UauoR9JGZkgGirj_3G3vixc7HBdVCG7T";
    $url="https://fcm.googleapis.com/fcm/send";
    $fields=json_encode(array('to'=>$to,'notification'=>$data));

    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ($fields));

    $headers = array();
    $headers[] = 'Authorization: key ='.$api_key;
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
}

$to="eIa3QA2oSs674vMM-dz4em:APA91bFKWgYSnuQ7FuPNpqcSu0ZIYhNf9oeGjrKwmqtAHTCImr3iMP76f8dG0wgSJH8BnjxzoXO_CDhI03YtHYYCszPTxKHz1jTWSRGpzS7nZL0B-it20nHtSW8TI9TEFW6YfdDhx04d";
$data=array(
    'title'=>'Hi, You have new order',
    'body'=>'Please check your website.'
);

notify($to,$data);
//echo "Notification Sent";

?>