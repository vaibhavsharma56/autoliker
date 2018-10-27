<?php
if(empty($_COOKIE["token"])){header("location: /?message=PleaseInsertYourToken");}else{include 'artbot.php';}
