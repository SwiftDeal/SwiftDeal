<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    	        <span class="icon-bar"></span>
        	    <span class="icon-bar"></span>
            	<span class="icon-bar"></span>
        	</button>
        	<a class="navbar-brand" href="index.php"><i class="fa fa-home fa-fw"></i></a>
        </div>
        <div class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
				<li><a href="search_results.php?keywords=book"><i class="fa fa-book fa-fw"></i>Books</a></li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-mobile fa-fw"></i>Mobiles <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="search_results.php?keywords=nokia mobile">Nokia</a></li>
					<li><a href="search_results.php?keywords=samsung mobile">Samsung</a></li>
					<li><a href="search_results.php?keywords=Home Audio and theater electronic">Blackberry</a></li>
					<li><a href="search_results.php?keywords=iphone">iPhone</a></li>
					<li><a href="search_results.php?keywords=galaxy tab">Galaxy Tab</a></li>
					<li><a href="search_results.php?keywords=touchpad">Touchpad</a></li>
					<li><a href="search_results.php?keywords=ipad iphone">iPad</a></li>
                  </ul>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-truck fa-fw"></i>Car <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="addstuffs.php?type=individual"><i class="fa fa-user fa-fw"></i>Suzuki</a></li>
					<li><a href="search_results.php?keywords=maruti suzuki car">Maruti Suzuki</a></li>
					<li><a href="search_results.php?keywords=santro car">Santro</a></li>
					<li><a href="search_results.php?keywords=honda city car">Honda City</a></li>
					<li><a href="search_results.php?keywords=maruti 800 car">Maruti 800</a></li>
					<li><a href="search_results.php?keywords=waganor car">Waganor</a></li>
					<li><a href="search_results.php?keywords=alto car">Alto</a></li>
					<li><a href="search_results.php?keywords=swift car">Swift</a></li>
                  </ul>
                </li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-dashboard fa-fw"></i>Bike <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="search_results.php?keywords=cbz bike">CBZ</a></li>
					<li><a href="search_results.php?keywords=pulsor bike">Pulsor</a></li>
					<li><a href="search_results.php?keywords=hero bike">Hero</a></li>
					<li><a href="search_results.php?keywords=honda bike">Honda</a></li>
					<li><a href="search_results.php?keywords=discover bike">Discover</a></li>
					<li><a href="search_results.php?keywords=splendor bike">Splendor</a></li>
					<li><a href="search_results.php?keywords=apache bike">Apache</a></li>
                  </ul>
                </li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building-o fa-fw"></i>Furniture <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="search_results.php?keywords=video">Doors</a></li>
					<li><a href="search_results.php?keywords=furniture">Bed</a></li>
                  </ul>
                </li>
            </ul>
        	<?php if($session->is_logged_in()){?>
            <ul class="nav navbar-nav pull-right">
            	<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> <?php echo $session->name;?> <b class="caret"></b></a>
                	<ul class="dropdown-menu">
                    	<li><a href="profile.php?query=viewproduct"><i class="fa fa-list-ul fa-fw"></i> MyItems List</a></li>
                        <li><a href="public/additem.php"><i class="fa fa-plus-square-o fa-fw"></i> Add Items</a></li>
    					<li class="divider"></li>
    					<?php if($session->auth):?><li><a href="http://admin.swiftdeal.in/"><i class="fa fa-male fa-fw"></i> Admin Panel</a></li><?php endif;?>
                    	<li><a href="public/faq.php"><i class="fa fa-hand-o-right fa-fw"></i> Help</a></li>
                    	<li><a href="public/logout.php"><i class="fa fa-power-off fa-fw"></i> Log Out</a></li>
                  	</ul>
                </li>
            </ul>
          	<?php } else{ ?>
		  	<div class="navbar-form navbar-right pull-right">
				<button class="btn btn-primary" data-toggle="modal" data-target="#login">MyProduct</button>
				<a href="public/addretailer.php" class="btn btn-success">Sell Here</a>
		  	</div>
          	<?php }?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>