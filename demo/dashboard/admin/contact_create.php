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
  <title>jbEX | Contact Create</title>
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

<script type="text/javascript">
// save data by submit button function
function data_send(){
  //$(document).ready(function(){  
  // $("#submit").click(function(){
  var address       = $("#txt_address").val();
  var email         = $("#txt_email").val();
  var mobile_1      = $("#txt_mobile_1").val();
  var mobile_2      = $("#txt_mobile_2").val();
  var fb_link_url   = $("#txt_fb_link_url").val();
  // Returns successful data submission message when the entered information is stored in database.
  var dataString = '&address1='+ address + '&email1='+ email + '&mobile_11='+ mobile_1 + '&mobile_21='+ mobile_2 + '&fb_link_url1='+ fb_link_url;
  //alert(dataString);
  if(address==''){ $("#txt_address_red").css("color","#EE5269" );}else{ $("#txt_address_red").css("color","green" );}
  if(email==''){$("#txt_email_red").css("color","#EE5269" );}else{$("#txt_email_red").css("color","green" );}
  if(mobile_1==''){$("#txt_mobile_1_red").css("color","#EE5269" ); }else{$("#txt_mobile_1_red").css("color","green" ); }
  if(fb_link_url==''){$("#txt_fb_link_url_red").css("color","#EE5269" ); }else{$("#txt_fb_link_url_red").css("color","green" ); }
  if(address==''|| email=='' || mobile_1=='' || fb_link_url==''){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red * mark</b>!"); 
  }
  else
  {
    //AJAX code to submit form.
    $.ajax({
      type: "POST",
      url: "controller/contact_create_controller.php",
      data: dataString+'&action=save_data',
      cache: false,
      success: function(result)
      { 
        //alert(result);
        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
        $("#txt_address").val('');
        $("#txt_fb_link_url").val('http://www.');
        $("#txt_mobile_1").val('');
        $("#txt_mobile_2").val('');
        $("#txt_email").val('');
        //default color of start mark
        $("#txt_address_red").css("color","#555555" );
        $("#txt_fb_link_url_red").css("color","#555555" );
        $("#txt_mobile_1_red").css("color","#555555" );
        $("#txt_email_red").css("color","#555555" );
        show_datas(); // call list view function_
      }
    });
  }
  return false;
// });
//});
}

    
// show data list view function
function show_datas(){
  // $(document).ready(function() {
    //$("#display").click(function() {                
    //alert('sdf');
      $.ajax({    //create an ajax request to load_page.php
      type: "GET",
      url: "controller/contact_create_controller.php",
      data: "action=list_view",
      dataType: "html",   //expect html to be returned   
      cache: false,       
      success: function(response){              
      $("#data_table_container").html(response);         
        //alert(response);
        $("#txt_address").val('');
        $("#txt_fb_link_url").val('http://www.');
        $("#txt_mobile_1").val('');
        $("#txt_mobile_2").val('');
        $("#txt_email").val('');

      }
      });
    //});
  // });
}
// onlick function for update get data
function get_data_from_list(id){
	//alert(id);
	query_data(id); // ajax function call
	//data_update()
	//$('#id').val(id);
}
//get data for update
function query_data(id){
// $(document).ready(function() {
//$("#display").click(function() {                
//alert('sdf');
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/contact_create_controller.php",
			data:  'idd=' + id +'&action=getdata',			
			dataType: "json",   //expect html to be returned   
			cache: false,				
			success: function(results){											
				// alert (results['batch_reward']);
				 $('#txt_address').val(results['address']);
         $('#txt_fb_link_url').val(results['fb_link']);
         $("#txt_mobile_1").val(results['mobile_1']);
         $("#txt_mobile_2").val(results['mobile_2']);	
         $("#txt_email").val(results['email']); 
				 $('#update_id').val(results['id']);
				 $('#save').addClass('disabled', true);			 
				 $('#update').removeClass('disabled',false);
			}
	});
		//});
 //});
}
// Update data by submit button function
function data_update(){
	//$(document).ready(function(){  
	// $("#submit").click(function(){
	var address       = $("#txt_address").val();
  var email         = $("#txt_email").val();
  var mobile_1      = $("#txt_mobile_1").val();
  var mobile_2      = $("#txt_mobile_2").val();
  var fb_link_url   = $("#txt_fb_link_url").val();
	var id 			     = $("#update_id").val();

	// Returns successful data submission message when the entered information is stored in database.
	var dataString = '&address1='+ address + '&email1='+ email + '&mobile_11='+ mobile_1 + '&mobile_21='+ mobile_2 + '&fb_link_url1='+ fb_link_url + '&update_id1='+ id;
	//alert(dataString);
  if(address==''){ $("#txt_address_red").css("color","#EE5269" );}else{ $("#txt_address_red").css("color","green" );}
  if(email==''){$("#txt_email_red").css("color","#EE5269" );}else{$("#txt_email_red").css("color","green" );}
  if(mobile_1==''){$("#txt_mobile_1_red").css("color","#EE5269" ); }else{$("#txt_mobile_1_red").css("color","green" ); }
  if(fb_link_url==''){$("#txt_fb_link_url_red").css("color","#EE5269" ); }else{$("#txt_fb_link_url_red").css("color","green" ); }
  if(address==''|| email=='' || mobile_1=='' || fb_link_url==''){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red * mark</b>!"); 
  }
  else
  {
    //AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "controller/contact_create_controller.php",
			data: dataString+'&action=update_data',
			cache: false,
			success: function(result)
			{	
				 //alert(result);
			$("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
      $("#txt_address").val('');
        $("#txt_fb_link_url").val('http://www.');
        $("#txt_mobile_1").val('');
        $("#txt_mobile_2").val('');
        $("#txt_email").val('');
      //default color of start mark
      $("#txt_address_red").css("color","#555555" );
      $("#txt_fb_link_url_red").css("color","#555555" );
      $("#txt_mobile_1_red").css("color","#555555" );
      $("#txt_email_red").css("color","#555555" );
			show_datas(); // call list view function_
			$('#save').removeClass('disabled',false);			 
			$('#update').addClass('disabled', true);
												
			}
		});
	}
	return false;
