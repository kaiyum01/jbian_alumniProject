<?php
// session page included here
session_start();
include('../include/db_connection.php');
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select * from admin_user_create where user_name='$user_check'");
$row = mysql_fetch_assoc($ses_sql);
$login_session_user_id 		=$row['id'];
$login_session_username 	=$row['user_name'];
$login_session_useremail 	=$row['user_email'];
$login_session_usertype 	=$row['user_type'];
if(!isset($login_session_user_id)){
mysql_close($connection); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
//array_function.php
include('../include/array_function.php');
include('../include/message_function.php');
include('../include/kaiyum_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<!-- 
  Theme Author: Mohammad Abdul Kaiyum
  Copyright: 	www.abdulkaiyum.com  
	-->
  <title>jbEX | About JB-Ex Create</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shortcut icon" type="image/png" href="images/k-logo-white.png"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/login_form.css">
  <link rel="stylesheet" href="../css/oh16_custome.css">
  <link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="../js/jquery.js"></script>
 <!-- <script type="../js/jquery.min.js"></script>-->
  <script type="../js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
// approve data by submit button function
function approve_post(id,approved){
	var id=id;
	var approved=approved;
	if(approved==1)
	{
		alert('Post already Approved');
		return;
	}
	else
  	{
  	  	var dataString = '&id='+ id;
	    $.ajax({
	      type: "POST",
	      url: "controller/magazine_controller.php",
	      data: dataString+'&action=approve_post',
	      cache: false,
	      success: function(result)
	      	{ 
		        //alert(result);
		        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result);
		        //approve_post();
		         window.location.reload();
		      /*  var $container = $("#myPage");
        		//$container.load("magazine.php"); 
        		var timesRun = 0;
        		var refreshId = setInterval(function()
		        {
		        	timesRun += 1;
		        	if(timesRun === 1){ 
		        		$container.load('magazine.php');
		        		clearInterval(interval);
		        	}
		           
		        }, 6000); */
      		}
    	});
  }
  return false;
}
// unapprove data by submit button function
function unapprove_post(id,unapproved){
	var id=id;
	var unapproved=unapproved;
	if(unapproved==0)
	{
		alert('Post already Unapproved');
		return;
	}
	else
  	{
  	  	var dataString = '&id='+ id;
	    $.ajax({
	      type: "POST",
	      url: "controller/magazine_controller.php",
	      data: dataString+'&action=unapprove_post',
	      cache: false,
	      success: function(result)
	      	{ 
		        //alert(result);
		        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result);
		        //approve_post();
		         window.location.reload();
		       /* var $container = $("#myPage");
        		//$container.load("magazine.php"); 
        		var timesRun = 0;
        		var refreshId = setInterval(function()
		        {
		        	timesRun += 1;
		        	if(timesRun === 1){ 
		        		$container.load('magazine.php');
		        		clearInterval(interval);
		        	}
		           
		        }, 6000); */

      		}
    	});
  }
  return false;
}
 // delete data by submit button function
function delete_post(id){
	var id=id;
	var con_msg=confirm('Are you sure to delete post !');
	if(con_msg)
  	{
	  var dataString = '&id='+ id;
    $.ajax({
      type: "POST",
      url: "controller/magazine_controller.php",
      data: dataString+'&action=delete_post',
      cache: false,
      success: function(result)
      	{ 
	        //alert(result);
	        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result);
	        //approve_post();
	         window.location.reload();
	      /*  var $container = $("#myPage");
    		//$container.load("magazine.php"); 
    		var timesRun = 0;
    		var refreshId = setInterval(function()
	        {
	        	timesRun += 1;
	        	if(timesRun === 1){ 
	        		$container.load('magazine.php');
	        		clearInterval(interval);
	        	}
	           
	        }, 6000); */
  		}
			});
		}
		else
		{
			$("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html("Data not <b> deleted</b>!");
			//show_datas();
		}
  return false;
}   

function active_save_btn(){
 $('#save').removeClass('disabled', false);
 $('#update').addClass('disabled',true);
}

</script>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<!-- Horizontal menu js -->
</script>
<!-- Horizontal menu js -->
<script>
  $(document).ready(function(){
  $('ul li a').click(function(){
  $('li a').removeClass("active");
  $(this).addClass("active");
});
});

</script>
<style type="text/css">
.sidenav {
    height: 80%;
    width: 0;
    position: fixed;
    z-index: 1111;
    top: 0;
    left: 0;
     background: rgba(000, 00, 00, 0.8);
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    margin-top: 132px;
    overflow: scroll;
  
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 13px;
    color: #f2f2f2;
    display: block;
    transition: 0.3s;
  font-weight:bolder;
}

.sidenav a:hover, .offcanvas a:focus{
    color: #000;
  background-color:#fff;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 26px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 13px;}
}
/* class control-label" font size minimizaton */
.control-label
{
  font-size: 12px;
  padding: 0px;
}
.form-group
{
  padding: 0px;
  margin: 2px;
}
/* horizontal menu style */
nav ul li{
  list-style:none;
  float:left;
  padding-right:2px;
}
nav ul li a{
  text-decoration:none;
  color:#222;
  background-color:#ccc;
  padding:8px 8px;
  text-decoration: none !important;
}
nav ul li a:hover{
  background-color: black;
  color:white;
  }
