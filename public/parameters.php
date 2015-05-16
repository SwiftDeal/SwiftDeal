<?php
ob_start();
//directory
$dir_root = '/home/content/32/11823432/html/oldsd/';
$dir_cdn = 'http://cdn1.cloudstuffs.com/';

$dir_assets = $dir_root.'view/assets/';
$dir_assets_images = $dir_cdn.'assets/images/';
$dir_assets_css = $dir_cdn.'assets/css/';
$dir_assets_js = $dir_cdn.'assets/js/';

$site_bg_img = 'bg3.png';

$dir_desktop = $dir_root.'view/desktop/';
$dir_facebook = $dir_root.'view/facebook/';
$dir_mobile = $dir_root.'view/mobile/';

$dir_public = $dir_desktop.'public/';
$dir_requires = $dir_public.'requires/';
$dir_addstuffs = $dir_public.'addstuffs/';
$dir_additems = $dir_public.'additems/';
$dir_addretailer = $dir_public.'addretailer/';
$dir_editstuffs = $dir_public.'editstuffs/';
$dir_modal = $dir_requires.'modal/';
$dir_admin = $dir_desktop.'admin/';

//mobile
$dir_public_mobile = $dir_mobile.'public/';
$dir_requires_mobile = $dir_public_mobile.'requires/';
$dir_dialog_mobile = $dir_requires_mobile.'dialogs/';

//facebook
$dir_facebook_requires = $dir_facebook.'requires/';
$fbootstrap = $dir_assets.'fbootstrap/';
$fbootstrap_css = $fbootstrap.'css/';
$fbootstrap_js = $fbootstrap.'js/';
$fb_modal = $dir_facebook_requires.'modal/';

$dir_controller_admin = '../admin/';

$dir_uploads = 'view/uploads/';
$dir_upload_images = $dir_uploads.'images/';
$dir_upload_noimages = $dir_upload_images.'80848126.jpg';

$dir_model = $dir_root.'model/';

//seller
$dir_seller = $dir_desktop.'seller/';
$dir_seller_requires = $dir_seller.'requires/';
$dir_seller_modal = $dir_seller_requires.'modal/';

//shop
$dir_shop = $dir_desktop.'shop/';
$dir_shop_requires = $dir_shop.'requires/';
$dir_shop_modal = $dir_shop_requires.'modal/';

$title = "Making Happy Deals";
$time = strftime("%Y-%m-%d %H:%M:%S", time()+1800);

//meta
$meta_description = "Buy, Sell new or Used things in your own area socially.Never Sold Online Before? it's Easy Try here.";
$meta_keywords = "swiftdeal, making happy deal, social economic site, sell used , buy used ";
$meta_author = "Faizan Ayubi";

$site_url = "http://ww2.swiftdeal.in/";

$formAction = 'formaction.php';

?>