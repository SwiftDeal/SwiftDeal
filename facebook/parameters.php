<?php
ob_start();
$cdn = 'http://cloudstuffs.com/';
//directory
$baseUrl = dirname($_SERVER['PHP_SELF']).'/';
$dir_assets = '../view/assets/';
$dir_assets_images = '../view/assets/images/';
$dir_assets_css = '../view/assets/css/';
$dir_assets_js = '../view/assets/js/';

$site_bg_img = 'bg3.png';

$dir_desktop = '../view/desktop/';
$dir_facebook = '/home/content/32/11823432/html/oldsd/view/facebook/';
$dir_mobile = '../view/mobile/';

$dir_public = $dir_desktop.'public/';
$dir_requires = $dir_public.'requires/';
$dir_addstuffs = $dir_public.'addstuffs/';
$dir_editstuffs = $dir_public.'editstuffs/';
$dir_modal = $dir_requires.'modal/';
$dir_admin = $dir_desktop.'admin/';

//mobile
$dir_public_mobile = $dir_mobile.'public/';
$dir_requires_mobile = $dir_public_mobile.'requires/';
$dir_dialog_mobile = $dir_requires_mobile.'dialogs/';

//facebook
$dir_facebook_requires = $dir_facebook.'requires/';
$fbootstrap = $cdn.'assets/fbootstrap/';
$fbootstrap_css = $fbootstrap.'css/';
$fbootstrap_js = $fbootstrap.'js/';
$fb_modal = $dir_facebook_requires.'modal/';

$dir_controller_admin = '../admin/';

$dir_uploads = '../view/uploads/';
$dir_upload_images = '../view/uploads/images/';
$dir_upload_noimages = $dir_upload_images.'80848126.jpg';

$dir_model = '../model/';

$title = "Making Happy Deals";
$time = strftime("%Y-%m-%d %H:%M:%S", time()+1800);

//meta
$meta_description = "Buy, Sell new or Used things in your own area socially.Never Sold Online Before? it's Easy Try here.";
$meta_keywords = "swiftdeal, making happy deal, social economic site, sell used , buy used ";
$meta_author = "Faizan Ayubi";

$site_url = "https://swiftdeal.in/public/index.php";

$formAction = 'formaction.php';

?>