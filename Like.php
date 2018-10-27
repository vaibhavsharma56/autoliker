<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
date_default_timezone_set('Asia/Jakarta');

$host = "localhost";

$username = "jutascom_lkeauto";

$password = "rahsia01";	

$dbname = "jutascom_autolke";

$ip = getenv("REMOTE_ADDR") ;
$time = time();
$waktu = date("G:i:s",time());
//database connect
mysql_connect($host,$username,$password) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
 
$ref = $_SERVER['HTTP_REFERER'];
$referer = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($ref,'linkbucks.com') !== false) {
 } else {
	if (strpos($ref,'www.getlikefast.net') !== true) {
	} else{
header("Location: http://a391c078.linkbucks.com/url/$referer");
	
}
}
function get_html($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    $data = curl_exec($ch);
    curl_close($ch);
	return $data;
    }
$token = $_SESSION['token'];

if($token){
	$graph_url ="https://graph.facebook.com/me?fields=id,name&access_token=" . $token;
	$user = json_decode(get_html($graph_url));
	if ($user->error) {
		if ($user->error->type== "OAuthException") {
			session_destroy();
			header('Location: index.php?i=Token Expired, Please Re-Generate new Token..! !');
			}
		}
	}
	else{
	header('Location: http://www.kedaiklan.com');
	}
	$result = mysql_query("
      SELECT * FROM cookies WHERE ip = '$ip'");
	if($result){
     while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$times = $row;
			}
	$timer = time()- $times['time'];
	$countdown = 900 - $timer;
	};	
