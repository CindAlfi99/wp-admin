<?php
require '../config/DB.php';



$id= $_GET["id"];
if(hapus($id)>0){
    echo "<script>alert('data berhasil dihapus!');
    document.location.href='customer.php';</script>";
}else{
    echo "<script>alert('data gagal dihapus!');
    document.location.href='customer.php';</script>";
}


function hapus($id){
    global $connection;
mysqli_query($connection, "DELETE FROM order_masuk WHERE id=$id");
return mysqli_affected_rows($connection);
}