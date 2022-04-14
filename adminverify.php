<?php

include_once 'server/databaseConnect.php';




session_start();


if(isset($_POST['username']) && isset($_POST['pass']) ){

    
    $sql_username_check = "Select * from admin_account where admin_name = '".$_POST['username']."'";
    $result = mysqli_query($conn,$sql_username_check);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
    //username exist
      

            
    while($row = mysqli_fetch_assoc($result)){

        if( $row['admin_password'] == sha1($_POST['pass'])){




            //correct password
           
            $_SESSION['admin'] = "admin";
         

            header("Location: admin.php");





        }
        else{
          
            //wrong password
            header("Location: adminlogin.php?login_message=failed");

        }





    }
         








    
    
    
    
    
    
    
    }
    else{
        //username not exist

        header("Location: adminlogin.php?login_message=failed");
    






    }
  







}






?>