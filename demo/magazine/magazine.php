<?php 
include('../dashboard/include/db_connection.php');
include('../dashboard/include/array_function.php');
include('../dashboard/include/message_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Blog Write</title>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Official website of J B Ex-Students Association developed by abdulkaiyum.com. Jorargonj Bhoddhu High School, a renounced school in Mirsarai,  Chittagong. JB ESA is it's Ex Students platform">
	<meta name="author" content="abdulkaiyum.com">
	
    <link rel="icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen"> 
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='../assets/css/camera.css' type='text/css' media='all'> 


    <script src="ckeditor.js"></script>
    <script src="js/sample.js"></script>
    <link rel="stylesheet" href="css/samples.css">
    <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
// save data by submit button function
function data_send(){
  //$(document).ready(function(){  
  // $("#submit").click(function(){
  var name          = $("#name").val();
  var batch         = $("#batch").val();
  var email         = $("#email").val();
  var phone         = $("#phone").val();
  var about_post    = $("#about_post").val();
 // var text_area_post = CKEDITOR.instances['text_area_post'].getData();
 
 
 var txt_letter_body=editor.getData();
txt_letter_body=txt_letter_body.split('&').join('**'); // replace("&","**");
txt_letter_body=txt_letter_body.split('?').join('****'); // replace("&","**");
txt_letter_body=txt_letter_body.replace(/<div.*>/gi, "\n");
 
 
  //var txt_letter_body=editor.getData();
   //var editor = CKEDITOR.replace('txt_letter_body');

  var sum1    = $("#sum1").val()*1;
  var sum2    = $("#sum2").val()*1;
  var result    = $("#result").val()*1;
  // Returns successful data submission message when the entered information is stored in database.
  var dataString = '&name='+ name + '&batch='+ batch + '&email='+ email + '&phone='+ phone + '&about_post='+ about_post + '&txt_letter_body='+ txt_letter_body;
  alert(txt_letter_body);
  if(name==''){ $("#name").css("border-color", "#EE5269");}else{ $("#name").css("border-color", "green");}
  if(batch==''){$("#batch").css("border-color", "#EE5269");}else{$("#batch").css("border-color", "green");}
  if(email==''){ $("#email").css("border-color", "#EE5269");}else{ $("#email").css("border-color", "green");}
  if(phone==''){$("#phone").css("border-color", "#EE5269");}else{$("#phone").css("border-color", "green");}
  if(about_post==''){ $("#about_post").css("border-color", "#EE5269");}else{ $("#about_post").css("border-color", "green");}
  if(txt_letter_body==''){$("#txt_letter_body").css("border-color", "#EE5269");}else{$("#txt_letter_body").css("border-color", "green");}


  if(name==''|| batch=='' || email=='' || phone=='' || about_post=='' || txt_letter_body==''){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" You have must fill out <b>red box </b>!"); 
  }
   else if((sum1+sum2)!=result){
     $("#msg_failed").css({"display":"block","background-color":"#EE5269"}).fadeOut(8000).html(" Please write your <b> correct result </b>!");
	 $("#result").css("border-color", "#EE5269");
  }
  else
  {
    //AJAX code to submit form.
    $.ajax({
      type: "POST",
      url: "magazine_controller.php",
      data: dataString+'&action=save_data',
      cache: false,
      success: function(result)
      { 
        //alert(result);
        $("#msg_success").css({"display":"block","background-color":"#1E8A2B"}).fadeOut(8000).html(result); // message of html response after submiting data     
        $("#name").val('');
        $("#batch").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#about_post").val('');
        $("#txt_letter_body").val('');
        //default color of start mark
        //$("#txt_about_school_red").css("color","#555555" );
        //$("#txt_about_jbex_red").css("color","#555555" );
        show_datas(); // call list view function_
      }
    });
  }
  return false;
// });
//});
}

