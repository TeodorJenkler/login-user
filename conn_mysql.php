<?php

/*
    Databas koppling
*/

function dbConnect(){
  $connection = mysqli_connect("172.25.0.3", "root", "example", "customerDB") or die("could not connect");
  mysqli_select_db(connection, "customerDB") or die("could not select database");
  return $connection;
}

/*
     Stänga databas koppling
*/

function dbDisconnect($connection){
  mysqli_close($connection);
}
