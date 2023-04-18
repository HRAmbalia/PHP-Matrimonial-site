<?php
  $conn =  mysqli_connect("localhot","root","1234","matrimony");
  if($conn->connect_error) {   
    die("Connection Faile!".$conn->connect_error);
  }
?>