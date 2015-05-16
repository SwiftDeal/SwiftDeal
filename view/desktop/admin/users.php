<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h2 id="nav-tabs">Users</h2>
            <div class="bs-example">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <li class="active"><a href="#alluser" data-toggle="tab">All User</a></li>
                    <li><a href="#admin" data-toggle="tab">Admins</a></li>
                    <li><a href="#retailers" data-toggle="tab">Retailers</a></li>
                    <li><a href="#customs" data-toggle="tab">Customs</a></li>
                    <li><a href="#individuals" data-toggle="tab">Individuals</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="alluser">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>User <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Login Number <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($users as $user) {
                                    echo '<tr>
                                            <td>'.$user->name.'</td>
                                            <td>'.$user->email.'</td>
                                            <td>'.$user->phone.'</td>
                                            <td>'.$user->city.'</td>
                                            <td>'.$user->login_number.'</td>
                                            <td>'.datetime_to_text($user->created).'</td>
                                            <td>
                                              <a href="task.php?action=delete_user&user_id='.$user->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                              <a data-toggle="modal" data-id="'.$user->email.'" id="modalMessage" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                                        <div class="tab-pane fade" id="admin">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>User <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Login Number <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($admins as $admin) {
                                    echo '<tr>
                                            <td>'.$admin->name.'</td>
                                            <td>'.$admin->email.'</td>
                                            <td>'.$admin->phone.'</td>
                                            <td>'.$admin->city.'</td>
                                            <td>'.$admin->login_number.'</td>
                                            <td>'.datetime_to_text($admin->created).'</td>
                                            <td>';
                      if($session->auth==2){echo '<a href="task.php?action=delete_user&user_id='.$admin->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;';}
                                        echo  '<a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="retailers">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>User <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Login Number <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($retailers as $retailer) {
                                    echo '<tr>
                                            <td>'.$retailer->name.'</td>
                                            <td>'.$retailer->email.'</td>
                                            <td>'.$retailer->phone.'</td>
                                            <td>'.$retailer->city.'</td>
                                            <td>'.$retailer->login_number.'</td>
                                            <td>'.datetime_to_text($retailer->created).'</td>
                                            <td>';
                      if($session->auth==2){echo '<a href="task.php?action=delete_user&user_id='.$retailer->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;';}
                                        echo  '<a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="customs">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>User <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Login Number <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($customs as $custom) {
                                    echo '<tr>
                                            <td>'.$custom->name.'</td>
                                            <td>'.$custom->email.'</td>
                                            <td>'.$custom->phone.'</td>
                                            <td>'.$custom->city.'</td>
                                            <td>'.$custom->login_number.'</td>
                                            <td>'.datetime_to_text($custom->created).'</td>
                                            <td>';
                      if($session->auth==2){echo '<a href="task.php?action=delete_user&user_id='.$custom->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;';}
                                        echo  '<a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="individuals">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>User <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Login Number <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($individuals as $individual) {
                                    echo '<tr>
                                            <td>'.$individual->name.'</td>
                                            <td>'.$individual->email.'</td>
                                            <td>'.$individual->phone.'</td>
                                            <td>'.$individual->city.'</td>
                                            <td>'.$individual->login_number.'</td>
                                            <td>'.datetime_to_text($individual->created).'</td>
                                            <td>';
                      if($session->auth==2){echo '<a href="task.php?action=delete_user&user_id='.$individual->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;';}
                                        echo  '<a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
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
<script type="text/javascript">
	$(document).on("click", "#modalMessage", function () {
		var email = $(this).data('id');
		$(".modal #email").val( email );
	});
</script>
<?php require_once $admin_dir_requires.'footer.php';?>