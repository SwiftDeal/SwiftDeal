<div class="panel panel-success" id="itemPanel">
    <div class="panel-heading"><h3 class="panel-title">Details of Item</h3></div>
        <div class="panel-body form-horizontal">
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Item Name <i class="fa fa-book fa-fw"></i></label>
                <div class="col-lg-4">
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="eg. Samsung Galaxy S" required="" value="<?php echo $item->title;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputTitle" class="col-lg-2 control-label">Category <i class="fa fa-laptop fa-fw"></i></label>
                <div class="col-lg-4">
                    <select class="form-control" name="category">
                    	  <option value="book" <?php if($item->category=='book') echo 'selected';?> >Book</option>
                    	  <option value="mobile" <?php if($item->category=='mobile') echo 'selected';?> >Mobile</option>
                    	  <option value="calculator" <?php if($item->category=='calculator') echo 'selected';?> >Calculator</option>
                    	  <option value="art" <?php if($item->category=='art') echo 'selected';?> >Art Related</option>
                    	  <option value="camera electronics" <?php if($item->category=='camera electronics') echo 'selected';?> >Camera</option>
                    	  <option value="computer laptop" <?php if($item->category=='computer laptop') echo 'selected';?> >Computer laptop</option>
                    	  <option value="car" <?php if($item->category=='car') echo 'selected';?> >Car</option>
						  <option value="bike" <?php if($item->category=='bike') echo 'selected';?> >Bike</option>
                    	  <option value="home housing" <?php if($item->category=='home housing') echo 'selected';?> >Home and lifestyle</option>
                    	  <option value="others" <?php if($item->category=='others') echo 'selected';?> >Others</option>
                	  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-lg-2 control-label">Details <i class="fa fa-comment fa-fw"></i></label>
                <div class="col-lg-4">
            	  <textarea name="description" class="form-control" placeholder="In Good Condition"><?php echo $item->description;?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCost" class="col-lg-2 control-label">Cost <i class="fa fa-money fa-fw"></i></label>
                <div class="col-lg-4">
                <div class="input-group">
                  <span class="input-group-addon">&#x20B9;</span>
                  <input type="tel" name="cost" class="form-control" id="inputCost" placeholder="Cost" value="<?php echo $item->cost;?>">
                  <span class="input-group-addon">.00</span>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="inputCity" class="col-lg-2 control-label">City <i class="fa fa-location-arrow fa-fw"></i></label>
                <div class="col-lg-4">
                <input type="text" list="city" name="city" class="form-control" id="inputCity" placeholder="City" required="" value="<?php echo $item->city;?>">
            	   <?php require_once $dir_addstuffs.'city.php';?>
                </div>
              </div>
      </div>
</div>
