<?php

include_once 'server/databaseConnect.php';

function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}




?>






<?php
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$user_name = $_POST['susername'];
$password = sha1($_POST['spass']);








$sql_username_check = "Select * from accounts where username = '".$_POST['susername']."'";
$result = mysqli_query($conn,$sql_username_check);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){

    echo "<script>window.location.href = 'accounts.php?signup=failed'</script>";








}
else{
$id = generateRandomString(10);
$sql_user_insert = "INSERT INTO accounts VALUES('".$id."','".$first_name."','".$last_name."','".$user_name."','".$password."')";


if (mysqli_query($conn, $sql_user_insert)) {
    echo "<script>window.location.href = 'accounts.php?signup=success'</script>";
  } else {
    echo "<script>window.location.href = 'accounts.php?signup=failed'</script>";
  }





}



























?>