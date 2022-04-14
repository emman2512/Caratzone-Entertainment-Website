<?php
session_start();

if(isset($_SESSION['admin'])){



    session_destroy();
    echo "<script>window.location.href = 'admin.php'</script>";

}

else{

echo "<script>window.location.href = 'admin.php'</script>";


}





?>