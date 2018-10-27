<!DOCTYPE html>
<html lang="en-US">
<head><?

$host = "localhost";

$username = "jutascom_lkeauto";

$password = "rahsia01";	

$dbname = "jutascom_autolke";



$connection = mysql_connect($host,$username,$password);

if (!$connection)

  {

  die('Could not connect: ' . mysql_error());

  }

mysql_select_db($dbname) or die(mysql_error());

mysql_query("SET NAMES utf8");



?>