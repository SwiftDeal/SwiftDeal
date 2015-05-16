<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
	require_once $dir_modal.'modal_login.php';
	echo '<div class="container">';
	echo output_message($message);
	if(!empty($_GET['query'])){
	  if($_GET['query']=='changepwd'&& $_GET['email']){
		echo '<div class="col-md-4">';
		echo '<form class="form-signin" method="post" action="login.php?query=changepwd&email='.$_GET['email'].'&access_token='.$_GET['access_token'].'">
			<h2 class="form-signin-heading">Change Password</h2>
			<input type="password" class="form-control" placeholder="New Password" name="password">
		  <input type="password" class="form-control" placeholder="Re-Enter Password" name="cpassword">
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="cpwd" value="Change Password">
		  </form>
		  </div>
		  </div> <!-- /container -->';
	  }
	}else{?>
	<div class="col-md-4">
    <form class="form-signin" method="post" action="login.php">
      <h2 class="form-signin-heading">Please sign in</h2>
      <input type="text" class="form-control" placeholder="Email address or Phone Number" autofocus name="email">
      <input type="password" class="form-control" placeholder="Password" name="password">
      <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" value="Sign in">
    </form>
	</div>
    </div> <!-- /container -->
<?php } require_once $dir_requires.'footer.php';?>