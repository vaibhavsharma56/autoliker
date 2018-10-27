<?
include('config.php');
//count member

$babi = mysql_query ("SELECT name, COUNT(name) FROM phil");

$rober = mysql_fetch_array($babi);

$rec=$rober['COUNT(name)'];

?>
<html>
<head>
<title>Member </title></head>
<body>
<h1> Member :- <?php echo $rec; ?> </h1>
</body>
</html>