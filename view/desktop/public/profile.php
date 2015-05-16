<?php
	require_once $dir_requires.'header.php';
	require_once $dir_requires.'navbar.php';
	require_once $dir_modal.'modal_login.php';
?>
<div class="container">

	<div class="row">
		<div class="col-xs-6 col-sm-6 col-md-3" id="sidebar" role="navigation">
          	<div class="well sidebar-nav">
            	<ul class="nav">
              		<li>Profile</li>
              		<li><a href="profile.php"><i class="fa fa-user fa-fw"></i> Edit Profile</a></li>
              		<li><a href="profile.php?query=wishlist"><i class="fa fa-shopping-cart fa-fw"></i> MyWish List</a></li>
              		<li><a href="profile.php?query=viewproduct"><i class="fa fa-edit fa-fw"></i> View/Edit Items</a></li>
              		<li><a href="profile.php?query=viewmsg"><i class="fa fa-envelope fa-fw"></i> View Messages</a></li>
            	</ul>
          	</div><!--/.well -->
        </div><!--/span-->

		<div class="col-xs-12 col-sm-6 col-md-8">
		<?php		
		if(isset($_GET['query'])){
			switch ($_GET['query']) {
				case 'viewproduct':
					echo '<h1 class="page-header">All Items</h1>';
					if(count($user_items)){
						echo '<div class="table-responsive">
						  <table class="table table-bordered table-hover table-striped tablesorter">
							  <thead>
								<tr>
								  <th>Photo <i class="fa fa-sort"></i></th>
								  <th>Item Name <i class="fa fa-sort"></i></th>
								  <th>Cost <i class="fa fa-sort"></i></th>
								  <th>Created <i class="fa fa-sort"></i></th>
								  <th>Viewed <i class="fa fa-sort"></i></th>
								  <th>City <i class="fa fa-sort"></i></th>
								  <th>Action <i class="fa fa-sort"></i></th>
								</tr>
							  </thead>
							  <tbody>';
								foreach ($user_items as $user_item) {
								  $photo = Photograph::find_by_id('item_id', $user_item->id);
								  $user_item = Item::find_by_id('id', $user_item->id);
								  echo '<tr>
										  <td><a href="'.$photo->image_path().'" target="_blank"><img src="'.$photo->image_path_thumb().'" id="xsPhoto"></a></td>
										  <td><a href="'.$public_controller.'viewitem.php?item_id='.$user_item->id.'" target="_blank">'.$user_item->title.'</a></td>
										  <td>&#x20B9;'.number($user_item->cost).'</td>
										  <td>'.datetime_to_text($user_item->created).'</td>
										  <td>'.$user_item->viewed.'</td>
										  <td>'.$user_item->city.'</td>
										  <td>
											<a href="editstuff.php?item_id='.$user_item->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
											<a href="'.$dir_controller_admin.'task.php?action=delete_item&item_id='.$user_item->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
										  </td>
										</tr>';
								}
							  echo '</tbody>
						  </table>
						</div>';
					}else{
						echo '<div class="well well-lg">You have Not added anything<br>Not Sold online before? it\'s Easy <br>click to Add anything you want to sell.<br><br>
						<a href="addstuffs.php" class="btn btn-primary">Get Started</a></div>';
					}
					break;
				
				case 'viewmsg':
					echo '<h1 class="page-header">Messages</h1>';
					if(count($user_messages)){
					echo '<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>Item<i class="fa fa-sort"></i></th>
									<th>From Email <i class="fa fa-sort"></i></th>
                                    <th>city <i class="fa fa-sort"></i></th>
                                    <th>Message <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>';
                                foreach ($user_messages as $user_message) {
									$item = Item::find_by_id('id', $user_message->item_id);
                                    echo '<tr>
                                            <td>'.$item->title.'</td>
                                            <td>'.$user_message->from_email.'</td>
                                            <td>'.$user_message->city.'</td>
                                            <td>'.$user_message->message.'</td>
                                            <td>'.$user_message->phone.'</td>
                                            <td>'.datetime_to_text($user_message->created).'</td>
                                            <td>
                                                <a href="'.$dir_controller_admin.'task.php?action=delete_messages&message_id='.$user_message->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                                <a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                }
							echo '</tbody>
                            </table>
                        </div>';
						}else{
							echo '<div class="well well-lg">No One has send any Message to you till now.<br>Not Sold online before? it\'s Easy <br>click to Add anything you want to sell.<br><br>
								<a href="addstuffs.php" class="btn btn-primary">Get Started</a></div>';
						}
					break;
				
				case 'wishlist':
					echo '<h1 class="page-header">Requested Items</h1>';
					if(count($requested_items)){
					echo '<div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Item Name <i class="fa fa-sort"></i></th>
                              <th>Phone <i class="fa fa-sort"></i></th>
                              <th>Address <i class="fa fa-sort"></i></th>
                              <th>Created <i class="fa fa-sort"></i></th>
                              <th>City <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>';
                            foreach ($requested_items as $requested_item) {
                              $photo = Photograph::find_by_id('item_id', $item->id);
                              echo '<tr>
                                      <td>'.$requested_item->item_name.'</td>
                                      <td>'.$requested_item->phone.'</td>
                                      <td>'.$requested_item->address.'</td>
									  <td>'.datetime_to_text($requested_item->created).'</td>
                                      <td>'.$requested_item->city.'</td>
                                      <td>
                                        <a href="editstuff.php?item_id='.$requested_item->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="'.$dir_controller_admin.'task.php?action=delete_ritem&item_id='.$requested_item->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                      </td>
                                    </tr>';
                            }
                          echo '</tbody>
                      </table>
                    </div>';
					}else{
						echo '<div class="well well-lg">You Have not Requested Any Item Till Now.<br>Request here it\'s Easy you will be called within 24 hours.<br><br>
							<a href="addstuffs.php" class="btn btn-primary">Get Started</a></div>';
						echo '<form class="form-inline col-md-4 col-md-offset-2" role="form" method="post" action="formaction.php?keywords='.$keywords.'">
							<div class="panel panel-danger">
							  <div class="panel-heading">
								<h3 class="panel-title">Request Any Item</h3>
							  </div>
							  <div class="panel-body">
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Enter Item Name">
								 </div>
								<input type="hidden" class="form-control" name="name" value="'.$session->name.'">
								<input type="hidden" class="form-control" name="email" value="'.$user->email.'">
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
					}
					break;
					
				case 'value':
					# code...
					break;
				
				default:
					# code...
					break;
			}
		} else{?>
			<h1 class="page-header">Profile</h1>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title">Your Details</h3></div>
				<div class="panel-body">
					<form role="form" class="form-horizontal" method="post" action="profile.php" enctype="multipart/form-data">
						<div class="form-group">
					    	<label for="inputName" class="col-lg-2 control-label">Full Name</label>
					    	<div class="col-lg-4">
					      		<input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" value="<?php echo $user->name;?>" required="">
					    	</div>
					  	</div>
					   	<div class="form-group">
					    	<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					    	<div class="col-lg-4">
					      		<input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-Mail" value="<?php echo $user->email;?>" required="">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputPhone" class="col-lg-2 control-label">Contact No.</label>
					    	<div class="col-lg-3">
					      		<input type="tel" name="phone" size="18" maxlength="11"  class="form-control" id="inputPhone" placeholder="0XXXXXXXXXX" value="<?php echo $user->phone;?>" required="" >
						  		<p class="help-block">People may Contact you if they want to buy something from you.</p>
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputName" class="col-lg-2 control-label">City</label>
					    	<div class="col-lg-4">
					      		<input type="text" name="city" class="form-control" id="inputName" placeholder="Current City" value="<?php echo $user->city;?>" required="">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputName" class="col-lg-2 control-label">Address</label>
					    	<div class="col-lg-4">
					      		<input type="text" name="address" class="form-control" id="inputName" placeholder="Current Adddress" value="<?php echo $user->address;?>" required="">
					    	</div>
					  	</div>
					  	<div class="form-group">
					    	<label for="inputPassword1" class="col-lg-2 control-label">Change Password</label>
					    	<div class="col-lg-4">
					      		<input type="password" name="password" class="form-control" id="inputPassword1" placeholder="New Password">
					    	</div>
					  	</div>
					  	<div class="form-group">
						    <div class="col-lg-offset-2 col-lg-10">
					      		<input type="submit" name="save" data-loading-text="Loading..." style="max-width: 200px;" class="btn btn-success btn-lg btn-block" Value="Update">
					    	</div>
					  	</div>
					</form>
				</div>
			</div><?php }?>
		</div>
	</div><!--/row-->
</div><!--/container-->
<?php require_once $dir_requires.'footer.php';?>