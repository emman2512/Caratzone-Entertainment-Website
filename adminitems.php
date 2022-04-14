<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminorders.php'" class="btn btn-secondary">Orders</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminorders.php'" class="btn btn-secondary">Items</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" class="btn btn-secondary" style="width:200%;"  onclick="window.location.href = 'adminlogout.php'">log out</button>
    </li>
   
  </ul>
</nav>

<div class="user_container">
<div class="user_cart">
<h1 style="margin-left:5%;">Items <button type="button" class="btn btn-primary" onclick="window.location.href='additem.php'">Add Item</button></h1>

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

$sql2 = "SELECT * FROM shop ;";  
     $result2 = mysqli_query($conn,$sql2);
     $resultCheck2 = mysqli_num_rows($result2);


     if($resultCheck2 > 0){
       while($row2 = mysqli_fetch_assoc($result2)){
         
       //item start
         
       echo " <div class=\"col-md-2\">";
       echo "<div class=\"card\">";
       echo "<div class=\"card-body\">";
       echo "<img src=\"shop_images/".$row2['image']."\" style=\"width:100%;\">";
       echo "<p style=\"font-size:14px;text-align:justify\">".$row2['name']."</p>";
       echo " <button onclick=\" window.location.href = 'edititems.php?targetEdit=".$row2['id']."'\" class=\"btn btn-warning\" style=\"margin-left:4%;\">Edit</button><span> </span><button class=\"btn btn-danger\" onclick=\"removeItem('".$row2['id']."')\">Remove</button>";
       echo "</div></div></div>";
        //item end

     }
     

   }

  




?>



</div>
</div>













<script>
function removeItem(targetId){

var myform = document.createElement("FORM");
myform.action= "remove.php";
myform.method = "post";

var myHiddenInput = document.createElement("INPUT");
myHiddenInput.type = "hidden";
myHiddenInput.value = targetId;
myHiddenInput.name = "targetRemove";


myform.appendChild(myHiddenInput);

document.body.appendChild(myform);
myform.submit();





















}

</script>

<script>  

      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });</script>

</body>
</html>
