<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
?>
<div class="container" id="mainContainer">
	<div class="row">
		<div class="row">
			<section class="top-section">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<h1>
								<img src="<?php echo $dir_assets_images.'logo.png';?>">
							</h1>
						</div>
						<div class="col-md-4  col-lg-5 col-sm-6 col-xs-6">
							<form method="GET" action="search_results.php" id="formSearch">
								<div class="input-group input-group-lg" style="padding-top: 40px; width:450px;" >
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
						<div class="col-md-4 col-lg-3 col-sm-6 col-xs-6">
							<!--
									<span class="text-right"></span>
									<p>
										Your cart <small>(2 items | $120)</small>
									</p>
									<p>
										 <a class="btn btn-sm btn-success btn-block" href="#">Checkout</a>
									</p>
							-->
						</div>
					</div>
				</div>
			</section>

			<section>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
							<ul id="cat-navi" class="nav nav-list">
								 <li><a href="#" class="list-group-item active"> Popular Items</a></li>
								 <?php
									foreach($popular_items as $popular_item){
										echo '<li><a href="viewitem.php?item_id='.$popular_item->id.'" class="list-group-item">'.$popular_item->title.'</a></li>';
									}
								 ?>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div id="carousel-299058" class="carousel slide">
								<ol class="carousel-indicators">
									<li data-target="#carousel-299058" data-slide-to="0" class="active">
									</li>
									<li data-target="#carousel-299058" data-slide-to="1">
									</li>
									<li data-target="#carousel-299058" data-slide-to="2">
									</li>
								</ol>
					
					<div class="carousel-inner">
						<div class="item active">
							<img class="img-responsive" src="<?php echo $dir_assets_images.'carousel/SwiftDeal.gif'?>" alt="thumb" />
							<div class="carousel-caption">
								Welcome to SwiftDeal.in
							</div>
						</div>
						<!--<div class="item">
							<img class="img-responsive" src="images/carouselthumb.jpg" alt="thumb" />
							<div class="carousel-caption">
								Carousel caption 2. Here goes slide description. Lorem ipsum dolor set amet.
							</div>
						</div>
						<div class="item">
							<img class="img-responsive" src="images/carouselthumb.jpg" alt="thumb" />
							<div class="carousel-caption">
								Carousel caption 3. Here goes slide description. Lorem ipsum dolor set amet.
							</div>
						</div>-->
					</div>
					 <a class="left carousel-control" href="#carousel-299058" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel-299058" data-slide="next"><span class="icon-next"></span></a>
				</div>
				<div class="page-header">
					<h3>
						New Items <small>Loved by Many</small>
					</h3>
				</div>
				<div class="row">
				<?php
					foreach($results as $recent){
						$item = Item::find_by_id('id', $recent->id);
						$photo = Photograph::find_by_id('item_id', $item->id);
						echo '<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="panel panel-default">
									<img src="'.$photo->image_thumb_cdn().'" alt="'.$item->title.'" id="productBox">
									<div class="panel-body text-center">
										<h4>
											<a href="viewitem.php?title='.str_replace(' ', '_', trim($item->title)).'&item_id='.$recent->id.'">'.substr($item->title, 0, 9).'...</a>
										</h4>
										<p class="text-danger">
											&#x20B9;'.number($item->cost).'
										</p>
									</div>
								</div>
							</div>';
					}
				?>
				
				</div>
				<hr>
<!--			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<ul class="pagination">
					<li>
						<a href="#">«</a>
					</li>
					<li class="active">
						<a href="#">1</a>
					</li>
					<li>
						<a href="#">2</a>
					</li>
					<li>
						<a href="#">3</a>
					</li>
					<li>
						<a href="#">4</a>
					</li>
					<li>
						<a href="#">5</a>
					</li>
					<li>
						<a href="#">»</a>
					</li>
				</ul>
				</div>
			</div> -->
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			<div class="row">
			<div class="col-xs-6 col-sm-12 col-md-12 col-lg-12">
				<div class="panel panel-default">
					<img class="img-responsive" src="images/thumb.jpg" alt="">
						<div class="panel-body">
						<p class="lead text-danger text-center">
							Books 10% off till 15th April, 2014
						</p>
						<p>
							<a class="btn btn-warning btn-md btn-block" href="search_results.php?keywords=book">View All</a>
						</p>
					</div>
				</div>
				<form class="form-inline" role="form" method="post" action="formaction.php?keywords=home">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title">Request Any Item</h3>
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
						<input type="submit" class="btn btn-default" name="request_item" value="Submit">
					</div>
				</div>
			   </form>
			</div>
			</div>
		</div>
	</div><!-- / inner .row -->
			</div>
		</section>

		</div>
	</div>
</div>
<?php require_once $dir_requires.'footer.php';?>