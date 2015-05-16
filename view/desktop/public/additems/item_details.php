<div class="panel panel-success" id="itemPanel">
    <div class="panel-heading"><h3 class="panel-title">Details of Item</h3></div>
        <div class="panel-body form-horizontal">
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Item Name <i class="fa fa-book fa-fw"></i></label>
                <div class="col-lg-4">
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="eg. Samsung Galaxy S" required="">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Category <i class="fa fa-laptop fa-fw"></i></label>
                <div class="col-lg-4">
                    <select class="form-control" name="category">
                    	  <option value="book" >Book</option>
                    	  <option value="mobile">Mobile</option>
						  <option value="car">Car</option>
                    	  <option value="calculator">Calculator</option>
                    	  <option value="art">Art Related</option>
                    	  <option value="camera electronics">Camera</option>
                    	  <option value="computer laptop">Computer Laptop</option>
                    	  <option value="bike motorcycle">Bike</option>
                    	  <option value="home housing">Home and lifestyle</option>
                    	  <option value="others">Others</option>
                	  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Details <i class="fa fa-comment fa-fw"></i></label>
                <div class="col-lg-4">
            	  <textarea name="description" class="form-control" placeholder="In Good Condition"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCost" class="col-lg-2 control-label">Cost <i class="fa fa-money fa-fw"></i></label>
                <div class="col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon">&#x20B9;</span>
                  <input type="tel" name="cost" class="form-control" id="inputCost" placeholder="Cost">
                  <span class="input-group-addon">.00</span>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCity" class="col-lg-2 control-label">City <i class="fa fa-location-arrow fa-fw"></i></label>
                <div class="col-lg-4">
                <input type="text" list="city" name="place" class="form-control" id="inputCity" placeholder="City" required="" value="<?php echo $dealcity;?>">
            	   <?php require_once $dir_addstuffs.'city.php';?>
                </div>
              </div>
      </div>
</div>