</script>
<style>
.footer2{
    width: 100%;
    float: left;
    background-color: #fff;
}
.text-right{
    color: grey;
}.text-right a{
    color: grey;
}
.simplenav a:hover{
    color: red;
}
.text-right{
    font-size: 15px;
}
.text-right a:hover{
    color:green;
}
</style>
</head>
<body id="main">
    <!-- Fixed navbar -->
   <div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
        <!-- Button for smallest screens -->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand" href="../index.php">
          <img style="height: auto; width: 80px;margin-top: -26px;" src="../assets/images/jblogo.png" alt="abdulkaiyum.com"></a>
      </div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right mainNav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../about.php">About jb-esa</a></li>
            <li><a href="../notice.php">notice</a></li>
            <li><a href="../image_gallery.php">Gallery</a></li>
            <li><a href="../videos.php">Video</a></li>
            <li><a href="../useful_link.php">Links and Credits</a></li>
            <li class="active"><a href="../contact.php">Contact</a></li>
            <!--<li><a href="sidebar-right.php">Right Sidebar</a></li>-->
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>Blog Write</h1>
                    <p>You can write your own stories!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">
            <h3>Write Your Blog</h3>
                <p>
                    
                    <main>
                       <!-- <textarea class="editor" id="txt_letter_body" name ="txt_letter_body">
                        
                        </textarea>  -->                   
                            <script>
                           /*  CKEDITOR.replace( 'txt_letter_body' , {
                              //extraPlugins: 'imageuploader', // this is for image upload pluging
                             
                            });*/
                            //var desc = CKEDITOR.instances['text_area_post'].getData();
                            </script>


  					<input type="text" id="txt_letter_body" name="txt_letter_body" />
                    </main>
                </p>
                <h3>Basic Info</h3>
                <p>
                   <form class="form-light mt-20" role="form">
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Batch Year</label>
                                        <input type="text" id="batch" name="batch" class="form-control" placeholder="Batch Year">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Blog Title/About Blog</label>
                                <input type="text"  id="about_post" name="about_post" class="form-control" placeholder="Subject">
                            </div>
                            <div class="row">
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <input type="text" id="sum1" name="sum1" class="form-control" value="<?php echo(rand(10,100)); ?>" readonly>
                                    </div>
                                </div> 
                                 <div style="width:20px;" class="col-md-1">
                                        +
                                </div> 
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <input type="text" id="sum2" name="sum2" class="form-control" value="<?php echo(rand(10,100)); ?>" readonly>
                                    </div>
                                </div>
                                 <div style="width:20px;" class="col-md-1">
                                       =
                                </div> 
                                 <div class="col-md-1">
                                    <div class="form-group">
                                       <input type="text" id="result" name="result" class="form-control" placeholder="Result" >
                                    </div>
                                </div>
                            </div>
                          
                            <button type="button" id="save" class="btn btn-two"  onClick="data_send();">Submit Post</button><p><br/></p>
                        </form>
                          <div class="col-md-12">
                            <p style="background-color:#f9f9f9;color:#fff; display:none; text-align: center;" id="msg_success"></p>
                            <p style="background-color:#f3f3f3;;color:#fff; display:none; text-align: center;" id="msg_failed"></p>
                          </div> 
                </p>
               
               <!-- <h3>Note</h3>-->
                <p>
                   <div class="alert alert-info">
                    <strong>Note!</strong> Your blog alwasys will be review and approve by authorized person after submit your post within 7 days.
                  </div>
                </p>
               <!--  <h3>Speech</h3>
                <p>
     
                </p>
                -->
            </section>
            <!-- /main -->

          

        </div>
    </section>
    <!-- /container -->
