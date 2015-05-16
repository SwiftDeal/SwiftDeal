<?php
  require_once $dir_requires.'header.php';
  require_once $dir_requires.'navbar.php';
  require_once $dir_modal.'modal_login.php';
?>
    <div class="container">

      <div class="row">

        <div class="col-lg-12">
          <h1 class="page-header">FAQ <small>Frequently Asked Questions</small></h1>
        </div>

      </div>

      <div class="row">

        <div class="col-lg-12">

          <div class="panel-group" id="accordion">
          <?php
            foreach ($faqs as $faq) {
              echo '<div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$faq->id.'">'.$faq->ques.'</a>
                      </h4>
                    </div>
                    <div id="collapse'.$faq->id.'" class="panel-collapse collapse">
                      <div class="panel-body">'.$faq->ans.'</div>
                    </div>
                  </div>';
            }
          ?>
          </div>

        </div>

      </div>

    </div><!-- /.container -->

<?php require_once $dir_requires.'footer.php';?>