<?php 
include('dashboard/include/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>JB-Ex | Useful Links</title>
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
                    <h1>Web Links and Credits</h1>
                    <p>Explore the world of web through some classic website!</p>
                </div>
    </header>


    <!-- container -->
    <section class="container">
        <div class="row">
            <!-- main content -->
            <section class="col-sm-8 maincontent">   
                <h3>URL List</h3>
                <p>
                     <div class="table-responsive">          
                    <table class="table  table-striped table-responsive table-hover scroll">
                      <thead>
                        <tr>
                          <th style="width: 10px;">SL</th>
                          <th style="width: 350px;">Title</th>
                          <th style="width: 500px;">URL</th>
                         
                       </tr>
                      </thead>
                      <tbody>
                     
                        <?php
                        $sql_dtls= mysql_query("select link_title,link_url from links_create where is_deleted=0 and status_active=1  order by id DESC");
                             $i=0;
                             
                        while($data=mysql_fetch_assoc($sql_dtls))
                        {   
                            $i++;
                        ?>
                                   <tr>
                                      <th scope="row" style="width: 10px;"><?php echo $i; ?></th>
                                      <td style="width: 350px;"><a href="<?php echo $data['link_url']; ?>"><?php echo $data['link_title']; ?></a></td>
                                      <td style="width: 500px;"><a href="<?php echo $data['link_url']; ?>"><?php echo $data['link_url']; ?></a></td>
                                     
                                    </tr>
                       <?php
                        }
                        ?>
                </tbody>
              </table>
              </div>
                </p>
               
            </section>
            <!-- /main -->

            <!-- Sidebar -->
            <aside class="col-sm-4 sidebar sidebar-right">

                <div class="panel">
                    <h4> To whom JB ESA is Thankful :</h4>
<pre style="white-space:pre-wrap;font-family: arial;">  
    @All Ex-Students of J. B. High School
    @J. B. High School Authority specially 
    *Babu Tusher Kanti Barua Sir 
    *Babu Suvash Sarkar Sir
    @J. B. High School Board of Directors 
    specially to Maksud Ahmed Chowdhury 
    
    @Notable Donors, sponsors and media partners
    in different programme :
    
    2014 reunion :
    @Clifton group 
    @Banglanews24.com
    @Lino's club, Chittagong 
    @Mohammad Morshed, JBian 2000
    @Omar Faruk , Jbian 2002
    @Amzad Hossain, Jbian 2000
    @Sorwar Morshes Sourov, Jbian 2003
    
    30 years celebration programme 2017 :
    @J.B. High School Authority 
    @Md.Saiful Islam , JBian 2001
    
    Furniture  Credit :
    @Anowarul Amin , Jbian 2008
</pre>
                <!--    <ul style="list-style-type:1" class="list-unstyled list-spaces">
                        <li>1. <a href=""> Name 1</a><br>
                            </li>
                        <li>2. <a href=""> Name 2</a><br>
                            </li>
                        <li>3. <a href=""> Name 3</a><br>
                          </li>
                        <li>4. <a href=""> Name 4</a><br>
                           </li>
                        <li>5. <a href=""> Name 5</a><br>
                           </li>
                        <li>6. <a href=""> Name 6</a><br>
                            </li>
                        <li>7. <a href=""> Name 7</a><br>
                            </li>
                        <li>8. <a href=""> Name 8</a><br>
                          </li>
                        <li>9. <a href=""> Name 9</a><br>
                           </li>
                        <li>10. <a href=""> Name 10</a><br>
                           </li>
                    </ul>-->
                </div>

            </aside>
            <!-- /Sidebar -->

        </div>
    </section>
    <!-- /container -->
    
  <?php
    include('footer.php');
    ?>


    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
