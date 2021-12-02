<?php 

// Inkludera filer för databas och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php")
  
  // Skapa databas
$connection = dbConnect();

// Ska kund Skapas?
if(isset($_GET['isnew']) && $_GET['isnew']>0){
  $saveCustomer = saveCustomer($connection);
  header("Location: customer_read.php");
?>

<!DOCTYPE HTML>
<html lang='sv'>
   <head>
      <meta charset="utf-8"/>
     <title>Lägg till kund</title>
   </head>
   <body>
     <h1>Lägg till kund</h1>
      <form action="customer_create.php" method="post">
        <input type="hidden" name="isnew" id="isnew" value="1">
        <label>Namn</label>
        <p><input type="text" name="txtName" placeholder="Ditt namn"</input></p>
        <label>Email</label>
        <p><input type="email" name="txtEmail" placeholder="Din Email"</input></p>
        <label>password</label>
        <p><input type="password" name="txtPassword" placeholder="Välj lösenord"</input></p>
        <p><input type="submit" value="Välj"</input></p>
  </body>
</html>
