<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'accounts.php'"  class="btn btn-secondary">Cart</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'accounts.php?view=orders'" class="btn btn-secondary">Orders</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" class="btn btn-secondary" style="width:200%;" onclick="window.location.href = 'logout.php'">log out</button>
    </li>
   
  </ul>
</nav>

<div class="user_container">
<div class="user_cart">
<h1 style="margin-left:5%;">Orders</h1>
<hr class="divider" style="width:90%;">

<div class="container-fluid" style="text-align: center;">
            
<div class="row" style="text-align: center;">

<?php
$target_id = $_SESSION['id'];
$sql = "SELECT * FROM orders where user_id = '".$target_id."' ORDER BY date DESC;";  
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);



$ordersData = array();

class orderItem{
  public $orderdata;
  public $orderId;
  public $orderAddress;
  public $orderStatus;
  public $orderDate;
    function set_orderdata($od){
        $this->orderdata = $od;




    }
    function get_order_data(){

        return $this->orderdata;


    }

    function set_order_id($id){
        $this->orderId = $id;




    }
    function get_order_id(){

        return $this->orderId;


    }
    
    function set_order_address($address){
        $this->orderAddress = $address;




    }
    function get_order_address(){

        return $this->orderAddress;


    }
    function set_order_status($status){
        $this->orderStatus = $status;




    }
    function get_order_status(){

        return $this->orderStatus;


    }
    function set_order_date($d){
        $this->orderDate = $d;




    }
    function get_order_date(){

        return $this->orderDate;


    }




    


}

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
 







if($resultCheck > 0){
   
    
    while($row = mysqli_fetch_assoc($result)){

        

       

      
        $item = new orderItem();

        $item->set_orderdata($row['order_data']);
        $item->set_order_id($row['order_id']);
        $item->set_order_address($row['order_address']);
        $item->set_order_status($row['status']);
        $item->set_order_date($row['date']);

        array_push($ordersData,$item);


    }


 
  

}

$ordersDataInverted = array();

for($i = count($orderdata); $i >=0; $i--){



    
}



if(count($ordersData)>0){

    foreach ($ordersData as $value) {

       
       
      $cartItems = array();
      $cartItems =  unserialize($value->get_order_data());
        $total = 0;
      echo "<div class=\"col-md-2\"></div>";
      echo "<div class=\"col-md-8\">
      <div class=\"order_data\" style=\"width:100%;border: solid 1px rgb(150,150,150);text-align:left;border-radius:7px;padding:10px;margin-bottom:5%;\">
      ";
        echo "<h4>Order ID: <span class=\"badge badge-warning\">".$value->get_order_id()."</span></h4><h4>Order Date: ".$value->get_order_date()."</h4>
        <h4>Order Address: ".$value->get_order_address()."</h4>";
        echo "<div id=\"my_orders_".$value->get_order_id()."\" class=\"collapse\">
        <div style=\"width:100%;overflow-x:auto;\">
        <table class=\"table\" style=\"width:100%;\">
            <thead class=\"thead-dark\">
              <tr>
                <th style=\"width:20%;\">Product</th>
                <th style=\"width:50%;\">Name</th>
                <th style=\"width:10%;\">Price</th>
                <th style=\"width:10%;\">Quantity</th>
                <th style=\"width:10%;\">Subtotal</th>
              </tr>
            </thead>
            <tbody>";


      foreach($cartItems as $item_order){
       

        

            $sql_get_item_data = "select * from shop where id='".$item_order->get_id()."'";
            $result2 = mysqli_query($conn,$sql_get_item_data );
            $resultCheck2= mysqli_num_rows($result2);
            if($resultCheck2 > 0){
                while($row2 = mysqli_fetch_assoc($result2)){
                    
                    if($row2['category']=="products"){

                    echo " <tr>
                    <td><img src=\"shop_images/".$row2['image']."\" style=\"width:100%\"></td>
                    <td><a href=\"products.php?id=".$item_order->get_id()."\">".$row2['name']."</a></td>
                    <td>₱".$row2['price']."</td>
                    <td>".$item_order->get_quantity()."</td>
                    <td>₱".doubleval($row2['price']) *doubleval($item_order->get_quantity()) ."</td>
                  </tr>";
                    $total += doubleval($row2['price']) *doubleval($item_order->get_quantity());
                    

                    }
                    elseif ($row2['category']=="album") {
                        
                        echo " <tr>
                        <td><img src=\"shop_images/".$row2['image']."\" style=\"width:100%\"></td>
                        <td><a href=\"albums.php?id=".$item_order->get_id()."\">".$row2['name']."</a></td>
                        <td>₱".$row2['price']."</td>
                        <td>".$item_order->get_quantity()."</td>
                        <td>₱".doubleval($row2['price']) *doubleval($item_order->get_quantity()) ."</td>
                      </tr>";
                        $total += doubleval($row2['price']) *doubleval($item_order->get_quantity());
                       
    






                    }


                }
            
            }

    
      }
      echo "</tbody>
      </table>
      </div>
      </div>  
      <h2>Total: ₱".$total."</h2>
      <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"collapse\" data-target=\"#my_orders_".$value->get_order_id()."\" style=\"width:100%;\">View orders</button>
      </div>
      </div>
      <div class=\"col-md-2\">
      </div>
      ";
      
        
        
        
        
        
        
        
        
        
        
    }

    echo " ";



}

else{
    echo " <div class=\"col-md-12\" ><h1 style=\"text-align:center;\">No items</h1><br><a href='shop.php' style=\"text-decoration:none;font-size:20px;background-color:rgb(150,150,150);padding:10px;border-radius:8px;color:white;\">View shop</a> </div>";


}
















?>



</div>
</div>
</div>
</div>












<script>


</script>

