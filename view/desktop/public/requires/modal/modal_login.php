<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<form class="form-horizontal" role="form" method="post" action="public/login.php">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">My Product</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
						<input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email or Phone">
					</div>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" name="password" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
						<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
					</div>
					</div>
				</div>
				<br>
				<p class="center"><b>You can check your added items reviews and message from here.</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" name="login" value="Sign in">
			</div>
		</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->