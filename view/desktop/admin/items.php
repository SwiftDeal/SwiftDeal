<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">
    <div class="row">
          <div class="col-lg-12">
            <h2 id="nav-tabs">Items</h2>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
				<li class="active"><a href="#inactiveitem" data-toggle="tab">Inactive</a></li>
                <li><a href="#allitem" data-toggle="tab">All</a></li>
				<li><a href="#recentitem" data-toggle="tab">Recent</a></li>
                <li><a href="#requestitem" data-toggle="tab">Requested</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
				<div class="tab-pane active fade in" id="inactiveitem">
                    <div class="table-responsive">
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
                          <tbody>
                          <?php
                            foreach ($inactive_items as $item) {
                              $photo = Photograph::find_by_id('item_id', $item->id);
							  $item = Item::find_by_id('id', $item->id);
                              echo '<tr>
                                      <td><a href="'.$photo->image_thumb_cdn().'" target="_blank"><img src="'.$photo->image_path_thumb().'" id="xsPhoto"></a></td>
                                      <td><a href="'.$public_controller.'viewitem.php?item_id='.$item->id.'" target="_blank">'.$item->title.'</a></td>
                                      <td>&#x20B9;'.number($item->cost).'</td>
                                      <td>'.datetime_to_text($item->created).'</td>
                                      <td>'.$item->viewed.'</td>
                                      <td>'.$item->city.'</td>
                                      <td>
										<a href="task.php?action=approve_item&inactive_item_id='.$item->id.'" alt="Activate Item"><i class="fa fa-check fa-fw"></i></a>&nbsp;
                                        <a href="'.$public_controller.'editstuff.php?item_id='.$item->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_item&item_id='.$item->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade in" id="allitem">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Item Name <i class="fa fa-sort"></i></th>
                              <th>Cost <i class="fa fa-sort"></i></th>
                              <th>Created <i class="fa fa-sort"></i></th>
                              <th>Viewed <i class="fa fa-sort"></i></th>
                              <th>City <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($items as $item) {
							  $item = Item::find_by_id('id', $item->id);
                              echo '<tr>
                                      <td><a href="'.$public_controller.'viewitem.php?item_id='.$item->id.'" target="_blank">'.$item->title.'</a></td>
                                      <td>&#x20B9;'.number($item->cost).'</td>
                                      <td>'.datetime_to_text($item->created).'</td>
                                      <td>'.$item->viewed.'</td>
                                      <td>'.$item->city.'</td>
                                      <td>
                                        <a href="'.$public_controller.'editstuff.php?item_id='.$item->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_item&item_id='.$item->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
				<div class="tab-pane fade in" id="recentitem">
                    <div class="table-responsive">
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
                          <tbody>
                          <?php
                            foreach ($recent_items as $item) {
                              $photo = Photograph::find_by_id('item_id', $item->id);
							  $item = Item::find_by_id('id', $item->id);
                              echo '<tr>
                                      <td><a href="'.$photo->image_thumb_cdn().'" target="_blank"><img src="'.$photo->image_path_thumb().'" id="xsPhoto"></a></td>
                                      <td><a href="'.$public_controller.'viewitem.php?item_id='.$item->id.'" target="_blank">'.$item->title.'</a></td>
                                      <td>&#x20B9;'.number($item->cost).'</td>
                                      <td>'.datetime_to_text($item->created).'</td>
                                      <td>'.$item->viewed.'</td>
                                      <td>'.$item->city.'</td>
                                      <td>
                                        <a href="'.$public_controller.'editstuff.php?item_id='.$item->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_item&item_id='.$item->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="requestitem">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Item Name <i class="fa fa-sort"></i></th>
                              <th>User <i class="fa fa-sort"></i></th>
                              <th>E-mail <i class="fa fa-sort"></i></th>
                              <th>Phone <i class="fa fa-sort"></i></th>
                              <th>City <i class="fa fa-sort"></i></th>
                              <th>Address <i class="fa fa-sort"></i></th>
                              <th>Created <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($requesteditems as $requested_item) {
                              echo '<tr>
                                      <td>'.$requested_item->item_name.'</td>
                                      <td>'.$requested_item->name.'</td>
                                      <td>'.$requested_item->email.'</td>
                                      <td>'.$requested_item->phone.'</td>
                                      <td>'.$requested_item->city.'</td>
                                      <td>'.$requested_item->address.'</td>
                                      <td>'.datetime_to_text($requested_item->created).'</td>
                                      <td>
                                        <a href="task.php?action=delete_request_item&request_item_id='.$requested_item->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->
<?php require_once $admin_dir_requires.'footer.php';?>