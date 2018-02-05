<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Gallery </title>
  <?php
  include('head.php');
  ?>

	<link rel="stylesheet" type="text/css" href="assets/css/isotope.css" media="screen" />
	<link rel="stylesheet" href="assets/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
	<!-- Fixed navbar -->
	<?php
	include('navbar.php');
	?>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Photo Gallery</h1>
                    <p>Time goes away but give us memory to recall the glorios past. Here the time with JBian is framed in photography.</p>
                </div>
    </header>


	<!-- container -->
	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<section id="portfolio" class="page-section section appear clearfix">
					<br />
					<br />
				<!--	<p>
						At lorem Ipsum available, but the majority have suffered alteration in some form by injected huffered altehe majority have suffered alteration in some form by injected huffered alteration in some form by injected humour.uffered alteration in some form by injected h
					<br />
						<br />
					</p>
					-->


					<div class="row">
						<nav id="filter" class="col-md-12 text-center">
							<ul>
								<li><a href="#" class="current btn-theme btn-small" data-filter="*">All</a></li>
								<?php		                       
		   						$key = key($image_category_arr);
								unset($image_category_arr[$key]);
		   						foreach ($image_category_arr as $key => $value)
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
			                        $sql_dtls= mysql_query("select image_title,image_path,image_category from image_gallery where is_deleted=0 and status_active=1  order by id DESC");
			                             $i=0;
			                             
			                        while($data=mysql_fetch_assoc($sql_dtls))
			                        {   
			                            $i++;
			                        ?>

									<article class="col-sm-4 isotopeItem <?php echo $data['image_category']; ?>">
										<div class="portfolio-item">
											<img class="img-responsive" src="dashboard/admin/controller/<?php echo $data['image_path']; ?>"/>
											<div class="portfolio-desc align-center">
												<div class="folio-info">
													<a href="dashboard/admin/controller/<?php echo $data['image_path']; ?>" class="fancybox">
														<h5><?php echo $data['image_title']; ?></h5>
														<i class="fa fa-link fa-2x"></i></a>
												</div>
											</div>
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
