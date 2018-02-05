<?php
include('../dashboard/include/kaiyum_function.php');
include('../dashboard/include/common_function.php');
include('../dashboard/include/array_function.php');
include('../dashboard/include/message_function.php');
include('../dashboard/include/db_connection.php');

if(isset($_GET['action'])){
	 $action_mst_data = $_GET['action'];
	 if($action_mst_data =="getdata")
	 {
		$lib_cat=$_GET['lib_cat'];
		$sql= mysql_query("select book_link_title,book_link_url,book_category,book_description from online_lib_create where is_deleted=0 and status_active=1 and book_category=$lib_cat order by id ASC");
		 $i=0;
	?>
    	
		 <h3>Book List</h3>
	    <p>
		<div class="table-responsive">          
            <table class="table  table-striped table-responsive table-hover scroll">
              <thead>
                <tr>
                  <th style="width: 10px;">SL</th>
                  <th style="width: 150px;">Title</th>
                 <!-- <th style="width: 500px;">Category</th> -->
                  <th style="width: 85%;">Description</th>
                 
               </tr>
              </thead>
              <tbody>
             
               <?php
				while($result = mysql_fetch_assoc($sql)) 
				{
                    $i++;
                ?>
                           <tr>
                              <th scope="row" style="width: 10px;"><?php echo $i; ?></th>
                              <td style="width: 150px;"><a href="<?php echo $result['book_link_url']; ?>" target="_blank"><?php echo $result['book_link_title']; ?></a></td>
                             <!-- <td style="width: 500px;"><?php //echo $library_category_arr[$result['book_category']]; ?></td> -->
                              <td style="width: 85%;"><?php echo $result['book_description']; ?></td>
                            </tr>
               <?php
                }
                ?>
        </tbody>
      </table>
	</div>
    </p>
<?php		 
}
}

/*if(isset($_GET['action'])){
	 $action_data = $_GET['action'];
	 if($action_data =="readbook")
	 {
		$book_link=$_GET['book_link'];
	?>
    	
			<iframe src="<?php echo $book_link; ?>" width="100%" height="30"
                style="height:50.8em" scrolling="no"
                marginwidth="0" marginheight="0">
                </iframe>
               <!-- <br>
                <iframe src="http://www.axmag.com/download/pdfurl-guide.pdf" width="100%" height="60"
                style="height:50em"
                marginwidth="0" marginheight="0">
              </iframe>-->

<?php		 
}
}
*/

		


/*
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
					      <th>DOB</th>
					      <th>Working Sector</th>
					       	<th>Blood Group</th>
					       <th>Gender</th>
					       <th>Email</th>
					       <th>Mobile</th>
					       <th>Facebook</th>
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
				      <td><?php echo $data['dob']; ?></td>
				      <td><?php echo $working_sector_arr[$data['working_sector']]; ?></td>
				      <td><?php echo $blood_group_arr[$data['blood_group']]; ?></td>
				      <td><?php echo $gender_arr[$data['gender']]; ?></td>
				      <td><?php echo $data['email']; ?></td>
				      <td><?php echo $data['mobile']; ?></td>
				      <td><?php echo $data['facebook_id']; ?></td>

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
*/
// Search  list view  data table action start here

/*if(isset($_GET['action']) && isset($_GET['search_value1']) && isset($_GET['batch'])){
	 $action_search	= $_GET['action'];
	 $search_value2	= $_GET['search_value1'];//$_GET['search_value1'];
	 $batch	= $_GET['batch'];
	 $search_value2= trim($search_value2);
	// echo $actions;
	if($action_search=="search_list_view")
	{
		$i=0;

		$sql_dtls=mysql_query("select * from batch_create_dtls where student_name like '%$search_value2%' and batch_name='$batch'  and is_deleted=0 and status_active=1 order by id DESC");
		?>
<div class="table-responsive">          
					<table class="table  table-striped table-responsive">
					  <thead>
					    <tr>
					      <th>SL</th>
					      <th>Code</th>
					      <th>Full Name</th>
					      <th>DOB</th>
					      <th>Working Sector</th>
					       	<th>Blood Group</th>
					       <th>Gender</th>
					       <th>Email</th>
					       <th>Mobile</th>
					       <th>Facebook</th>
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
				      <td><?php echo $data['dob']; ?></td>
				      <td><?php echo $working_sector_arr[$data['working_sector']]; ?></td>
				      <td><?php echo $blood_group_arr[$data['blood_group']]; ?></td>
				      <td><?php echo $gender_arr[$data['gender']]; ?></td>
				      <td><?php echo $data['email']; ?></td>
				      <td><?php echo $data['mobile']; ?></td>
				      <td><?php echo $data['facebook_id']; ?></td>

					</tr>
	   <?php
	  	}
	  	?>
			    </tbody>
			  </table>
			  </div>
<?php
 	
	}
}*/
?>