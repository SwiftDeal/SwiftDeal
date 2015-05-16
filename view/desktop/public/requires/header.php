<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo $dir_assets_images.'favicon.ico';?>">
	<meta name="description" content="<?php echo $meta_description;?>" />
	<meta name="keywords" content="<?php echo $meta_keywords;?>">
	<meta name="author" content="<?php echo $meta_author;?>">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="2 days">
	<meta name="copyright" content="SwiftDeal.in" />
	<meta name="googlebot" content="noodp">
	<meta name="language" content="English">
	<meta name="web_author" content="Faizan Ayubi">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<META NAME="ROBOTS" CONTENT="INDEX,FOLLOW"> 
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="public">

	<!-- SOCIAL META TAGS -->
	<!-- GOOGLE -->
	<link rel="publisher" href="https://plus.google.com/+SwiftdealIn"/>
	<!-- FACEBOOK -->
	<meta property="og:title" content="<?php echo $fb_title;?>"/>
	<meta property="og:type" content="<?php echo $fb_type;?>"/>
	<meta property="og:image" content="<?php echo $fb_image_url;?>"/>
	<meta property="og:url" content="<?php echo $fb_url;?>"/>
	<meta property="og:description" content="<?php echo $fb_description;?>"/>
	<meta property="fb:admins" content="<?php echo $fb_admin_userid;?>"/>
	<!-- TWITTER -->
	<meta name="twitter:card" content="<?php echo $tw_card;?>">
	<meta name="twitter:url" content="<?php echo $tw_url;?>">
	<meta name="twitter:title" content="<?php echo $tw_title;?>">
	<meta name="twitter:description" content="<?php echo $tw_description;?>">
	<meta name="twitter:image" content="<?php echo $tw_image;?>">
	<!-- /SOCIAL META TAGS -->

	<title><?php echo $title;?></title>
	<base href="http://ww2.swiftdeal.in/">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $dir_assets_css.'modern-business.css';?>" rel="stylesheet">

	<!-- Included Bootstrap Customization CSS Files -->
	<link rel="stylesheet" href="<?php echo $dir_assets_css.'bootstrap-extension.css';?>" />	
	<link rel="stylesheet" href="<?php echo $dir_assets_css.'style.css';?>" />

<style type="text/css">
html,body {
	height: 100%;
    margin:0;
	background-image:url("<?php echo $dir_assets_images.$site_bg_img;?>");
}
.container {
    position: relative;
    min-height: 100%;
    vertical-align:bottom;
    margin:0 auto;
    height:100% auto;
}
#carousel{
	max-height: 400px;
	max-width: 1170px;
}
#productBox{
	max-height: 200px;
	min-height: 200px;
	max-width: 150px;
}
#xsPhoto{
	max-height: 60px;
	max-width: 50px;
}
.feedback {
    position: fixed;
    top: 270px;
    width: 40px;
    height: 160px;
    background: url("<?php echo $dir_assets_images.'feedback.png';?>") no-repeat scroll 0% 0% transparent;
    cursor: pointer;
    z-index: 5;
}
#demo_box{
    width: 300px;
}
#demo_ul{
	margin-top:200px;
}
#fa{
	font-size: 40px;
	line-height: 70px;
}
.shopBtn{bottom: 30px; right: 10px; z-index: 100;display: block; position: fixed; width:64px; background: url("<?php echo $dir_assets_images.'shop.png';?>") no-repeat;text-align: center ;padding-top: 30px}
.shopBtn span{font-size: 20px;margin-top: 20px}
.shopBtn:hover{text-decoration: none}
.label-info.price{font-size: 15px ; margin-top: 3px;float: left}
.shopBtn .label-info{background: none}
</style>

<!-- Javascript -->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- GEOLOCATION-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript" src="<?php echo $dir_assets_js.'geolocation.js';?>"></script>
</head>
<body onload="checkCookie();">
<!-- Facebook-->
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=391539497615701";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<!-- Google Tracking -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47709543-1', 'swiftdeal.in');
  ga('send', 'pageview');

</script>
<?php
if (!empty($_COOKIE['dealcity'])){
  $_SESSION['dealcity'] = $_COOKIE['dealcity'];
  $dealcity = $_SESSION['dealcity'];
} else {
  $dealcity = 'Delhi';
  $_SESSION['dealcity'] = $dealcity;
}
?>
<div class="feedback" data-toggle="modal" data-target="#feedback"></div>