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
  <title>jbEX | Photo Gallery</title>
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


$(document).ready(function (e) {
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();



var cbo_image_cat_name    = $("#cbo_image_cat_name").val();
var img_title           = $("#img_title").val();
var file                = $("#file").val();

   if(cbo_image_cat_name==0){ $("#cbo_image_cat_name_red").css("color","#EE5269" );}else{ $("#cbo_image_cat_name_red").css("color","green" );}
  if(img_title==''){ $("#img_title_red").css("color","#EE5269" );}else{ $("#img_title_red").css("color","green" );}
  //if(batchcoverpic==''){$("#cover_pic_red").css("color","#EE5269" );}else{$("#cover_pic_red").css("color","green" );}
  if(file==''){$("#file_red").css("color","#EE5269" ); }else{$("#file_red").css("color","green" ); }
  if(cbo_image_cat_name==0|| img_title=='' || file==''){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red * mark</b>!");
     return; 
  }





$.ajax({
url: "controller/photoGallery_controller.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#loading').hide();
$("#message").html(data);
show_datas();

}
});
}));


// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
 //$('#image_preview_update').hide();
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});

    
// show data list view function
function show_datas(){
  // $(document).ready(function() {
    //$("#display").click(function() {                
    //alert('sdf');
      $.ajax({    //create an ajax request to load_page.php
      type: "GET",
      url: "controller/photoGallery_controller.php",
      data: "action=list_view",
      dataType: "html",   //expect html to be returned   
      cache: false,       
      success: function(response){              
      $("#data_table_container").html(response);         
        //alert(response);
          $("#cbo_image_cat_name").val(0);
          $("#img_title").val('');
          $("#file").val(''); 

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
  //alert(id);
// $(document).ready(function() {
//$("#display").click(function() {                
//alert('sdf');
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/photoGallery_controller.php",
			data:  'idd=' + id +'&action=getdata',			
			dataType: "json",   //expect html to be returned   
			cache: false,				
			success: function(results){	
          var img_path=results['image_path'];
          var file_name=img_path.split('/');
          var file_name = file_name[1];
        
          //$('#cbo_image_cat_name').val(results['image_category']);
          //$('#img_title').val(results['image_title']); 
          //$('#update_file').val(file_name); 
          //$('#update_id').val(results['id']);
          //$('#file').val(file_name);
          //$('#image_preview').hide();

           //$('#image_preview_update').prepend('<img style="height: auto; width: 220px;" id="previewing" src="controller/'+img_path+'"'+'/>');

          $("#image_preview_update").html( '<img style="height: auto; width: 220px;" id="previewing" src="controller/'+img_path+'"'+'/>');

        //$('#previewing').val(results['image_path']);  	
         	
				// $('#update_id').val(results['id']);
				 $('#save').addClass('disabled', true);			 
				 $('#update').removeClass('disabled',false);
			}
	});
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
  var deleteData=id;
  var deleteData=deleteData.split('**');
  var id=deleteData[0];
  var imagePath=deleteData[1];
  alert (imagePath);
//$(document).ready(function() {
//$("#display").click(function() {                
//alert(id);
		var con_msg=confirm('Are you sure to delete data !');
		if(con_msg)
		{
			$.ajax({    //create an ajax request to load_page.php
				type: "POST",
				url: "controller/photoGallery_controller.php",
				data:  'delete_id=' + id +'&imagePath=' + imagePath +'&action=delete_data_action',	
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
			url: "controller/photoGallery_controller.php",
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
  <div class="page_path" style="float:left;">Admin / Video Create</div>
  <div class="pagename" style="float:right;">Page: Video create</div><hr/>

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
      <li><a href="magazine.php">Magazine</a></li>
      <li><a href="emergency_notice.php">Emergency Notice</a></li>
      <li><a href="emergency_email.php">Emergency Email</a></li>
      <li><a href="video_create.php">Video</a></li>
      <li><a class="menu active"  href="photoGallery.php">Photo Gallery</a></li>
      
     
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
      <h2>Photo Gallery create / update form</h2>
      <p>you can create / update photos by using this form</p>
  

<div class="main">
<div class="col-md-12"> 
  <div class="row">

    <form id="uploadimage" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="col-md-5"> 
      <div id="image_preview"><img style="height: auto; width: 220px;" id="previewing" src="../img/no-image.jpg" /></div>
     
      <hr id="line">
    </div>

    <div class="col-md-7"> 
      <div style="width: auto;" id="selectImage">

      <div class="form-group">
      <label class="control-label col-sm-4" for="image_category">Category:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <select style="margin-left:8px;" class="form-control" id="cbo_image_cat_name" name="cbo_image_cat_name">
      <?php
      foreach ($image_category_arr as $image_category_arr_key => $image_category_arr_name) {
      ?><option value="<?php echo $image_category_arr_key; ?>"><?php echo $image_category_arr_name ?>
      </option> 
      <?php
      }
      ?>
        </select> 
       <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="cbo_image_cat_name_red"></span></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="linktitle">Image Title:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="img_title" name="img_title" placeholder="Enter image title name">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="img_title_red"></span></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="linktitle">Select Image:</label>
      <div class="col-sm-2">
       <div class="input-group">
        <input type="file" name="file" id="file" style="width: 160px;">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="file_red"></span></span>
        </div>
      </div>
    </div>
      <!--<input type="text" id="update_file" name="update_file">
      <input type="text" id="update_id" name="update_id"> -->
      <input type="submit" value="Upload" class="submit" />
      <input type="reset" value="Reset" />
      </div>
    </div>
    </form>
  </div>
</div>
<h4 id='loading' ></h4>
<div id="message"></div>




    <div class="col-md-4">
    </div>
    <div class="col-md-8">
    <p style="background-color:#f9f9f9;color:#fff; display:none;" id="msg_success"></p>
    <p style="background-color:#f3f3f3;;color:#fff; display:none;" id="msg_failed"></p>
    </div> 
  </div>
</div>
  <div class="col-md-6">



     <h2>Photos list</h2>
      <div style="text-align: center;" id="image_preview_update"></div>
  	<p><span class="glyphicon glyphicon-search search-boxs"></span><input type="text" id="search_user_create" placeholder="search" onKeyUp="fnc_search();"></p>
  <div id="data_table_container"></div>
  </div>
  
</div>
	

</body>
</html>
