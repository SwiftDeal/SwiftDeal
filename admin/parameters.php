<?php
ob_start();
//directory
$admin_dir_requires = "../view/desktop/admin/requires/";
$admin_dir = "../view/desktop/admin/";
$admin_dir_modal = "../view/desktop/admin/modal/";

$super_admin = 2;
$admin = 1;

$public_controller = '../public/';
$formAction = $public_controller.'formaction.php';

$dir_filemanager = "file_manager/index.php";

require_once $public_controller.'parameters.php';
?>