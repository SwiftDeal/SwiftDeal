<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 id="nav-tabs">Marketing Records</h2>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
				<li class="active"><a href="#pending" data-toggle="tab">Pending</a></li>
                <li><a href="#allphonerecord" data-toggle="tab">Phone Records</a></li>
				<li><a href="#addphonerecord" data-toggle="tab">Add Phone Record</a></li>
				<li><a href="#allvisitrecord" data-toggle="tab">Visit Records</a></li>
				<li><a href="#addvisitrecord" data-toggle="tab">Add Visit Record</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
				<div class="tab-pane active fade in" id="pending">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Customer Name <i class="fa fa-sort"></i></th>
                              <th>Phone <i class="fa fa-sort"></i></th>
                              <th>Email <i class="fa fa-sort"></i></th>
                              <th>Category <i class="fa fa-sort"></i></th>
                              <th>Details <i class="fa fa-sort"></i></th>
							  <th>Call History <i class="fa fa-sort"></i></th>
							  <th>Reminder <i class="fa fa-sort"></i></th>
							  <th>Address <i class="fa fa-sort"></i></th>
							  <th>City <i class="fa fa-sort"></i></th>
							  <th>Created <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($records as $record) {
							  $record = Call::find_by_id($record->id);
							  if($record->reminder > $time){
                              echo '<tr>
                                      <td>'.$record->name.'</td>
                                      <td>'.$record->phone.'</td>
									  <td>'.$record->email.'</td>
									  <td>'.$record->category.'</td>
                                      <td>'.$record->details.'</td>
									  <td>'.$record->call_history.'</td>
                                      <td>'.$record->reminder.'</td>
									  <td>'.$record->address.'</td>
                                      <td>'.$record->city.'</td>
                                      <td>'.datetime_to_text($record->created).'</td>
                                      <td>
                                        <a href="'.$public_controller.'editstuff.php?item_id='.$record->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_item&item_id='.$record->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
								}
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade in" id="allrecord">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Customer Name <i class="fa fa-sort"></i></th>
                              <th>Phone <i class="fa fa-sort"></i></th>
                              <th>Email <i class="fa fa-sort"></i></th>
                              <th>Category <i class="fa fa-sort"></i></th>
                              <th>Details <i class="fa fa-sort"></i></th>
							  <th>Call History <i class="fa fa-sort"></i></th>
							  <th>Reminder <i class="fa fa-sort"></i></th>
							  <th>Address <i class="fa fa-sort"></i></th>
							  <th>City <i class="fa fa-sort"></i></th>
							  <th>Created <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($records as $record) {
							  $record = Call::find_by_id($record->id);
                              echo '<tr>
                                      <td>'.$record->name.'</td>
                                      <td>'.$record->phone.'</td>
									  <td>'.$record->email.'</td>
									  <td>'.$record->category.'</td>
                                      <td>'.$record->details.'</td>
									  <td>'.$record->call_history.'</td>
                                      <td>'.$record->reminder.'</td>
									  <td>'.$record->address.'</td>
                                      <td>'.$record->city.'</td>
                                      <td>'.datetime_to_text($record->created).'</td>
                                      <td>
                                        <a href="'.$public_controller.'editstuff.php?item_id='.$record->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_item&item_id='.$record->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
				<div class="tab-pane fade in" id="addrecord">
					<div class="panel-body form-horizontal">
                    <form role="form" method="post" action="calls.php">
                        <div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Customer Name </label>
                          <div class="col-lg-6">
                            <input type="text" name="name" class="form-control" id="inputQues" required="" placeholder="Name of Customer">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Phone </label>
                          <div class="col-lg-6">
                            <input type="tel" name="phone" class="form-control" id="inputQues" required="" placeholder="personal and office">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">E-mail </label>
                          <div class="col-lg-6">
                            <input type="email" name="email" class="form-control" id="inputQues" placeholder="personal email">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Category </label>
                          <div class="col-lg-6">
                            <input type="text" name="category" class="form-control" id="inputQues" required="" placeholder="eg. laptop, mobile etc">
                          </div>
                        </div>
						<div class="form-group">
                          <label class="col-lg-2 control-label">Details </label>
                          <div class="col-lg-6">
                            <textarea name="details" rows="3" class="form-control" placeholder="what you have talked to him and his reply"></textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Reminder </label>
                          <div class="col-lg-6">
                            <input type="datetime" name="reminder" class="form-control" id="inputQues" required="" placeholder="2013-10-20 16:50:51">
                          </div>
                        </div>
						<div class="form-group">
                          <label class="col-lg-2 control-label">Address </label>
                          <div class="col-lg-6">
                            <textarea name="address" rows="3" class="form-control" placeholder="personal and office address"></textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">City </label>
                          <div class="col-lg-6">
                            <input type="text" name="city" class="form-control" id="inputQues" required="" placeholder="Customer operating city">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Status </label>
                          <div class="col-lg-6">
                            <input type="text" name="status" class="form-control" id="inputQues" required="" placeholder="Interested or not">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="insert_record" class="btn btn-success btn-lg" Value="Save">
                          </div>
                        </div>
                    </form>
					</div>
                </div>
              </div>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->
<?php require_once $admin_dir_requires.'footer.php';?>