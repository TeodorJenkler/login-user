<?php 

// Inkludera filer för databas och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php")
  
  // Skapa databas
$connection = dbConnect();

// Ska kund tas bort?
if(isset($_GET['deleteid']) && $_GET['deleteid']>0){
  $isDeleteid = $_GET['deleteid'];
}
// ska kunden tasbort?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid']>0)
  deleteCustomer($connection, $_POST['isdeleteid']);

  header("Location: customer_read.php");
?>

<!DOCTYPE HTML>
<html lang='sv'>
   <head>
      <meta charset="utf-8"/>
     <title>Kunder Ta bort</title>
   </head>
   <body>
     <h1>Ta Bort kund</h1>
      <form action="customer_delete.php" method="post">
        <input type="hidden" name="isDeleteid" value="<?php echo $isDeleteid; ?>">
        <label>Vill du verkligen ta bort?</label>
        <p><input type="submit" value="JA"</input></p>
  </body>
</html>
