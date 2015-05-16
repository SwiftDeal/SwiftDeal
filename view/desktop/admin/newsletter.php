<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
        	<div class="col-lg-12">
            <h2 id="nav-tabs">Tabs</h2>
	            <div class="bs-example">
	              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
	                <li class="active"><a href="#newsletter" data-toggle="tab">Newsletter</a></li>
	                <li><a href="#newsletterHistory" data-toggle="tab">Newsletter History</a></li>
	                <li><a href="#groups" data-toggle="tab">Groups</a></li>
	              </ul>
	              <div id="myTabContent" class="tab-content">
	                <div class="tab-pane fade active in" id="newsletter">
	                  	<form method="POST" action="sendmail.php" enctype="multipart/form-data">
							<input type="text" placeholder="Subject" class="form-control" name="subject" required="">
							<textarea class="textarea" placeholder="Enter text ..." name="body" style="width: 810px; height: 200px"></textarea>
							<b>Groups :</b><br>
							<?php
								$result = mysql_query("SELECT * FROM newsletter_group");
								while($row = mysql_fetch_array($result)){?>
								<input type="checkbox" name="group[]" value="<?php echo $row['id'];?>">&nbsp;<?php echo $row['name'];?><br>
							<?php }?><br>
							<input type="submit" class="btn btn-success" value="Send" name="sendmail">
						</form>
	                </div>
	                <div class="tab-pane fade" id="newsletterHistory">
	                	<div data-provide="markdown-editable">
					        <h3>This is some editable heading</h3>
					        <p>Well, actually all contents within this "markdown-editable" context is really editable. Just click anywhere!</p>
						</div>
	                </div>
	                <div class="tab-pane fade" id="groups">
	                  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin </p>
	                </div>
	              </div>
	            </div>
            </div>

        </div>
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require_once $admin_dir_requires.'footer.php';?>