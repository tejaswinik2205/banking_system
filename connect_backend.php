<?php
  
  $sql_host = "localhost";
  $sql_username = "root";
  $sql_password = '';
  $sql_database="banking_sys";
  
  // Create connection
  $conn = new mysqli($sql_host, $sql_username, $sql_password, $sql_database);
  
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
   
  ?>

