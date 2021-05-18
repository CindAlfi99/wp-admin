<?php 
require 'config/DB.php';
$id = $_GET['id'];
$status = $_GET['status_cucian'];
if(isset($id)){
    $query =mysqli_query($connection, "UPDATE order_masuk SET status_cucian='$status' WHERE id_order=$id");
    if(!$query ) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    header("Location: order.php");
    exit;
}
$id_pembayaran = $_GET['id_pembayaran'];

if(isset($id_pembayaran)){
    $status_pembayaran = $_GET['status_pembayaran'];
    $query =mysqli_query($connection, "UPDATE order_masuk SET status_pembayaran='$status_pembayaran' WHERE id_order=$id_pembayaran");
    if(!$query ) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    header("Location: order.php");
    exit;
}