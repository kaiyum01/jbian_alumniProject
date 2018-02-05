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
$login_session_batch 		=$row['batch_name'];
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
 	isset($_POST['studentname1']) && 
 	isset($_POST['batchname1']) && 
 	isset($_POST['dob1'])&&
	isset($_POST['workingsector1']) &&
	isset($_POST['bloodgroup1']) && 
 	isset($_POST['gender1']) && 
 	isset($_POST['studentmail1'])&&
	isset($_POST['mobile1']) &&
	isset($_POST['facebook1']) &&
	isset($_POST['parents1'])
 	//isset($_POST['contact1'])
 	){
	$action_save		=$_POST['action'];
	$studentname2		=mysql_escape_string($_POST['studentname1']);
	$batchname2			=$_POST['batchname1'];
	$dob2				=$_POST['dob1'];
	$workingsector2		=mysql_escape_string($_POST['workingsector1']);
	$bloodgroup2		=$_POST['bloodgroup1'];
	$gender2			=$_POST['gender1'];
	$studentmail2		=mysql_escape_string($_POST['studentmail1']);
	$mobile2			=mysql_escape_string($_POST['mobile1']);
	$facebook2			=mysql_escape_string($_POST['facebook1']);
	$parents2			=mysql_escape_string($_POST['parents1']);

//generate auto student id batch+auto increment id
	
  	$student_number_generate=return_next_id("id", "batch_create_dtls", "1");
  	$student_number_generate=$batchname2.'-'.$student_number_generate;


	if($action_save=="save_data")
	{
	  	$query = mysql_query("insert into batch_create_dtls(auto_generate_id,student_name,batch_name,dob,working_sector,blood_group,gender,email,mobile,facebook_id,parents,insert_date,inserted_by) values ('$student_number_generate','$studentname2','$batchname2','$dob2','$workingsector2','$bloodgroup2','$gender2','$studentmail2','$mobile2','$facebook2','$parents2','$insert_and_update_date','$login_session_user_id')");
		
		mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

	  	if($query==1){
	  	echo $msg_save;
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
		if ($login_session_usertype!=1) { $batchNameCond= "and batch_name=$login_session_batch";} else{ $batchNameCond="";}
		$i=0;
		$result=mysql_query("select * from batch_create_dtls where is_deleted=0 and status_active=1 $batchNameCond order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th>sl</th>
			<th>code</th>
			<th>name</th>
			<th>batch</th>		
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
		$sql= mysql_query("select * from batch_create_dtls where id=$idd");
		while($result = mysql_fetch_assoc($sql)) {
			echo json_encode($result);
		}
		 
	 }
}
//Update data
//Fetching Values from URL
if(	isset($_POST['action']) &&
	isset($_POST['studentname1']) && 
 	isset($_POST['batchname1']) && 
 	isset($_POST['dob1'])&&
	isset($_POST['workingsector1']) &&
	isset($_POST['bloodgroup1']) && 
 	isset($_POST['gender1']) && 
 	isset($_POST['studentmail1'])&&
	isset($_POST['mobile1']) &&
	isset($_POST['facebook1']) &&  
	isset($_POST['parents1']) &&
	isset($_POST['update_id1']) 
 	//isset($_POST['contact1'])
 	){
	$action_update		=$_POST['action'];
	$studentname2		=mysql_escape_string($_POST['studentname1']);
	$batchname2			=$_POST['batchname1'];
	$dob2				=$_POST['dob1'];
	$workingsector2		=mysql_escape_string($_POST['workingsector1']);
	$bloodgroup2		=$_POST['bloodgroup1'];
	$gender2			=$_POST['gender1'];
	$studentmail2		=mysql_escape_string($_POST['studentmail1']);
	$mobile2			=mysql_escape_string($_POST['mobile1']);
	$facebook2			=mysql_escape_string($_POST['facebook1']);
	$parents2			=mysql_escape_string($_POST['parents1']);
	$update_id2			=$_POST['update_id1'];
	
	if($action_update=="update_data")
	{
	//update query 
	  $query_update = mysql_query("update batch_create_dtls SET student_name='$studentname2', batch_name='$batchname2', dob='$dob2', working_sector='$workingsector2', blood_group='$bloodgroup2', email='$studentmail2', mobile='$mobile2', facebook_id='$facebook2', parents='$parents2',update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$update_id2'");
	  
	  mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

	 
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
		$sql_delete= mysql_query("update batch_create_dtls SET status_active=0, is_deleted=1,update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
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
		if ($login_session_usertype!=1) { $batchNameCond= "and batch_name=$login_session_batch";} else{ $batchNameCond="";}
		$i=0;
		$result=mysql_query("select * from batch_create_dtls where student_name like '%$search_value2%' and is_deleted=0 and status_active=1 $batchNameCond order by id DESC");
		?>
		<table class="table table-hover scroll">
    <thead>
      <tr>
      	<th>sl</th>
		<th>code</th>
		<th>name</th>
		<th>batch</th>
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
