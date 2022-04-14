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
<h1 style="margin-left:5%;">Cart</h1>
<hr class="divider" style="width:90%;">

<div class="container-fluid" style="text-align: center;">
            
<div class="row" style="text-align: center;">

<?php
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

                echo "<div class=\"col-md-8\">";
                echo "<div class=\"cart_item\" id=\"item_".$row2['id']."\">";



                echo "  <div class=\"container-fluid\" style=\"text-align: center; border:solid 1px rgb(150,150,150);padding:10px;border-radius:7px;\">";
                echo " <div class=\"row\" style=\"text-align: center;\">";
                echo " <div class=\"col-md-4\">";
                echo "<img src=\"shop_images/".$row2['image']."\" style=\"width:50%\">";
                echo " </div><div class=\"col-md-4\">";
                if ($row2['category']=="products"){
                echo " <h4 style=\"text-align:justify\"><a style=\"text-decoration:none\" href=\"products.php?id=".$row2['id']."\">".$row2['name']."</a></h4></div>";
            }
            else{

                echo " <h4 style=\"text-align:justify\"><a style=\"text-decoration:none\" href=\"albums.php?id=".$row2['id']."\">".$row2['name']."</a></h4></div>";
            


            }
                echo "<div class=\"col-md-4\">";
                echo " <h4 style=\"text-align:justify\">Price: ₱<span id=\"targetId_price_".$row2['id']."\">".doubleval($row2['price'])."</span></h4>";
               
              
                echo  "<h4 style=\"text-align:justify\">Quantity: <span class=\"badge badge-primary\" id=\"targetId_badge_".$row2['id']."\">".$value->get_quantity()."</span></h4>";
                echo " <h4 style=\"text-align:justify\">Subtotal: <span class=\"badge badge-warning\" id=\"targetId_subtotal_".$row2['id']."\">₱".doubleval($row2['price']) * intval($value->get_quantity())."</span></h4>";
                echo "  <div style=\"text-align:justify\">";
                echo " <button id=\"targetId_button_add_".$row2['id']."\"style=\"margin-right:4%;\" type=\"button\" class=\"btn btn-secondary\" onclick=\"addQuantity(this.id);\">+</button><button type=\"button\" id=\"targetId_button_subtract_".$row2['id']."\" class=\"btn btn-secondary\" onclick=\"subtractQuantity(this.id)\">-</button><br>";
                echo " <button id=\"targetId_button_remove_".$row2['id']."\"  style=\"margin-top:3%;\" class=\"btn btn-danger\" onclick=\"removeItem(this.id);\" >Remove</button></div></div></div></div></div></div>";
















            }

           




        }
       
       


      
        
        
        
        
        
        
        
        
        
        
    }

    echo " <div class=\"col-md-4 bg-warning\" style=\"text-align:justify\" id=\"checkout\"> <form id=\"paycheck\" action=\"checkout.php\" method=\"post\"><h1 style=\"text-align:center\">Check out</h1>
    
    
    <h2>Total price: ₱<span id=\"total_price\" style=\"font-size:20px;\">0</span></h2>
    
    <h2>Address: <input type=\"textbox\" id=\"address_input\" name=\"deliveryAddress\" style=\"display:inline;width:80%\"></h2>
    <h2>Payment Method: Cash on Delivery</h2>
    <button class=\"btn btn-primary\" onclick=\"payCheck()\">Check out</button>

    </form>
    </div> ";



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

function addQuantity(id){

    var targetId = id.replace("targetId_button_add_","");


    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        var server_message = JSON.parse(this.responseText);
        if(server_message.updated){
            setTotalPrice();
                document.getElementById("targetId_badge_"+targetId).innerText = server_message.quantity;

                var price = parseFloat(document.getElementById("targetId_price_"+targetId).innerText);
                document.getElementById("targetId_subtotal_"+targetId).innerText = "₱" +( price * server_message.quantity).toString();




        }



      }
      
      
      
      }






xhttp.open("POST", "cartUpdate.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("requestType=add&targetId="+targetId);
setTotalPrice();
}

function subtractQuantity(id){

var targetId = id.replace("targetId_button_subtract_","");


var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {
    var server_message = JSON.parse(this.responseText);
    setTotalPrice();
    document.getElementById("targetId_badge_"+targetId).innerText = server_message.quantity;

var price = parseFloat(document.getElementById("targetId_price_"+targetId).innerText);
document.getElementById("targetId_subtotal_"+targetId).innerText = "₱" +( price * server_message.quantity).toString();



  }
  
  
  
  }






xhttp.open("POST", "cartUpdate.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("requestType=subtract&targetId="+targetId);
setTotalPrice();
}

function removeItem(id){

    var targetId = id.replace("targetId_button_remove_","");


var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {
    var server_message = JSON.parse(this.responseText);
    if(server_message.deleted){
        setTotalPrice();
        var selectedId = "item_"+targetId.toString();
        var targetItem = document.getElementById(selectedId);
         var targetParent = targetItem.parentNode;
        

      $(document).ready(function(){
       $(targetParent).fadeOut(1000);
      
      });
      


    }
  
  
  
  }



    }


xhttp.open("POST", "cartUpdate.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("requestType=remove&targetId="+targetId);

}


function setTotalPrice(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {

if (this.readyState == 4 && this.status == 200) {

document.getElementById('total_price').innerText = parseFloat(this.responseText);


}



  }


xhttp.open("POST", "getTotal.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send("requestType=total");









}

function payCheck(){
  

var deliveryAddress = document.getElementById('address_input');

if (deliveryAddress.value != ""){

document.getElementById("payCheck").submit();



}


}


setTotalPrice();








</script>

