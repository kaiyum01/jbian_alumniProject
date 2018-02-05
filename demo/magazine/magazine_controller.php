<?php 
// session 
session_start();
include('../dashboard/include/db_connection.php');
include('../dashboard/include/common_function.php');
include('../dashboard/include/array_function.php');
include('../dashboard/include/message_function.php');
//function for data security or filterring


//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['name']) && 
 	isset($_POST['batch']) &&
 	isset($_POST['email']) &&
 	isset($_POST['phone']) &&
 	isset($_POST['about_post']) &&  
 	isset($_POST['txt_letter_body'])  

 	//isset($_POST['contact1'])
 	){
	$action_save	=$_POST['action'];
	$name			=mysql_escape_string($_POST['name']);
	$batch			=mysql_escape_string($_POST['batch']);
	$email			=mysql_escape_string($_POST['email']);
	$phone			=mysql_escape_string($_POST['phone']);
	$about_post		=mysql_escape_string($_POST['about_post']);
	$txt_letter_body	=$_POST['txt_letter_body'];
	$txt_letter_body=str_replace("****", "?", $txt_letter_body);
	$txt_letter_body=str_replace("**", "&", $txt_letter_body);
	//$text_area_post = dataready($text_area_post);


 //mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";




	if($action_save=="save_data")
	{
	  	$query = mysql_query("insert into magazine_post(name,batch,email,phone,about_post,text_area,insert_date) values ('$name','$batch','$email','$phone','$about_post','$txt_letter_body','$insert_and_update_date')");
		
		 mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		
	  	if($query==1){
	  	echo "Your post submited successfully. Please wait for approved by authority";
		//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
	  	}
	  	else{
	  		echo "Sorry Your post Failed to submited";
			//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
		  }
	}
}

?>
