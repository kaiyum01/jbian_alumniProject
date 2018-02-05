<?php
//end session
include('../dashboard/include/kaiyum_function.php');
include('../dashboard/include/common_function.php');
include('../dashboard/include/array_function.php');
include('../dashboard/include/message_function.php');
include('../dashboard/include/db_connection.php');
// get address

if(isset($_GET['action'])){
	 $action_mst_data = $_GET['action'];
	 if($action_mst_data =="getdata")
	 {
		 
		$batch=$_GET['batch'];
		$sql= mysql_query("select * from batch_create_mst where is_deleted=0 and status_active=1 and batch_name=$batch order by id DESC");
		while($result = mysql_fetch_assoc($sql)) 
		{
			?>

		<header style="background: #181015 url(<?php 

			if($result['batch_banner_pic']!="")
			{
				echo 'dashboard/admin/controller/'.$result['batch_banner_pic']; 
			}
			else
			{
				echo 'dashboard/admin/controller/uploadBatchCover/batchProfile.jpg'; 
			}

		?>) no-repeat;height: 400px;" id="head_ex_student_cover" >
            <div style="opacity: 0.5; background-color: #000; width: 100%; height:100%;" class="container">
	            <h1>Batch Title: <?php echo $result['batch_title'].' ( ' . $result['batch_name'] . ' )'; ?></h1>
	            <p>Batch Reward:  <?php echo $result['batch_reward']; ?></p>
            </div>
    	</header>

<?php	
	 }

}
}
if(isset($_GET['action'])){
	 $action_dtls_data = $_GET['action'];
	 if($action_dtls_data =="getdata_dtls")
	 {
		 
		$batch=$_GET['batch'];		
		$sql_dtls= mysql_query("select * from batch_create_dtls where is_deleted=0 and status_active=1 and batch_name=$batch order by id DESC");
			 $i=0;
			 ?>
			 
			 <div class="table-responsive">          
					<table class="table  table-striped table-responsive">
					  <thead>
					    <tr>
					      <th>SL</th>
					      <th>Code</th>
					      <th>Full Name</th>
					      <th>Parents</th>
					      <th width="100px">DOB</th>
					      <th>Working Sector</th>
					      <th>Facebook</th>
					      <th>Blood Group</th>
					   	</tr>
					  </thead>
					  <tbody>
	 
	    <?php
	    while($data=mysql_fetch_assoc($sql_dtls))
		{   
			$i++;
		?>
			       <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td>
				      <?php
				      $serialNumber=$data['auto_generate_id'];
				      $serialNumber=explode("-", $serialNumber);
				       echo $serialNumber[0].'-'.extraZero($serialNumber[1]);//$data['auto_generate_id']; 
				       ?> 	
				       </td>
				      <td><?php echo $data['student_name']; ?></td>
				      <td><?php echo $data['parents']; ?></td>

				      <td><?php echo date("d-M", strtotime($data['dob'])); ?></td>
				      <td><?php echo $data['working_sector']; ?></td>				     
				      <td><a target="_blank" href="<?php echo $data['facebook_id']; ?>"><?php echo $data['facebook_id']; ?></a></td>
				      <td><?php if($data['blood_group']==0){ }else{ echo $blood_group_arr[$data['blood_group']]; } ?></td>
					</tr>
	   <?php
	  	}
	  	?>
			    </tbody>
			  </table>
			  </div>
<?php		 


}

}

// Search  list view  data table action start here
if(isset($_GET['action']) && isset($_GET['search_value1']) && isset($_GET['batch'])){
	 $action_search	= $_GET['action'];
	 $search_value2	= $_GET['search_value1'];//$_GET['search_value1'];
	 $batch	= $_GET['batch'];
	 $search_value2= trim($search_value2);
	// echo $actions;
	 if($batch!=0){ $batch_cond= "and batch_name=$batch";}else{$batch_cond="";}
	if($action_search=="search_list_view")
	{
		$i=0;

		//$sql_dtls=mysql_query("select * from batch_create_dtls where student_name like '%$search_value2%' and batch_name='$batch'  and is_deleted=0 and status_active=1 order by id DESC");
		$sql_dtls=mysql_query("select * from batch_create_dtls where student_name like '%$search_value2%' $batch_cond  and is_deleted=0 and status_active=1 order by id DESC");

		?>
<div class="table-responsive">          
					<table class="table  table-striped table-responsive">
					  <thead>
					    <tr>
					      <th>SL</th>
					      <th>Code</th>
					      <th>Full Name</th>
					      <th>Parents</th>
					      <th width="100px">DOB</th>
					      <th>Working Sector</th>
					      <th>Facebook</th>
					      <th>Blood Group</th>
					   </tr>
					  </thead>
					  <tbody>
	 
	    <?php
	    while($data=mysql_fetch_assoc($sql_dtls))
		{   
			$i++;
		?>
			       <tr>
				      <th scope="row"><?php echo $i; ?></th>
				      <td><?php echo $data['auto_generate_id']; ?></td>
				      <td><?php echo $data['student_name']; ?></td>
				      <td><?php echo $data['parents']; ?></td>
				      <td><?php echo date("d-M", strtotime($data['dob'])); ?></td>
				      <td><?php echo $data['working_sector']; ?></td>      
					  <td><a target="_blank" href="<?php echo $data['facebook_id']; ?>"><?php echo $data['facebook_id']; ?></a></td>
					   <td><?php if($data['blood_group']==0){ }else{ echo $blood_group_arr[$data['blood_group']]; } ?></td>
					</tr>
	   <?php
	  	}
	  	?>
			    </tbody>
			  </table>
			  </div>
<?php
 	
	}
}

if(isset($_GET['action'])){
	 $action_mst_data = $_GET['action'];
	 if($action_mst_data =="getdata_descp")
	 {
		 
		$batch=$_GET['batch'];
		$sql= mysql_query("select batch_desc from batch_create_mst where is_deleted=0 and status_active=1 and batch_name=$batch order by id DESC");
		while($result = mysql_fetch_assoc($sql)) 
		{
		

			if($result['batch_desc']!="")
			{
				echo "<h3>About this Batch</h3><div style='padding: 10px; background-color: #f9f9f9;'>".
		 		$result['batch_desc']. "</div>";
			}
			else
			{
				//echo 'no desc'; 
			}

		}
          
    	
	 }

}

if(isset($_GET['action'])){
	 $action_mst_data = $_GET['action'];
	 if($action_mst_data =="getdata_photos")
	 {
		 
		$batch=$_GET['batch'];
		$sql= mysql_query("select  batch_photo_link from batch_create_photo_dtls where is_deleted=0 and status_active=1 and batch_name=$batch order by id DESC");
	?>
		
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">Pictures</h3>
			<?php
			while($result = mysql_fetch_assoc($sql)) 
			{
				if ($result['batch_photo_link']=="") {
					echo "No Pictures";
					die;
				}
			?>
				<div class="col-md-4"><img class="img-thumbnail img-responsive" style="height: auto; width: 100%;" src="<?php echo 'dashboard/admin/controller/'.$result['batch_photo_link']; ?>"></div>
			<?php
			}
			?>
									
					</div> 
				</div> 
				
												
			</div>
			
			
	
  <?php        
    	
	 }

}
?>