<div style="width: 100%; background-color: red;"">
 
   <footer id="footer">
 
    <div class="container">
   <div class="row">
  <div class="footerbottom">
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Developed by
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="http://abdulkaiyum.com/">
                <img class=" img-responsive" style="height: auto; width: 80px;" src="http://abdulkaiyum.com/publicProject/addResource/images/jbExProject/footer_developer.png">
              </a>
            </li>
           
            <li><a style="color: #007fc7" href="http://abdulkaiyum.com/">
                Moh'd Abdul Kaiyum / 08<sup>th</sup> Batch
              </a>
            </li>
            <li><a href="http://abdulkaiyum.com/">
               About Developer
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Planned and Moderated by
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li>
                <img class=" img-responsive" style="height: auto; width: 80px;" src="../assets/images/planer.png"> 
            </li>
            <li>
                Dr. Sakirul Islam / 08<sup>th</sup> Batch         
            </li>
          
            
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="footerwidget">
        <h4>
          Education and job related weblinks 
        </h4>
        <div class="menu-course">
          <ul class="menu">
            <li><a href="http://10minuteschool.com/">
                10 Minutes School
              </a>
            </li>
            <li> <a href="https://www.khanacademy.org/">
                Khan Academy
              </a>
            </li>
            <li><a href="https://www.youtube.com/user/crashcourse">
                Crash Course
              </a>
            </li>
            <li>
              <a href="http://examresultbd.com/">
                Exam Informations
              </a>
            </li>
             <li>
              <a href="http://www.bdjobs.com/">
                Job 
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6"> 
              <div class="footerwidget"> 
                         <h4>Contact</h4> 
                        <p>Here is our contact information. You can contact with us to get information about Association</p>
            <div class="contact-info"> 

                <?php
                      $result=mysql_query("select address,email,mobile_1,mobile_2 from contact_create where is_deleted=0 and status_active=1 order by id DESC");
                      while($data = mysql_fetch_assoc($result))
                      {
                      ?>
                      <i class="fa fa-map-marker"></i> <?php echo $data['address']; ?><br>
                      <i class="fa fa-phone"></i> <?php echo $data['mobile_1'];?> <br>
                      <i class="fa fa-phone"></i> <?php echo $data['mobile_2']; ?> <br>
                      <i class="fa fa-envelope-o"></i> <?php echo $data['email']; ?>
                <?php   
                      }   
                ?>
              </div> 
                </div><!-- end widget --> 
    </div>
  </div>
</div>
      <div class="social text-center">
        <!--<a href="#"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/groups/jbexstudentsassociation"><i class="fa fa-facebook"></i></a> -->
        
        <a href="https://www.facebook.com/groups/jbexstudentsassociation"><img style="height:auto; width: 40px;" src="../assets/images/fb.png"></a> 
        <a href="#"><img style="height:auto; width: 40px;" src="../assets/images/tw.png"></a>
        <!--<a href="#"><i class="fa fa-dribbble"></i></a>
        <a href="#"><i class="fa fa-flickr"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>-->
      </div>

      <div class="clear"></div>
      <!--CLEAR FLOATS-->
    </div>
    <div class="footer2">
      <div class="container">
        <div class="row">

          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="simplenav">
                <a href="index.php">HOME</a> | 
                <a href="student_list.php">BATCH PROFILE</a> |
                <a href="online_library.php">ONLINE LIBRARY</a> |
                <a href="videos.php">GALLERY</a> |
                <a href="videos.php">VIDEOS</a> |
                <a href="notice.php">NOTICE</a> |
                <a href="useful_link.php">WEB LINKS</a> |
                <a href="magazine_view.php">BLOG READ</a> |
                <a href="magazine/magazine.php">BLOG WRITE</a> |
                <a href="about.php">ABOUT JB ESA</a> |
                <a href="contact.php">CONTACT</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 panel">
            <div class="panel-body">
              <p class="text-right">
                Copyright &copy; <?php echo date('Y'); ?> . Developed by <a href="http://abdulkaiyum.com/" rel="develop">abdulkaiyum.com</a>
              </p>
            </div>
          </div>

        </div>
        <!-- /row of panels -->
      </div>
    </div>
  </footer>
	 
</div>

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script> var editor = CKEDITOR.replace('txt_letter_body');</script>
</body>
</html>
