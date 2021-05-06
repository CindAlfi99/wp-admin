<?php
    include('DB.php');
    $tittle =  $_POST["message_tittle"];
    $message_desc  =  $_POST["message_desc"];

    $insert_query = "INSERT INTO notifications(message_tittle,message_desc,message_status)VALUES('".$tittle."','".$message_desc."','1')";
    
    $result = mysqli_query($connection,$insert_query);
    
?>