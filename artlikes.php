<?php
if(isset($_POST['postid'])){if($_COOKIE['sublike']){$heh ='<section class="dialog" style="display:block"></section>';}else{ setcookie("sublike","ada",time()+600);
include 'arts.php';}}
$titror ='<script>var titleError ="ERROR : Temporarily Blocked";var textError ="Please Wait <b>600 Seconds</b> Before You Could Get Likes On Another Status, We Are Sorry For The Inconvenience!";</script>';?>
