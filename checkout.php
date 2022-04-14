<?php

include_once 'server/databaseConnect.php';
session_start();



class cartItem{
    private $item_id;
    private $item_quantity;
 
 
     function set_id($id){
         $this->item_id = $id;
 
 
 
 
     }
     function get_id(){
 
         return $this->item_id;
 
 
     }
 
     function set_quantity($quantity){
         $this->item_quantity = $quantity;
 
 
 
 
     }
     function get_quantity(){
 
         return $this->item_quantity;
 
 
     }
 
 
 
 
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
















if(isset($_SESSION['id'])&& isset($_POST['deliveryAddress'])){
 $user_identifier = $_SESSION['id'];
 $deliveryAddress = $_POST['deliveryAddress'];
 $orderId = generateRandomString(15);
 $cartData = array();

 $sql = "SELECT * FROM cart where user_id = '".$user_identifier."';";  
 $result = mysqli_query($conn,$sql);
 $resultCheck = mysqli_num_rows($result);
 
 if($resultCheck > 0){
   
    
    while($row = mysqli_fetch_assoc($result)){

        

       

      
        $item = new cartItem();

        $item->set_id($row['item_id']);
        $item->set_quantity($row['item_quantity']);


        array_push($cartData,$item);


    }


 
  

}




$cart_to_string = serialize($cartData);

$sql_insert_order = "insert into orders values('".$user_identifier."','".$orderId."','".$cart_to_string."','".$deliveryAddress."','pending','".date("Y/m/d")."')";  
if (mysqli_query($conn, $sql_insert_order)) {
    
    $delete_all_cart = "delete from cart where user_id='".$user_identifier."'";

   if( mysqli_query($conn, $delete_all_cart )){

    
    echo "<script>window.location.href='accounts.php?view=orders'</script>";


   }
   else{
   echo "<script>window.location.href='accounts.php'</script>";

   }



  } else {
    
  }


  
  



























}
else{


echo "<script>window.location.href='accounts.php'</script>";




}


























?>