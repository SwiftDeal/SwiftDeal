<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h2 id="nav-tabs">Reports</h2>
            <div class="bs-example">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <li class="active"><a href="#reports" data-toggle="tab">Reports</a></li>
                    <li><a href="#comments" data-toggle="tab">Comments</a></li>
					<li><a href="#messages" data-toggle="tab">Messages</a></li>
					<li><a href="#feedback" data-toggle="tab">Feedback</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="reports">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>Name <i class="fa fa-sort"></i></th>
                                    <th>E-mail <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
                                    <th>Report <i class="fa fa-sort"></i></th>
                                    <th>Item Name <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($reports as $report) {
                                    $item = Item::find_by_id('id', $report->item_id);
                                    echo '<tr>
                                            <td>'.$report->name.'</td>
                                            <td>'.$report->email.'</td>
                                            <td>'.$report->city.'</td>
                                            <td>'.$report->message.'</td>
                                            <td>'.$item->title.'</td>
                                            <td>'.datetime_to_text($report->created).'</td>
                                            <td>
                                                <a href="task.php?action=delete_report&report_id='.$report->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                                <a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="comments">
						<div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
									<th>Author<i class="fa fa-sort"></i></th>
                                    <th>Author Name<i class="fa fa-sort"></i></th>
									<th>Message <i class="fa fa-sort"></i></th>
                                    <th>Page Title <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($DQComments as $DQComment) {
                                    echo '<tr>
											<td><img src="'.$DQComment['authorAvatar'].'"></td>
                                            <td><a href="'.$DQComment['authorProfileURL'].'" target="_blank">'.$DQComment['authorName'].'</a></td>
                                            <td>'.$DQComment['message'].'</td>
                                            <td><a href="'.$DQComment['pageURL'].'">'.$DQComment['pageTitle'].'</a></td>
                                            <td>'.$DQComment['createdAt'].'</td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="tab-pane fade" id="messages">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
                                    <th>Item<i class="fa fa-sort"></i></th>
									<th>From Email <i class="fa fa-sort"></i></th>
                                    <th>To <i class="fa fa-sort"></i></th>
                                    <th>Message <i class="fa fa-sort"></i></th>
                                    <th>Phone <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($user_messages as $user_message) {
                                    $user = User::find_by_id($user_message->to_user_id);
									$item = Item::find_by_id('id', $user_message->item_id);
                                    echo '<tr>
                                            <td>'.$item->title.'</td>
                                            <td>'.$user_message->from_email.'</td>
                                            <td>'.$user->name.'</td>
                                            <td>'.$user_message->message.'</td>
                                            <td>'.$user_message->phone.'</td>
                                            <td>'.datetime_to_text($user_message->created).'</td>
                                            <td>
                                                <a href="task.php?action=delete_messages&message_id='.$user_message->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                                <a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                            </td>
                                          </tr>';
                                  }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<div class="tab-pane fade" id="feedback">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped tablesorter">
                                <thead>
                                  <tr>
									<th>From Email <i class="fa fa-sort"></i></th>
                                    <th>Message <i class="fa fa-sort"></i></th>
                                    <th>City <i class="fa fa-sort"></i></th>
									<th>Status <i class="fa fa-sort"></i></th>
                                    <th>Created <i class="fa fa-sort"></i></th>
                                    <th>Action <i class="fa fa-sort"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  foreach ($feedbacks as $feedback) {
									$feedback = Feedback::find_by_id($feedback->id);
                                    echo '<tr>
                                            <td>'.$feedback->email.'</td>
                                            <td>'.$feedback->message.'</td>
                                            <td>'.$feedback->city.'</td>
											<td>';
											if($feedback->validity == 1){ echo '<p style="font-color:red;">Not Solved</p>';}else{ echo '<p style="font-color:green;">Solved</p>';}
											echo '</td>
                                            <td>'.datetime_to_text($user_message->created).'</td>
                                            <td>
												<a href="task.php?action=feedback_solved&feedback_id='.$feedback->id.'" alt="Solved Feedback"><i class="fa fa-check fa-fw"></i></a>&nbsp;
                                                <a href="task.php?action=delete_feedback&feedback_id='.$feedback->id.'" alt="Delete Requested Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                                <a data-toggle="modal" data-target="#sendMessage" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
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