if(isset($_POST['submit'])) {
        $token = $_SESSION['token'];
           if(!isset($token)){exit;}
	$postid = $_POST['id'];
	if(isset($postid)){
	if (time()- $times['time'] < 900){
    header("Location: rkzganteng.php?i=Like Failed, Time Limit Reached, Please Wait 15 mins Later..");
	}
	else{
	
	mysql_query("REPLACE INTO cookies (ip,time,waktu) VALUES ( '$ip','$time','$waktu')");
	$ch = curl_init('http://www.getlikefast.net/srdl.php'); 
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, "id=$postid");
	$hasil = curl_exec ($ch);
	curl_close ($ch);
    if (strpos($hasil,'GAGAL') !== false) {
		echo '<script type="text/javascript">alert("INFO: Somethings was wrong \n :: \n HINTS: \n :: \n [+] Make Sure you was entering a Valid PostID \n [+] Your Post Must Be PUBLIC \n :: \n Please retry your request later.");</script>';
			}else{
        //header("Location: rkzganteng.php?i=Liking In Process, We are Prosessing your request, Estimate finish is 5 Mins depend on our server traffic");
        header("Location: Like.php?i=Liking In Process, We are Prosessing your request, Estimate finish is 5 Mins depend on our server traffic");
	}
	}
	}else{
	header("Location: index.php?i=Post ID is Empty");
	};
}else{
	



if(isset($_GET['type'])){
if($_GET['type'] == "status"){
$beranda = json_decode(get_html("https://graph.facebook.com/$user->id/statuses?fields=id,message&limit=7&access_token=$token"))->data;
	foreach($beranda as $id){
	$status .= '
	<section class="status">
	<section class="image">
	<img src="https://graph.facebook.com/'.$user->id.'/picture">
	</section>
	<section class="name">'.$user->name.'</section>
	<section class="message">'.$id->message.'</section>
	<form action="" method="post">
	<input type="hidden" name="id" value="'.$id->id.'">
	<input type="submit" name="submit" value="Submit" class="submit"></form>
	</section>';
	}
	}
if($_GET['type'] == "custom"){
	$status = '
	<section class="status">
		<form action="" method="post">
	POSTID: <input type="text" name="id" style=" width: 285px;" class="form-control" value="'.$id->id.'" required>
	<input type="submit" name="submit" value="Submit" class="submit"></form>
	<section class="image">
	<img src="https://graph.facebook.com/'.$user->id.'/picture">
	</section>
	<section class="name">'.$user->name.'</section>
	</section>';

	}
if($_GET['type'] == "page"){
	$status = '
	<section class="status"><h3> enter your page id</h3>
		<form action="" method="post">
	POSTID: <input type="text" name="id" style=" width: 285px;" class="form-control" value="'.$id->id.'" required>
	<input type="submit" name="submit" value="Submit" class="submit"></form>
	<section class="image">
	<img src="https://graph.facebook.com/'.$user->id.'/picture">
	</section>
	<section class="name">'.$user->name.'</section>
	</section>';

	}
if($_GET['type'] == "photo"){
if(!isset($_GET['album'])){
$beranda = json_decode(get_html("https://graph.facebook.com/$user->id/albums?fields=id,name,cover_photo&limit=7&access_token=$token"))->data;
	if(!empty($beranda)){
	foreach($beranda as $id){
	$status .= '
	<section class="picture" style="overflow: hidden">
	
	<a href="?type=photo&album='.$id->id.'" class="ajax" title="'.$id->name.'">
	<img src="https://graph.facebook.com/'.$user->id.'/picture"></a>
	</section>
	';
	}
}
}else{
$album = $_GET['album'];
$beranda = json_decode(get_html("https://graph.facebook.com/$album/photos?fields=id,picture&limit=10&access_token=$token"))->data;
	if(!empty($beranda)){
	foreach($beranda as $id){
	$status .= '
	<section class="picture">
	<img src="'.$id->picture.'"></a>
	<form action="" method="post">
	<input type="hidden" name="id" value="'.$id->id.'">
	<input type="submit" name="submit" value="Submit" class="submit"></form>
	</section>
	
	';
	}
}
}
}
}else{
header('Location: ?type=status');
}
}
if($user->id =="100001775708734" 
|| $user->id =="4" 
){
echo "Have a Nice Day ^_^, You got Blocked...!!";
echo "<br>";
echo " Girish was Here";
exit;
}
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]--> <!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]--> <!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]--> <!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]--> 
<html class="no-js" lang="en">
<head> 
<meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]--> 
<title>Facebook Auto Like &amp; Auto Liker Kedaiklan.com</title>
<meta name="description" content="Increase like on your facebook photo or status by using aur auto like website. We are spam free facebook auto liker." />
<meta name="keywords" content="autolike, autoliker, auto like facebook, facebook autoliker, auto like status" />
<meta name="robots" content="index,follow,all" />
<meta http-equiv="content-language" content="en" />
<meta name="author" content="Get Like Fast"/>
<meta name="GOOGLEBOT" content="NOODP" />
<meta name="copyright" content="Copyright &copy; Get Like Fast. All Rights Reserved." />
<link href="https://plus.google.com/+PankajJangirJB" rel="publisher" />
<link href="css/core.min.css" rel="stylesheet" media="all"/> 
<link href="css/font-awesome.min.css" rel="stylesheet" media="all"/> 
<link href="css/sequence-looptheme.css" rel="stylesheet" media="all"/> 
<link href="css/jquery.bxslider.css" rel="stylesheet" media="all"/> 
<link href="css/superfish.css" rel="stylesheet" media="all"/> 
<link href="css/component.css" rel="stylesheet" media="all"/> 
<link href="css/pp.css" rel="stylesheet" media="all"/> 
<link href="css/style.css" rel="stylesheet" media="all"/> 
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="Custom.css">
<script type="text/javascript" src="/new.js"></script>
<!--[if lt IE 7]><link href="css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css"/><![endif]--> 
<script src="js/jquery-1.4.2.min.js"></script>
<script src="js/countdown.js"></script> 
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1412085392342193";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'><!-- Awesome Fonts -->
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_that_javascript_is_available_asap/ -->
	<script>
		document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
	</script>
  
	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older browsers -->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
  
