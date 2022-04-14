<?php

session_start();


if(isset($_SESSION['admin'])){

    if($_SESSION['admin'] == "admin"){

        header("location: adminorders.php");

    }


}

else{

 header("location: adminlogin.php");

}


























?>