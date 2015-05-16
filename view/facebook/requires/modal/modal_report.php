<div id="report" class="modal hide fade">
	<form class="form-horizontal" role="form" action="formaction.php?item_id=<?php echo $_GET['item_id'];?>" method="post">
	<div class="modal-header">
		<a href="#" class="close">&times;</a>
		<h3>Report</h3>
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
				<textarea class="xlarge" id="message" name="message" rows="3" required="" placeholder="Why this is Bothering me"></textarea>
            </div>
        </div>
		</fieldset>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn primary" name="item_report" value="Send">
	</div>
	</form>
</div>