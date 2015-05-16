<!-- Message to Owner -->
<div class="modal fade" id="messageowner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Message to Owner</h4>
            </div>
            <form class="form-horizontal" role="form" action="formaction.php?item_id=<?php echo $item->id;?>&to_user_id=<?php echo $item->user_id;?>" method="post">
            <div class="modal-body">
              	<div class="form-group">
                		<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                		<div class="col-sm-10">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    		  <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Your Email Address">
                  		</div>
                    </div>
              	</div>
                <div class="form-group">
                  <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-mobile fa-fw"></i></span>
                      <input type="tel" name="phone" class="form-control" id="inputPhone" placeholder="Your Phone Number" required="">
                    </div>
                  </div>
                </div>
              	<div class="form-group">
                		<label for="inputMessage3" class="col-sm-2 control-label">Message</label>
                		<div class="col-sm-10">
                			  <textarea class="form-control" rows="3" placeholder="Your Message" name="message" required=""></textarea>
                		</div>
              	</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" name="message_owner" class="btn btn-primary" value="Send" >
            </div>
            </form>
      </div>
    </div>
  </div>
<!-- End Message to Owner -->
