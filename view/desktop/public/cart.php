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
				<h2>Shopping Cart</h2>
				<form>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Photo</th>
								<th>Item Name</th>
								<th>Qty</th>
								<th>Unit Price</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($_SESSION as $cart => $value){
								if($value > 0){
									if(substr($name, 0, 5)=='cart_'){
										$id = substr($name, 5, (strlen($name)-5));
										$item = Item::find_by_id('id', $id);
										$photo = Photo::find_by_id('item_id', $id);
										echo '<tr>
												<td><a href="'.$photo->image_path().'" target="_blank"><img src="'.$photo->image_path_thumb().'" id="xsPhoto"></a></td>
												<td>'.$item->title.'</td>
												<td><input class="form-control" type="number" value="1" style="width: 100px;"></td>
												<td>&#x20B9;'.number($item->cost).'</td>
												<td>&#x20B9;<div id="item_total"></div></td>
											</tr>';
									}
								}
							}
						?>
						</tbody>
					</table>
				</form>

				<dl class="dl-horizontal pull-right">
					<dt>Sub-total:</dt>
					<dd>$999.99</dd>
					
					<dt>Shipping Cost:</dt>
					<dd>$0.01</dd>

					<dt>Total:</dt>
					<dd>$1000.00</dd>
				</dl>
				<div class="clearfix"></div>
				<a href="#" class="btn btn-success pull-right">Check out</a>
				<a href="#" class="btn btn-primary">Continue Shopping</a>
			</div>
		</div>
	</div>
</div>
<?php
	require_once $dir_modal.'modal_message_to_owner.php';
	require_once $dir_modal.'modal_report.php';
	require_once $dir_requires.'footer.php';
?>