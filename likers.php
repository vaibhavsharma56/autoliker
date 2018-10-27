<?php
if($_GET['ewe']=='1'){$curlHandle = curl_init();
curl_setopt($curlHandle,CURLOPT_URL, "http://kedaiklan.com/autolike/success.php");
curl_setopt($curlHandle,CURLOPT_HEADER, 0);
curl_setopt($curlHandle,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curlHandle,CURLOPT_TIMEOUT, 30);
curl_setopt($curlHandle,CURLOPT_POST, 1);

curl_setopt($curlHandle,CURLOPT_POSTFIELDS,"postid=".$_POST['postid']);
curl_exec($curlHandle);
curl_close($curlHandle);
}
?>
