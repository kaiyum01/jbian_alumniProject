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
 	isset($_POST['batchname']) && 
 	isset($_POST['heading']) && 
 	isset($_POST['desc'])
 	//isset($_POST['contact1'])
 	){
	$action_save		=$_POST['action'];
	$batchname			=$_POST['batchname'];
	$batchname			= $batchname*1;	
	$heading			=$_POST['heading'];
	$desc				=mysql_escape_string($_POST['desc']);
	


	if($action_save=="mail_send")
	{	
		//echo $batchname ;
		//var_dump($batchname );
		$email_all="";
		if($batchname!=0){ $batchnameCond="where batch_name='$batchname'"; } else { $batchnameCond="" ;} 
		//echo "select email from batch_create_dtls $batchnameCond";
		$query = mysql_query("select email from batch_create_dtls $batchnameCond");
			
	  	
	  		while($data = mysql_fetch_assoc($query))
			{ 
				 $email_all.= $data['email'].',';
			}  
				//echo $email_all=chop($email_all,",");






			require 'PHPMailer-master/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ma.kaiyum1992@gmail.com';                 // SMTP username
			$mail->Password = 'kaiyum@@##1992255';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to
			/*
			*/
			$mail->setFrom('kaiyum1992@gmail.com', 'Mailer');
			$mail->addAddress('ma.kaiyum1992@gmail.com', 'Abdul Kaiyum Mehedi');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('ma.kaiyum1992@gmail.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');


			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $heading;
			$mail->Body    = "<div style='height: auto; width: 100%; float: left;'>
  <div style='height: auto; width: 100%;background-color: #1abc9c;color: #ffffff; font-family:sans-serif;'>
  <h3 style='text-align: center;background-color: #1abc9c; padding-top: 20px;'>JB Ex Student Association</h3>
  <h4 style='text-align: center;background-color: #1abc9c;'> $heading</h4>
  <div style='height: auto; background-color: #474e5d; width: 100%;'>
    <p style='margin:0px; padding:10px; width:100%;'> $desc</p>
    <p style='font-size: 15px; background-color:#383e4a;margin:0px; padding:10px; width:100%; height:auto;'>Developed By: <a style='color:#1abc9c;' href='www.abdulkaiyum.com'>Mohammad Abdul Kaiyum </a> / 08<sup>th </sup> Batch <img style='height:auto; width:130px;' src='http://abdulkaiyum.com/publicProject/addResource/images/jbExProject/footer_developer.png'</p>
  </div>

   
  </div>
</div>";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			echo '<span style="color:red;"><strong>Message could not be sent !</strong></span>';
			    //echo 'Message could not be sent.';
			   // echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}









	}
}



if(	isset($_POST['action']) &&
 	isset($_POST['batch_name']) 
 	//isset($_POST['contact1'])
 	){
	$action_count_email	=$_POST['action'];
	$batch_name		=$_POST['batch_name'];
	$batch_name=$batch_name*1;

//generate auto student id batch+auto increment id
	

	if($action_count_email=="count_email")
	{
		if ($batch_name==0) 
		{
		$query = mysql_query("select count(email) as total_email, count(batch_name) as total_batch from batch_create_dtls");
	  	$data=mysql_fetch_assoc($query);
		echo $all_info= '0'."**".$data['total_email'].'**'.$data['total_batch'];
		}
		else
		{
	  	$query = mysql_query("select count(email) as total_email, count(batch_name) as total_batch,batch_name from batch_create_dtls where batch_name='$batch_name'");
	  	$data=mysql_fetch_assoc($query);
		echo $all_info= $data['total_email'].'**'.$data['batch_name'];
		}
		
	}
}


?>