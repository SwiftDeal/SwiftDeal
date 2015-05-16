<?php
include '../includes/initialize.php';
if ($session->is_logged_in()) { redirect_to("index.php");}
?>
<?php
if (isset($_POST['submit'])) {
    $user = new User();
    $user->name = trim($_POST['name']);
    $user->password = $_POST['password'];
    $user->email = trim($_POST['email']);
	$user->phone = trim($_POST['phone']);
	$user->place = trim($_POST['place']);
    if(empty($location->region_name)){ $user->state = $location->region;} else{ $user->state = $location->region_name;}
    $user->city = $location->city;
    $user->created = $created;
	
    if($user->save()){
		$session->login($user);
		redirect_to("profile.php");
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd"
    >
<html lang="en">
<head>
    <title>Register form</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
</head>
<body>
<?php require 'navbar.php';?><br>
<?php echo output_message($message); ?>
<div class="container">
<div class="page-header"><h2>Be Updated with us Join Our Family.</h2></div>
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">Your Details</h3></div>
<div class="panel-body">
<form role="form" class="form-horizontal" method="post" action="register.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="inputName" class="col-lg-2 control-label">Name</label>
    <div class="col-lg-4">
      <input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" required="">
    </div>
  </div>
   <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
    <div class="col-lg-4">
      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-Mail" required="">
	  <p class="help-block">Your E-mail Id will not be Shared.</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Password</label>
    <div class="col-lg-4">
      <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" required="">
	  <p class="help-block">You will be logged in automatically.</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPhone" class="col-lg-2 control-label">Contact No.</label>
    <div class="col-lg-3">
      <input type="tel" name="phone" size="18" maxlength="11"  class="form-control" id="inputPhone" placeholder="0XXXXXXXXXX">
	  <p class="help-block">People may Contact you if they want to buy something from you.</p>
    </div>
  </div>
  <div class="form-group">
    <label for="inputCity" class="col-lg-2 control-label">City</label>
    <div class="col-lg-4">
    <select class="form-control" name="place">
	  <?php require_once 'options.php';?>
	</select>
    </div>
  </div>
  <div class="checkbox form-group">
	<div class="col-lg-4">
	I accept the <a href="termsofservice.php">License Terms</a> and <a href="policy.php">Policy</a>.
	</div>
  </div><br>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <input type="submit" name="submit" data-loading-text="Loading..." style="max-width: 200px;" class="btn btn-success btn-lg btn-block" Value="Sign Up">
    </div>
  </div>
</form>
</div>
</div>
<?php require_once 'footer.php';?>