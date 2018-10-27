<?php
if($_GET[logout]==true){
setcookie("token","", time() - 600);
header("Location: /");
}
if($_GET[token]==true){
include 'token.php';}

?>
