<?php

include_once 'server/databaseConnect.php';




session_start();
if(isset($_POST['username']) && isset($_POST['pass']) ){

    
    $sql_username_check = "Select * from accounts where username = '".$_POST['username']."'";
    $result = mysqli_query($conn,$sql_username_check);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
    //username exist
      

            
    while($row = mysqli_fetch_assoc($result)){

        if( $row['password'] == sha1($_POST['pass'])){




            //correct password
           
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];

            header("Location: accounts.php");





        }
        else{
          
            //wrong password
            header("Location: accounts.php?loginmessage=1");

        }





    }
         








    
    
    
    
    
    
    
    }
    else{
        //username not exist

       header("Location: accounts.php?loginmessage=0");
    






    }
  







}






?>