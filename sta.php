<?include 'cek.php';?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<title>zymi.antserve.net | Facebook AutoLike</title>
<link rel="shortcut icon" href="http://m-static.ak.fbcdn.net/rsrc.php/yi/r/q9U99v3_saj.ico"/>
<link href='http://fonts.googleapis.com/css?family=Glegoo' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:200,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Dosis:200,400' rel='stylesheet' type='text/css'>
<style>
*, body {
color: #636363;
font-family: 'Dosis', sans-serif;
<style>
*, body {
color: #636363;
font-family: 'Dosis', sans-serif;
}
</style>


<link rel="stylesheet" href="/x/default/_.css?version=889988" media="screen, projection"/>

<script><?include 'zymi.php';?></script>
<script src="/x/default/index.index.js"></script></head>
<body><section id="root"></section>
<section class="container" style="width:85%;margin: 0 0 0 3%;">
<section style="height: 130px;">
<section style="position: relative;">
<section class="logo">
<h1>
<span style="color: #2F3292;">Like </span>
<span style="color: #1CBAF2;margin: 0 0 0 -18px;">
lo</span>
</h1>
</section>

<section
style="margin:0 0 -10% 0;font-size: 18px;background: #00C0F2;height: 40px;-webkit-border-radius: 2px;border-radius: 2px;">
<section style="padding: 7px;">
<a href="/status.php">
<section class="navigation"
style="cursor: pointer;color: #ffffff;margin: -2.75px 4px 0 0;float: left;font-weight: bold;"> Status |</section>
</a>
<a href="/bot_comments.php?token=<?echo $_GET['token'];?>">
<section class="navigation"
style="cursor: pointer;color: #ffffff;margin: -2.75px 4px 0 0;float: left;font-weight: bold;"> Bot comments </section>
</a></section>
</section>
</section>
</section>

<div class="feed"></div>
<script>GRAPH.set('accessToken', '<?echo $_GET['token'];?>');
GRAPH.api('me/statuses', 'GET', {
limit: 1
}, function (response) {
$('.feed').html('');
$.each(response.data, function (index, value) {
if ('message' in value) {
var $html = '<div class="status">' +
'<div class="image">' +
'<img src="https://graph.facebook.com/' + value.from.id + '/picture">' +
'</div>' +
'<div class="name">' +
value.from.name.substring(0, 50) +
'</div>' +
'<div class="message">' + value.message.substring(0, 100) + '...' +
'</div>' +
'<form action="likers.php" method="GET">' +
'<input type="hidden" name="postid" value="' + value.from.id + '_' + value.id + '"/>' +
'<input type="submit" value="AutoLike 1" class="submit">' +
'</form>' +
'</div>';
$('.feed').append($html);
}
});
return true;
});
</script><section style="border-top:1px solid #aaaaaa; font-size: 11px; padding: 5px;margin: 10px 0 0 0;">
<section style="float: left;">
Get Like Fast &copy; 2013 `</section>
<section style="float: right;">
<a href="http://www.pankajjangir.com" title="Developers" target="_blank"
data-ajax='{"content":"#controller"}'>
Developers
</a>
</section>
</section>
</section>
</section>

</body>
</html>
