<?php
 /*
  visar alla kunder
 */

session_start();
if(!isset($_SESSION['status']) || $_SESSION['status'] != "ok"){
  header("Location: index.php");
}

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
  <body>
   <h1>Kunder</h1>
   <p><a href="customer_create.php">Lägg till ny kund</a></p>
   <ul>
       <?php
        //Loop genom användare
         while($row = mysqli_fetch_array($allCustomers){
       ?>
         <li>
             <=php echo['customerName'];?> 
             <a href="customer_update.php?editid=<?php echo $row['customerId'];?>">Uppdatera</a>
             <a href="customer_delete.php?deleteid=<?php echo $row['customerId'];?>">Ta bort</a>
         </li>
        <?php
         }
       ?>
   </ul>
   <?php
          //Stänger databas
          dbDisconnect($connection);
   ?>
  </body>
</html>
