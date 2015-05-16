<?php
	ob_start();
	require_once 'parameters.php';
	require_once $dir_model.'initialize.php';

	log_action('user', 'logout : ', "user_id - {$session->user_id}.");
	$session->logout();
	redirect_to($site_url.'index.php');
?>