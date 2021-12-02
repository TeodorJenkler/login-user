<?php

/*
    Visa alla user
*/

function getALLCustomers($conn){
  $query = "SELECT * FROM customer ORDER BY customerName ASC"
  $result = mysqli_query($conn, $query) or die ("Query failed")
    
  return $result;
 }
?>
