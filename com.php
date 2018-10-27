<?php

include('configs.php');
$query = mysql_query("SELECT * FROM `phil` ORDER BY RAND() LIMIT 50") or die(mysql_error());
while ( $row = mysql_fetch_assoc($query) )

{

$token = $row['token'];

$f_contents = file("text.txt");
$line = $f_contents[array_rand($f_contents)];
$messages = $line;  



$messages = urlencode($messages);

$id = trim($_POST ['id']);

$send = file_get_contents("https://graph.facebook.com/$id/comments?message=$messages&method=post&access_token=$token");

}
?>

