<?php
// Establishing connection with server..
  $connection = mysql_connect("jbian.org", "userName", "dbpassword");

// Selecting Database 
  $db = mysql_select_db("dbName", $connection);
  
  
  //for bangla language save in database
   mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
  
  ?>