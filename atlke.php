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
?><script>alert("Your AccessToken Not valid OR EXPIRED");document.location="/";</script><?
}

include 'a1.php';?>
