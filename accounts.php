           
<?php
include_once 'server/databaseConnect.php';
session_start();



if(isset($_POST['username']) && isset($_POST['pass']) ){











}



else{




if(isset($_SESSION['username'])){




  echo file_get_contents("header.html");
  echo file_get_contents("nav.html");
  if(isset($_GET['view'])){
   
    if($_GET['view']=="orders"){
      include ('orders.php');




    }


  }
  else{
    include ('usercontrol.php');



  }

 

}
else{


  include('loginform.php');









}
}
?>





<script>  
      $(document).ready(function(){
       $("body").fadeIn(2000);
      
      });</script>

</body>
</html>



