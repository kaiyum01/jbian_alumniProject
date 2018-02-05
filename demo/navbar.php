<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					<img style="height: auto; width: 80px;margin-top: -26px;" src="assets/images/jblogo.png" alt="abdulkaiyum.com"></a>
			</div>
			
			 <?php 
			$url= $_SERVER['REQUEST_URI'];
			$url_exp=explode("/",$url);
			$page_name =end($url_exp);
			$cls_active_index="";
			$cls_active_about="";
			$cls_active_notice="";
			$cls_active_img_glry="";
			$cls_active_video="";
			$cls_active_links="";
			$cls_active_contact="";
			//echo $page_name;
			if($page_name=="index.php")
			{
				$cls_active_index='class="active"';
			}
			else if($page_name=="about.php")
			{
				$cls_active_about='class="active"';
			}
			else if($page_name=="notice.php")
			{
				$cls_active_notice='class="active"';
			}
			else if($page_name=="image_gallery.php")
			{
				$cls_active_img_glry='class="active"';
			}
			else if($page_name=="videos.php")
			{
				$cls_active_video='class="active"';
			}
			else if($page_name=="useful_link.php")
			{
				$cls_active_links='class="active"';
			}
			else if($page_name=="contact.php")
			{
				$cls_active_contact='class="active"';
			}
			else
			{
				$cls_active_index='class="active"';
			}
			?>
			
			
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
                	<li <?php echo $cls_active_index; ?>><a href="index.php">Home</a></li>
                	<li <?php echo $cls_active_about; ?>><a href="about.php">About jb-esa</a></li>
                	<li <?php echo $cls_active_notice; ?>><a href="notice.php">notice</a></li>
                	<li <?php echo $cls_active_img_glry; ?>><a href="image_gallery.php">Gallery</a></li>
                	<li <?php echo $cls_active_video; ?>><a href="videos.php">Video</a></li>
                	<li <?php echo $cls_active_links; ?>><a href="useful_link.php">Links and Credits</a></li>
                	<li <?php echo $cls_active_contact; ?>><a href="contact.php">Contact</a></li>
                <!--	<li><a href="online_library.php">Online Library</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Magazine <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="magazine_view.php">View</a></li>
							<li><a href="magazine/magazine.php">Write</a></li>
							<!--<li><a href="sidebar-right.php">Right Sidebar</a></li>-->
						<!--</ul>
					</li>-->
                    
					
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>