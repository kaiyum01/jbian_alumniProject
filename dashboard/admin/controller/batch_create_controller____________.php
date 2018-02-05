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

//action=save_data,Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['batchname1']) && 
 	isset($_POST['batchcoverpic1']) && 
 	isset($_POST['titlename1']) &&
 	//isset($_FILES["batchcoverpic1"]["type"]) &&
 	isset($_POST['batchreward1'])
 	//isset($_POST['contact1'])
 	){
	$action_save		=$_POST['action'];
	$batchname2		=$_POST['batchname1'];
	$batchcoverpic2	=$_POST['batchcoverpic1'];
	$batchreward2		=$_POST['batchreward1'];
	$titlename2		=$_POST['titlename1'];
	//$name = $_FILES['batch_cover_pic']['name'];
	//$size = $_FILES['batch_cover_pic']['size'];
	//$displayImg = $_FILES['//'];

	if($action_save=="save_data")
	{
	  	$query = mysql_query("insert into batch_create_mst(batch_name, 	batch_banner_pic,batch_reward,batch_title,insert_date,inserted_by) values ('$batchname2','$batchcoverpic2','$batchreward2','$titlename2','$insert_and_update_date','$login_session_user_id')");
	  	if($query==1){
	  	echo $msg_save.$size;
		//echo "<h4>Success:</h4> You have created <b>user successfully</b>!";
	  	}
	  	else{
	  		echo $msg_save_fail;
			//echo "<h4>Failed:</h4> You have not created <b>user</b>!";
		  }
	}
}

// show list view action start here
if(isset($_GET['action'])){
	 $action_view_data= $_GET['action'];
	// echo $actions;
	if($action_view_data=="list_view")
	{
		$i=0;
		$result=mysql_query("select * from batch_create_mst where is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th>sl</th>
			<th>Batch name</th>
			<th>Cover photo</th>
			<th>Reward</th>		
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
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td><?php echo $data[3]; ?></td>
        <td><span class="glyphicon glyphicon-edit" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | <span class="glyphicon glyphicon-trash" onclick="fnc_delete(<?php echo $data[0]; ?>)";></span></td>
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
		$sql= mysql_query("select * from batch_create_mst where id=$idd");
		while($result = mysql_fetch_assoc($sql)) {
			echo json_encode($result);
		}
		 
	 }
}
//Update data
//Fetching Values from URL
if(	isset($_POST['action']) &&
 	isset($_POST['batchname1']) && 
 	isset($_POST['batchcoverpic1']) && 
 	isset($_POST['batchreward1']) && 
 	isset($_POST['titlename1']) && 
	isset($_POST['update_id1'])   
 	//isset($_POST['contact1'])
 	){
	$action_update	=$_POST['action'];
	$batchname2		=$_POST['batchname1'];
	$batchcoverpic2	=$_POST['batchcoverpic1'];
	$batchreward2	=$_POST['batchreward1'];
	$titlename2		=$_POST['titlename1'];  
	$update_id2		=$_POST['update_id1'];
	
	if($action_update=="update_data")
	{	
	//update query 
	  $query_update = mysql_query("update batch_create_mst SET batch_name='$batchname2', batch_banner_pic='$batchcoverpic2', batch_reward='$batchreward2', batch_title='$titlename2',update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$update_id2'");
	  if($query_update==1){
	  	echo $msg_update;
		//echo "<h4>Success:</h4> Data update <b>user successfully</b>!";
	  }
	  else{
	  		echo $msg_update_fail;
			//echo "<h4>Failed:</h4> data update <b>field</b>!";
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
		$sql_delete= mysql_query("update batch_create_mst SET status_active=0, is_deleted=1,update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
		if($sql_delete==1)
		{
			echo $msg_delete;
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
		$result=mysql_query("select * from batch_create_mst where batch_name like '%$search_value2%' and is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
    <thead>
     <tr>
		<th>sl</th>
		<th>Batch name</th>
		<th>Cover photo</th>
		<th>Reward</th>		
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
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td><?php echo $data[3]; ?></td>
        <td><span class="glyphicon glyphicon-edit" onclick="get_data_from_list(<?php echo $data[0]; ?>)";></span> | <span class="glyphicon glyphicon-trash" onclick="fnc_delete(<?php echo $data[0]; ?>)";></span></td>
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



<?php
if(isset($_FILES["file"]["type"])  && isset($_POST["textt"]))
{
	$validextensions = array("jpeg", "jpg", "png");
	$temporary = explode(".", $_FILES["file"]["name"]);
	$file_extension = end($temporary);
	if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
	) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
	&& in_array($file_extension, $validextensions)) 
	{
		if ($_FILES["file"]["error"] > 0)
		{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}
		else
		{
			if (file_exists("../upload/" . $_FILES["file"]["name"])) 
			{
				echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
			else
			{
				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = "../upload/".$_FILES['file']['name']; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
				echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
				echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
				echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
				echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
			}
		}
	}
	else
	{
		echo "<span id='invalid'>***Invalid file Size or Type***<span>";
	}
}
?>