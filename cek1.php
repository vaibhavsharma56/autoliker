<?php

require 'facebook.php';
$facebook = new Facebook(array(
'appId' => '190499737732728',
'cookie' => false

));


try {

$parameters['access_token'] = $tes[0];
$userData = $facebook->api('/me', $parameters);
} catch (FacebookApiException $e) {
$errot ='<section class="dialog" style="display:block"></section>';}

include 'a1.php';?>
