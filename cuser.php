<?php
include_once 'server/databaseConnect.php';
?>





<?php




$sql = "Select * from accounts where username = '".$_POST['susername']."'";
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);





if($resultCheck > 0){
    $message = array("exist"=>"true");

    $myJSONmessage = json_encode($message);


    echo $myJSONmessage;





}

else{

    $message = array("exist"=>"false");

    $myJSONmessage = json_encode($message);

    echo $myJSONmessage;





}














?>