<?php
  require_once $dir_requires.'header.php';
  require_once $dir_requires.'navbar.php';
  require_once $dir_modal.'modal_login.php';
?>

    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header"><?php echo $page_header;?> <small><?php echo $page_header_small;?></small></h1>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">
          <p class="error-404"><?php echo $page_main;?></p>
          <p class="lead"><?php echo $page_lead;?></p>
          <p>Here are some helpful links to help you find what you're looking for:</p>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>

      </div>

    </div><!-- /.container -->

<?php require_once $dir_requires.'footer.php';?>