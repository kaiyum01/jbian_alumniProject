<?php 
include('../dashboard/include/kaiyum_function.php');
include('../dashboard/include/common_function.php');
include('../dashboard/include/array_function.php');
include('../dashboard/include/message_function.php');
include('../dashboard/include/db_connection.php');

//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['name']) && 
 	isset($_POST['email']) &&
 	isset($_POST['phone']) && 
 	isset($_POST['subject']) &&  
 	isset($_POST['message'])
 	//isset($_POST['contact1'])
 	){
	$action_save		=$_POST['action'];
	$name				=mysql_escape_string($_POST['name']);
	$email				=mysql_escape_string($_POST['email']);
	$phone				=mysql_escape_string($_POST['phone']);
	$subject			=mysql_escape_string($_POST['subject']);
	$message			=mysql_escape_string($_POST['message']);
	


	if($action_save=="mail_send")
	{	
		//echo $batchname ;
		//var_dump($batchname );
		$email_all="";

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
			$mail->Subject = $subject;
			$mail->Body    = "<div style='height: auto; width: 100%; float: left;'>
  <div style='height: auto; width: 100%;background-color: #1abc9c;color: #ffffff; font-family:sans-serif;'>
  <h3 style='text-align: center;background-color: #1abc9c; padding-top: 20px;'>JB Ex Student Association</h3>
  <h4 style='text-align: center;background-color: #1abc9c;'> $subject</h4>
  <div style='height: auto; background-color: #474e5d; width: 100%;'>
    <p style='margin:0px; padding:10px; width:100%;'> $message <br/> $name <br/><br/> <br/> $name <br/> $phone</p>
    <p style='font-size: 15px; background-color:#383e4a;margin:0px; padding:10px; width:100%; height:auto;'>Developed By: <a style='color:#1abc9c;' href='www.abdulkaiyum.com'>Mohammad Abdul Kaiyum </a> / 08<sup>th </sup> Batch <img style='height:auto; width:130px;' src='https://yt3.ggpht.com/-11aLPNCE_70/AAAAAAAAAAI/AAAAAAAAAAA/TnaHyJp3oeo/s900-c-k-no-mo-rj-c0xffffff/photo.jpg'</p>
  </div>

   
  </div>
</div>";
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			   // echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}

	}
}



?>

