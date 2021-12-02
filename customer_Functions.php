<?php

/*
    Visa alla user
*/

function getALLCustomers($conn){
  $query = "SELECT * FROM customer ORDER BY customerName ASC"
  $result = mysqli_query($conn, $query) or die ("Query failed")
    
  return $result;
 }

/*
    Hämta en kund
*/
function getCustomerData($conn, $customerId){
    $query ="SELECT * FROM customer
                      WHERE customerId=". $customerId;
    $result = mysqli_query($conn, $query) or die ("Query failed: $query");

    $row = mysqli_fetch_assoc($result);
    
    return $row;
}

/*
    spara kund
*/ 

/*
    uppdatera kund
*/
function updateCustomer($conn){
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $editId = $_POST['updateid'];
    
    $query = "UPDATE customer
    SET customerName='$name', customerEmail = '$email'
    WHERE customerID = "$editid";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}
/*
    Radera kund
*/

/*
    Utility function: Säkerhet HTML tecken
*/
function escapeInsert($conn, $insert){
    $insert = htmlspecialchars($insert);
    $insert = mysqli_real_escape_string($conn, $insert);

    return $insert;
}
?>
