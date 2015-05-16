<!-- Report -->
<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Report</h4>
      </div>
      <div class="modal-body">
    <form class="form-horizontal" role="form" action="formaction.php?item_id=<?php echo $_GET['item_id'];?>" method="post">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
  			  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Your Email">
        </div>
			</div>
		  </div>
      <div class="form-group">
      <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
      <div class="col-sm-10">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
          <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="Your Phone (Optional)">
        </div>
      </div>
      </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">Message</label>
			<div class="col-sm-10">
			  <textarea class="form-control" rows="3" placeholder="This is bothering me because..." name="message" required=""></textarea>
			</div>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" name="item_report" class="btn btn-primary" value="Send" >
      </div>
	  </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Report -->