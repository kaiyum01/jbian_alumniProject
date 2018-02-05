<?php 
include('dashboard/include/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | price</title>
  <?php
  include('head.php');
  ?>
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php">
					<img src="assets/images/logo.png" alt="Techro HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
					<li><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
						<li><a href="courses.php">Courses</a></li>
					<li class="active"><a href="price.php">Price</a></li>
					<li><a href="videos.php">Videos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-right.php">Right Sidebar</a></li>
							<li><a href="#">Dummy Link1</a></li>
							<li><a href="#">Dummy Link2</a></li>
							<li><a href="#">Dummy Link3</a></li>
						</ul>
					</li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Our Price</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing eliras scele!</p>
                </div>
    </header>


	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- Article content -->
			<section class="col-sm-12 maincontent">
				<h3>Cost</h3>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				</p>

			</section>
		</div>
	</div>
	<!-- /container -->

	<section class="container">
		<div class="heading">
			<!-- Heading -->
			<h3>Range</h3>
			<p>At lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
			<br />
		</div>
		<div class="row flat">
			<div class="col-lg-3 col-md-3 col-xs-6">
				<ul class="plan plan1">
					<li class="plan-name">Basic
					</li>
					<li class="plan-price">
						<strong>$29</strong> Fee
					</li>
					<li>
						<strong>08</strong> Responsive
					</li>
					<li>
						<strong>12</strong> HTML5/CSS
					</li>
					<li>
						<strong>15</strong> Flex
					</li>
					<li>
						<strong>10</strong> Mobile App
					</li>
					<li>
						<strong>Live</strong> Demo
					</li>
					<li class="plan-action">
						<a href="#" class="btn">Signup</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-xs-6">
				<ul class="plan plan2 featured">
					<li class="plan-name">Standard
					</li>
					<li class="plan-price">
						<strong>$59</strong> Fee
					</li>
					<li>
						<strong>08</strong> Responsive
					</li>
					<li>
						<strong>12</strong> HTML5/CSS
					</li>
					<li>
						<strong>15</strong> Flex
					</li>
					<li>
						<strong>10</strong> Mobile App
					</li>
					<li>
						<strong>Live</strong> Demo
					</li>
					<li class="plan-action">
						<a href="#" class="btn">Signup</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-xs-6">
				<ul class="plan plan3">
					<li class="plan-name">Advanced
					</li>
					<li class="plan-price">
						<strong>$79</strong> Fee
					</li>
					<li>
						<strong>08</strong> Responsive
					</li>
					<li>
						<strong>12</strong> HTML5/CSS
					</li>
					<li>
						<strong>15</strong> Flex
					</li>
					<li>
						<strong>10</strong> Mobile App
					</li>
					<li>
						<strong>Live</strong> Demo
					</li>
					<li class="plan-action">
						<a href="#" class="btn">Signup</a>
					</li>
				</ul>
			</div>

			<div class="col-lg-3 col-md-3 col-xs-6">
				<ul class="plan plan4">
					<li class="plan-name">Mighty
					</li>
					<li class="plan-price">
						<strong>$109</strong> Fee
					</li>
					<li>
						<strong>08</strong> Responsive
					</li>
					<li>
						<strong>12</strong> HTML5/CSS
					</li>
					<li>
						<strong>15</strong> Flex
					</li>
					<li>
						<strong>10</strong> Mobile App
					</li>
					<li>
						<strong>Live</strong> Demo
					</li>
					<li class="plan-action">
						<a href="#" class="btn">Signup</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
 <?php
	include('footer.php');
	?>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
