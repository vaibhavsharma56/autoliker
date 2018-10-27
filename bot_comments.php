<?php

include('config.php');
$query = mysql_query("SELECT * FROM `phil` ORDER BY RAND()") or die(mysql_error());
while ( $row = mysql_fetch_assoc($query) )

{

$tokens = $row['access_token'];

$get = file_get_contents('http://www.kedaiklan.com/autolike/page.php?accesstoken=' . $tokens);
if($get=="invalid access token")

{mysql_query("DELETE FROM `phil` WHERE access_token='$tokens'"); echo $tokens . "- deleted";}
else{echo $tokens . "- valid";}
}











?>