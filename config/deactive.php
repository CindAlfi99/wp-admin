<?php
    include('DB.php');
    $id = array();
    // $ids = implode(",",$_POST["id"]);
    $id = $_POST["id"];
    
    
    // $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE notifications SET message_status=0 where id= ".$id." ";
    
    $result = mysqli_query($connection,$deactive);
    echo mysqli_error($connection);

?>