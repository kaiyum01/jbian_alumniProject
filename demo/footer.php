
	 <footer id="footer">
 
		<div class="container">
   <div class="row">
  <div class="footerbottom">

    <div class="col-sm-3 col-lg-3 col-xs-12 col-lg-push-6"">
      <div class="footerwidget">
        <h4>
          Education and job related weblinks 
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="http://10minuteschool.com/">
                10 Minutes School
              </a>
            </li>
            <li> <a href="https://www.khanacademy.org/">
                Khan Academy
              </a>
            </li>
            <li><a href="https://www.youtube.com/user/crashcourse">
                Crash Course
              </a>
            </li>
            <li>
              <a href="http://examresultbd.com/">
                Exam Informations
              </a>
            </li>
             <li>
              <a href="http://www.bdjobs.com/">
                Job 
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-lg-3 col-xs-12 col-lg-push-6""> 
              <div class="footerwidget"> 
                         <h4>Contact</h4> 
                        <p>Here is our contact information. You can contact with us to get information about Association</p>
            <div class="contact-info"> 

                <?php
                      $result=mysql_query("select address,email,mobile_1,mobile_2 from contact_create where is_deleted=0 and status_active=1 order by id DESC");
                      while($data = mysql_fetch_assoc($result))
                      {
                      ?>
                      <i class="fa fa-map-marker"></i> <?php echo $data['address']; ?><br>
                      <i class="fa fa-phone"></i> <?php echo $data['mobile_1'];?> <br>
                      <i class="fa fa-phone"></i> <?php echo $data['mobile_2']; ?> <br>
                      <i class="fa fa-envelope-o"></i> <?php echo $data['email']; ?>
                <?php   
                      }   
                ?>
              </div> 
                </div><!-- end widget --> 
    </div>
    <div class="col-sm-3 col-lg-3 col-xs-12 col-lg-pull-6">
      <div class="footerwidget">
        <h4>
          Developed by
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="http://abdulkaiyum.com/">
                <img class=" img-responsive" style="height: auto; width: 80px;" src="http://abdulkaiyum.com/publicProject/addResource/images/jbExProject/footer_developer.png">
              </a>
            </li>
           
            <li><a style="color: #007fc7" href="http://abdulkaiyum.com/" target="_blank" onClick="window.open('https://www.facebook.com/natural.mehedi')";>
                Mohammad Abdul Kaiyum 
              </a>
            </li>
            <li><a href="http://abdulkaiyum.com/">
               Software Engineer, JBian 2008
              </a>
            </li>        
          </ul>
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-lg-3 col-xs-12 col-lg-pull-6">
      <div class="footerwidget">
        <h4>
          Planning and Moderation by
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li>
                <img class=" img-responsive" style="height: auto; width: 80px;" src="assets/images/planer.png"> 
            </li>
            <li><a style="color: #007fc7" href="https://www.facebook.com/sakir.ul.islam.dmc" target="_blank">
                Dr. Sakirul Islam 
              </a>                   
            </li> 
            <li>
               MBBS (DMC), JBian 2008
            </li>          
          </ul>
        </div>
      </div>
    </div>



    
  </div>
</div>
			<div class="social text-center">
				<!--<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="https://www.facebook.com/groups/jbexstudentsassociation"><i class="fa fa-facebook"></i></a> -->
        
        <a href="https://www.facebook.com/groups/jbexstudentsassociation"><img style="height:auto; width: 40px;" src="assets/images/fb.png"></a> 
        <a href="#"><img style="height:auto; width: 40px;" src="assets/images/tw.png"></a>
				<!--<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>-->
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.php">HOME</a> | 
                <a href="student_list.php">BATCH PROFILE</a> |
								<a href="online_library.php">ONLINE LIBRARY</a> |
                <a href="image_gallery.php">GALLERY</a> |
                <a href="videos.php">VIDEOS</a> |
								<a href="notice.php">NOTICE</a> |
                <a href="useful_link.php">WEB LINKS</a> |
                <a href="magazine_view.php">BLOG READ</a> |
                <a href="magazine/magazine.php">BLOG WRITE</a> |
								<a href="about.php">ABOUT JB ESA</a> |
								<a href="contact.php">CONTACT</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; <?php echo date('Y'); ?> . Developed by <a href="http://abdulkaiyum.com/" rel="develop">abdulkaiyum.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>