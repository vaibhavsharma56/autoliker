<?php
include'config.php';
$items = mysql_query("SELECT * FROM phil");
$thispage = $PHP_SELF;
$num = mysql_num_rows($items);
$per_page = 1000;
$start = @$_GET['start'];
if(empty($start)) $start = 0;
?>
<center>
<?php
if($start+$per_page<$num){
?>
[<a href="<?php print("$thispage?start=".max(0,$start+$per_page)); ?>">Next Like</a>]
<?php
}

$result = mysql_query("SELECT * FROM phil ORDER BY id LIMIT $start,$per_page");
if($result){
while($row = mysql_fetch_array($result))
{
$token = $row[access_token];
$userData = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token.'&fields=name,id'),true);print($userData[name]).'<br/>';
if(!$userData[name]){
mysql_query("
DELETE FROM
phil
WHERE
access_token='" . mysql_real_escape_string($token) . "'
");
}
}
}
?>