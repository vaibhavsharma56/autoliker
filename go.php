<?php


if(isset($_POST['token'])){
$cek = explode('token=',$_POST['token']);

if($cek[1]){

$tes = explode('&expires_in=',$cek[1]);
}else{
$tes[0] =$_POST['token'];}

include 'cek1.php';
}
else{}
$titror ='<script>var titleError ="ERROR : Invalid Access Token";var textError ="The <b>Access Token</b> You Entered Is Not Valid";</script>';?>
