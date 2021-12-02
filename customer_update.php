<?php 

// Inkludera filer för databas och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php")
  
  // Skapa databas
$connection = dbConnect();

// Ska kund ändras?

if(isset($_GET['editid']) && $_GET['editid']>0){
  $customerData = 
}
?>

<!DOCTYPE HTML>
<html lang='sv'>
   <head>
      <meta charset="utf-8"/>
   </head>
   <body>
     <h1>Updattera kund</h1>
     
     <form action="customer_update.php" mehtod="post">
        <input type="hidden name="updateid" value="<?php echo $customerData['customerID']; ?>">
        
   </body>
