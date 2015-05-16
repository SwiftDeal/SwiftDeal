<div class="row">
	<div class="col-md-3" >
		<a href="<?php echo $site_url;?>">
			<img src="<?php echo $dir_assets_images.'logo.png';?>">
		</a>
	</div>
	<div class="col-md-6" >
		<form method="GET" action="search_results.php" id="formSearch">
			<div class="input-group input-group-lg" style="padding-top: 30px; padding-left: 30px; width:500px;" >
				<input type="search" class="form-control input-lg" name="keywords" autocomplete="off" 
						placeholder="Search anything you want" autofocus="" value="<?php echo censor($keywords);?>" 
						required="" id="inputKeywords">
				<span class="input-group-btn">
	    	    	<input type="submit" value="Go!" class="btn btn-default">
				</span>
    		</div><!-- /input-group -->
    		<!--<p class="help-block"><a>Customize Search</a></p>-->
		</form>
	</div>
	<div class="col-md-3" style="margin-top: 30px;">
		<button style="max-width: 220px;" class="btn btn-success btn-lg btn-block pull-right">Post Something to Sell<i class="fa fa-shopping-cart fa-fw"></i></button>
	</div>
</div>
<hr>
<div class="clear"></div>