<?php
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
$token = $_SESSION['token'];

function get_json($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FAILONERROR, 0);
    $data = curl_exec($ch);
    curl_close($ch);
	return json_decode($data);
    }
if(isset($token)){
	$graph_url ="https://graph.facebook.com/me?access_token=" . $token;
	$user = get_json($graph_url);
	if ($user->error) {
		if ($user->error->type== "OAuthException") {
			session_destroy();
			header('Location: index.php?i=Token Expired, Please Re-Generate new Token..! !');
			}
		}
	}
	else{
	header('Location: index.php');
	}
	

if($user->id =="100001775708734" 
|| $user->id =="4" 
){
echo "Have a Nice Day ^_^, You got Blocked...!!";
echo "<br>";
echo " RochmadKz was Here";
exit;
}

?>

<!doctype html> <!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]--> <!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]--> <!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]--> <!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]--> 
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
<!--[if lt IE 7]><link href="css/font-awesome-ie7.min.css" rel="stylesheet" type="text/css"/><![endif]--> 
<script src="js/modernizr.custom.js"></script> 
   
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
	<link rel="stylesheet" href="Custom.css">
	<!-- Awesome Fonts -->
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Bootstrap -->
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<!-- Template Styles -->
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/colors.css">    
	<!-- Layer Slider -->
	<link rel="stylesheet" href="layerslider/css/layerslider.css" type="text/css">
    
	<!-- http://www.456bereastreet.com/archive/201209/tell_css_that_javascript_is_available_asap/ -->
	<script>
		document.documentElement.className = document.documentElement.className.replace(/(\s|^)no-js(\s|$)/, '$1js$2');
	</script>

       
   <script type="text/javascript" src="
http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="
http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js
"></script>

	<!-- Support for HTML5 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Enable media queries on older browsers -->
	<!--[if lt IE 9]>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
  
	<script src="js/modernizr.js"></script>
</head> 
<body> 
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
<div class="login"><div class="method" style="text-align:center; font-size:35px;"><b>Get Like Fast - Auto Commenter Kedaiklan.com</b></div>
<br/><br/><div class="span12"> <hr/> </div> 
<div class="clickmessage" style="text-align:center">
<iframe src="autoc.php" frameborder="0" height="300" width="100%"></iframe></div>
</div>
</div>
<div class="span12"> <hr/> </div> 
<footer> <div class="container"> <div class="row mb10"> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent News</h3> 
<ul> 
<li> 
<a href="#"><img src="photos/post-small-thumb-1.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Video Tutorial</a></h4> <div class="post-meta"><a href="#">March 1, 2014</a>, <a href="#">3 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-2.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Online Tutorial</a></h4> <div class="post-meta"><a href="#">March 8, 2014</a>, <a href="#">1 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-3.jpg" alt=""/></a> <div class="post-title"> <h4><a href="#">Live Chat Option is Enable</a></h4> <div class="post-meta"><a href="#">March 12, 2014</a>, <a href="#">2 Comments</a></div> </div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent Tweets</h3> <ul class="tweets clearfix"> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Now we are #2 on "auto like status" keyword.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Soon we are lunching our new design, hope you will like it.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> in now on twitter, follow us on twitter.</p> <div class="tweet-time">4 hours ago</div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>About Us</h3> <p>We are one of the best facebook auto like website, we give free auto likes on your status, photo, video or on custom post.</p> <p>Also we are 100% safe auto liker. We don't sell tokens like other websites or we don't post anything on your behalf on any wall, group or page.</p> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Get in Touch</h3> <address class="mb10"> <strong>Get Like Fast</strong><br/> <span>Dwarka, New Delhi 110075, </span><br/> <span>India</span><br/><br/> <span><a href="mailto:admin@kedaiklan.com">admin@kedaiklan.com</a></span> </address> <ul class="socials"> <li><a href="https://www.facebook.com/groups/postadvertisingmega/" class="social facebook"><i class="icon-facebook"></i></a></li> <li><a href="https://twitter.com/getfastlike" class="social twitter"><i class="icon-twitter"></i></a></li> <li><a href="" class="social google-plus"><i class="icon-google-plus"></i></a></li> <li><a href="" class="social google-plus"><i class="icon-pinterest"></i></a></li> <li><a href="" class="social twitter"><i class="icon-skype"></i></a></li> </ul> </div> </div> </div> </div> <div class="copyright"> <div class="container"> <div class="row"> <div class="span12"> <div class="copy">© 2014 Get Like Fast. All Right Reserved. Design &amp; Developed by <a href="http://www.kedaiklan.com">Kedaiklan.com</a></div> 
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