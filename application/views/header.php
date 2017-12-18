<script src="<?= base_url(); ?>js/jquery-1.11.1.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
            <script>
			//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");
	});
     </script> 
	 <div class="se-pre-con"><img src="images/preloader.gif" alt=""></div>
	 <div class="se-pre-sen"><img src="images/sending.gif" alt=""></div>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

		<div class="container-fluid">

			<div class="navbar-header">

				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">

					<span class="sr-only">Toggle navigation</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

				</button>

				

				<ul class="user-menu">

					<li class="dropdown pull-right">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle" aria-hidden="true"></i> <?=$_SESSION['admin']['Email'];?><span class="caret"></span></a>

						<ul class="dropdown-menu" role="menu">

							<li><a href="<?=base_url();?>profile"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
							<li><a href="<?=base_url();?>logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>

						</ul>

					</li>

				</ul>

			</div>

							

		</div><!-- /.container-fluid -->

	</nav>

		

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">		
		<ul class="nav menu">      
			<li class="<?php echo (($this->router->method=='user_detail')?'active':'');?>"><a href="<?=base_url();?>user_detail"><i class="fa fa-address-book-o" aria-hidden="true"></i> User Detail</a></li>
			
			<li class="<?php echo (($this->router->method=='device_detail')?'active':'');?>"><a href="<?=base_url();?>device_detail"><i class="fa fa-mobile fa-3" aria-hidden="true"></i> Device Detail</a></li>
		</ul>



	</div><!--/.sidebar-->