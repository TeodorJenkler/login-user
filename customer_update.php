<?php 

session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "ok"){
  header("Location: index.php");
}

// Inkludera filer för databas och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php")
  
  // Skapa databas
$connection = dbConnect();

// Ska kund ändras?

if(isset($_GET['editid']) && $_GET['editid']>0){
  $customerData = getCustomerData($connection, $_GET['editid']);
}
// ska kunden uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid']>0)
  updateCustomer($connection);

  header("Location: customer_update.php?editid=". $_POST['updateid']);
?>

<!DOCTYPE HTML>
<html lang='sv'>
   <head>
      <meta charset="utf-8"/>
   </head>
   <body>
     <h1>Updattera kund</h1>
     
     <form action="customer_update.php" mehtod="post">
        <input type="hidden" name="updateid" value="<?php echo $customerData['customerID']; ?>">
        
        <label>Namn</label>
        <p><input type="text" name="txtName" value="<?php echo $customerData['customerName']; ?>"></p>
                                                                                                 
        <label>Email</label>
        <p><input type="text" name="txtEmail" value="<?php echo $customerData['customerEmail']; ?>"></p>
                                                                                                   
        <p><input type="submit" value="Uppdatera"></p>
       </form>
     <?php
     // stänger Databasen
     dbDisconnect($connection);
     ?>
   </body>
</html>
