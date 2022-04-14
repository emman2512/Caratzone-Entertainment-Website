<?php
include_once ('server/databaseConnect.php');
session_start();


























if(isset($_SESSION['id'])){

//get the type of the request 

$requestType = $_POST['requestType'];
$targetId = $_POST['targetId'];//sets the target item id

$quantity = 1;
$total = 0;

//get the quantity of the target item in the database
$sql_get_quantity = "SELECT * from cart where user_id = '".$_SESSION['id']."' and item_id = '".$targetId."'";
$result = mysqli_query($conn,$sql_get_quantity);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){

        $quantity = intval($row['item_quantity']);
        




    }
}















if($requestType=="add"){


$new_quantity = $quantity +1;

$sql_add_update = "update cart set item_quantity ='".$new_quantity."' where user_id = '".$_SESSION['id']."' and item_id = '".$targetId."'";


if (mysqli_query($conn, $sql_add_update)) {
    
    $message = array("updated"=>true,"quantity"=>$new_quantity);

    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;


  }
   else {
    
    $message = array("updated"=>false,"quantity"=>$quantity);

    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;





  }









}
else if($requestType=="subtract"){
    $new_quantity;
  if($quantity <= 1){
    $new_quantity = 1;


  }
  else{
    $new_quantity = $quantity -1;


  }

   
    

    $sql_subtract_update = "update cart set item_quantity ='".$new_quantity."' where user_id = '".$_SESSION['id']."' and item_id = '".$targetId."'";
    
    
    if (mysqli_query($conn, $sql_subtract_update)) {
        
        $message = array("updated"=>true,"quantity"=>$new_quantity);
    
        $myJSONmessage = json_encode($message);
    
    
        echo $myJSONmessage;
    
    
      }
       else {
        
        $message = array("updated"=>false,"quantity"=>$quantity);
    
        $myJSONmessage = json_encode($message);
    
    
        echo $myJSONmessage;
    
    
    
    
    
      }
    

    
   



    
}
else if($requestType=="remove"){



$sql_delete_item = "delete from cart where user_id = '".$_SESSION['id']."' and item_id = '".$targetId."'";

if (mysqli_query($conn, $sql_delete_item)) {
    $message = array("deleted"=>true,"quantity"=>0);
    
    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;




}
else{

    $message = array("deleted"=>false,"quantity"=>1);
    
    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;



}




    
}






}











?>