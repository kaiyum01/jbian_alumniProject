<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');
$getCurrentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Notice Details</title>
  <?php
  include('head.php');
  ?>
  <style>
  .panel-heading a{
  text-decoration:none;
  }
  .panel-heading a:hover{
     color:red;
  }
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
     <meta property="og:url"           content="<?php echo $getCurrentURL; ?>" />
      <meta property="og:type"          content="website" />
      <meta property="og:title"         content="JB-Ex | Notice Details" />
      <meta property="og:description"   content="Official website of J B Ex-Students Association developed by www.abdulkaiyum.com. Jorargonj bouddha High School, a famous school in Mirsarai,  Chittagong. JB ESA is it's Ex Students platform" />
      <meta property="og:image"         content="http://jbian.org/assets/images/jblogo.png" />
</head>
<body>
    <!-- Fixed navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>Notice Details</h1>
                    <p> Updates of jb family!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">   
               <div id="notice">
                <!-- <h3>Notice Details</h3> -->
                 <p>

                    <div class="col-md-10 col-sm-10">

                        <?php
                        $notice_id = $_GET['id'];
                        $notices= mysql_query("select notice_title,notice_date,notice_desc  from notice_create where is_deleted=0 and status_active=1 and id='$notice_id'  order by id DESC");

                         $i=0;
                             
                        while($data=mysql_fetch_assoc($notices))
                        {   
                            $i++;

                       ?>

                      <h3><?php echo $data['notice_title']; ?></h3>
                      <h5><?php echo date("d-m-Y", strtotime($data['notice_date'])); ?></h5>
                      <p>
                        <pre>
                          <?php echo $data['notice_desc']; ?>
                        </pre>
                      </p>

                      <?php 
                      }
                      ?>
                    </div>
                    <div class="col-md-2 col-sm-2">
                      <p>
                            
                            
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            
                           <?php  $getCurrentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                           
                           //$getCurrentURL = (isset($_SERVER['HTTPS']) ? "https" : "http") . ":";
                           
                           ?>
                         
                            <!-- Your share button code -->
                          <div class="fb-share-button" 
                            data-href="<?php echo $getCurrentURL; ?>" 
                            data-layout="button_count">
                          </div>
                            
                           
                      </p>
                    </div>


                 </p>
               </div>
            </section>
           <!-- <section style="width: 100%;">
              <div id="book_read">
              </div>
            </section>-->
            <!-- /main -->
        </div>
    </section>
    <!-- /container -->
    
  <?php
    include('footer.php');
    ?>
    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
