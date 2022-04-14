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
.card{margin-bottom:3%;cursor: pointer;}
.card:hover{
    border:solid #92a8d1;;


}

    </style>
</head>

<body style="font-family: 'Hind', 'Nanum Square', sans-serif;">
<?php

echo file_get_contents('nav.html');




?>

    <div style="width:80%;position:relative;left:10%;">
    <h2 style="text-align:justify;margin-top:1%">Products<img src="resources/homepage/shopIcon.png" style="width:5%;"></h2>
    <hr class = "divider" style ="width:100%;">

    <div class="container-fluid">
    <div class="row" style="text-align: center;">

    <?php
     $sql2 = "SELECT * FROM shop where category = 'products';";  
     $result2 = mysqli_query($conn,$sql2);
     $resultCheck2 = mysqli_num_rows($result2);


     if($resultCheck2 > 0){
       while($row2 = mysqli_fetch_assoc($result2)){
         
       //item start
         
       echo " <div class=\"col-md-2\" onclick=\"window.location.href = 'products.php?id=".$row2['id']."'\">";
       echo "<div class=\"card\">";
       echo "<div class=\"card-body\">";
       echo "<img src=\"shop_images/".$row2['image']."\" style=\"width:100%;\">";
       echo "<p style=\"font-size:14px;text-align:justify\">".$row2['name']."</p>";
       echo " <p style=\"font-size:20px;text-align:justify\"> ₱".$row2['price']."</p>";
       echo "</div></div></div>";
        //item end

     }
     

   }
  
     



   ?>

   


    </div>

    </div>













    </div>
      



<!--shop items starts here-->












<!--footer-->
<div class="foot bg-dark">
<h3>CARATZONE</h3>
<p>2021</p>
</div>





<script>  
      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });</script>




      </body>

    










 </html>         