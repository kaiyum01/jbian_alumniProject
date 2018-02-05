<?php 
include('dashboard/include/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Home</title>
  <?php
  include('head.php');
  ?>
   <script>
  // When the DOM is ready, run this function
$(document).ready(function() {
  //Set the carousel options
  $('#quote-carousel').carousel({
    pause: true,
    interval: 4000,
  });
});


  </script>
<style type="text/css">
 .responsive-video {
position: relative;
padding-bottom: 5.25%;
padding-top: 5px; overflow: hidden;
}


.responsive-video iframe,
.responsive-video object,
.responsive-video embed {
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
}

.heading-text
{
/*background: rgba(8, 111, 148, 0.5) ;*/
background: rgba(0, 0, 0, 0.3) ;

}

</style>

</head>
<body>
  <!-- Fixed navbar -->
  <?php
  include('navbar.php');
  ?>
  <!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
             <div class="heading-text">							
							<h1 class="animated flipInY delay1">JB Ex-Students Association</h1>
							<p >The platform of all JBian Ex-Students</p>
						</div>
            
					<div class="fluid_container">                       
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">                       
                        <div data-thumb="assets/images/slides/thumbs/img1.jpg" data-src="assets/images/slides/img1.jpg">
                            <h2>We develop.</h2>
                        </div> 
                        <div data-thumb="assets/images/slides/thumbs/img2.jpg" data-src="assets/images/slides/img2.jpg">
                        </div>
                        <div data-thumb="assets/images/slides/thumbs/img3.jpg" data-src="assets/images/slides/img3.jpg">
                        </div> 
                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
	<!-- /Header -->

  <div class="container">
    <div class="row">
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/1.png" alt="" />
							</div><!--icon box top -->
							<h4><a href="student_list.php">BATCH PROFILE</a></h4>
							<p>Its a pride to be a member of JB family.Here is the record book of the the JBians with short details.</p>
     						<!--<p><a href="student_list.php"><em>Click to see</em></a></p> -->
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/2.png" alt="" />
							</div><!--icon box top -->
							<h4><a href="image_gallery.php">GALLERY</a></h4>
							<p>Time goes away but give us memory to recall the glorios past. Here the time with JBian is framed in photography.</p>
     						<!--<p><a href="#"><em>Read More</em></a></p> -->
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/3.png" alt="" />
							</div><!--icon box top -->
							<h4><a href="online_library.php">ONLINE LIBRARY</a></h4>
							<p>JB ESA presents Dulal Jubaed Online Library to   the book lovers. Here you will have 5000+ books for reading and download.</p>
     						<!--<p><a href="#"><em>Read More</em></a></p>-->
						</div><!--grey box -->
					</div><!--/span3-->
					<div class="col-md-3">
						<div class="grey-box-icon">
							<div class="icon-box-top grey-box-icon-pos">
								<img src="assets/images/4.png" alt="" />
							</div><!--icon box top -->
							<h4><a href="magazine_view.php">FRIDAY BLOG</a></h4>
							<p>Its your freedom to express  thinkings with others which may change the world. Read and write your opinion in JBian Blog.</p>
     						<!--<p><a href="#"><em>Read More →</em></a></p>-->
						</div><!--grey box -->
					</div><!--/span3-->
				</div>
    </div>
      <section class="news-box top-margin">
        <div class="container">
            <h2><span>Video Timeline</span></h2>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                          <div class="responsive-video">  
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/i6HWO740HTk" frameborder="0" allowfullscreen></iframe>
                            </div> 
                            <p class="title"><h5>J B HIGH SCHOOL on PHOTOGRAPHY</h5></p>
                          </div>                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                          <div class="responsive-video">  
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_8YiAB_nqbA" frameborder="0" allowfullscreen></iframe>
                            </div> 
                            <p class="title"><h5>J. B .HIGH SCHOOL RE-UNION 2014 VISUAL ALBUM HD</h5></p>
                          </div>                           
                        </div>
                    </div>
                </div>  
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                          <div class="responsive-video">  
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/V7ldLlMxVnQ" frameborder="0" allowfullscreen></iframe>
                            </div> 
                            <p class="title"><h5>REUNION 2014 of JB High School</h5></p>
                          </div>                           
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </section>
   


 <?php
    $emergency_notices= mysql_query("select id,emgrNotice_photo_link  from emergency_notice_create where is_deleted=0 and status_active=1");
    $i=0;
       
    while($data=mysql_fetch_assoc($emergency_notices))
    {   
      $i++;

      echo '<div class="container"><img class="img-thumbnail" src="dashboard/admin/controller/'.$data['emgrNotice_photo_link'].'" alt="Emergency Notice Not Found !">
  </div>';

    }
  ?>

      <section class="container">
      <div class="row">
      	<div class="col-md-8"><div class="title-box clearfix "></div> 
        <p>
          
             <div class="container">
              <div class="row">
                <div class=' col-md-8 text-center'>
                <h2>Souls immortal of JB Family</h2>
                </div>
              </div>
              <div class='row'>
                <div class=' col-md-8'>
                  <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                      <li data-target="#quote-carousel" data-slide-to="1"></li>
                      <li data-target="#quote-carousel" data-slide-to="2"></li>
                       <li data-target="#quote-carousel" data-slide-to="3"></li>
                      <li data-target="#quote-carousel" data-slide-to="4"></li>
                       <li data-target="#quote-carousel" data-slide-to="5"></li>
                      <li data-target="#quote-carousel" data-slide-to="6"></li>
                      <li data-target="#quote-carousel" data-slide-to="7"></li>
                      
                    </ol>
                    
                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">
                    
                      <!-- Quote 1 -->
                      <div class="item active">
                          <p>
                          <h3 style="text-align:center;">Late Dulal Jubayed Sir</h3>
                          <h4 style="text-align:center;">July the 9<sup>th</sup> 2007</h4>
                          <h5 style="text-align:center;">Senior teacher of English, Poet, Cultural activist</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/jubayed.jpg" style="width: 100px;height:100px;">
                              <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                            </div>
                            <div class="col-sm-9">
                              <p>The philosopher of the time</p>
                              <!-- <small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                      <!-- Quote 2 -->
                      <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Babul Nath Sir</h3>
                          <h4 style="text-align:center;">February the 27<sup>th </sup> 2006</h4>
                          <h5 style="text-align:center;">Senior teacher of Bangla Literature, Sports organizer, Instrumental artist</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/babul.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                             <p>The man of classic literature</p>
                            <!--  <small>Someone famous</small> -->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                      <!-- Quote 3 -->
                      <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Saimina Akter Chompa Madam</h3>
                          <h4 style="text-align:center;">July the 1<sup>st</sup> 2011</h4>
                          <h5 style="text-align:center;">Senior teacher of Bangla and Accounting</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/chompa.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                             <p>The mother with the wings of sympathy</p> 
                              <!--<small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                       <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Modhusudon Chakroborty</h3>
                          <h4 style="text-align:center;">December the 12<sup>th</sup> 2010</h4>
                          <h5 style="text-align:center;">Ex-student of JB 2006 Batch, Ex-student Comilla Victoria College, Ex-student Shohid Ziaur Rahman Medical College</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/madhusudon.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                             <p>The polite boy with potentiality</p> 
                             <!-- <small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                      <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Farhan Sakib</h3>
                          <h4 style="text-align:center;">July the 6<sup>th</sup> 2015</h4>
                          <h5 style="text-align:center;">Ex student of Batch 2016</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/sakib.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                              <p>The innocent boy with true heart</p> 
                            <!-- <small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                       <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Ziaur Rahman Shahin</h3>
                          <h4 style="text-align:center;">February the 9<sup>th</sup> 2017</h4>
                          <h5 style="text-align:center;">Ex Student of JB 2014 Batch, Ex student of Nizampur College</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/ziaur.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                             <p>The brave boy with smiling face</p> 
                            <!--  <small>Someone famous</small> -->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                       
                       <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Ashraf Uddin</h3>
                          <h4 style="text-align:center;">July the 21<sup>st</sup> 2011</h4>
                          <h5 style="text-align:center;">Ex student of JB 2005 Batch, Ex student of Baroiyarhat College</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/ashraf.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                              <p>The true gentleman with smart mind</p> 
                            <!--  <small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                       <div class="item">
                            <p>
                          <h3 style="text-align:center;">Late Mohammad Zia Uddin</h3>
                          <h4 style="text-align:center;">August the 11<sup>th</sup> 2017</h4>
                          <h5 style="text-align:center;">Ex student of J B 2004 Batch, Ex student Chittagong Textile Engineering College</h5>
                          </p>
                        <blockquote>
                          <div class="row">
                            <div class="col-sm-3 text-center">
                              <img class="img-circle" src="assets/images/death_pic/zia.jpg" style="width: 100px;height:100px;">
                            </div>
                            <div class="col-sm-9">
                              <p>A man with the sign of Simplicity </p> 
                            <!--  <small>Someone famous</small>-->
                            </div>
                          </div>
                        </blockquote>
                      </div>
                    </div>
                    
                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                  </div>                          
                </div>
              </div>
            </div>
      


        </p>
        <a href="#" title="read more" class="btn-inline " target="_self"></a> </div>
              
          
          <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">Recent Notices</h2></div> 
            <div class="list styled custom-list">
            <ul>

              <?php
                  $notices= mysql_query("select id,notice_title,notice_desc  from notice_create where is_deleted=0 and status_active=1  order by id DESC limit 8");
                  $i=0;
                     
                  while($data=mysql_fetch_assoc($notices))
                  {   
                    $i++;
              

 
                  echo '<li><a title="'.$data['notice_desc'].'" href="notice_details.php?id='.$data['id'].'">'.$data['notice_title'].'</a></li>';
             
                  }
                  ?>
           
            </ul>
            </div>
         </div>
      </div>
      </section>
      
    	 
    <?php
  include('footer.php');
  ?>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
                transPeriod: 500,
                time: 3000,
				height: '600',
				loader: 'false',
				pagination: true,
				thumbnails: false,
				hover: false,
                playPause: false,
                navigation: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
      
	</script>
    
</body>
</html>
