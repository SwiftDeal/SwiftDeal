<?php
  require_once $dir_requires.'header.php';
  require_once $dir_requires.'navbar.php';
  require_once $dir_modal.'modal_login.php';
?>

<div class="container">
	<div class="page-header">
        <h1>Contact <small>We'd Love to Hear From You!</small></h1>
    </div>
	<div class="row">
		<div class="col-xs-9 col-sm-6 col-md-6">
		<?php echo output_message($message); ?>
			<h3>SwiftDeal.in</h3>
          	<h4>Get in Touch</h4>
          	<p>
            	B-16, Shahbad Daulatpur<br>
            	Delhi, 110042<br>
          	</p>
          	<p><i class="fa fa-phone"></i> <abbr title="Phone">P</abbr>: (+91) 9911354073</p>
          	<p><i class="fa fa-envelope-o"></i> <abbr title="Email">E</abbr>: <a href="mailto:admin@swiftdeal.in">admin@swiftdeal.in</a></p>
          	<p><i class="fa fa-clock-o"></i> <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
          	<ul class="list-unstyled list-inline list-social-icons">
              	<li class="tooltip-social facebook-link"><a href="https://www.facebook.com/swiftdeal" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
              	<li class="tooltip-social linkedin-link"><a href="http://www.linkedin.com/company/swiftdeal" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
              	<li class="tooltip-social twitter-link"><a href="https://twitter.com/swiftdealin" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
              	<li class="tooltip-social google-plus-link"><a href="https://plus.google.com/100250157508888853314" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
            </ul>
		</div>
		<div class="col-xs-9 col-sm-6 col-md-6">
		<div class="panel panel-success">
		<div class="panel-heading"><h3 class="panel-title">Message</h3></div>
		<div class="panel-body form-horizontal">
			<form role="form" method="post" class="" action="contact.php">
			  <div class="form-group">
				<label for="inputTitle" class="col-lg-4 control-label">E-mail</label>
				<div class="col-lg-6">
				  <input type="email" name="email" class="form-control" id="inputTitle" placeholder="Your E-mail" required="">
				</div>
			  </div>
			  <div class="form-group">
				<label for="inputTitle" class="col-lg-4 control-label">Mobile</label>
				<div class="col-lg-6">
				  <input type="text" name="subject" class="form-control" id="inputTitle" placeholder="Mobile">
				</div>
			  </div>
			  <div class="form-group">
				<label class="col-lg-4 control-label">Message</label>
				<div class="col-lg-6">
				  <textarea name="body" class="form-control" rows="5" required=""></textarea>
				</div>
			  </div>
			  <div class="form-group">
				<div class="col-lg-offset-4 col-lg-10">
				  <input type="submit" name="submit" data-loading-text="Loading..." class="btn btn-success" Value="Send">
				</div>
			  </div>
			</form>
		</div>
		</div>
		</div>
	</div>
	<div class="clear"></div><br>
</div>
<?php require_once $dir_requires.'footer.php';?>