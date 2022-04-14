<?php
include_once 'server/databaseConnect.php';
session_start();
if(isset($_SESSION['admin'])){

   if(!$_SESSION['admin']=="admin"){

       header("Location: adminlogin.php");


   }


}
else{

   header("Location: adminlogin.php");

}

$targetItem =  $_POST['targetRemove'];


$sql_remove_item = "delete from shop where id = '".$targetItem."'";

if (mysqli_query($conn, $sql_remove_item)) {
    echo "<script>window.location.href = 'adminitems.php'</script>";
  } else {
    echo "<script>window.location.href = 'adminitems.php'</script>";
  }















?>