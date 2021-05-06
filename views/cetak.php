<?php
$no_resi = $_GET['no_resi'];
require '../asset/vendor_pdf/vendor/autoload.php';
require '../config/DB.php';
$perintahQuery = mysqli_query($connection,"SELECT order_masuk.id,order_masuk.alamat_jemput,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.no_resi = $no_resi");
$join_tbl = mysqli_fetch_assoc($perintahQuery);
$total = $join_tbl['harga'] * $join_tbl['jumlah'] + $join_tbl['ongkir'];


$status = $_GET['status'];
if(isset($no_resi)){
    $query =mysqli_query($connection, "UPDATE order_masuk SET status='$status' WHERE no_resi=$no_resi");
    if(!$query ) {
        die('Invalid query: ' . mysqli_error($connection));
    }
    
}

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/> 
  
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/>
  <style>
  table, td,th{
    border: 1px solid black;
  }
  </style>
</head>


<body>
<h4 class="text-center">Nota RL381</h4>
<p>Jl. MayorZein</p>
=============================================================
<br>';

 
$html.=
  'Nomor_Resi : '. $join_tbl["no_resi"].'<br>
   Nama Pemesan : '. $join_tbl["nama_pemesan"].'</td><br>
    Tanggal Pesan : '. $join_tbl["tanggal_pesan"].'</td><br>
    Tanggal Selesai : '. $join_tbl["tanggal_selesai"].'</td><br>
    Alamat : '. $join_tbl["alamat_jemput"].'</td><br>
    ============================================================
    Layanan :'. $join_tbl["jenis_layanan"].' Jenis : '.$join_tbl['jenis_item'].'<br>
    Harga : '. $join_tbl["harga"].' x Jumlah :'. $join_tbl["jumlah"].''. $join_tbl["satuan"].'+ Ongkir :'. $join_tbl["ongkir"].'<br>
   =============================================================
   
   Total Bayar :'. $total.'
   =============================================================
   '.date('Y-m-d H:i:s').'<br>
   Terimakasih ';
  
  
  $html .='


</body>
</html>
';

 

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>

  