//});
//});
}
//delte function
function fnc_delete(id){
	//alert(id);
	delete_data(id); // ajax function call
	//$('#id').val(id);
}
//  Delete Data function
function delete_data(id){
//$(document).ready(function() {
//$("#display").click(function() {                
//alert('sdf');
		var con_msg=confirm('Are you sure to delete data !');
		if(con_msg)
		{
			$.ajax({    //create an ajax request to load_page.php
				type: "POST",
				url: "controller/contact_create_controller.php",
				data:  'delete_id=' + id +'&action=delete_data_action',	
				dataType: "text",   //expect html to be returned   
				cache: false,				
				success: function(responsee){						
					//$("#responsecontainer").html(response);					
					//alert(responsee);
					$("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(responsee); // message of html response after delete data
					show_datas();					
				}

			});
		}
		else
		{
			$("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html("Data not <b> deleted</b>!");
			show_datas();
		}
			  
		//});
 //});

}
//Search Function
function fnc_search(){
 var search_value= $("#search_user_create").val();
 //alert(search_value);
	 if(search_value==''){
		show_datas(); 
	 }
	 else{
	 search_data_table(search_value);
	 }
}
//Search data table ajax function
function search_data_table(search_value){
	// $(document).ready(function() {
		//$("#display").click(function() {                
		//alert('sdf');
		//alert(search_value); return;
			$.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/contact_create_controller.php",
			data: 'search_value1='+search_value + '&action=search_list_view',
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(response){							
			$("#data_table_container").html(response);					
				//alert(response);
			}
			});
		//});
	// });
}

// active save btn when click reset btn
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

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onLoad="show_datas()";>
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
  <div class="page_path" style="float:left;">Admin / Contact  Create</div>
  <div class="pagename" style="float:right;">Page:  Contact Create</div><hr/>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>
      
      <li><a href="user_create.php">User Create</a></li>
      <li><a href="batch_create.php">Batch Create</a></li>
      <li><a href="batch_wise_photo.php">Batch Photos</a></li>
      <li><a href="students_entry_create.php">Students Entry</a></li>
      <li><a href="helpful_links_create.php">Links Create</a></li>
      <li><a href="online_lib_create.php">Online Library Create</a></li>
      <li><a class="menu active"  href="contact_create.php">Contact Create</a></li>
      <li><a href="about_jbEx_create.php">About JB-Ex Create</a></li>
      <li><a href="notice_create.php">Notice Create</a></li>
      <li><a href="magazine.php">Magazine</a></li>
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
			
  <div class="col-md-6">
      <h2>Contact create / update form</h2>
      <p>you can create / update Contact by using this form</p>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-4" for="address"> Address:</label>
      <div class="col-sm-8">
       <div class="input-group">     
          <textarea style="margin-left: 10px;" class="form-control" rows="5" id="txt_address" name="txt_address"></textarea>
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="txt_address_red"></span></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Enter email">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="txt_email_red"></span></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="mobile1">Mobile 1:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_mobile_1" name="txt_mobile_1" placeholder="Enter mobile number">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="txt_mobile_1_red"></span></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="mobile2">Mobile 2:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_mobile_2" name="txt_mobile_2" placeholder="Enter mobile number">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="linkurl">Facebook page/group:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_fb_link_url" name="txt_fb_link_url" placeholder="Enter facebook link URL">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="txt_fb_link_url_red"></span></span>
        </div>
      </div>
    </div>
   
	<input type="hidden" id="update_id" name="update_id">
    <div class="form-group">
      <label class="control-label col-sm-4" for="sel1"></label>
      <div class="col-sm-2">
      </div>
      <div class="col-sm-6">
         <div class="input-group">
            <button type="button" class="btn btn-primary" id="save" onClick="data_send();">Create</button>
			      <button type="button" class="btn btn-primary disabled" id="update" onClick="data_update();">Update</button>          
            <button type="reset" class="btn btn-primary" onClick="active_save_btn();">Reset</button>
        </div>
      </div>
    </div>
  </form>
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
    <p style="background-color:#f9f9f9;color:#fff; display:none;" id="msg_success"></p>
    <p style="background-color:#f3f3f3;;color:#fff; display:none;" id="msg_failed"></p>
    </div> 
  </div>

  <div class="col-md-6">
     <h2>Contact list</h2>
  	<p><span class="glyphicon glyphicon-search search-boxs"></span><input type="text" id="search_user_create" placeholder="search" onKeyUp="fnc_search();"></p>
  <div id="data_table_container"></div>
  </div>
  
</div>
			
</body>
</html>