<script src="js/jquery-1.4.2.min.js"></script>
<script src="js/jquery.effects.core.js"></script>
<script src="js/jquery.effects.pulsate.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript">
var shortest = {
    "config": {
        "token": "c6f7187343563b1298dc6907dc8b3e98",
        "excludeDomains": [
            "kedaiklan.com"
        ],
        "entryScript": {
            "type": "timeout",
            "timeout": "0"
        },
        "exitScript": {
            "enabled": true
        }
    }
};
(function() {
   var script = document.createElement('script');
   script.async = true;
   script.src = '//';
   var entry = document.getElementsByTagName('script')[0];
   entry.parentNode.insertBefore(script, entry);
})();
</script>
<!-- PopAds.net Popunder Code for www.getfastlike.com -->

<!-- PopAds.net Popunder Code End -->
</head> 
<body> 
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
$("#controller").hide();
$( "#finish" ).show();
});
});
</script><center>
<div id="finish"style="display:none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: #f4f4f4;z-index: 99;">
<div class="text" style="position: absolute;top: 45%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;">
<center><img src="http://www.getlikefast.net/load.gif"></center>
Giving Likes To Your Post ID! <Br>Meanwhile Please <b style="color: red;">BE ONLINE ON Get Like Fast</b>
</div>
</div></center>
<header> 
<div class="top-bar"> 
<div class="container"> 
<div class="row"> 
<div class="span5"> 
<nav class="clearfix"> 
<ul> <li><a href="index.php">Home</a></li> <li><a href="about.html">About</a></li> <li><a href="privacy.html">Privacy</a></li> <li><a href="faq.html">FAQ</a></li>
</ul> 
</nav> 
</div> 
<div class="span7"> 
<div class="top-bar-icon-sec"> 
<ul class="top-bar-icons"> 
<li><a href="mailto:admin@kedaiklan.com"><i class="icon-envelope"></i></a></li> <li><a href="#"><i class="icon-skype"></i></a></li> </ul> <ul class="top-bar-icons"> <li><a href="https://www.facebook.com/groups/postadvertisingmega/"><i class="icon-facebook"></i></a></li> <li><a href=""><i class="icon-twitter"></i></a></li> <li><a href=""><i class="icon-pinterest"></i></a></li> <li><a href=""><i class="icon-google-plus"></i></a></li> </ul> </div> </div> </div> </div> </div> 
<div class="logo-nav"> 
<div class="container"> <div class="row"> <div class="span3"> <h1 class="logo"><a href="index.php"><img src="photos/logo.png" alt=""></a></h1> </div> <div class="span9 hidden-phone desktop-nav"> <nav class="main-nav"> <ul id="menu" class="sf-menu clearfix"> 
<li><a href="index.php" class="active">Home</a></li> 
<li> <a href="about.html">About</a></li>
<li> <a href="how-to-use.html">How to Use</a> </li>
<li> <a href="privacy.html">Privacy</a></li> <li><a href="contact.html">Contact</a></li> </ul> </nav> </div> 

<div class="span8 mobile-nav visible-phone"> <nav id="dl-menu" class="dl-menuwrapper"> <button>Open Menu</button> 
<ul class="dl-menu"> 
<li><a href="index.php" class="active">Home</a></li> 
<li> <a href="about.html">About</a></li>
<li> <a href="how-to-use.html">How to Use</a> </li>
<li> <a href="privacy.html">Privacy</a></li> 
<li><a href="contact.html">Contact</a></li> 
</ul> 
</nav> </div> </div> </div> </div> </header> 
<div class="span12"> <hr/> </div> 
<div class="login">
		    <section class="section1">  
   
    	<div class="container clearfix">
                
               
               
        
           <nav class="portfolio-filter clearfix">
            <ul>
                <li><a href="index.php" class="dmbutton2" >Home</a></li>
                <li><a href="?type=status" class="dmbutton2" >Status</a></li>
                <li><a href="?type=photo" class="dmbutton2" >Photo </a></li>
                <li><a href="?type=custom" class="dmbutton2" >Custom Post ID</a></li>
               
                
            </ul>
        </nav>
           
			<centeR> <H3><A>  <span id="countdown" class="timer"></span>
