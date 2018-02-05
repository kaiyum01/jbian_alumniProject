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
	$name				=$_POST['name'];
	$email				=$_POST['email'];
	$phone				=$_POST['phone'];
	$subject			=$_POST['subject'];
	$message			=$_POST['message'];
	


	if($action_save=="mail_send")
	{	
		//echo $batchname ;
		//var_dump($batchname );
		$email_all="";

			require 'PHPMailer-master/PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 2;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ma.kaiyum1992@gmail.com';                 // SMTP username
			$mail->Password = '';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to
			/*
			*/
			$mail->setFrom('kaiyum1992@gmail.com', 'Mailer');
		//	$mail->addAddress('ma.kaiyum1992@gmail.com', 'Abdul Kaiyum Mehedi');     // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('ma.kaiyum1992@gmail.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');


			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message ;
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}

	}
}



?>

