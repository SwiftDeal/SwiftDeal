<div id="send-message" class="modal hide fade">
	<form class="form-horizontal" role="form" action="formaction.php?item_id=<?php echo $item->id;?>&to_user_id=<?php echo $item->user_id;?>" method="post">
	<div class="modal-header">
		<a href="#" class="close">&times;</a>
		<h3>Send Message to Owner</h3>
	</div>
	<div class="modal-body">
		<fieldset>
		<div class="clearfix">
            <label for="phone">Phone:  </label>
            <div class="input">
              <input class="xlarge" id="phone" name="phone" type="tel" required="" placeholder="Your Phone Number">
            </div>
        </div><br>
		<div class="clearfix">
            <label for="email">E-mail:  </label>
            <div class="input">
              <input class="xlarge" id="email" name="email" type="email" placeholder="Your E-mail Address">
            </div>
        </div><br>
		<div class="clearfix">
            <label for="message">Message:  </label>
            <div class="input">
				<textarea class="xlarge" id="message" name="message" rows="3" required="" placeholder="Message in breif"></textarea>
            </div>
        </div>
		</fieldset>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn primary" name="message_owner" value="Send">
	</div>
	</form>
</div>