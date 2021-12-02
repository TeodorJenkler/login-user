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
function saveCustomer($conn){
    $date = date("Y.m.d H:i:s");
    $name = escapeInsert($conn, $_POST['txtName']);
    $email = escapeInsert($conn, $_POST['txtEmail']);
    $password = escapeInsert($conn, $_POST['txtPassword']);
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO customer
                (customerName, CustomerEmail, customerPassword, customerDate)
                VALUES('$name', '$email', '$passwordHash', '$date');
    $result = mysqli_query($conn, $query) or die ("Query failed $query");
    $insId = mysqli_insert_id($conn);
    
    return $insId
}
/*
    uppdatera kund
*/
function updateCustomer($conn){
    $name = escapeInsert($conn, $_POST['txtName']);
    $email = escapeInsert($conn, $_POST['txtEmail']);
    $editId = $_POST['updateid'];
    
    $query = "UPDATE customer
    SET customerName='$name', customerEmail = '$email'
    WHERE customerID = "$editid";

    $result = mysqli_query($conn, $query) or die("Query failed: $query");
}
/*
    Radera kund
*/

function deleteCustomer($conn, $customerId){
    $query = "DELETE FROM customer WHERE customerId=". $customerId;
    $result= mysqli_query($conn, $query) or die ("Query failed: $query");
}
/*
    Utility function: Säkerhet HTML tecken
*/

function escapeInsert($conn, $insert){
    $insert = htmlspecialchars($insert);
    $insert = mysqli_real_escape_string($conn, $insert);

    return $insert;
}
?>
