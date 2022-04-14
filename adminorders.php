<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminorders.php'" class="btn btn-secondary">Orders</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminitems.php'" class="btn btn-secondary">Items</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" class="btn btn-secondary" style="width:200%;" onclick="window.location.href = 'adminlogout.php'">log out</button>
    </li>
   
  </ul>
</nav>

<div class="user_container">
<div class="user_cart">
<h1 style="margin-left:5%;">Orders</h1>
<p><button type="button" class="btn btn-primary" onclick="showAll()">Show All</button>Search by date  <input type="date" id="dateOfOrder" > <button type="button" class="btn btn-primary" onclick="displayByDate()">Search</button></p>
<hr class="divider" style="width:90%;">

<div class="container-fluid" style="text-align: center;">
            
<div class="row" style="text-align: center;">

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





echo file_get_contents("header.html");
if(isset($_SESSION['admin'])){
    if($_SESSION['admin']=='admin'){
$sql = "SELECT * FROM orders ;";  
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);



$ordersData = array();

class orderItem{
  public $orderdata;
  public $orderId;
  public $orderAddress;
  public $orderStatus;
  public $orderDate;
  public $orderReciever;
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
    function set_order_reciever($r){
        $this->orderReciever = $r;




    }
    function get_order_reciever(){

        return $this->orderReciever;


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
        $item->set_order_reciever($row['user_id']);
        array_push($ordersData,$item);


    }


 
  

}







if(count($ordersData)>0){

    foreach ($ordersData as $value) {
       
       $reciever_name = "";
        $sql_get_name = "select * from accounts where id = '".$value->get_order_reciever()."'";

        $result3 = mysqli_query($conn,$sql_get_name );
        $resultCheck3 = mysqli_num_rows($result3);


        if($resultCheck3 > 0){


            while($row3 = mysqli_fetch_assoc($result3)){


                $reciever_name = $row3['first_name']." ".$row3['last_name'];

            }





        }
        else{
            $reciever_name = "Unknown";


        }

       
      $cartItems = array();
      $cartItems =  unserialize($value->get_order_data());
      $total = 0;
      echo "<div class=\"col-md-2\"></div>";
      echo "<div class=\"col-md-8\">
      <div class=\"order_data\" style=\"width:100%;border: solid 1px rgb(150,150,150);text-align:left;border-radius:7px;padding:10px;margin-bottom:5%;\">
      ";
      echo "<div class=\"".str_replace("/","",$value->get_order_date())."\"></div>";
        echo "<h4>Order ID: <span class=\"badge badge-warning\">".$value->get_order_id()."</span></h4><h4>Reciever's Name: ".$reciever_name."</h4><h4>Order Date: ".$value->get_order_date()."</h4>
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







    }
    else{
   header("Location: admin.php");
    }
    

}

else{
    header("Location: admin.php");
     }




?>



</div>
</div>
</div>
</div>












<script>
function closeAll(){
   var allOrders =  document.getElementsByClassName("order_data");

   for(var i = 0; i < allOrders.length;i++){

    allOrders[i].parentNode.style.display = "none";

   }





}
function displayByDate(){
var d = document.getElementById('dateOfOrder').value;
var classdate = d.replaceAll("-","");

console.log(classdate);
closeAll();

var orders_by_date =  document.getElementsByClassName(classdate);


for(var i = 0; i < orders_by_date.length;i++){

    console.log(orders_by_date[i]);
    orders_by_date[i].parentNode.parentNode.style.display = "block";
    
}
closeAll();



for(var i = 0; i < orders_by_date.length;i++){

console.log(orders_by_date[i]);
orders_by_date[i].parentNode.parentNode.style.display = "block";

}




}


function showAll(){

    var allOrders =  document.getElementsByClassName("order_data");

for(var i = 0; i < allOrders.length;i++){

 allOrders[i].parentNode.style.display = "block";

}




}

</script>

<script>  

      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });</script>

</body>
</html>
