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
 	isset($_POST['link_title1']) && 
 	isset($_POST['link_url1'])
 	//isset($_POST['contact1'])
 	){
	$action_save		=$_POST['action'];
	$link_title2		=mysql_escape_string($_POST['link_title1']);
	$link_url2			=mysql_escape_string($_POST['link_url1']);
	
	if($action_save=="save_data")
	{
	  	$query = mysql_query("insert into links_create(link_title, 	link_url,insert_date,inserted_by) values ('$link_title2','$link_url2','$insert_and_update_date','$login_session_user_id')");
		
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
		$i=0;
		$result=mysql_query("select * from links_create where is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
		<thead>
		  <tr>
			<th style="width: 30px;">sl</th>
			<th style="width: 650px; text-align: center;">link</th>	
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
      	<td style="width: 30px;"><?php echo $i; ?></td>
        <td style="width: 650px; text-align: center;"><a href="<?php echo $data[2]; ?>" rel="develop" target="_blank"><?php echo $data[1]; ?></a></td>
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
		$sql= mysql_query("select * from links_create where id=$idd");
		while($result = mysql_fetch_assoc($sql)) {
			echo json_encode($result);
		}
		 
	 }
}
//Update data
//Fetching Values from URL
if(	isset($_POST['action']) &&
	isset($_POST['link_title1']) && 
 	isset($_POST['link_url1']) && 
 	isset($_POST['update_id1'])  
 	//isset($_POST['contact1'])
 	){
	$action_update		=$_POST['action'];
	$link_title2		=mysql_escape_string($_POST['link_title1']);
	$link_url2			=mysql_escape_string($_POST['link_url1']);
	$update_id2			=$_POST['update_id1'];

	if($action_update=="update_data")
	{	
	//update query 
	  $query_update = mysql_query("update links_create SET link_title='$link_title2', link_url='$link_url2',update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$update_id2'");
	  
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
		$sql_delete= mysql_query("update links_create SET status_active=0, is_deleted=1,update_date='$insert_and_update_date',updated_by='$login_session_user_id' where id='$delete_id'");
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
		$result=mysql_query("select * from links_create where link_title like '%$search_value2%' and is_deleted=0 and status_active=1 order by id DESC");
		?>
		<table class="table table-hover scroll">
    <thead>
     <tr>
		<th style="width: 30px;">sl</th>
		<th style="width: 650px; text-align: center;">link</th>	
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
      	<td style="width: 30px;"><?php echo $i; ?></td>
        <td style="width: 650px; text-align: center;"><a href="<?php echo $data[2]; ?>" rel="develop" target="_blank"><?php echo $data[1]; ?></a></td>
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