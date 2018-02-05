<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Contact</title>
  <?php
  include('head.php');
  ?>

<script type="text/javascript">
// save data by submit button function
function data_send(){

  var name          = $("#name").val();
  var email         = $("#email").val();
  var phone         = $("#phone").val();
  var subject    	= $("#subject").val();
  var message		= $("#message").val();

  var sum1    = $("#sum1").val()*1;
  var sum2    = $("#sum2").val()*1;
  var result  = $("#result").val()*1;
  // Returns successful data submission message when the entered information is stored in database.
  var dataString = '&name='+ name + '&subject='+ subject + '&email='+ email + '&phone='+ phone + '&message='+ message;
  //alert(dataString);
  if(name==''){ $("#name").css("border-color", "#EE5269");}else{ $("#name").css("border-color", "green");}
  if(email==''){ $("#email").css("border-color", "#EE5269");}else{ $("#email").css("border-color", "green");}
  if(phone==''){$("#phone").css("border-color", "#EE5269");}else{$("#phone").css("border-color", "green");}
  if(subject==''){ $("#subject").css("border-color", "#EE5269");}else{ $("#subject").css("border-color", "green");}
  if(message==''){$("#message").css("border-color", "#EE5269");}else{$("#message").css("border-color", "green");}


  if(name==''|| email=='' || phone=='' || subject=='' || message==''){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red box </b>!"); 
  }
   else if((sum1+sum2)!=result){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" Please write your <b> correct result </b>!");
	 $("#result").css("border-color", "#EE5269");
  }
  else
  {
    //$("#message").empty();
     $("#loading").css({"display":"block"})
    //$('#loading').show();
    //AJAX code to submit form.
    $.ajax({
      type: "POST",
      url: "controller/contact_controller.php",
      data: dataString+'&action=mail_send',
      cache: false,
      success: function(result)
      { 
        //alert(result);
        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
        $("#name").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#subject").val('');
        $("#message").val('');
       
        //default color of start mark
        //$("#txt_heading_red").css("color","#555555" );
        //$("#txt_mail_description_red").css("color","#555555" );  

        $('#loading').hide();
        //$("#message").html(data);   
        
      }
    });
  }
  return false;
// });
//});
}

</script>


</head>
<body>
	<!-- Fixed navbar -->
	<?php
	include('navbar.php');
	?>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
                    <h1>Contact Us</h1>
                    <p>Send message to JBESA for any kind of help and information! </p>
                </div>
    </header>


	<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h3 class="section-title">Your Message</h3>
					<!--	<p>
						Lorem Ipsum is inting and typesetting in simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the is dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
						</p>-->
						
						<form class="form-light mt-20" role="form">
							<div class="form-group">
								<label>Name</label>
								<input id="name" name="name" type="text" class="form-control" placeholder="Your name">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Email</label>
										<input id="email" name="email" type="email" class="form-control" placeholder="Email address">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone</label>
										<input id="phone" name="phone" type="text" class="form-control" placeholder="Phone number">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Subject</label>
								<input id="subject" name="subject" type="text" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<label>Message</label>
								<textarea id="message" name="message" class="form-control" id="message" placeholder="Write you message here..." style="height:100px;"></textarea>
							</div>
							<div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input style="text-align: center;" type="text" id="sum1" name="sum1" class="form-control" value="<?php echo(rand(10,100)); ?>" readonly>
                                    </div>
                                </div> 
                                 <div style="width:20px;" class="col-md-1 col-sm-1">
                                        +
                                </div> 
                                <div class="col-md-2 col-sm-2">
                                    <div class="form-group">
                                        <input style="text-align: center;" type="text" id="sum2" name="sum2" class="form-control" value="<?php echo(rand(10,100)); ?>" readonly>
                                    </div>
                                </div>
                                 <div style="width:20px;" class="col-md-1 col-sm-1">
                                       =
                                </div> 
                                 <div class="col-md-2 col-sm-2">
                                    <div class="form-group">
                                       <input style="text-align: center;" type="text" id="result" name="result" class="form-control" placeholder="Result" >
                                    </div>
                                </div>
                            </div>
							<button type="button" class="btn btn-two" id="save" onClick="data_send();">Send message</button><p><br/></p>
						</form>
						 <div class="col-md-12">
						 	<h4 id='loading' style="display: none; color: gray; margin-top: 80px;">Sending<img style="height: auto; width: 100px;" src="assets/images/widget-loader-lg.gif"> </h4>
                            <p style="background-color:#f9f9f9;color:#fff; display:none; text-align: center;" id="msg_success"></p>
                            <p style="background-color:#f3f3f3;;color:#fff; display:none; text-align: center;" id="msg_failed"></p>
                          </div> 
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<h3 class="section-title">Office Address</h3>
								<div class="contact-info">
										<?php
											$result=mysql_query("select address,email,mobile_1,mobile_2 from contact_create where is_deleted=0 and status_active=1 order by id DESC");
											while($data = mysql_fetch_assoc($result))
											{
											?>

									<h5>Address</h5>
									<p><?php echo $data['address']; ?></p>
									
									<h5>Email</h5>
									<p><?php echo $data['email']; ?></p>
									
									<h5>Phone</h5>
									<p><?php echo $data['mobile_1'] .'<br/>' .$data['mobile_2']; ?></p>
										<?php		
											}   
										?>
								</div>
							</div> 
						</div> 						
					</div>
				</div>
			</div>
	<!-- /container -->
	<?php
	include('footer.php');
	?>


	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