.active{
  background-color:#d90000;
  color:#fff;

}
.activee{
  background-color:#000;
}
</style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button> -->
      <!--<a class="navbar-brand" href="#myPage"> <span style="font-size:40px; color:#fff;background-color:#EE5269; padding:7px;">A</span>bdul <span style="font-family:verdana;"></span><span style="font-size:40px; color:#fff; background-color:#3B5998; padding:7px;">K</span><span style="font-family:verdana;">aiyum</span> </a> -->
        <a class="navbar-brand" href="#myPage"><img style="margin-top: -15px; height: 55px;" src="../img/oh.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
           <div class="dropdown">
            <a href="admin_home.php"><button class="dropbtn activee">admin</button></a>
            <!--<div class="dropdown-content">
              <a href="#">create user</a>
              <a href="#">Link 2</a>
              <a href="#">Link 3</a>
            </div>-->
          </div>
       </ul>                     
    </div>
  </div>
</nav>

<div class="container-fluid" style="margin-top:60px; padding:0;">

<div class="container-fluid page_path_div" style=" background-color:#fff; height:auto; width:98%;color:#666666;">
  <div class="page_path" style="float:left;">Admin / Magazine Approve / Unapprove</div>
  <div class="pagename" style="float:right;">Page:  Magazine</div><hr/>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>
      
      <li><a href="user_create.php">User Create</a></li>
      <li><a href="batch_create.php">Batch Create</a></li>
      <li><a href="batch_wise_photo.php">Batch Photos</a></li>
      <li><a href="students_entry_create.php">Students Entry</a></li>
      <li><a href="helpful_links_create.php">Links Create</a></li>
      <li><a href="online_lib_create.php">Online Library Create</a></li>
      <li><a href="contact_create.php">Contact Create</a></li>
      <li><a href="about_jbEx_create.php">About JB-Ex Create</a></li>
      <li><a href="notice_create.php">Notice Create</a></li>
      <li><a class="menu active"  href="magazine.php">Magazine</a></li>
      <li><a href="emergency_notice.php">Emergency Notice</a></li>
      <li><a href="emergency_email.php">Emergency Email</a></li>
      <li><a href="video_create.php">Video</a></li>
      <li><a href="photoGallery.php">Photo Gallery</a></li>
      
     
  </div>
  <span style="font-size:20px;cursor:pointer; float:left;" onClick="openNav()">&#9776; open</span>
  
<!--
<div class="horizontal_menu" style="float:left; text-align:center; margin-left: 38%;">
    <nav class="navecation"> 
      <ul id="navv">    
        <li><a class="menu active" href="user_create.php">User Create</a></li>
        <li><a  href="user_create.php">Batch Create</a></li>
      </ul>
    </nav>
</div>
-->
  <span>  
    <div class="page_path" style="float:right; margin-top:-35px;">
          <p id="welcome">
          User: <?php echo $login_session_username; ?> |
          <b id="logout"><a href="../logout.php">Log Out</a></b>
          </p>
    </div>
  </span>

</div>
	
<div class="container">
  <h2>Magazine Approve / Unapprove</h2>
  <!--<p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>-->
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
        $magazine= mysql_query("select id, name,batch,email,phone,about_post,text_area,approved_by,updated_by,update_date,insert_date,is_approved,is_deleted  from magazine_post where is_deleted=0 and status_active=1 order by id DESC");
         $i=0;
             
        while($data=mysql_fetch_assoc($magazine))
        {   
            $i++;
        ?>

    <div class="panel panel-default">
      <div id="refresh_id" class="panel-heading" <?php if ($data['is_approved']==1){ $approve_unapprove_color='#06b37f'; }else{ $approve_unapprove_color='#C70039 '; };  ?> style="background-color: <?php echo $approve_unapprove_color; ?>; color: #f9f9f9;">
         <h4 class="panel-title">
		  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php echo $data['about_post']; ?> <span style="color:#f9f9f9;"><?php echo '( '. date("d-m-Y", strtotime($data['insert_date'])).' )'; ?></span></a>
		</h4>
      </div>
       <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
        <div class="panel-body">
	        <div class="row">
	        	<div class="col-md-12">
	        		<div class="col-md-8">
		        		<?php echo $data['text_area']; ?>
		        	</div>
		        	<div class="col-md-4">
		        	 	<p>
				        <h5>Writer: <?php echo $data['name']; ?></h5>
				        <h5>Batch: <?php echo $data['batch']; ?></h5>
				        <h5>Email: <?php echo $data['email']; ?></h5>
				        <?php 
				        if($data['is_approved']!=0)
				        {
				        	echo '<h5>Approved By:'.$return_lib_user_arr[$data['approved_by']].'</h5>'; 
				        }
				        else
				        { 	
				        	if ($data['approved_by']==0) {
				        		echo '<h5>Unapproved By: System </h5>';
				        	}
				        	else
				        	{
				        		echo '<h5>Unapproved By:'.$return_lib_user_arr[$data['approved_by']].'</h5>';
				        	}
				        }  
				        ?>
				        
				        </p> 
				        <p>
						<button type="button" class="btn btn-success" id="approve" onClick="approve_post('<?php echo  $data['id']; ?>','<?php echo  $data['is_approved']; ?>');">Approve</button>
						<button type="button" class="btn btn-warning " id="unapprove" onClick="unapprove_post('<?php echo  $data['id']; ?>','<?php echo  $data['is_approved']; ?>');">Unapprove</button>          
						<button type="button" class="btn btn-danger" id="delete" onClick="delete_post('<?php echo  $data['id']; ?>');">Delete</button>
				        </p> 
				        <p>
						    <p style="background-color:#f9f9f9;color:#fff; display:none;" id="msg_success"></p>
						    <p style="background-color:#f3f3f3;;color:#fff; display:none;" id="msg_failed"></p>
				        </p>  
		        	</div>
		        </div>
	        </div>
        
                            
        </div>
      </div>
        <?php
        }
        ?>
      
    </div>
 
   
  </div> 
</div>
    
</div>
			
</body>
</html>
