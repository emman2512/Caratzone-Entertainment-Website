<?php
include_once 'server/databaseConnect.php';
session_start();


$target_id = $_SESSION['id'];
$sql = "SELECT * FROM cart where user_id = '".$target_id."';";  
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);



$cartData = array();









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
  
  
  
  
  
  
  
  
  
  
  
  $target_id = $_SESSION['id'];
  $sql = "SELECT * FROM cart where user_id = '".$target_id."';";  
  $result = mysqli_query($conn,$sql);
  $resultCheck = mysqli_num_rows($result);
  $cartData = array();
  $total = 0;





  if($resultCheck > 0){
   
    
    while($row = mysqli_fetch_assoc($result)){

        

       

      
        $item = new cartItem();

        $item->set_id($row['item_id']);
        $item->set_quantity($row['item_quantity']);


        array_push($cartData,$item);


    }


 
  

}


if(count($cartData)>0){

    foreach ($cartData as $value) {

        $sql_search_item = "SELECT * from shop where id = '".$value->get_id()."';";
        
        $result2 = mysqli_query($conn,$sql_search_item );
        $resultCheck2= mysqli_num_rows($result2);



        if($resultCheck2 > 0){
            while($row2 = mysqli_fetch_assoc($result2)){


                $total += doubleval($row2['price']) * doubleval($value->get_quantity());







            }

           




        }
       
       


      
        
        
        
        
        
        
        
        
        
        
    }

  


}

else{
    $total = 0;
 
}






echo $total;




















  







?>