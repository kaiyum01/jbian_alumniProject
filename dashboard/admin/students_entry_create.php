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
$login_session_batch      =$row['batch_name'];
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
  <title>JBex | Students Entry </title>
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
  <link rel="stylesheet" href="../css/jquery_ui.css">
  <script type="text/javascript" src="../js/jquery_ui.js"></script>

<script type="text/javascript">
// save data by submit button function
function data_send(){
  //$(document).ready(function(){  
  // $("#submit").click(function(){
  var studentname     = $("#txt_studentname").val();
  var batchname       = $("#cbo_batch_name").val();
  var dob             = $("#txt_dob").val();
  var workingsector   = $("#cbo_working_sector").val();
  var bloodgroup     	= $("#cbo_blood_group").val();
  var gender     	    = $("#cbo_gender").val();
  var studentmail     = $("#txt_studentmail").val();
  var mobile          = $("#txt_mobile").val();
  var facebook        = $("#txt_facebook").val();
  var parents         = $("#txt_parents").val();
  
  //var userstatus    = $("#contact").val();

  // Returns successful data submission message when the entered information is stored in database.
  var dataString = '&studentname1='+ studentname + '&batchname1='+ batchname + '&dob1='+ dob + '&workingsector1='+ workingsector + '&bloodgroup1='+ bloodgroup + '&gender1='+ gender + '&studentmail1='+ studentmail + '&mobile1='+ mobile + '&facebook1='+ facebook + '&parents1='+ parents;
  //alert(dataString);
  if(studentname==''){ $("#txt_studentname_red").css("color","#EE5269" );}else{ $("#txt_studentname_red").css("color","green" );}
  if(batchname==0){$("#cbo_batch_name_red").css("color","#EE5269" );}else{$("#cbo_batch_name_red").css("color","green" );}
  if(studentname==''|| batchname==0){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red * mark</b>!"); 
  }
  else
  {
    //AJAX code to submit form.
    $.ajax({
      type: "POST",
      url: "controller/students_entry_create_controller.php",
      data: dataString+'&action=save_data',
      cache: false,
      success: function(result)
      { 
        //alert(result);
        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
        $("#txt_studentname").val('');
        $("#cbo_batch_name").val(0);
        $("#txt_dob").val('');
        $("#cbo_working_sector").val('');
		    $('#cbo_blood_group').val(0);
		    $('#cbo_gender').val(0);
        $("#txt_studentmail").val('');
        $('#txt_mobile').val('');
        $('#txt_facebook').val('https://www.facebook.com/');
        $('#txt_parents').val('');
        //default color of start mark
        $("#txt_studentname_red").css("color","#555555" );
        $("#cbo_batch_name_red").css("color","#555555" );     
        //$("#update_id").val('');
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
      url: "controller/students_entry_create_controller.php",
      data: "action=list_view",
      dataType: "html",   //expect html to be returned   
      cache: false,       
      success: function(response){              
      $("#data_table_container").html(response);         
        //alert(response);
        $("#cbo_batch_name").val(0);
        $("#cbo_working_sector").val('');
        $('#cbo_blood_group').val(0);
        $('#cbo_gender').val(0);
        $('#txt_facebook').val('https://www.facebook.com/');
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
			url: "controller/students_entry_create_controller.php",
			data:  'idd=' + id +'&action=getdata',			
			dataType: "json",   //expect html to be returned   
			cache: false,				
			success: function(results){											
				 //alert (results['id']);
				 $('#txt_studentname').val(results['student_name']);
				 $('#cbo_batch_name').val(results['batch_name']);
				 $('#txt_dob').val(results['dob']);
				 $('#cbo_working_sector').val(results['working_sector']);
				 $('#cbo_blood_group').val(results['blood_group']);
				 $('#cbo_gender').val(results['gender']);
         $('#txt_studentmail').val(results['email']);
         $('#txt_mobile').val(results['mobile']);
         $('#txt_facebook').val(results['facebook_id']);
         $('#txt_parents').val(results['parents']);

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
  var studentname     = $("#txt_studentname").val();
  var batchname       = $("#cbo_batch_name").val();
  var dob             = $("#txt_dob").val();
  var workingsector   = $("#cbo_working_sector").val();
  var bloodgroup      = $("#cbo_blood_group").val();
  var gender          = $("#cbo_gender").val();
  var studentmail     = $("#txt_studentmail").val();
  var mobile          = $("#txt_mobile").val();
  var facebook        = $("#txt_facebook").val();
  var parents         = $("#txt_parents").val();
	var id 				      = $("#update_id").val();

	// Returns successful data submission message when the entered information is stored in database.
  var dataString = '&studentname1='+ studentname + '&batchname1='+ batchname + '&dob1='+ dob + '&workingsector1='+ workingsector + '&bloodgroup1='+ bloodgroup + '&gender1='+ gender + '&studentmail1='+ studentmail + '&mobile1='+ mobile + '&facebook1='+ facebook + '&parents1='+ parents + '&update_id1='+ id;
  //alert(dataString);
  if(studentname==''){ $("#txt_studentname_red").css("color","#EE5269" );}else{ $("#txt_studentname_red").css("color","green" );}
  if(batchname==0){$("#cbo_batch_name_red").css("color","#EE5269" );}else{$("#cbo_batch_name_red").css("color","green" );}
  if(studentname==''|| batchname==0){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html("You have must fill out <b>red * mark</b>!"); 
  }
  else
  {
    //AJAX code to submit form.
		$.ajax({
			type: "POST",
			url: "controller/students_entry_create_controller.php",
			data: dataString+'&action=update_data',
			cache: false,
			success: function(result)
			{	
				 //alert(result);
			$("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
		  $("#txt_studentname").val('');
      $("#cbo_batch_name").val(0);
      $("#txt_dob").val('');
      $("#cbo_working_sector").val('');
      $('#cbo_blood_group').val(0);
      $('#cbo_gender').val(0);
      $("#txt_studentmail").val('');
      $('#txt_mobile').val('');
      $('#txt_facebook').val('https://www.facebook.com/');
      $('#txt_parents').val('');
      //default color of start mark
      $("#txt_studentname_red").css("color","#555555" );
      $("#cbo_batch_name_red").css("color","#555555" );     
			$('#update_id').val('');
			//default color of start mark
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
				url: "controller/students_entry_create_controller.php",
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
			url: "controller/students_entry_create_controller.php",
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

 $(function() {
            $( "#txt_dob" ).datepicker({ 
              dateFormat: 'yy-mm-dd', 
               changeMonth: true,
              changeYear: true,
              yearRange: "1980:2030"
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
  <div class="page_path" style="float:left;">Admin / Students Entry</div>
  <div class="pagename" style="float:right;">Page: Students Entry</div><hr/>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onClick="closeNav()">&times;</a>

<?php
if($login_session_usertype==1)
{
?>
      <li><a href="user_create.php">User Create</a></li>
      <li><a href="batch_create.php">Batch Create</a></li>
      <li><a href="batch_wise_photo.php">Batch Photos</a></li>
      <li><a class="menu active" href="students_entry_create.php">Students Entry</a></li>
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
      <li><a class="menu active" href="students_entry_create.php">Students Entry</a></li>
<?php
}
?>     
     
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
      <h2>Ex Students Entry / update form</h2>
      <p>you can create / update Students by using this form</p>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-4" for="username">Ex Student Name:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_studentname" name="txt_studentname" placeholder="Enter Ex Student Name">
        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="txt_studentname_red"></span></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="parents">Parents Name:</label>
      <div class="col-sm-8">
       <div class="input-group">
        <input type="text" class="form-control" id="txt_parents" name="txt_parents" placeholder="Enter Ex Student Parents Name">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="batchname">Batch Name:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <select style="margin-left:8px;" class="form-control" id="cbo_batch_name" name="cbo_batch_name">
            <option value="0">Select Batch</option>
      <?php
      //return batch name 
      $return_batch_mst=fnc_pickup_data_from_db_table("id,batch_name","batch_create_mst","is_deleted=0 and status_active=1"); 
      $return_batch_mst_arr=array();
      foreach($return_batch_mst as $aa)
        {
          $return_batch_mst_arr[$aa[0]] =$aa[1]; //$aa=['id'].
        }

        //condtion for user level access
        if($login_session_usertype!=1 && in_array($login_session_batch, $return_batch_mst_arr))
        {
          $return_batch_mst_arr=$newYearArr = array($login_session_batch);
        }
        else
        {
          $return_batch_mst_arr;
        }


          //echo $return_batch_mst_arr[2];
        //print_r($return_batch_mst_arr);
      foreach ($return_batch_mst_arr as $return_batch_mst_arr_key => $return_batch_mst_arr_name) {
      ?><option value="<?php echo $return_batch_mst_arr_name; ?>" <?php /*?><?php if( $imvalue==$updata['Timportancy'])  echo "selected"; ?> <?php */?>><?php echo $return_batch_mst_arr_name ?>
      </option> 
      <?php
      }
      ?>
        </select> 
       <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk" id="cbo_batch_name_red"></span></span>
        </div>
      </div>
    </div>
   <div class="form-group">
      <label class="control-label col-sm-4" for="dob">DOB:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <input type="email" class="form-control" id="txt_dob" name="txt_dob" placeholder="Year-Month-Day">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>       
    <div class="form-group">
      <label class="control-label col-sm-4" for="workingsector">Working Sector:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <input type="email" class="form-control" id="cbo_working_sector" name="cbo_working_sector" placeholder="Profession and Working Sector">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="batchname">Blood Group:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <select style="margin-left:8px;" class="form-control" id="cbo_blood_group" name="cbo_blood_group">
      <?php
      foreach ($blood_group_arr as $blood_group_arr_key => $blood_group_arr_name) {
      ?><option value="<?php echo $blood_group_arr_key; ?>" <?php /*?><?php if( $imvalue==$updata['Timportancy'])  echo "selected"; ?> <?php */?>><?php echo $blood_group_arr_name ?>
      </option> 
      <?php
      }
      ?>
        </select> 
       <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="batchname">Gender:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <select style="margin-left:8px;" class="form-control" id="cbo_gender" name="cbo_gender">
      <?php
      foreach ($gender_arr as $gender_arr_key => $gender_arr_name) {
      ?><option value="<?php echo $gender_arr_key; ?>" <?php /*?><?php if( $imvalue==$updata['Timportancy'])  echo "selected"; ?> <?php */?>><?php echo $gender_arr_name ?>
      </option> 
      <?php
      }
      ?>
        </select> 
       <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Email:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <input type="email" class="form-control" id="txt_studentmail" name="txt_studentmail" placeholder="Enter email">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="phone">Mobile:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <input type="email" class="form-control" id="txt_mobile" name="txt_mobile" placeholder="Enter mobile">
        <span class="input-group-addon"></span>
        </div>
      </div>
    </div>
     <div class="form-group">
      <label class="control-label col-sm-4" for="fbid">Facebook:</label>
      <div class="col-sm-8">
      <div class="input-group">
        <input type="email" class="form-control" id="txt_facebook" name="txt_facebook" placeholder="Enter facebook">
        <span class="input-group-addon"></span>
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
     <h2>Ex Students list</h2>
  	<p><span class="glyphicon glyphicon-search search-boxs"></span><input type="text" id="search_user_create" placeholder="search" onKeyUp="fnc_search();"></p>
  <div id="data_table_container"></div>
  </div>
  
</div>
			
</body>
</html>
