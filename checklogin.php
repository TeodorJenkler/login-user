<?php
session_start();
?>
  <?php
    require("includes/conn_mysql.php");
  
    $connection = dbConnect();
    $checkUser =  mysqli_real_escape_string($conn, $_POST['txtUser']);
    $checkPassword = mysqli_real_escape_string($conn, $_POST['txtPassword']);
  
    $query = "SELECT * FROM customer
                WHERE customerEmail = '$checkUser';
         
    $result = mysqli_query($connection, $query) Or die("Query failed: $query");
    
    $row = mysqli_fetch_assoc($result);
    
    $count = mysqli_num_rows($result);
    
    if(count == 1){
      if(password_check($checkPassword, $row["customerPassword"])){
        $_SESSION['status'] = "ok";
        header("Location: customer_read.php");
      }
    }
     header("Location: index.php");
    
    mysqli_close($connection);
  ?>
