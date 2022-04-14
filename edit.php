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



function generateRandomString($length) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}





$targetItem = $_POST['targetId'];
$image_name = generateRandomString(20);
$item_name = $_POST['item_name'];
$item_category = $_POST['item_category'];
$item_price = $_POST['item_price'];
$item_description = $_POST['set_of_description'];
if($_POST['updateImage']=="true"){



$target_dir = "shop_images/";

$target_file = $target_dir .$image_name.".".pathinfo($_FILES["imageUpload"]["name"],PATHINFO_EXTENSION);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["imageUpload"]["tmp_name"]);
  if($check !== false) {

    $uploadOk = 1;
  } else {

    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

  } else {
    if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
     
    } else {
   
    }




  }



  $sql_update = "update shop set category='".$item_category."',image = '".$image_name.".".$imageFileType."', name = '".$item_name."', description ='".$item_description."' , price = '".$item_price."' where id = '".$targetItem."'";
  if (mysqli_query($conn, $sql_update )) {
      echo "<script>window.location.href = 'adminitems.php'</script>";
    } else {
      echo $conn->error;
    }
  


}

else{
  $item_name = $_POST['item_name'];
  $item_category = $_POST['item_category'];
  $item_price = $_POST['item_price'];
  $item_description = $_POST['set_of_description'];



  $sql_update = "update shop set category='".$item_category."', name = '".$item_name."', description ='".$item_description."' , price = '".$item_price."' where id = '".$targetItem."'";
  if (mysqli_query($conn, $sql_update )) {
      echo "<script>window.location.href = 'adminitems.php'</script>";
    } else {
      echo $conn->error;
    }
  
  
  







}





















?>