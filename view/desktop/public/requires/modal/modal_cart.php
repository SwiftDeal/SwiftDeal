	<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<form class="form-horizontal" role="form" method="post" action="<?php echo $formAction;?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Cart</h4>
		  		</div>
				<div class="modal-body">
				  	<table class="table cartTab">
						<thead>
							<tr>
								<th>Items</th>
								<th>Price</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
                    <span class="label label-info price">Total : $ <span id="amount">0</span></span>
                    <a class="btn buyNow" href="http://paypal.com/" target="blank">Buy Now <i class="icon-ok"></i></a>
                </div>
		  	</form>
			</div><!-- /.modal-content -->
	  	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->