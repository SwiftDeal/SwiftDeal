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
						<input type="search" name="keywords" class="span6" style="height:20px;" placeholder="What you want to buy?">
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
    	<div class="span14">
		<?php if($results_num){?>
			<div class="alert-message success">
				<a class="close" href="#">×</a>
				<p>Your Search for <strong><?php echo $keywords;?></strong> returned <?php echo $results_num;?> results</p>
			</div>
			<table class="bordered-table">
				<tbody>
					<thead>
					  <tr>
						<th>Photo</th>
						<th>Item Name</th>
						<th>Reviews</th>
						<th>Cost</th>
						<th>Action</th>
					  </tr>
					</thead>
				<?php
					foreach($results as $result){
						$item = Item::find_by_id('id', $result->id);
						$photo = Photograph::find_by_id('item_id', $item->id);
						echo '<tr>
								<th><img src="'.$photo->image_path_thumb().'" class="thumbnail xsPhoto"></th>
								<td><a href="viewitem.php?item_id='.$item->id.'">'.$item->title.'</td>
								<td>'.$item->viewed.'</td>
								<td>&#x20B9; '.number($item->cost).'</td>
								<td><a href="viewitem.php?item_id='.$item->id.'" class="btn primary">Details</a></td>
							</tr>';
					}
				?>
				</tbody>
			</table>
			<div class="pagination">
				<ul>
				<?php
					
					if ($pagination->total_pages() > 1) {
						if ($pagination->has_previous_page()) {
							echo "<li class='prev'><a rel='prev' href=\"search_results.php?keywords={$keywords}&page=".$pagination->previous_page()."\">&larr; Previous</a></li>";
						}

						for($i=1; $i<=$pagination->total_pages(); $i++) {
							if ($i == $page) {
								echo "<li class=\"active\"><a href=\"search_results.php?keywords={$keywords}&page={$i}\">{$i}</a></li>";
							} else {
								echo "<li><a href=\"search_results.php?keywords={$keywords}&page={$i}\">{$i}</a></li>";
							}
						}

						if ($pagination->has_next_page()) {
							echo "<li class='next'><a rel=\"next\" href=\"search_results.php?keywords={$keywords}&page=";
							echo $pagination->next_page();
							echo "\">Next &rarr;</a></li>";
						}
					}
				}
				?>
				</ul>
			</div>
    	</div>
    </div>
</div>
<?php require $dir_facebook_requires.'footer.php';?>