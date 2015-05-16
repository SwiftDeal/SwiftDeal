<?php
	require $dir_facebook_requires.'header.php';
	require $dir_facebook_requires.'navbar.php';
?>
<div class="content">
	<div class="page-header">
		<h1>Never Sold Online Before? <small>it's Easy</small></h1>
    </div>
    <div class="row">
    	<div class="span12">
		<fieldset>
			<div class="clearfix">
				<label for="title">Item Name:  </label>
				<div class="input">
					<input class="xlarge" id="title" name="title" type="text" placeholder="Name of your Item">
				</div>
			</div><br>
			<div class="clearfix">
				<label for="mediumSelect">Category:  </label>
				<div class="input">
					<select class="medium" name="mediumSelect" id="mediumSelect">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div><br>
			<div class="clearfix">
				<label for="description">Description:  </label>
				<div class="input">
					<textarea class="xlarge" id="description" name="description" rows="3" placeholder="Short Description"></textarea>
				</div>
			</div><br>
			<div class="clearfix">
				<label for="cost">Cost:  </label>
				<div class="input">
					<div class="input-prepend">
						<span class="add-on">&#x20B9;</span>
						<input class="medium" id="cost" name="cost" size="16" type="tel">
					</div>
				</div>
			</div><br>
			<div class="clearfix">
				<label for="fileInput">Photo:  </label>
				<div class="input">
				  <input class="input-file" id="fileInput" name="fileInput" type="file">
				</div>
			</div><br>
		</fieldset>
    	</div>
    </div>
</div>
<?php require $dir_facebook_requires.'footer.php';?>