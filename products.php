<?php
include_once 'server/databaseConnect.php';
?>


            
<!DOCTYPE html>
<html>
<head>

    <title>Caratzone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="dependencies/bootstrap.min.css">
    <script src="dependencies/jquery.min.js"></script>
    <script src="dependencies/popper.min.js"></script>
    <script src="dependencies/bootstrap.min.js"></script>
    
    <style>
     body{
         box-sizing: border-box;
         display:none;
     }
   .background_container{
   
      width:100%;position:absolute;top:-10%;z-index:-1;
   }
   .members{ background-color: rgba(255,255,255,1); border-radius: 2px;}
   
.music_videos{
  width:80%;
  position: relative;
  left:10%;


}
.albums{
  width:80%;
  position: relative;
  left:10%;


}


     @media only screen and (max-width: 860px) {
 
      #navigation{

        background: linear-gradient(#f7cac9, #92a8d1)

      }

      .background_container{

        display: none;
      }

      .members_container{
        width:100%;
        position: relative;
        left:0;
        margin-top:3%;
      }
      .album_highlight{
   
        width:100%;
        position: relative;
        left:0;
        margin-top:3%;
  }
      .music_videos{
       width:100%;
       position:relative;
        left:0;

}
.albums{
  width:100%;
  position: relative;
  left:0%;


}

      
         
     

}

.divider{

color: rgb(80,80,80); border: 1px solid rgb(80,80,80);
}

.member_image{

border-radius: 2%;
width:100%;
transition: width 0.7s;
left:0px;
}






.member_info:hover .indicator{

  visibility: visible;
  
}

