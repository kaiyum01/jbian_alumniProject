<?php 
// user status for user creation
$user_type=array(1=>"Super Admin",2=>"Admin",3=>"General");
$status=array(1=>"Active",2=>"Inactive");
$division_bd=array(1=>"Dhaka",2=>"Chittagong",3=>"Khulna",4=>"Rajshahi",5=>"Barisal",6=>"Sylhet",7=>"Rangpur",8=>"Mymensingh"); 
$production_status=array(1=>"Not Yet Started",2=>"On Going",3=>"Finish");
$bill_status=array(1=>"Not-Billed",2=>"Billed");
$page=array(0=>"Select page",1=>"Quotation",2=>"Order",3=>"Challan",4=>"Bill");
$notes_arr=array(1=>"Note 1",2=>"Note 2",3=>"Note 3");
$blood_group_arr=array(0=>"Select Blood Group",1=>"O+",2=>"A+",3=>"B+",4=>"AB+",5=>"O-",6=>"A-",7=>"B-",8=>"AB-",9=>"Don't Know");
$gender_arr=array(0=>"Select Gender",1=>"Male",2=>"Female");
$working_sector_arr=array(0=>"Select Working Sector",1=>"Engineering",2=>"Health",3=>"Business",4=>"Software Firm",5=>"Banking",6=>"Private Company",100=>"Other");

$library_category_arr = array(0 =>"Select Category",1 =>"Bangla books sorted by name of writter",2 =>"Comics ",3 =>"Religion and philosophy",4 =>"Enciclopedia",5 =>"Science and skill",6 =>"Interesting books",7 =>"Textbook",8 =>"Medical",9 =>"Computer Programming",10 =>"English literature",11 =>"Publication by JB family",100 =>"Other");


$video_category_arr = array(0 =>"Select Category",1 =>"30 years celebration of JB family",2 =>"Visual Album of Reunion 2014",3 =>"Video of Reunion 2014",4=>"Follow me to JB",100 =>"Others");

$image_category_arr = array(0 =>"Select Category",1 =>"School campus photography",2 =>"Old school views",3 =>"Cultural and national programmes 
",4=>"Teachers and officals",5=>"Grand reunion 2014",6=>"30 years celebration programme",100 =>"Others");

// auto increment year array
  $total_year=array();
  $year_start=1999;
  $date_end=date('Y');
  $total=$date_end-$year_start;
  //echo $total;
for ($i=0; $i <= $total;) { 
  $total_year[]= $year_start+$i++;
  //echo '<br>';
}

?>
















