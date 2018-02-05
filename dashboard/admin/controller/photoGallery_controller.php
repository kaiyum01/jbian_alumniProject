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


if(isset($_FILES["file"]["type"]) && 
	isset($_POST["img_title"]) && 
	isset($_POST["cbo_image_cat_name"])
	)
{
	$validextensions = array("jpeg", "jpg", "png", "JPG");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	$img_title		=mysql_escape_string($_POST['img_title']);
	$cbo_image_cat_name =$_POST['cbo_image_cat_name'];

	//if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	//) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
	//&& in_array($file_extension, $validextensions)) 
 	//2 	image_category 
	//3 	image_title 	
	//4 	image_path




	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg")  || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
	) && in_array($file_extension, $validextensions)) 


	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}
		else
		{
			if (file_exists("upload/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
			else
			{
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored

			$query = mysql_query("insert into image_gallery(image_category,image_title,image_path,insert_date,inserted_by) values ('$cbo_image_cat_name','$img_title','$targetPath','$insert_and_update_date','$login_session_user_id')");
			mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

		  	if($query==1){
		  	//echo $msg_save;
			//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			echo "<span style='color:green;' id='success'>Date Save Successfully...!!</span><br/>";
			echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
			//echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
			echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] .$img_title.$targetPath. "<br>";
		  	}
		  	else{
		  		echo $msg_save_fail;
				//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
			  }


			
			}
		}
	}
	else
	{
	echo "<span id='invalid'>***Invalid file Size or Type***<span>";
	}
}
// show list view action start here
if(isset($_GET['action'])){
	 $action_view_data= $_GET['action'];
	// echo $actions;
	if($action_view_data=="list_view")
	{
		$i=0;
		$result=mysql_query("select * from image_gallery where is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th style="width: 30px;">sl</th>
			<th style="width: 550px; text-align: center;">Category</th>
			<th style="width: 550px; text-align: center;">Title</th>
			<th style="width: 150px; text-align: center;">Picture</th>	
			<th style="text-align: center;">Action</th>
		  </tr>
		</thead>
    <tbody>
    <?php
    while($data = mysql_fetch_row($result))
	{   
		$i++;
	?>
      <tr style="cursor: pointer;">
      	<td style="width: 30px;"><?php echo $i; ?></td>
        <td style="width: 550px; text-align: center;"><?php echo  $image_category_arr[$data[1]]; ?></td>
        <td style="width: 550px; text-align: center;"><?php echo  $data[2]; ?></td>
        <td style="width: 250px; text-align: center;"><img style="height: auto;width: 50px;" src="controller/<?php echo  $data[3]; ?>" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></td>
        <td style="text-align: center;"><!--<span class="glyphicon glyphicon-picture" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | --><span class="glyphicon glyphicon-trash" onclick="fnc_delete('<?php echo $data[0].'**'.$data[3]; ?>')";></span></td>
      </tr>
   <?php
  	}
  	?>
    </tbody>
  </table>
<?php
 	
	}
}
// Search  list view  data table action start here
if(isset($_GET['action']) && isset($_GET['search_value1'])){
	 $action_search	= $_GET['action'];
	 $search_value2	= $_GET['search_value1'];//$_GET['search_value1'];
	  $search_value2 = trim($search_value2);
	// echo $actions;
	if($action_search=="search_list_view")
	{
		$i=0;
		$result=mysql_query("select * from image_gallery where image_title like '%$search_value2%' and is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th style="width: 30px;">sl</th>
			<th style="width: 550px; text-align: center;">Category</th>
			<th style="width: 550px; text-align: center;">Title</th>
			<th style="width: 150px; text-align: center;">Picture</th>	
			<th style="text-align: center;">Action</th>
		  </tr>
		</thead>
    <tbody>
    <?php
    while($data = mysql_fetch_row($result))
	{   
		$i++;
	?>
      <tr style="cursor: pointer;">
      	<td style="width: 30px;"><?php echo $i; ?></td>
        <td style="width: 550px; text-align: center;"><?php echo  $image_category_arr[$data[1]]; ?></td>
        <td style="width: 550px; text-align: center;"><?php echo  $data[2]; ?></td>
        <td style="width: 250px; text-align: center;"><img style="height: auto;width: 50px;" src="controller/<?php echo  $data[3]; ?>" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></td>
        <td style="text-align: center;"><!--<span class="glyphicon glyphicon-picture" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | --><span class="glyphicon glyphicon-trash" onclick="fnc_delete('<?php echo $data[0].'**'.$data[3]; ?>')";></span></td>
      </tr>
   <?php
  	}
  	?>
    </tbody>
  </table>
<?php
 	
	}
}

// Get data from database and populate data to form for update
if(isset($_GET['action'])){
	 $action_data_populate_to_form = $_GET['action'];
	 if($action_data_populate_to_form =="getdata")
	 {
		 
		$idd=$_GET['idd'];
		$sql= mysql_query("select * from image_gallery where id=$idd");
		while($result = mysql_fetch_assoc($sql)) {
			echo json_encode($result);
		}
		 
	 }
}

// Delete action
if(isset($_POST['action'])){
	 $action_delete= $_POST['action'];//$_POST['action'];
	 if($action_delete=="delete_data_action")
	 {
		$delete_id=$_POST['delete_id'];
		$imagePath=$_POST['imagePath'];
		//$delete_id=explode('**',$delete_id);
		//$id=$delete_id[0];
		//$image_link=$delete_id[1];
		
		$sql_delete= mysql_query("update image_gallery SET status_active=0, is_deleted=1,update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
		if($sql_delete==1)
		{
			echo $msg_delete;
			unlink($imagePath);
		}
		else
		{
			echo $msg_delete_fail;
		}
	 }
}
?>
