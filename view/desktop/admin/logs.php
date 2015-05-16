<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h2 id="nav-tabs">Logs</h2>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#search" data-toggle="tab">Search</a></li>
                <?php if($session->auth==2){ echo '<li><a href="#admin" data-toggle="tab">Admin</a></li>';}?>
				<li><a href="#contact" data-toggle="tab">Contact</a></li>
                <li><a href="#error" data-toggle="tab">Error</a></li>
				<li><a href="#item" data-toggle="tab">Item</a></li>
				<li><a href="#mail" data-toggle="tab">Mail</a></li>
				<li><a href="#notfound" data-toggle="tab">Not Found</a></li>
                <li><a href="#photo" data-toggle="tab">Photo</a></li>
				<li><a href="#user" data-toggle="tab">User</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">

                <div class="tab-pane fade active in" id="search">
                  <p>
                    <?php
                        $logfile_public = $public_controller.'logs/search.txt';
                        if (file_exists($logfile_public)&&is_readable($logfile_public)&&$handle=fopen($logfile_public, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_public}";
                        }
                    ?>
                  </p>
                </div>
                <div class="tab-pane fade" id="admin">
                  <p>
                    <?php
                        $logfile_admin = 'logs/log.txt';
                        if (file_exists($logfile_admin)&&is_readable($logfile_admin)&&$handle=fopen($logfile_admin, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_admin}";
                        }
                    ?>
                  </p>
                </div>
				<div class="tab-pane fade" id="contact">
                  <p>
                    <?php
                        $logfile_contact = $public_controller.'logs/contact.txt';
                        if (file_exists($logfile_contact)&&is_readable($logfile_contact)&&$handle=fopen($logfile_contact, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_contact}";
                        }
                    ?>
                  </p>
                </div>
                <div class="tab-pane fade active in" id="error">
                  <p>
                    <?php
                        $logfile_error = $public_controller.'logs/error.txt';
                        if (file_exists($logfile_error)&&is_readable($logfile_error)&&$handle=fopen($logfile_error, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_error}";
                        }
                    ?>
                  </p>
                </div>
                <div class="tab-pane fade" id="item">
                  <p>
                    <?php
                        $logfile_item = $public_controller.'logs/item.txt';
                        if (file_exists($logfile_item)&&is_readable($logfile_item)&&$handle=fopen($logfile_item, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_item}";
                        }
                    ?>
                  </p>
                </div>
				<div class="tab-pane fade" id="mail">
                  <p>
                    <?php
                        $logfile_mail = $public_controller.'logs/mail.txt';
                        if (file_exists($logfile_mail)&&is_readable($logfile_mail)&&$handle=fopen($logfile_mail, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_mail}";
                        }
                    ?>
                  </p>
                </div>
				<div class="tab-pane fade" id="notfound">
                  <p>
                    <?php
                        $logfile_notfound = $public_controller.'logs/notfound.txt';
                        if (file_exists($logfile_notfound)&&is_readable($logfile_notfound)&&$handle=fopen($logfile_notfound, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_notfound}";
                        }
                    ?>
                  </p>
                </div>
				<div class="tab-pane fade" id="photo">
                  <p>
                    <?php
                        $logfile_photo = $public_controller.'logs/photo.txt';
                        if (file_exists($logfile_photo)&&is_readable($logfile_photo)&&$handle=fopen($logfile_photo, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_photo}";
                        }
                    ?>
                  </p>
                </div>
				<div class="tab-pane fade" id="user">
                  <p>
                    <?php
                        $logfile_user = $public_controller.'logs/user.txt';
                        if (file_exists($logfile_user)&&is_readable($logfile_user)&&$handle=fopen($logfile_user, 'r')) {
                            echo "<table class=\"table table-hover\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo "<tr><td>{$entry}</td></tr>";
                                }
                            }
                            echo "</table>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile_user}";
                        }
                    ?>
                  </p>
                </div>

              </div>
            </div>
          </div>
        </div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require_once $admin_dir_requires.'footer.php';?>