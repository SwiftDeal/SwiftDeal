<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
?>
<div class="container" id="mainContainer">
	<div class="row">
		<div class="page-header">
			<h2>Dealings Made Online<a href="addstuffs.php" style="max-width: 220px;" class="btn btn-success btn-lg btn-block pull-right">Post Something to Sell<i class="fa fa-shopping-cart fa-fw"></i></a></h2>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-4"><?php require_once $dir_requires.'boxitem.php';?></div>
			<div class="col-xs-12 col-sm-6 col-md-8" id="">
			<?php echo output_message($message); ?>
			<div style="padding-top:50px;">
				<a href="<?php echo $site_url;?>"><img src="<?php echo $dir_assets_images.'logo.png';?>" title="Swiftdeal.in"></a><br>
					<form method="GET" action="search_results.php">
						<div class="input-group input-group-lg" style="padding-top: 30px; width:400px;" >
							<input type="search" class="form-control input-lg" list="items" name="keywords" autocomplete="off" placeholder="Search anything you want" autofocus="" required="" id="inputKeywords">
							<span class="input-group-btn"><input type="submit" value="Go!" class="btn btn-default"></span>
						</div><!-- /input-group -->
					</form>
			</div>
			</div>
		</div>
	</div>
</div>
<?php require_once $dir_requires.'footer.php';?>