<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Students List</title>
  <?php
  include('head.php');
  ?>

<style type="text/css">
  pre {
    background-color: #fff;
    border: none;
    white-space:pre-wrap;
    font-family:'Lato', sans-serif;
    font-weight: normal;
    color: #6E6E6E;
    font-size: 16px;
  }
</style>

</head>
<body>
	<!-- Fixed navbar -->
	<?php
	include('navbar.php');
	?>
	<!-- /.navbar -->

		<header id="head" class="secondary">
            <div class="container">
	            <h1>SSC School Year</h1>
	            <p>	            			 
				  <select class="form-control" id="batch" name="batch" onChange="load_data();" style="margin: auto; width: 200px; padding: 10px; text-align: center; background-color: #f9f9f9; font-family: sans-serif; font-size: 15px; font-weight:bold;">
				    <option value="0">Select Batch</option>
				     <?php
				      //return batch name 
				      $return_batch_mst=fnc_pickup_data_from_db_table("id,batch_name","batch_create_mst","is_deleted=0 and status_active=1"); 
				      $return_batch_mst_arr=array();
				      foreach($return_batch_mst as $aa)
				        {
				          $return_batch_mst_arr[$aa[0]] =$aa[1]; //$aa=['id'].
				        }
				          //echo $return_batch_mst_arr[2];
				        //print_r($return_batch_mst_arr);
				      foreach ($return_batch_mst_arr as $return_batch_mst_arr_key => $return_batch_mst_arr_name) {
				      ?><option value="<?php echo $return_batch_mst_arr_name; ?>" <?php /*?><?php if( $imvalue==$updata['Timportancy'])  echo "selected"; ?> <?php */?>><?php echo $return_batch_mst_arr_name; ?>
				      </option> 
				      <?php
				      }
				      ?>
				  </select>
				
	            </p>

            </div>
    	</header>
    	<div id="batch_basic_info">
    	</div>



	<!-- container -->
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="section-title">Search JBian Ex Student</h3>
				<p>
				<input style="width: 210px; border-style: double;" type="text" id="search"  placeholder="Search by Name" onKeyUp="fnc_search();">
				</p>
				<div id="data_table_container">
				
				</div>
				
			</div>
			
		</div>
	</div>
	<!-- images  -->

	<div id="batch_photos"> <!-- photos  div -->
	</div>
	<div style="margin-left: 22px;" id="batch_description"> <!-- description  div -->
		
	</div> 

	<!-- /container -->
	<?php
	include('footer.php');
	?>
<script>

function load_data()
{
var batch=$('#batch').val()*1;
if (batch!=0) {
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/student_list_controller.php",
			data:  'batch=' + batch +'&action=getdata',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#batch_basic_info").html(results); 
				  
				 
				load_data_dtls();
				load_batch_description();
				load_batch_photos();
			}
	});
}
		//});
 //});
}
function load_batch_description()
{
var batch=$('#batch').val()*1;
if (batch!=0) {
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/student_list_controller.php",
			data:  'batch=' + batch +'&action=getdata_descp',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#batch_description").html(results); 

			}
	});
}
		//});
 //});
}

function load_data_dtls()
{
var batch=$('#batch').val()*1;
if (batch!=0) {
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/student_list_controller.php",
			data:  'batch=' + batch +'&action=getdata_dtls',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#data_table_container").html(results);   

			}
	});
}
		//});
 //});
}
function load_batch_photos()
{
var batch=$('#batch').val()*1;
if (batch!=0) {
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/student_list_controller.php",
			data:  'batch=' + batch +'&action=getdata_photos',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#batch_photos").html(results); 

			}
	});
}
		//});
 //});
}

//Search Function
function fnc_search(){
 var search_value= $("#search").val();
 var batch=$('#batch').val()*1;
 /*if (batch==0) 
 {
 	alert("Please Select Batch");
 	load_data(); 
 	return;
 } */

	 if(search_value==''){
		load_data(); 
	 }
	 else{
	 search_data_table(search_value,batch);
	 }
}
//Search data table ajax function
function search_data_table(search_value,batch){
	// $(document).ready(function() {
		//$("#display").click(function() {                
		//alert('sdf');
		//alert(search_value); return;
			$.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/student_list_controller.php",
			//data:  'batch=' + batch +'&action=getdata_dtls', '&notename1='+ notename
			data: 'search_value1='+search_value + '&action=search_list_view' +'&batch='+ batch,
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(response){							
			$("#data_table_container").html(response);					
				//alert(response);
			}
			});
		//});
	// });
}
</script>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>
