<div class="panel panel-primary" id="sellerPanel">
    <div class="panel-heading"><h3 class="panel-title">Seller Details</h3></div>
    <div class="panel-body form-horizontal">
      <div class="form-group">
        <label for="inputName" class="col-lg-2 control-label">Name <i class="fa fa-user fa-fw"></i></label>
        <div class="col-lg-4">
          <input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name" required="">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputPhone" class="col-lg-2 control-label">Contact No. <i class="fa fa-mobile fa-fw"></i></label>
        <div class="col-lg-3">
          <input type="tel" name="phone" size="18" maxlength="11"  class="form-control" id="inputPhone" placeholder="0XXXXXXXXXX" required="">
    	  <p class="help-block">People may Contact you if they want to buy.</p>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email <i class="fa fa-envelope fa-fw"></i></label>
        <div class="col-lg-4">
          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="E-Mail">
    	  <p class="help-block">Your E-mail Id will not be Shared.</p>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword1" class="col-lg-2 control-label">Password <i class="fa fa-key fa-fw"></i></label>
        <div class="col-lg-4">
          <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" required="">
    	  <p class="help-block">You Can Check Status of Your Product later with this Account.</p>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputCName" class="col-lg-2 control-label">Company Name <i class="fa fa-user fa-fw"></i></label>
        <div class="col-lg-4">
          <input type="text" name="name" class="form-control" id="inputName" placeholder="Company/Brand Full Name" required="">
        </div>
      </div>
	  <div class="form-group">
        <label for="inputUserCategory" class="col-lg-2 control-label">Category <i class="fa fa-user fa-fw"></i></label>
        <div class="col-lg-4">
			<select  name="user_category" title="Primary Category" class="form-control">
				<option value="">Select</option>
				<option value="Appliances">Appliances</option>
				<option value="Automotive">Automotive</option>
				<option value="Baby Care">Baby Care</option>
				<option value="Bags Luggage">Bags Luggage</option>
				<option value="Beauty Personal Care">Beauty Personal Care</option>
				<option value="Books">Books</option>
				<option value="Boys Clothing">Boys Clothing</option>
				<option value="Cameras Accessories">Cameras Accessories</option>
				<option value="Computers Peripherals">Computers Peripherals</option>
				<option value="Eyewear">Eyewear</option>
				<option value="Fashion Accessories">Fashion Accessories</option>
				<option value="Fashion Jewellery">Fashion Jewellery</option>
				<option value="Fragrances">Fragrances</option>
				<option value="Furniture">Furniture</option>
				<option value="Gaming">Gaming</option>
				<option value="Gifting Events">Gifting Events</option>
				<option value="Girls Clothing">Girls Clothing</option>
				<option value="Health Nutrition">Health Nutrition</option>
				<option value="Home Kitchen">Home Kitchen</option>
				<option value="Home Decoratives">Home Decoratives</option>
				<option value="Home Furnishing">Home Furnishing</option>
				<option value="Infant Wear">Infant Wear</option>
				<option value="Kids Decor">Kids Decor</option>
				<option value="Kids Footwear">Kids Footwear</option>
				<option value="Kitchen Bathroom Fittings">Kitchen Bathroom Fittings</option>
				<option value="Mens Apparel">Mens Apparel</option>
				<option value="Mens Footwear">Mens Footwear</option>
				<option value="Mobiles Tablets">Mobiles Tablets</option>
				<option value="Movies Music">Movies Music</option>
				<option value="Musical Instruments">Musical Instruments</option>
				<option value="Precious Jewellery">Precious Jewellery</option>
				<option value="Sports Fitness">Sports Fitness</option>
				<option value="Stationery Office Supplies">Stationery Office Supplies</option>
				<option value="Toys Games">Toys Games</option>
				<option value="TVs, Audio Video">TVs, Audio Video</option>
				<option value="Unstiched Apparel">Unstiched Apparel</option>
				<option value="Watches">Watches</option>
				<option value="Womens Apparel">Womens Apparel</option>
				<option value="Womens Ethnic Wear">Womens Ethnic Wear</option>
				<option value="Womens Footwear">Womens Footwear</option>
			</select> 
        </div>
      </div>
	  <div class="form-group">
        <label for="inputUserTrade" class="col-lg-2 control-label">Select Trade <i class="fa fa-user fa-fw"></i></label>
        <div class="col-lg-4">
			<select  name="user_trade" title="Primary Trade" class="form-control">
				<option value="Manufacturer">Manufacturer</option>
				<option value="Importer">Importer</option>
				<option value="Trader">Trader</option>
				<option value="Distributor">Distributor</option>
				<option value="Shopkeeper">Shopkeeper</option>
				<option value="Others">Others</option>
			</select>
        </div>
      </div>
	  <div class="form-group">
        <label for="inputOCity" class="col-lg-2 control-label">Operating City <i class="fa fa-user fa-fw"></i></label>
        <div class="col-lg-4">
          <input type="text" name="operating_city" class="form-control" id="inputOCity" placeholder="Operating City" required="">
        </div>
      </div>
	  <div class="form-group">
        <label class="col-lg-2 control-label">Address <i class="fa fa-comment fa-fw"></i></label>
        <div class="col-lg-4">
			<textarea name="address" class="form-control" placeholder="Your Address"></textarea>
        </div>
      </div>
	  <div class="form-group">
		<label class="col-lg-2 control-label">Tick The Option which are Appicable</label>
		<div class="col-lg-4"><input type="checkbox" value="yes" name="provide_service">&nbsp;Can Provide Service For the Items I Deliver</div>
		<div class="col-lg-4"><input type="checkbox" value="yes" name="delivery">&nbsp;Can Deliver Products Outside Your State Through Post</div>
		<div class="col-lg-4"><input type="checkbox" value="yes" name="job_vacancy">&nbsp;I have Job Vacancy.</div>
		<div class="col-lg-4"><input type="checkbox" value="yes" name="item_request">&nbsp;I can Provide items on Request.</div>
      </div>

      <div class="checkbox form-group">
    	<div class="col-lg-4">
    	<i class="fa fa-thumbs-o-up fa-fw"></i>I accept the <a href="termsofservice.php">License Terms</a> and <a href="policy.php">Policy</a>.
    	</div>
      </div><br>
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <input type="submit" name="submit" data-loading-text="Loading..." style="max-width: 200px;" class="btn btn-success btn-lg btn-block" Value="Submit">
        </div>
      </div>
    </div>
</div>