<?php
 /*
  visar alla kunder
 */

// Inkludera filer för databas och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php")
  
  // Skapa databas
$connection = dbConnect();

// Visa alla kunder
$allCustomers = getALLCustomers($connection);
?>
<html lang="sv">
  <head>
    <meta charset="utf-8"/>
    <title>Kunder</title>
  </head>
</html>
