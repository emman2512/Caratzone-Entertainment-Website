<?php

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




?>

<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminorders.php'" class="btn btn-secondary">Orders</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" onclick="window.location.href = 'adminitems.php'" class="btn btn-secondary">Items</button>
    </li>
    <li class="nav-item" style="margin-right:3%;margin-bottom:5%;">
    <button type="button" class="btn btn-secondary" style="width:200%;"  onclick="window.location.href = 'adminlogout.php'">log out</button>
    </li>
   
  </ul>
</nav>

<div class="user_container">
<div class="user_cart">
<h1 style="margin-left:5%;">Add item</h1>

<hr class="divider" style="width:90%;">


<div style="text-align:center">

<form id ="add_form"action="add.php" enctype="multipart/form-data" method="post">


<img src="resources/adminpage/imageIcon.png" alt="yuan" style="width:300px;height:300px;" id="imageToUpload"><br>
Select image :
<input type="file" name="imageUpload" id="imageUpload"  accept="image/x-png,image/jpeg"><br/>
<br/>
Name: <input type="textbox" name = "item_name" id="item_name"/><br>
<br>
Category: <br> <input type="radio" name = "item_category" id="item_category_album" checked value="album"/><label for="item_category_album">Album</label><br>
<input type="radio" name = "item_category" id="item_category_product" value="products"/><label for="item_category_product">Product</label>
<br>

Price: <input type="textbox" name = "item_price" id="item_price"/><br>
<br>
Product Descriptions: <button class="btn btn-primary" type="button" onclick="addDescription()">Add description</button>
<br>
<div id="descriptions" style="margin-bottom:4%;margin-top:2%;">
<div class="description" style="text-align:center" >
<input type="textbox" class="descriptionText" placeholder="Type a description">
<button class="btn btn-danger" onclick="removeDescription(this)">X</button>


</div>

</div>








<input type="hidden" id="set_of_description" name = "set_of_description" value="">




<input type="button" onclick="add_submit()" value="Add item" class="btn btn-primary" > 












</form>
</div>


<script>
document.getElementById('imageUpload').onchange = function (evt) {
    var tgt = evt.target || window.event.srcElement,
        files = tgt.files;

  
    if (FileReader && files && files.length) {
        var fr = new FileReader();
        fr.onload = function () {
            document.getElementById("imageToUpload").src = fr.result;
        }
        fr.readAsDataURL(files[0]);
    }

   
    else {
      
    }
}


function removeDescription(removeButton){

var target_description = removeButton.parentNode;

target_description.remove();





    
}


function addDescription(){
    
    var d = document.createElement("DIV");
    d.className="description";
    d.style.textAlign = "center";

    var inp = document.createElement("INPUT");
    inp.type = "textbox"
    inp.className = "descriptionText";
    inp.placeholder = "Type a description";
    d.appendChild(inp);

    var closeButton = document.createElement("BUTTON");
    closeButton.className = "btn btn-danger";
    closeButton.onclick = function () {
    removeDescription(this);
};
    closeButton.innerText = "X";
    d.appendChild(closeButton);

   document.getElementById("descriptions").appendChild(d);
   

}

function add_submit(){



var description_string="";

var all_description_text = document.getElementsByClassName("descriptionText");

for(var i = 0;i<all_description_text.length;i++){
    
    if(i < all_description_text.length -1){
   description_string += all_description_text[i].value.toString()+"<!>";


    }
    else if(i==all_description_text.length -1){
   description_string += all_description_text[i].value.toString();


    }


}

document.getElementById("set_of_description").value = description_string;


document.getElementById("add_form").submit();

}

</script>


<script>  
          $(document).ready(function(){
           $("body").fadeIn(2000);
          
          });</script>
    
    
    
    
          </body>
    
        
    
    
    
    
    
    
    
    
    
    
     </html>         