<script>
var seconds = <?php echo $countdown ?>;
function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds;  
    }
    document.getElementById('countdown').innerHTML = "Next Submit: Wait  " + minutes + ":" + remainingSeconds + "  Seconds" ;
    if (seconds <= 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Next Submit: READY....!";
    } else {
        seconds--;
    }
}
 
var countdownTimer = setInterval('secondPassed()', 1000);
</script>
    </a></h3></center>
       
    
<div>
   <script type="text/javascript" src="
http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="
http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js
"></script><?php if($_GET['type'] == "status"){
echo '<section class="feed">';
echo $status; 
echo '</section>';
}
if($_GET['type'] == "custom"){
echo '<section class="feed">';
echo $status; 
echo '</section>';
}
if($_GET['type'] == "page"){
echo '<section class="feed">';
echo $status; 
echo '</section>';
}
if($_GET['type'] == "photo"){
echo '<section class="albums">';
echo $status; 
echo '</section>';
}
?>
		</div>
			</div>
<center>
	</section><!-- end section -->
		</div>
<br/><br/><div class="span12"> <hr/> </div> 
<footer> <div class="container"> <div class="row mb10"> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent News</h3> 
<ul> 
<li> 
<a href="#"><img src="photos/post-small-thumb-1.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Video Tutorial</a></h4> <div class="post-meta"><a href="#">March 1, 2014</a>, <a href="#">3 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-2.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Online Tutorial</a></h4> <div class="post-meta"><a href="#">March 8, 2014</a>, <a href="#">1 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-3.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Live Chat Option is Enable</a></h4> <div class="post-meta"><a href="#">March 12, 2014</a>, <a href="#">2 Comments</a></div> </div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent Tweets</h3> <ul class="tweets clearfix"> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Now we are #2 on "auto like status" keyword.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Soon we are lunching our new design, hope you will like it.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> in now on twitter, follow us on twitter.</p> <div class="tweet-time">4 hours ago</div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>About Us</h3> <p>We are one of the best facebook auto like website, we give free auto likes on your status, photo, video or on custom post.</p> <p>Also we are 100% safe auto liker. We don't sell tokens like other websites or we don't post anything on your behalf on any wall, group or page.</p> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Get in Touch</h3> <address class="mb10"> <strong>Get Like Fast</strong><br/> <span>Dwarka, New Delhi 110075, </span><br/> <span>India</span><br/><br/> <span><a href="mailto:admin@kedaiklan.com">admin@kedaiklan.com</a></span> </address> <ul class="socials"> <li><a href="https://www.facebook.com/groups/postadvertisingmega/" class="social facebook"><i class="icon-facebook"></i></a></li> <li></li> <li></li> <li></li> 
<li></li> 
</ul> </div> </div> </div> </div> <div class="copyright"> <div class="container"> <div class="row"> <div class="span12"> <div class="copy">© 2014 Get Like Fast. All Right Reserved. Design &amp; Developed by <a href="http://www.kedaiklan.com" target="_blank">Kedaiklan.com</a></div> 
<div class="back-to-top"><i class="icon-angle-up"></i></div> </div> </div> </div> </div> </footer> <script type="text/javascript" src="js/jquery.js"></script> <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script> <script type="text/javascript" src="js/jquery.sequence-min.js"></script> <script src="js/jquery.ui.core.min.js"></script> <script src="js/jquery.ui.widget.min.js"></script> <script src="js/jquery.ui.tabs.min.js"></script> <script src="js/jquery.ui.accordion.min.js"></script> <script type="text/javascript" src="js/jquery.bxslider.min.js"></script> <script type="text/javascript" src="js/jquery.BlackAndWhite.min.js"></script> <script type="text/javascript" src="js/superfish.js"></script> <script src="js/jquery.dlmenu.js"></script> <script type="text/javascript" src="js/jquery.knob.js"></script> <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> <script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script> <script type="text/javascript" src="js/jquery.quicksand.js"></script> <script type="text/javascript" src="js/jquery.flexslider-min.js"></script> <script type="text/javascript" src="js/custom.js"></script> 

<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-46788101-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body> 
</html>