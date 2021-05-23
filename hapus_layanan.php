<?php
$connection = mysqli_connect('localhost','root','','rumahlaundry381');



$id= $_GET["id"];
if(hapus($id)>0){
    echo "<script>alert('data berhasil dihapus!');
    document.location.href='layanan.php';</script>";
}else{
    echo "<script>alert('data gagal dihapus!');
    document.location.href='layanan.php';</script>";
}


function hapus($id){
    global $connection;
mysqli_query($connection, "DELETE FROM layanan WHERE id_layanan=$id");
return mysqli_affected_rows($connection);
}