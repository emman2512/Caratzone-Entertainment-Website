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
   .members_container{
   
    margin-top:30%;text-align:center;
    width:80%;
    position: relative;
    left:10%;
    transition: display 2s;
   }
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
  font-size:25px;
  
}
.album_container:hover button {

  opacity:0.3;

}
.foot{

color:rgb(220,220,220) ;
padding:15px;
text-align: center;
font-family: Georgia, 'Times New Roman', Times, serif;
}

</style>
</head>

<body style="font-family: 'Hind', 'Nanum Square', sans-serif;">
<?php

echo file_get_contents('nav.html');








?>

      <div class="background_container">


        <img  src="resources/profilepage/profilehead.jpg" style="width:100%;">


      </div>
      <div class="members_container" id="membersContainer">


    
        <div class="members">
          <h1 style="font-family: 'Nanum Square', '나눔 고딕', 'Nanum Gothic', sans-serif;">SEVENTEEN<hr class="divider" style="width:90%;"></h1>
          <div class="container-fluid" style="text-align: center;">
            
            <div class="row" style="text-align: center;">
             
              <div class="col-md-4">
                <div class="member_info">
                  <div class="container-fluid" style="text-align: center;">
                    <div class="row" style="text-align: center;">
                      <div class="col-md-6" >
                      <img src="resources/profilepage/members/jcoups.jpg" class="member_image">
                      
                      </div>
                      <div class="col-md-6">
                      <h4>J.Coups <span class="profile_nickname">(CHOI, SEUNG CHEOL)</span></h4><br>
                      <div class="profile_info">
                      
                        <div class="birthDate">
                        <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span >August 8, 1995</span>
                        </div>
                        <div class="role_info">
                          <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>General leader, leader of hiphop team</span>

                        </div>

                      </div>
                      </div>
                   
                    </div>
                    <hr class="indicator">
                  
                  
                  
                  
                  </div>
               
              </div>
  
              
  
            </div>
  
           <!--profile columns-->

              <div class="col-md-4">
                <div class="member_info">
                  <div class="container-fluid" style="text-align: center;">
                    <div class="row" style="text-align: center;">
                      <div class="col-md-6" >
                      <img src="resources/profilepage/members/wonwoo.jpg" class="member_image">
                      
                      </div>
                      <div class="col-md-6">
                      <h4>Wonwoo <span class="profile_nickname">(JEON, WONWOO)</span> </h4><br></h4>
                      <div class="profile_info">
                      
                        <div class="birthDate">
                        <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>
                          Jul. 17, 1996</span>
                        </div>
                        <div class="role_info">
                          <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Hiphop Team</span>

                        </div>

                      </div>






                      </div>
                   
                    </div>
                    <hr class="indicator">
                  
                  
                  
                  
                  </div>
               
              </div>
  
              
  
            </div>
  
           <!--profile columns-->
            <div class="col-md-4">
              <div class="member_info">
                <div class="container-fluid" style="text-align: center;">
                  <div class="row" style="text-align: center;">
                    <div class="col-md-6" >
                    <img src="resources/profilepage/members/mingyu.jpg" class="member_image">
                    
                    </div>
                    <div class="col-md-6">




                    <h4>Mingyu <span class="profile_nickname">(KIM, MIN GYU)</span> </h4><br>
                    <div class="profile_info">
                      
                      <div class="birthDate">
                      <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Apr. 6, 1997</span>
                      </div>
                      <div class="role_info">
                        <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Hiphop Team</span>

                      </div>

                    </div>




                      <!--End of profile section-->
                    </div>
                 
                  </div>
                  <hr class="indicator">
                
                
                
                
                </div>
             
            </div>

            

          </div>

         <!--profile columns-->
         <div class="col-md-4">
          <div class="member_info">
            <div class="container-fluid" style="text-align: center;">
              <div class="row" style="text-align: center;">
                <div class="col-md-6" >
                <img src="resources/profilepage/members/vernon.jpg" class="member_image">
                
                </div>
                <div class="col-md-6">
                
                  <h4>Vernon <span class="profile_nickname">(CHWE, HANSOL VERNON)</span></h4><br>
                  <div class="profile_info">
                    <div class="birthDate">
                    <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Feb. 18, 1998</span>
                    </div>
                    <div class="role_info">
                      <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Hiphop Team</span>

                    </div>

                  </div>




                    <!--End of profile section-->
                </div>
             
              </div>
              <hr class="indicator">
            
            
            
            
            </div>
         
        </div>

        

      </div>

     <!--profile columns-->
     <div class="col-md-4">
      <div class="member_info">
        <div class="container-fluid" style="text-align: center;">
          <div class="row" style="text-align: center;">
            <div class="col-md-6" >
            <img src="resources/profilepage/members/woozi.jpg" class="member_image">
            
            </div>
            <div class="col-md-6">
              <h4>WOOZI <span class="profile_nickname">(LEE, JI HOON)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Nov. 22, 1996</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Leader of vocal team</span>

                </div>

              </div>




                <!--End of profile section-->
            </div>
         
          </div>
          <hr class="indicator">
        
        
        
        
        </div>
     
    </div>

    

  </div>

 <!--profile columns-->
 <div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/jeonghan.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>Jeonghan <span class="profile_nickname">(YOON, JEONG HAN)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Oct. 4, 1995</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span> Vocal Team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->

