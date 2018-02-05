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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<!-- 
  Theme Author: Mohammad Abdul Kaiyum
  Copyright: 	www.abdulkaiyum.com  
	-->
  <title>OH16 | Admin Home</title>
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


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
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

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onLoad="show_datas()";>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
     <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button> -->
     <!-- <a class="navbar-brand" href="#myPage"> <span style="font-size:40px; color:#fff;background-color:#EE5269; padding:7px;">A</span>bdul <span style="font-family:verdana;"></span><span style="font-size:40px; color:#fff; background-color:#3B5998; padding:7px;">K</span><span style="font-family:verdana;">aiyum</span> </a> -->
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
  <div class="page_path" style="float:left;">admin / admin home</div>
  <div class="pagename" style="float:right;">Page: admin home</div><hr/>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>
  

<?php
if($login_session_usertype==1)
{
?>
    <li><a href="user_create.php">User Create</a></li>
    <li><a href="batch_create.php">Batch Create</a></li>
    <li><a href="batch_wise_photo.php">Batch Photos</a></li>
    <li><a href="students_entry_create.php">Students Entry</a></li>
    <li><a href="helpful_links_create.php">Links Create</a></li>
    <li><a href="online_lib_create.php">Online Library Create</a></li>
    <li><a href="contact_create.php">Contact Create</a></li>
    <li><a href="about_jbEx_create.php">About JB-Ex Create</a></li>
    <li><a href="notice_create.php">Notice Create</a></li>
    <li><a href="magazine.php">Magazine</a></li>
    <li><a href="emergency_notice.php">Emergency Notice</a></li>
    <li><a href="emergency_email.php">Emergency Email</a></li>
    <li><a href="video_create.php">Video</a></li>
    <li><a href="photoGallery.php">Photo Gallery</a></li>
<?php
}
else 
{ 
?>
    <li><a href="user_create.php">User Create</a></li>
    <li><a href="batch_wise_photo.php">Batch Photos</a></li>
    <li><a href="students_entry_create.php">Students Entry</a></li>
<?php
}
?>




	  
   
     
     
  </div>
  <span style="font-size:20px;cursor:pointer; float:left;" onClick="openNav()">&#9776; open</span>
  
<!--<div class="horizontal_menu" style="float:left; text-align:center; margin-left: 38%;">
    <nav class="navecation"> 
      <ul id="navv">    
        <li><a class="menu" href="user_create.php">User Create</a></li>
      </ul>
    </nav>
</div> -->

  
  <span>  
    <div class="page_path" style="float:right; margin-top:-35px;">
          <p id="welcome">
          User: <?php echo $login_session_username; ?> |
          <b id="logout"><a href="../logout.php">Log Out</a></b>
          </p>
    </div>
  </span>

</div>



<h1 style="text-align:center;">admin home</h1>

<p>
<?php
    $sql_total_stds=mysql_query("select count(id) as total_stds from batch_create_dtls where status_active=1 and is_deleted=0"); 
    $tot_stds = mysql_fetch_assoc($sql_total_stds);
?>
<h1 style="text-align:center; font-size:16px; font-weight:normal;"> We are <span style="font-size:28px; font-weight:bolder; color:#0C6;"><?php  echo $tot_stds['total_stds']; ?></span> ex-students</h1>
</p>

  <div class="col-md-12">
    <div class="col-md-2"> 
    </div>
    <div class="col-md-8">
    <div style="margin-top: 6%;" class="jumbotron">
     <p style="background-color: #EEEEEE;"><img src="../img/oh.png"></p>
      <h4 style="color: #096; text-align: center;">www.abdulkaiyum.com</h4>
     </div>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  
</div>
			
</body>
</html>