.member_info:hover .member_image{

  width:110%;
}
.indicator{ color: #92a8d1; border: 1px solid #92a8d1;visibility: hidden;}

.profile_nickname{

 font-size: 70%;
  color: rgb(150,150,150);
}
.album_name{
color:#92a8d1;
margin-top:10px;
}
.product_name{
color:rgb(80,80,80);
margin-top:10px;
font-size:14px;
text-align:justify;
}
.album_image img{
  border-radius:3px;
  

transition:filter 1s;
}
.album_container:hover img {


filter: brightness(50%);
}
.album_container{
padding:3px;

}
.album_button{
  position:absolute;left:0%;bottom:0px;width:100%;height:30%;opacity:0;
  transition: opacity 1s;
  font-size:20px;
  
}
.album_container:hover button {

  opacity:0.3;

}

.album_highlight{
   
   margin-top:2%;text-align:center;
   margin-bottom:2%;
   width:90%;
   position: relative;
   left:5%;
   transition: display 2s;
   background-color:rgba(240,240,240,0.7);
   padding:10px;
  }
  .foot{

color:rgb(220,220,220) ;
padding:15px;
text-align: center;
font-family: Georgia, 'Times New Roman', Times, serif;
margin-bottom:0%;
}
.description{
  font-family: Georgia, 'Times New Roman', Times, serif;
  color:#92a8d1;text-align:justify;
 margin-bottom:1%;
}
.description li{
  margin-top:2%;
}


    </style>
</head>

<body style="font-family: 'Hind', 'Nanum Square', sans-serif;">
<?php

echo file_get_contents('nav.html');




?>
      
      <?php
        $sql = "SELECT * FROM shop where category = 'products' and id='". $_GET['id']."';";  
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);


        if($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){

            ?>

          

          
      <div class="album_highlight" >
     
      <div class="container-fluid">



      <div class="row" style="text-align: center;">
      <div class="col-md-4">
          <img src="shop_images/<?php echo $row['image'];?>" style="width:100%;">
          <h3 style="font-size:200%;">Product Name: <span style="color:#92a8d1""><?php echo $row['name'];?></span></h3>
          <h3 style="font-size:200%;">Price: <span style="color:#92a8d1"">₱<?php echo $row['price'];?></span></h3>

          <hr class="divider" style="width:90%;">

          <div class="container-fluid">
          <div class="row" style="text-align: center;">
          <div class="col-md-7">
          <button type="button" onclick="addToCart(<?php echo $_GET['id'];?>)" class="btn btn-primary" style="width:100%;font-size:150%;" data-toggle="modal" data-target="#addedModal"><img src="resources/shoppage/addtocartIcon.png" style="width:45px" > Add to cart </button>
          
        
          </div>
          <div class="col-md-5">
           
          <button type="button" class="btn btn-secondary" onclick="window.history.back();" style="width:100%;font-size:150%;"><img src="resources/shoppage/returnIcon.png" style="width:45px">Return</button>
        
          </div>
          </div>
          </div>

      </div>
    

      <div class="col-md-4" style="margin-top:1%;">
      <h2 style="text-align:justify">Description</h2>
      <hr class="divider" style="width:100%;">

      <ul class="description collapse" id="descriptions">
      <?php

      $description = (explode("<!>",$row['description']));
      foreach ($description as $value) {
        echo "<li>".$value."</li>";
        
      }}}?>





    </ul>


    <button data-toggle="collapse" id="collapser" data-target="#descriptions" style="margin-top:2%;padding:10px;border-radius:5px;width:30%;"><span id="viewbuttontext">View</span> <img id ="viewbuttonimage" src="resources/shoppage/viewIcon.png" style="width:30%;"></button>

    
      </div>







      <div class="col-md-4">
      <h2 style="text-align:center;margin-top:1%">More products<img src="resources/homepage/shopIcon.png" style="width:10%;"></h2>
     
      <div class="container-fluid">
    <div class="row" style="text-align: center;">
    <!--Album start-->
    <?php
        $sql2 = "SELECT * FROM shop where category = 'products';";  
        $result2 = mysqli_query($conn,$sql2);
        $resultCheck2 = mysqli_num_rows($result2);


        if($resultCheck2 > 0){
          while($row2 = mysqli_fetch_assoc($result2)){
            
          //albums start
            if($row2['id']!= $_GET['id']){
            echo "<div class=\"col-md-4\">";

            echo "<div class=\"album_container\">";
            echo "<div class=\"album_image\" style=\"position:relative;\">";
            echo "<a href=\"products.php?id=".$row2['id']."\">";
            echo "<img src=\"shop_images/".$row2['image']."\" style=\"width:100%;\">";
            echo "<button type=\"button\" class=\"btn btn-primary album_button\" >View</button></a></div>";
           
            echo "<div class=\"product_name\" >";
           
            echo "<p>".$row2['name']."</p>";
            
            echo "</div></div></div>";

          }
           //albums end

        }
        

      }
     
        
   


      ?>
    <!--Album End-->
      





      </div>
      

      </div>

      </div>

    </div></div>
      </div>
























      <div class="foot bg-dark">

      <h3>CARATZONE</h3>
      <p>2021</p>
      </div>
      
      <div class="modal" id="addedModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="addResponse"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      
    </div>
  </div>
</div>





      <script>
      
      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });
      
      $("#collapser").click(function(){
        if( document.getElementById('viewbuttontext').innerText=="View"){
          document.getElementById('viewbuttontext').innerText="Close";
          document.getElementById('viewbuttonimage').src="resources/shoppage/closeIcon.png";
        }
        else if(document.getElementById('viewbuttontext').innerText=="Close"){

          document.getElementById('viewbuttontext').innerText="View";
          document.getElementById('viewbuttonimage').src="resources/shoppage/viewIcon.png";

        }
          
      });
      
      
      </script>

      <script>

      function addToCart(item_id){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {
       
        var message = JSON.parse(this.responseText);

        if(message.added == "1"){
          
         document.getElementById("addResponse").innerHTML = "<span class='text-success'>Item already in the cart</span>";

        }

        else if(message.added == "0" ){

         
          document.getElementById("addResponse").innerHTML = "<span class='text-success'>You must login first</span>";
          window.location.href = 'accounts.php';

        }

        else if(message.added == "2" ){

         
          document.getElementById("addResponse").innerHTML = "<span class='text-success'>Item added successfully</span>";


        }
        else if(message.added == "3" ){

         
          document.getElementById("addResponse").innerHTML = "<span class='text-success'>failed to add item</span>";


        }


        console.log(message);


      }
    };


    
    var sendstring = "product_id="+item_id.toString();


xhttp.open("POST", "addtocart.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(sendstring);


      }



      </script>
     



</body>













</html>

