<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Videos</title>
  <?php
  include('head.php');
  ?>

  <style>
 .responsive-video {
position: relative;
padding-bottom: 3.25%;
padding-top: 10px; overflow: hidden;
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

  </style>
</head>
<body>
	<!-- Fixed navbar -->
	<?php
	include('navbar.php');
	?>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Video Timeline</h1>
                    <p>The timeline of JB family of colorful memory!</p>
                </div>
    </header>


	<!-- container -->
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<section id="portfolio" class="page-section section appear clearfix">
					<br />
					<br />
					<!--<p>
						At lorem Ipsum available, but the majority have suffered alteration in some form by injected huffered altehe majority have suffered alteration in some form by injected huffered alteration in some form by injected humour.uffered alteration in some form by injected h
					<br />
						<br />
					</p>-->


					<div class="row">
						<nav id="filter" class="col-md-12 text-center">
							<ul>
								<li><a href="#" class="current btn-theme btn-small" data-filter="*">All</a></li>
		   						<?php		                       
		   						$key = key($video_category_arr);
								unset($video_category_arr[$key]);
		   						foreach ($video_category_arr as $key => $value)
		   						{ 

		                        ?>
								<li><a href="#" class="btn-theme btn-small" data-filter=".<?php echo $key; ?>"><?php echo $value; ?></a></li>

								<?php
								}
								?>

							</ul>
						</nav>
						<div class="col-md-12">
							<div class="row">

							<div class="portfolio-items isotopeWrapper clearfix" id="3">
					
			   						<?php
			                        $sql_dtls= mysql_query("select video_title,video_url,video_category from video_create where is_deleted=0 and status_active=1  order by id DESC");
			                             $i=0;
			                             
			                        while($data=mysql_fetch_assoc($sql_dtls))
			                        {   
			                            $i++;
			                        ?>

									<article class="col-sm-4 isotopeItem <?php echo $data['video_category']; ?>">
										<div class="portfolio-item">
										
											<div class="responsive-video">	
												<div class="embed-responsive embed-responsive-16by9">
												    <iframe class="embed-responsive-item" src="<?php echo $data['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
												</div> 
												<h><?php echo $data['video_title']; ?></h>
											</div>
											<!--
											<div class="portfolio-desc align-center">
												<div class="folio-info">
													<a href="assets/images/portfolio/img2.jpg" class="fancybox">
														<h5>Project Title</h5>
														<i class="fa fa-link fa-2x"></i></a>
												</div>
											</div>
											-->
										</div>
									</article>

									<?php
									}
									?>
							
								</div>

							</div>


						</div>
					</div>

				</section>
			</div>
		</div>

	</section>
	<!-- /container -->
 <?php
	include('footer.php');
	?>



	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.cslider.js"></script>
	<script src="assets/js/jquery.isotope.min.js"></script>
	<script src="assets/js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
