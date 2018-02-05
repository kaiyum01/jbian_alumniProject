<?php 
include('dashboard/include/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | About</title>
  <?php
  include('head.php');
  ?>
  <style type="text/css">
      pre {
        background-color: #fff;
        border: none;
        white-space:pre-wrap;
        font-family:'Lato', sans-serif;
        font-weight: normal;
        color: #6E6E6E;
        font-size: 16px;
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
                    <h1>About JB ESA</h1>
                    <p>Details about the platform of the association!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-8 maincontent">
                <h3>About ESA</h3>
                <p>
                    <pre>
                       <!-- <img src="assets/images/about.jpg" alt="" class="img-rounded pull-right" width="300"> -->
                       <?php
                            $about_jbex="";
                            $about_school="";
                            $speech1="";
                            $speech2="";
                            $result=mysql_query("select about_jbex,about_school,speech1,ourteam from about_create where is_deleted=0 and status_active=1 order by id DESC");
                            while($data = mysql_fetch_assoc($result))
                            {
                                $about_jbex= $data['about_jbex'];
                                $about_school=$data['about_school'];
                                $speech1=$data['speech1'];
                                $ourteam=$data['ourteam'];
                            }

                            echo $about_jbex;
                        ?>
                    </pre>
                </p>
                <h3>About JB High School</h3>
                <p>
                    <pre>
                        <?php
                         echo $about_school;
                        ?>
                    </pre>
                </p>
                <h3>Speech that Counts</h3>
                <p>
                    <pre>
                        <?php
                         echo $speech1;
                        ?>
                    </pre>
                </p>
                <h3>Our Team</h3>
                <p><pre>
                    <?php
                     echo $ourteam;
                    ?>
                        
                    </pre>
                </p>
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right" style="font-size: 16px;">

                <div class="panel">
                    <h4>Aims and Objectives:</h4>
                    <ul style="list-style-type: disc;" class="list-unstyled list-spaces">
                        <li>To creat scope of communication among all the members of JB family<br>
                            </li>
                        <li>To creat interaction among the former and present JBian for exchaning experience</a><br>
                            </li>
                        <li>To assist the members of JB family in their unfavourable conditions as far as possibble</a><br>
                            </li>
                        <li>To arrange reunion ceremony , picnic ,iftar party ,cultural programme etc. in suitable situation</a><br>
                           </li>
                        <li>To assist school autharity to upgrade the quality of education</a><br>
                           </li>
                        <li>To maintain the harmony of the JB community to contribute as a team for the society  as well as the nation</a><br>
                           </li>
                    </ul>
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </section>
    <!-- /container -->
  <!--  <section class="team-content">
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
                    //Team Member
                    <div class="team-member">
                        //Image Hover Block 
                        <div class="member-img">
                            //Image 
                            <img class="img-responsive" src="assets/images/photo-1.jpg" alt="">
                        </div>
                        //Member Details 
                        <h4>John Doe</h4>
                        // Designation 
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
                <div class="col-md-3 col-sm-6 col-xs-6">
                    //Team Member 
                    <div class="team-member pDark">
                        // Image Hover Block 
                        <div class="member-img">
                            //Image  
                            <img class="img-responsive" src="assets/images/photo-2.jpg" alt="">
                        </div>
                         // Member Details 
                        <h4>Larry Doe</h4>
                        // Designation 
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
                    // Team Member 
                    <div class="team-member pDark">
                        // Image Hover Block 
                        <div class="member-img">
                            // Image  
                            <img class="img-responsive" src="assets/images/photo-3.jpg" alt="">
                        </div>
                        // Member Details
                        <h4>Ranith Kays</h4>
                        // Designation 
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
                    //Team Member 
                    <div class="team-member pDark">
                        // Image Hover Block 
                        <div class="member-img">
                            // Image  
                            <img class="img-responsive" src="assets/images/photo-4.jpg" alt="">
                        </div>
                        // Member Details 
                        <h4>Joan Ray</h4>
                        // Designation 
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
    </section> -->
  <?php
    include('footer.php');
    ?>


    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
