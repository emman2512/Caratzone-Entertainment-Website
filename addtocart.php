<?php

include_once 'server/databaseConnect.php';
session_start();







if(isset($_SESSION['id']) && isset($_POST['product_id']) ){


$sql = "Select * from cart where user_id = '".$_SESSION['id']."' and item_id = '".$_POST['product_id']."' ";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0){

    $message = array("added"=>"1");

    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;



}

else{



    $sql_cart_insert = "insert into cart values('".$_SESSION['id']."','".$_POST['product_id']."','1')";



    if (mysqli_query($conn, $sql_cart_insert)) {
        $message = array("added"=>"2");

        $myJSONmessage = json_encode($message);
    
    
        echo $myJSONmessage;
      } else {
        $message = array("added"=>"3");

        $myJSONmessage = json_encode($message);
    
    
        echo $myJSONmessage;
      }








  


}








}


else{

    $message = array("added"=>"0");

    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;




}















?>