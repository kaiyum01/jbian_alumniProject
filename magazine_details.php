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
<title>JB-Ex | Blog Details</title>
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
      <meta property="og:title"         content="JB-Ex | Blog Details" />
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
                    <h1>Friday Blog Details</h1>
                    <p> Its your freedom to express thinkings with others which may change the world. Read and write your opinion in JBian Blog.</p>
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
                        $magazine_id = $_GET['magazine'];
                        $notices= mysql_query("select id,name,batch,email,phone,about_post,text_area ,approved_by,updated_by,update_date,insert_date  from magazine_post where is_deleted=0 and status_active=1 and is_approved=1 and id='$magazine_id' order by id DESC");
                         $i=0;
                             
                        while($data=mysql_fetch_assoc($notices))
                        {   
                            $i++;
                        ?>
                            <div class="panel panel-default">
                              <div class="panel-heading"> 
                                <h4 class="panel-title">
                                  <?php echo $data['about_post']; ?> <span style="color:green;"><?php echo '( '. date("d-m-Y", strtotime($data['insert_date'])).' )'; ?></span>
                                </h4>
                              </div>
                              
                                <?php echo $data['text_area']; ?>
                               
                                <p>
                                <a href="http://jbian.org/magazine_view.php" style="font-size:15px; color:blue;">More Friday Blog</a>
                                <h5>Writer: <?php echo $data['name']; ?></h5>
                                <h5>Batch: <?php echo $data['batch']; ?></h5>
                                <h5>Email: <?php echo $data['email']; ?></h5>
                                <h5>Approved By: <?php echo $return_lib_user_arr[$data['approved_by']]; ?></h5>
                                </p>                       
                                
                            </div>
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
