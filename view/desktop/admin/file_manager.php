<?php
  require_once $admin_dir_requires.'header.php';
  require_once $admin_dir_requires.'navbar.php';
?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <iframe src="<?php echo $dir_filemanager;?>" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="500px;"></iframe>
        </div>
    </div><!-- /.row -->

</div><!-- /#page-wrapper -->
<?php require_once $admin_dir_requires.'footer.php';?>