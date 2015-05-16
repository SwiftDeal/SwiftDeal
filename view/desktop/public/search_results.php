<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
	require_once $dir_modal.'modal_login.php';
?>
<div class="container">
	<div class="row">
		<?php require_once $dir_requires.'searchform.php';?>
		<div class="row">
			<div class="col-md-3"><?php require_once $dir_requires.'boxitem.php';?></div>
			<div class="col-md-9">
				<div class="row">
					<?php
						if(strlen($keywords)>2){
							if ($search->total_results != 0) {
							echo '<div class="alert alert-success alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										Your search for <strong><b>'.censor($keywords).'</b></strong> returned <strong>'.$search->total_results.' results </strong> in '.$end.' seconds at '.$_COOKIE['dealcity'].'(<a onclick="changecity();" href="search_results.php?keywords='.$keywords.'"><u>change city</u></a>)
								   </div>';
							log_action('search', "Found {$search->total_results} items: ", "{$keywords}");
					
							foreach ($results as $result){
								$item = Item::find_by_id('id', $result->id);
								$photo = Photograph::find_by_id('item_id', $item->id);
								echo '<div class="col-sm-4 col-lg-4 col-md-4 ">
								  <div class="thumbnail">
									<img src="'.$photo->image_thumb_cdn().'" alt="'.$item->title.'" id="productBox">
									<div class="caption">
									  <p class="pull-right">&#x20B9;'.number($item->cost).'</p>
									  <p><a href="viewitem.php?title='.str_replace(' ', '_', trim($item->title)).'&item_id='.$result->id.'">'.substr($item->title, 0, 9).'...</a></p>
									  <p class="pull-right"><a class="btn btn-success btn-xs" href="viewitem.php?title='.str_replace(' ', '_', trim($item->title)).'&item_id='.$result->id.'">Details</a></p>
									  <p>Category : '.$item->category.'</p>
									</div>
									<div class="ratings">
									  <p class="pull-right">'.$item->viewed.' reviews</p>
									  <p>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
										<span class="glyphicon glyphicon-star"></span>
									  </p>
									</div>
								  </div>
								</div>';
							}							
				}elseif(!censored($keywords)) {
					log_action('search', "Not Found: ", "{$keywords}");
					echo '<div class="alert alert-success alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  Get Notified when someone adds '.$keywords.' or We will Contact you when we have this at '.$_COOKIE['dealcity'].'(<a onclick="changecity();" href="search_results.php?keywords='.$keywords.'"><u>change city</u></a>)
						  </div>';
					echo '<form class="form-inline col-md-4 col-md-offset-2" role="form" method="post" action="formaction.php?keywords='.$keywords.'">
							<div class="panel panel-danger">
							  <div class="panel-heading">
								<h3 class="panel-title">'.$keywords.'</h3>
							  </div>
							  <div class="panel-body">
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Enter your Name">
								 </div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="Enter email">
								</div>
								<div class="form-group">
									<input type="tel" class="form-control" name="phone" placeholder="Enter your Phone">
								 </div>
								<div class="form-group">
									<textarea class="form-control" rows="3" name="address" placeholder="Enter your Address"></textarea>
								</div>
								  <input type="submit" class="btn btn-default" name="request_item" value="Submit">
							  </div>
							</div>
						   </form>';
				}else{
					echo '<div class="alert alert-warning alert-dismissable">
							  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							  Enter any Other Search Term.
						  </div>';
				}
			
				//pagination's navigation
				echo "<div class=\"row\">
					<div class=\"pagination pagination-large pagination-centered\">";
				if(!empty($keywords)) {
					if ($pagination->total_pages() > 1) {
						if ($pagination->has_previous_page()) {
							echo "<a rel='prev' href=\"search_results.php?keywords={$keywords}&page=";
							echo $pagination->previous_page();
							echo "\">&laquo; <button class=\"btn btn-mini btn-primary\" type=\"button\">Previous</button></a> ";
						}

						for($i=1; $i<=$pagination->total_pages(); $i++) {
							if ($i == $page) {
								echo "<span class=\"selected\"> <button class=\"btn btn-mini\" type=\"button\">{$i}</button> </span>";
							} else {
								echo "<a href=\"search_results.php?keywords={$keywords}&page={$i}\"><button class=\"btn btn-mini btn-primary\" type=\"button\">{$i}</button></a>";
							}
						}

						if ($pagination->has_next_page()) {
							echo "<a rel=\"next\" href=\"search_results.php?keywords={$keywords}&page=";
							echo $pagination->next_page();
							echo "\"><button class=\"btn btn-mini btn-primary\" type=\"button\">Next</button>  &raquo;</a> ";
						}
					}
				}
				echo "</div>
					</div>";
			}else{
				echo '<div class="alert alert-success alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						Please Enter more than two characters to search.
					</div>';
			}
				?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php require_once $dir_requires.'footer.php';?>