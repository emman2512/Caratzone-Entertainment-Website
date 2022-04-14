<?php
session_start();

if(isset($_SESSION['username'])){



    session_destroy();
    echo "<script>window.location.href = 'accounts.php'</script>";

}

else{

echo "<script>window.location.href = 'accounts.php'</script>";


}





?>