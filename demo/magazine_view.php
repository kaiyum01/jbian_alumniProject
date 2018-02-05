<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Blog Read</title>
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
  .btn a{
    color: white;
  }
  span a:hover{
    color: red;
  }
@media (max-width: 767px) {
  #head.secondary {
  height: 80px;
  min-height: 80px;
  background-size: initial;
}
/* Small devices (tablets, up to 768px) */
@media (max-width: 768px) {
/* Make the indicators larger for easier clicking with fingers/thumb on mobile */
    #head.secondary { 
height: 177px !important;
}
  </style>

</head>
<body>
    <!-- Fixed navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- /.navbar -->

 	<header id="head" class="secondary" style="height: 30%;">
            <div class="container" >
                    <h1>Blog Read</h1>
                    <p> Its your freedom to express thinkings with others which may change the world. Read and write your opinion in JBian Blog.</p>
                    <span style="margin-bottom: 100px;" ><a href="magazine/magazine.php"><button type="button" class="btn btn-default">Write Blog</button></a></span>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">   
               <div id="notice">
                 <h3>Blog</h3>
                 <p>
					<div class="panel-group" id="accordion">

                     <?php
                     //return library company
                    $return_lib_user=fnc_pickup_data_from_db_table("id,user_name","admin_user_create","is_deleted in(0,1)"); 
                    $return_lib_user_arr=array();
                    foreach($return_lib_user as $aa)
                      {
                        $return_lib_user_arr[$aa[0]] =$aa[1]; //$aa=['id'].
                      }
                      //echo $return_lib_user_arr[82];
                        $notices= mysql_query("select name,batch,email,phone,about_post,text_area,approved_by,updated_by,update_date,insert_date  from magazine_post where is_deleted=0 and status_active=1 and is_approved=1 order by id DESC");
                         $i=0;
                             
                        while($data=mysql_fetch_assoc($notices))
                        {   
                            $i++;
                        ?>
                            <div class="panel panel-default">
                              <div class="panel-heading"> 
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $data['about_post']; ?> <span style="color:green;"><?php echo '( '. date("d-m-Y", strtotime($data['insert_date'])).' )'; ?></span></a>
                                </h4>
                              </div>
                              <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                <?php echo $data['text_area']; ?>
                                
                                <p>
                                <h5>Writer: <?php echo $data['name']; ?></h5>
                                <h5>Batch: <?php echo $data['batch']; ?></h5>
                                <h5>Email: <?php echo $data['email']; ?></h5>
                                <h5>Approved By: <?php echo $return_lib_user_arr[$data['approved_by']]; ?></h5>
                                </p>                       
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
