<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
	require_once $dir_modal.'modal_login.php';
?>
<div class="container">
	<div class="row">
		<?php require_once $dir_requires.'searchform.php';?>
		<div class="row">
			<div class="col-xs-6 col-md-4"><?php require_once $dir_requires.'boxitem.php';?></div>
			<div class="col-xs-12 col-sm-6 col-md-8">
			<?php echo $_SESSION['message'];?>
				<div class="thumbnail">
			        <div class="row">
				        <div class="col-xs-6">
						<?php
							$total_photo = count($photos);
							if($total_photo==0){
								echo '<a href="'.$dir_upload_noimages.'" target="_blank">
										<img src="'.$dir_upload_noimages.'" class="img-responsive" style="max-height:500px;">
									</a>';
							}elseif($total_photo > 1){
								echo '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
									  <ol class="carousel-indicators">
										<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
										<li data-target="#carousel-example-generic" data-slide-to="1"></li>
										<li data-target="#carousel-example-generic" data-slide-to="2"></li>
									  </ol>
									  <div class="carousel-inner">';
								$i = 1;
								foreach($photos as $photo){
									echo '<div ';
										if($i==1) echo 'class="item active"';
										else echo 'class="item"';
									echo '><a href="'.$photo->image_path().'" target="_blank"><img src="'.$photo->image_path().'" alt="First slide"></a>
										</div>';
										$i++;
								}
								echo '</div>
									  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left"></span>
									  </a>
									  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right"></span>
									  </a>
									</div>';
							}else{
								foreach($photos as $photo){
									echo '<a href="'.$photo->image_path().'" target="_blank">
											<img src="'.$photo->image_path().'" class="img-responsive" style="max-height:500px;">
										</a>';
								}
							}
						?>
				        </div>
				        <div class="col-xs-6">            
				        	<div class="caption-full">
				              	<h4 class="pull-right">&#x20B9;<?php echo number($item->cost);?></h4>
				              	<h4><a><?php echo $item->title;?></a></h4>
				              	<p><i class="fa fa-male fa-fw"></i><?php echo $user->name;?></p>
				              	<p><i class="fa fa-mobile-phone fa-fw"></i><?php if(empty($user->phone)){ echo "Only E-mail";}else{ echo $user->phone;}?></p>
				              	<p><i class="fa fa-globe fa-fw"></i><?php echo $user->address.' '.$item->city;?></p>
				              	<p><i class="fa fa-calendar fa-fw"></i><?php echo datetime_to_text($item->created);?></p>
				              	<p><i class="fa fa-save fa-fw"></i><?php if(empty($item->description)){ echo 'No Description';}else{ echo $item->description;} ?></p>
				            </div>
				            <div class="ratings">
				              	<p class="pull-right"><i class="fa fa-eye fa-fw"></i><?php echo $item->viewed;?> views</p>
				              	<p>
					                <span class="glyphicon glyphicon-star"></span>
					                <span class="glyphicon glyphicon-star"></span>
					                <span class="glyphicon glyphicon-star"></span>
				                	<span class="glyphicon glyphicon-star"></span>
				                	<span class="glyphicon glyphicon-star-empty"></span>
				                	4.0 stars
				              	</p>
				            </div>
				            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fswiftdeal.in%2Fviewitem.php%3Fitem_id%3D<?php echo $_GET['item_id'];?>&amp;width=20&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;send=true&amp;appId=391539497615701" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:22px;" allowTransparency="true"></iframe>
				        </div>
			        </div>
			    </div>
			    <div class="well">
		            <div class="text-right">
		            <?php
						if($_SESSION['user_id']==$item->user_id){
							echo '<a href="'.$dir_controller_admin.'task.php?action=delete_item&item_id='.$_GET['item_id'].'" class="btn btn-warning" >Delete</a>';
							echo '<a href="editstuff.php?item_id='.$_GET['item_id'].'" class="btn btn-info" >Edit</a>';
						}else { 
							echo '<button class="btn btn-primary" data-toggle="modal" data-target="#messageowner">Send Message to Owner</button>
								<button class="btn btn-danger" data-toggle="modal" data-target="#report">Report</button>';
						}
					?>
		            </div>
		            <div class="row">
		              <div class="col-md-12">
		              	<br><?php include $dir_requires.'disqus.php';?>
		              </div>
		            </div>
            	</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('.carousel').carousel({
		interval: 5000 //changes the speed
	})
</script>
<script src="<?php echo $dir_assets_js.'carousel.js';?>"></script>
<?php
	require_once $dir_modal.'modal_message_to_owner.php';
	require_once $dir_modal.'modal_report.php';
	require_once $dir_requires.'footer.php';
?>