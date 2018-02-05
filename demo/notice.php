<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Notice</title>
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
</head>
<body>
    <!-- Fixed navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>Notice Board</h1>
                    <p> Updates of jb family!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">   
               <div id="notice">
                 <h3>Notice List</h3>
                 <p>
					<div class="panel-group" id="accordion">
                    
                     <?php
                        $notices= mysql_query("select notice_title,notice_date,notice_desc  from notice_create where is_deleted=0 and status_active=1  order by id DESC");
                         $i=0;
                             
                        while($data=mysql_fetch_assoc($notices))
                        {   
                            $i++;
                        ?>
                            <div class="panel panel-default">
                              <div class="panel-heading"> 
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $data['notice_title']; ?> <span style="color:green;"><?php echo '( '. date("d-m-Y", strtotime($data['notice_date'])).' )'; ?></span></a>
                                </h4>
                              </div>
                              <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <pre>
                                    <?php echo $data['notice_desc']; ?>
                                  </pre>
                                </div>
                              </div>
                            </div>
                       <?php
                        }
                        ?>
      
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
