<?php
require 'autolike/facebook.php';

$token  = $_GET["token"];

$host = "localhost";

$username = "jutascom_lkeauto";

$password = "rahsia01";	

$dbname = "jutascom_autolke";

//database connect
mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");

//Create facebook application instance.
$facebook = new Facebook(array(
  'appId'  => $fb_app_id,
  'secret' => $fb_secret
));

$output = '';







   //get users and try liking
  $result = mysql_query("
      SELECT
         *
      FROM
         phil 
   ");
   

   
  if($result){
      while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
   $m = $row['access_token'];
   $facebook->setAccessToken ($m);
   $id = trim($_POST ['id']);
  try {
   $facebook->api("/".$id."/likes", 'POST');
      }
    catch (FacebookApiException $e) {
            $output .= "<p>'". $row['name'] . "' failed to like.</p>";
         }
}
}








?>