<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/joshua.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>Joshua <span class="profile_nickname">(HONG, JOSHUA JISOO)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Dec. 30, 1995</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Vocal Team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->


<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/dk.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>DK <span class="profile_nickname">(LEE, SEOK MIN)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Feb. 18, 1997</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Vocal Team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->

<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/seungkwan.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>SeungKwan <span class="profile_nickname">(BOO, SEUNG KWAN)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span> Jan. 16, 1998</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Vocal Team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>


<!--profile columns-->
<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/hoshi.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>Hoshi <span class="profile_nickname">(KWON, SOON YOUNG)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span> Jun. 15, 1996</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Leader of performance team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->
<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/jun.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>Jun <span class="profile_nickname">(Wén Jùnhuī)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span> Jun. 10, 1996</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Performance team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->
<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/THE 8.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>The 8<span class="profile_nickname">(Xú Mínghào)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span> Nov. 7, 1997</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Performance team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->
<div class="col-md-4">
  <div class="member_info">
    <div class="container-fluid" style="text-align: center;">
      <div class="row" style="text-align: center;">
        <div class="col-md-6" >
        <img src="resources/profilepage/members/Dino.jpg" class="member_image">
        
        </div>
        <div class="col-md-6">
          <h4>Dino<span class="profile_nickname">(LEE, CHAN)</span></h4><br>
              <div class="profile_info">
                <div class="birthDate">
                <img src="resources/profilepage/cakeIcon.png" style="Width:30px;"> <span>Feb. 11, 1999</span>
                </div>
                <div class="role_info">
                  <img src="resources/homepage/seventeenIcon.png" style="Width:30px;"> <span>Performance team</span>

                </div>

              </div>




                <!--End of profile section-->

        </div>
     
      </div>
      <hr class="indicator">
    
    
    
    
    </div>
 
</div>



</div>

<!--profile columns-->
<div class="col-md-8" style="position: relative;margin-top:7%;"><h1 style="margin-bottom:100px;text-align: center;">MUSIC VIDEOS <span><img src="resources/profilepage/media.png" style="width:20%;"></span></h1></div>
            </div>



            </div>



        </div>
      </div>

     
<div class="music_videos">
<div class="container-fluid">

  <div class="row" style="text-align: center;">
    <div class="col-md-4">
      <iframe src="https://www.youtube.com/embed/UB4FzllQCyc" style="border:2px solid white;width:100%;" frameborder;="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
      
    </div>
    <div class="col-md-4">
      <iframe src="https://www.youtube.com/embed/MmI-vsaOoUE" style="border:2px solid white;width:100%;" frameborder;="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
      
    </div>
    <div class="col-md-4">
      <iframe src="https://www.youtube.com/embed/PQOJJ037ys8" style="border:2px solid white;width:100%;" frameborder;="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
      
    </div>
    <hr class="divider" style="width:100%;">
    <div class="col-md-9">
      <div class="col-md-8" style="position: relative;margin-top:7%;"><h1 style="margin-bottom:100px;text-align: center;">DISCOGRAPHY<span><img src="resources/profilepage/music.png" style="width:20%;"></span></h1></div>
    </div>
  </div>
</div>

</div>

<div class="albums" >
  <div class="container-fluid">
    <div class="row" style="text-align: center;">
    <!--Album start-->
    <?php
        $sql = "SELECT * FROM shop where category = 'album';";  
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);


        if($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
            
          //albums start

            echo "<div class=\"col-md-2\">";

            echo "<div class=\"album_container\">";
            echo "<div class=\"album_image\" style=\"position:relative;\">";
            echo "<a href=\"albums.php?id=".$row['id']."\">";
            echo "<img src=\"shop_images/".$row['image']."\" style=\"width:100%;\">";
            echo "<button type=\"button\" class=\"btn btn-primary album_button\" >View</button></a></div>";
           
            echo "<div class=\"album_name\" >";
           
            echo "<h5>".$row['name']."</h5>";
            
            







            echo "</div></div></div>";


           //albums end

        }


      }

        
       

      ?>
    <!--Album End-->
      
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
      </div>
    </div>

        
  </div>
</div>

<br><br>




      <script>
      
      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });
      
     
      
      
      </script>


<div class="foot bg-dark">

<h3>CARATZONE</h3>
<p>2021</p>
</div>



</body>













</html>







