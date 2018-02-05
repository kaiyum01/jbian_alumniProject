<?php 
include('dashboard/include/db_connection.php');
include('dashboard/include/array_function.php');
include('dashboard/include/message_function.php');
include('dashboard/include/kaiyum_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Online Library</title>
  <?php
  include('head.php');
  ?>
  <link rel="stylesheet" href="assets/css/table_scroll.css">
</head>
<body>
    <!-- Fixed navbar -->
    <?php
    include('navbar.php');
    ?>
    <!-- /.navbar -->

 	<header id="head" class="secondary">
            <div class="container">
                    <h1>Dulal Zubayed Online Library</h1>
                    <p>
                     <select class="form-control" id="lib_cat" name="lib_cat" onChange="load_data();" style="margin: auto; width: 200px; padding: 10px; text-align: center; background-color: #f9f9f9; font-family: sans-serif; font-size: 15px; font-weight:bold;">
				    <option value="0">Select Category</option>
				     <?php
				      //return batch name 
				      $return_book_cat=fnc_pickup_data_from_db_table("id,book_category","online_lib_create","is_deleted=0 and status_active=1"); 
				      $return_book_cat_arr=array();
				      foreach($return_book_cat as $aa)
				        {
				          $return_book_cat_arr[$aa[0]] =$aa[1]; //$aa=['id'].
				        }
				        $return_book_cat_arr_unique=array_unique($return_book_cat_arr);
				          //echo $return_batch_mst_arr[2];
				        //print_r($return_batch_mst_arr);
				      foreach ($return_book_cat_arr_unique as $return_book_cat_arr_key => $return_book_cat_arr_name) {
				      ?><option value="<?php echo $return_book_cat_arr_name; ?>"> <?php echo $library_category_arr[$return_book_cat_arr_name]; ?>
				      </option> 
				      <?php
				      }
				      ?>
				  </select>
                    </p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-12 maincontent">   
               <div id="book_info">
                     <!-- load library data table -->
               </div>
            </section>
           <!-- <section style="width: 100%;">
              <div id="book_read">
              </div>
            </section>-->
            <!-- /main -->
        </div>
    </section>
    <!-- /container -->
    
  <?php
    include('footer.php');
    ?>
<script>

function load_data()
{
var lib_cat=$('#lib_cat').val()*1;
if (lib_cat!=0) {
	//alert(lib_cat);
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/online_library_controller.php",
			data:  'lib_cat=' + lib_cat +'&action=getdata',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#book_info").html(results);   
				//load_data_dtls();
			}
	});
}
		//});
 //});
}
/*function load_pdf(book_link)
{
//alert(book_link);
//var lib_cat=$('#lib_cat').val()*1;
if (book_link!="") {
	  $.ajax({    //create an ajax request to load_page.php
			type: "GET",
			url: "controller/online_library_controller.php",
			data:  'book_link=' + book_link +'&action=readbook',			
			dataType: "html",   //expect html to be returned   
			cache: false,				
			success: function(results){	
				 //alert (results['short_name']);
				$("#book_read").html(results);   
				//load_data_dtls();
			}
	});
}
		//});
 //});
}*/
</script>

    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
