<?php 
include('dashboard/include/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Magazine</title>
  <?php
  include('head.php');
  ?>
</head>
<body>
    <!-- Fixed navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>Magazine</h1>
                    <p>You can write your own stories!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">
                <h3>About ESA</h3>
                <p>
                    <img src="assets/images/about.jpg" alt="" class="img-rounded pull-right" width="300">
                   <?php
                        $about_jbex="";
                        $about_school="";
                        $speech1="";
                        $speech2="";
                        $result=mysql_query("select about_jbex,about_school,speech1,speech2 from about_create where is_deleted=0 and status_active=1 order by id DESC");
                        while($data = mysql_fetch_assoc($result))
                        {
                            $about_jbex= $data['about_jbex'];
                            $about_school=$data['about_school'];
                            $speech1=$data['speech1'];
                            $speech2=$data['speech2'];
                        }
                        echo $about_jbex;
                    ?>

                </p>
                <h3>About School</h3>
                <p>
                    <?php
                     echo $about_school;
                    ?>
                </p>
                <h3>Speech</h3>
                <p>
                    <?php
                     echo $speech1;
                    ?>
                </p>
                <h3>Speech</h3>
                <p>
                    <?php
                     echo $speech2;
                    ?>
                </p>
            </section>
            <!-- /main -->

          

        </div>
    </section>
    <!-- /container -->
    <section class="team-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Our Team</h3>
                    <p>Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.Voluptate minus illo tenetur sint ab in culpa cumque impedit quibusdam. Saepe, molestias quia.</p>
                    <br />
                </div>
            </div>
            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src="assets/images/photo-1.jpg" alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>John Doe</h4>
                        <!-- Designation -->
                        <span class="pos">CEO</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src="assets/images/photo-2.jpg" alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Larry Doe</h4>
                        <!-- Designation -->
                        <span class="pos">Director</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src="assets/images/photo-3.jpg" alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Ranith Kays</h4>
                        <!-- Designation -->
                        <span class="pos">Manager</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Team Member -->
                    <div class="team-member pDark">
                        <!-- Image Hover Block -->
                        <div class="member-img">
                            <!-- Image  -->
                            <img class="img-responsive" src="assets/images/photo-4.jpg" alt="">
                        </div>
                        <!-- Member Details -->
                        <h4>Joan Ray</h4>
                        <!-- Designation -->
                        <span class="pos">Creative</span>
                        <div class="team-socials">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                        </div>
                    </div>
                </div>
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
