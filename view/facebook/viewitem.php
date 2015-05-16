<?php
	require $dir_facebook_requires.'header.php';
	require $dir_facebook_requires.'navbar.php';
?>
<div class="content">
	<div class="page-header">
		<h1>
			<form method="GET" action="search_results.php">
				<div class="clearfix">
					<label for="xlInput"><img src="<?php echo $dir_assets_images.'logo.png';?>" title="Swiftdeal.in"></label>
					<div class="input">
						<div class="input-append" style="margin-left:200px; margin-top:45px;">
						<input class="xlarge" id="xlInput" name="xlInput" size="30" type="text" class="span6" style="height:20px;" placeholder="What you want to buy?">
						<input class="btn primary" type="submit" value="Go" style="height:30px;">
						</div>
					</div>
				</div>
			</form>
		</h1>
    </div>
    <div class="row">
    	<div class="span4">
    		<?php require_once $dir_facebook_requires.'category.php';?>
    	</div>
    	<div class="span9">
		<?php
			$total_photo = count($photos);
			if($total_photo==0){
				echo '<a href="'.$dir_upload_noimages.'" target="_blank">
						<img src="'.$dir_upload_noimages.'" class="thumbnail" style="max-width:400px;">
					</a>';
			}elseif($total_photo > 1){
				echo '<ul class="media-grid">';
				foreach($photos as $photo){
					echo '<li><a href="'.$photo->image_path().'" target="_blank"><img src="'.$photo->image_path().'" class="thumbnail" style="max-width:400px;"></a>
						</li>';
				}
				echo '</ul>';
			}else{
				foreach($photos as $photo){
					echo '<a href="'.$photo->image_path().'" target="_blank">
							<img src="'.$photo->image_path().'" class="thumbnail" style="max-width:400px;">
						</a>';
				}
			}
		?>
		</div>
		<div class="span5">
			<table class="bordered-table zebra-striped">
				<thead><tr><th>Details</th></tr></thead>
				<tbody>
					<tr><td>Name: <?php echo $item->title;?></td></tr>
					<tr><td>Category: <?php echo $item->category;?></td></tr>
					<tr><td>Cost: <?php echo $item->cost;?></td></tr>
					<tr><td>Phone: <?php echo $user->phone;?></td></tr>
					<tr><td>Address: <?php echo $user->address;?></td></tr>
					<tr><td>Added on:<?php echo datetime_to_text($item->created);?></td></tr>
					<tr><td>Description:<?php echo $item->description;?></td></tr>
					<tr><td><button class="btn primary" data-keyboard="true" data-backdrop="true" data-controls-modal="send-message">Send Message to Owner</button></td></tr>
					<tr><td><button class="btn danger" data-keyboard="true" data-backdrop="true" data-controls-modal="report">Report</button></td></tr>
				</tbody>
			</table>
		</div>
    </div>
</div>
<?php require $dir_facebook_requires.'footer.php';?>