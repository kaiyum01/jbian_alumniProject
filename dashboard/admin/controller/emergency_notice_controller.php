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
//Notice: Undefined index: batch_cover_pic in E:\xamp-5.6\htdocs\JBex\dashboard\admin\controller\batch_create_controller.php on line 37
//Data save successfully 
//end session
include('../../include/common_function.php');
include('../../include/array_function.php');
include('../../include/message_function.php');
include('../../include/kaiyum_function.php');

if(isset($_FILES["file"]["type"]) && 
	isset($_POST['cbo_status']) && 
 	
 	//isset($_POST['save_btn']) 
 	//isset($_POST['update_btn']) && 
 	isset($_POST['update_pic']) &&
 	isset($_POST['update_id'])

	)
{
	$validextensions = array("jpeg", "jpg", "png", "JPG");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	$status2		=$_POST['cbo_status'];

	//$save_btn	=$_POST['save_btn'];
	//$update_btn	=$_POST['update_btn'];
	$update_pic	=$_POST['update_pic'];
	$update_id	=$_POST['update_id'];


	//if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	//) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
	//&& in_array($file_extension, $validextensions)) 
 	//2 	image_category 
	//3 	image_title 	
	//4 	image_path

	if ($update_id!="") 
	{ // update 1st condition
		if ($_FILES["file"]["name"]=="") {
					
			$sql_update= mysql_query("update emergency_notice_create SET status_active='$status2', update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$update_id'");
			if($sql_update==1)
			{
				echo "<span style='color:green;'>". $msg_update."</span";
			}
			else
			{
				echo $msg_update_fail;
			}
		}
		else
		{
			if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg")  || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
	) && in_array($file_extension, $validextensions)) 


	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}
		else
		{
			$update_pic_path='emergencyNoticePhoto/'.$update_pic;
			unlink($update_pic_path);
			if (file_exists("emergencyNoticePhoto/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
			else
			{
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "emergencyNoticePhoto/".$_FILES['file']['name']; // Target path where file is to be stored
			$sql_update= mysql_query("update emergency_notice_create SET status_active='$status2',emgrNotice_photo_link='$targetPath', update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$update_id'");
			//$query = mysql_query("insert into batch_create_mst(batch_name, 	batch_banner_pic,batch_reward,batch_title,insert_date,inserted_by) values ('$status2','$targetPath','$batchreward2','$titlename2','$insert_and_update_date','$login_session_user_id')");
			
		  	if($sql_update==1){
		  	//echo $msg_save;
			//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			echo "<span style='color:green;' id='success'>Updated Successfully...!!</span><br/>";
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

	} //end update 1st condtion
	
	else
	{

	//return batch 
	$return_batch=fnc_pickup_data_from_db_table("batch_name,batch_name","emergency_notice_create","is_deleted=0"); 
	$return_batch_arr=array();
	foreach($return_batch as $aa)
		{
			$return_batch_arr[$aa[0]] =$aa[1]; //$aa=['id'].
		}
	/*	if($return_batch_arr[$status2]==$status2)
		{
			echo " <span style='color:red;' id='invalid'><b>Duplicate Batch Found !</b></span> ";
			return;
		}
	*/
			if ($_FILES["file"]["name"]=="") // if photo no entry normally data inserted without picture or cover picture
			{
				$query = mysql_query("insert into emergency_notice_create(status_active,insert_date,inserted_by) values ('$status2','$insert_and_update_date','$login_session_user_id')");
				
			  	if($query==1){
			  	//echo $msg_save;
				//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
				//move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				echo "<span style='color:green;' id='success'>Data Save Successfully...!!</span><br/>";
				//echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
				//echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
				//echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				//echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] .$img_title.$targetPath. "<br>";
			  	}
			  	else{
			  		echo $msg_save_fail;
					//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
				  }
			}
			else // if without picture or cover picture
			{
				if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg")  || ($_FILES["file"]["type"] == "image/JPG") || ($_FILES["file"]["type"] == "image/jpeg")
				) && in_array($file_extension, $validextensions)) 


				{
					if ($_FILES["file"]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
					}
					else
					{
						if (file_exists("emergencyNoticePhoto/" . $_FILES["file"]["name"])) {
						echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
						}
						else
						{
						$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
						$targetPath = "emergencyNoticePhoto/".$_FILES['file']['name']; // Target path where file is to be stored
						$query = mysql_query("insert into emergency_notice_create(status_active,emgrNotice_photo_link,insert_date,inserted_by) values ('$status2','$targetPath','$insert_and_update_date','$login_session_user_id')");
						
					  	if($query==1){
					  	//echo $msg_save;
						//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
						move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
						echo "<span style='color:green;' id='success'>Data Save Successfully...!!</span><br/>";
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

			} //end else if withou picture or cover picture 

	
} // end else
	
}

// show list view action start here
if(isset($_GET['action'])){
	 $action_view_data= $_GET['action'];
	// echo $actions;
	if($action_view_data=="list_view")
	{
		
		$i=0;
		$result=mysql_query("select * from emergency_notice_create where is_deleted=0  order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th>sl</th>
			<th>Status</th>
			<th>Notice</th>	
			<th>Action</th>
		  </tr>
		</thead>
    <tbody>
    <?php
    while($data = mysql_fetch_row($result))
	{   
		$i++;
	?>
      <tr style="cursor: pointer;">
      	<td><?php echo $i; ?></td>
        <td><?php echo  $status[$data[3]]; ?></td>
        <td style="text-align: center;"><img style="height: auto;width: 120px;" src="controller/<?php
        if($data[2]=="")
        {
        	echo 'emergencyNoticePhoto/no-image.jpg';
        }
        else
        {
        	 echo  $data[2];
        }
         

         ?>" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></td>
        <td><span class="glyphicon glyphicon-edit" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | <span class="glyphicon glyphicon-trash" onclick="fnc_delete('<?php echo $data[0].'**'.$data[2]; ?>')";></span></td>
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
		$sql= mysql_query("select * from emergency_notice_create where id=$idd");
		while($result = mysql_fetch_assoc($sql)) {
			echo json_encode($result);
		}
		 
	 }
}

//-------------------
	// Delete action
if(isset($_POST['action'])){
	 $action_delete= $_POST['action'];//$_POST['action'];
	 if($action_delete=="delete_data_action")
	 {
		$delete_id=$_POST['delete_id'];
		$imagePath=$_POST['imagePath'];
		$sql_delete= mysql_query("update emergency_notice_create SET status_active=0, is_deleted=1,update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
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
// Search  list view  data table action start here
if(isset($_GET['action']) && isset($_GET['search_value1'])){
	 $action_search	= $_GET['action'];
	 $search_value2	= $_GET['search_value1'];//$_GET['search_value1'];
	  $search_value2 = trim($search_value2);
	// echo $actions;
	if($action_search=="search_list_view")
	{
		
		$i=0;
		$result=mysql_query("select * from emergency_notice_create where batch_name like '%$search_value2%' and is_deleted=0 order by id DESC");
		?>
		<table class="table table-hover scroll">
    <thead>
     <tr>
		<th>sl</th>
		<th>Status</th>
		<th>Notice</th>	
		<th>Action</th>
	  </tr>
    </thead>
    <tbody>
    <?php
    while($data = mysql_fetch_row($result))
	{   
		$i++;
	?>
       <tr style="cursor: pointer;">
      	<td><?php echo $i; ?></td>
        <td><?php echo $status[$data[3]]; ?></td>
        <td style="text-align: center;"><img style="height: auto;width: 120px;" src="controller/<?php
        if($data[2]=="")
        {
        	echo 'emergencyNoticePhoto/no-image.jpg';
        }
        else
        {
        	 echo  $data[2];
        }
         

         ?>" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></td>
        <td><span class="glyphicon glyphicon-edit" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | <span class="glyphicon glyphicon-trash" onclick="fnc_delete('<?php echo $data[0].'**'.$data[2]; ?>')";></span></td>
      </tr>
   <?php
  	}
  	?>
    </tbody>
  </table>
<?php
 	
	}
}

?>
