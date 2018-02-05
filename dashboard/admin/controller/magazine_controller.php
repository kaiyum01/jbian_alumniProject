<?php 
// session 
session_start();
include('../../include/db_connection.php');
//session start
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
header('Location: ../../index.php'); // Redirecting To Home Page
}
//end session
include('../../include/common_function.php');
include('../../include/array_function.php');
include('../../include/message_function.php');

//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['id'])  
 	//isset($_POST['contact1'])
 	){
	$action_approve	=$_POST['action'];
	$approve_id		=$_POST['id'];

	if($action_approve=="approve_post")
	{
	  $query_update = mysql_query("update magazine_post SET is_approved='1',update_date='$insert_and_update_date',updated_by='$login_session_user_id',approved_by='$login_session_user_id' where id='$approve_id'");
	  	if($query_update==1){
	  		echo 'Approved Success';
		//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
	  	}
	  	else{
	  		echo 'Failed to Approve';
			//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
		  }
	}
}

//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['id'])  
 	//isset($_POST['contact1'])
 	){
	$action_unapprove	=$_POST['action'];
	$unapprove_id			=$_POST['id'];

	if($action_unapprove=="unapprove_post")
	{
	  $query_update = mysql_query("update magazine_post SET is_approved='0',update_date='$insert_and_update_date',updated_by='$login_session_user_id',approved_by='$login_session_user_id' where id='$unapprove_id'");
	  	if($query_update==1){
	  		echo 'Unpproved Success';
		//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
	  	}
	  	else{
	  		echo 'Failed to Unpprove';
			//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
		  }
	}
}
//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['id'])  
 	//isset($_POST['contact1'])
 	){
	$action_delete	=$_POST['action'];
	$delete_id		=$_POST['id'];

	if($action_delete=="delete_post")
	{
	  $query_update = mysql_query("update magazine_post SET is_deleted='1',status_active='0',update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
	  	if($query_update==1){
	  		echo 'Delete Success';
		//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
	  	}
	  	else{
	  		echo 'Failed to Delete';
			//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
		  }
	}
}

?>
