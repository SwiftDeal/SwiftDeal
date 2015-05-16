<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">
    <div class="row">

        <div class="col-lg-12">
            <h2 id="nav-tabs">Tabs</h2>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#all" data-toggle="tab">All</a></li>
                <li><a href="#new" data-toggle="tab">New</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="all">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover table-striped tablesorter">
                          <thead>
                            <tr>
                              <th>Question <i class="fa fa-sort"></i></th>
                              <th>Answer <i class="fa fa-sort"></i></th>
                              <th>Created <i class="fa fa-sort"></i></th>
                              <th>Updted <i class="fa fa-sort"></i></th>
                              <th>Created By <i class="fa fa-sort"></i></th>
                              <th>Action <i class="fa fa-sort"></i></th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($faqs as $faq) {
                              $user = User::find_by_id($faq->user_id);
                              echo '<tr>
                                      <td>'.$faq->ques.'</td>
                                      <td>'.$faq->ans.'</td>
                                      <td>'.datetime_to_text($faq->created).'</td>
                                      <td>'.datetime_to_text($faq->updated).'</td>
                                      <td>'.$user->name.'</td>
                                      <td>
                                        <a href="edititem.php?item_id='.$faq->id.'" alt="Edit Item"><i class="fa fa-edit fa-fw"></i></a>&nbsp;
                                        <a href="task.php?action=delete_faq&faq_id='.$faq->id.'" alt="Delete Item"><i class="fa fa-trash-o fa-fw"></i></a>&nbsp;
                                        <a data-toggle="modal" data-target="#messageowner" alt="Send Message to Owner"><i class="fa fa-envelope fa-fw"></i></a>
                                      </td>
                                    </tr>';
                            }
                          ?>
                          </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="new">
                    <div class="panel-body form-horizontal">
                      <form role="form" method="post" action="faq.php" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="inputQues" class="col-lg-2 control-label">Question <i class="fa fa-book fa-fw"></i></label>
                          <div class="col-lg-8">
                            <input type="text" name="ques" class="form-control" id="inputQues" required="">
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Answer <i class="fa fa-comment fa-fw"></i></label>
                          <div class="col-lg-8">
                            <textarea name="ans" rows="10" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" name="faqsave" class="btn btn-success btn-lg" Value="Save">
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