<?php
require 'facebook.php';




include('config.php');

//Create facebook application instance.
$facebook = new Facebook(array(
'appId'  => '72687635881',
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
$id =$_POST['postid'];
try {
$facebook->api("/".$id."/likes", 'POST');
$msg1 = "<font color='get'>Success!</font>";
}
catch (FacebookApiException $e) {
$output .= "<p>'". $row['name'] . "' failed to like.</p>";
$msg2 = "<font color='red'>Failed to Like!</font>";
}
}
}
mysql_close($connection);
?>
