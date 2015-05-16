<?php $basename = substr(strtolower(basename($_SERVER['PHP_SELF'])),0,strlen(basename($_SERVER['PHP_SELF']))-4);?>
      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $site_url;?>">SwiftDeal.in</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li <?php if ($basename == 'index') echo 'class="active"'; ?>><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li <?php if ($basename == 'items') echo 'class="active"'; ?>><a href="items.php"><i class="fa fa-bar-chart-o"></i> Items</a></li>
            <li <?php if ($basename == 'users') echo 'class="active"'; ?>><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
            <li <?php if ($basename == 'logs') echo 'class="active"'; ?>><a href="logs.php"><i class="fa fa-table"></i> Logs</a></li>
            <li <?php if ($basename == 'reports_comments') echo 'class="active"'; ?>><a href="reports_comments.php"><i class="fa fa-edit"></i> Reports and Comments</a></li>
			<li <?php if ($basename == 'records') echo 'class="active"'; ?>><a href="records.php"><i class="fa fa-bullhorn"></i> Marketing Records</a></li>
            <li <?php if ($basename == 'file_manager') echo 'class="active"'; ?>><a href="file_manager.php"><i class="fa fa-desktop"></i> File Manager</a></li>
            <li <?php if ($basename == 'analytics') echo 'class="active"'; ?>><a href="analytics.php"><i class="fa fa-wrench"></i> Analytics</a></li>
            <li <?php if ($basename == 'newsletter') echo 'class="active"'; ?>><a href="newsletter.php"><i class="fa fa-file"></i> Newsletter</a></li>
            <li <?php if ($basename == 'faq') echo 'class="active"'; ?>><a href="faq.php"><i class="fa fa-folder"></i> FAQ</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown messages-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?php echo $message_count;?></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php echo $message_count;?> New Messages</li>
                <?php
                  foreach ($messages as $message) {
                    $sender = User::find_bu_id($message->from_user_id);
                    echo '<li class="message-preview">
                            <a href="#">
                              <span class="name">'.$sender->name.':</span>
                              <span class="message">'.$message->message.'</span>
                              <span class="time"><i class="fa fa-clock-o"></i> '.datetime_to_text($message->created).'</span>
                            </a>
                          </li>';
                  }
                ?>
                <li class="divider"></li>
                <li><a href="#">View Inbox <span class="badge"><?php echo count($messages);?></span></a></li>
                <li><a href="#" data-toggle="modal" data-target="#messageowner">Create Message</a></li>
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $session->name;?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="<?php echo $public_controller.'profile.php?query=viewproduct';?>"><i class="fa fa-list-ul fa-fw"></i> MyItems List</a></li>
                  <li><a href="<?php echo $public_controller.'additems/addstuffs.php';?>"><i class="fa fa-plus-square-o fa-fw"></i> Add Items</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo $public_controller.'index.php'?>"><i class="fa fa-home fa-fw"></i> Home Page</a></li>
                  <li><a href="<?php echo $public_controller.'faq.php';?>"><i class="fa fa-hand-o-right fa-fw"></i> Help</a></li>
                  <li><a href="https://swiftdeal.in/public/logout.php"><i class="fa fa-power-off fa-fw"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>