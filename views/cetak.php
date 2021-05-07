<?php
$no_resi = $_GET['no_resi'];
require '../asset/vendor_pdf/vendor/autoload.php';
require '../config/DB.php';
$perintahQuery = mysqli_query($connection,"SELECT order_masuk.id,order_masuk.alamat_jemput,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.no_resi = $no_resi ORDER BY tanggal_pesan ASC");
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

while($row = mysqli_fetch_assoc($perintahQuery)){
$html.=

  'Nomor_Resi : '. $row["no_resi"].'<br>
   Nama Pemesan : '. $row["nama_pemesan"].'</td><br>
    Tanggal Pesan : '. $row["tanggal_pesan"].'</td><br>
    Tanggal Selesai : '. $row["tanggal_selesai"].'</td><br>
    Alamat : '. $row["alamat_jemput"].'</td><br>
    ============================================================
    Layanan :'. $row["jenis_layanan"].' Jenis : '.$row['jenis_item'].'<br>
    Harga : '. $row["harga"].' x Jumlah :'. $join_tbl["jumlah"].''. $row["satuan"].'+ Ongkir :'. $row["ongkir"].'<br>
   =============================================================
   
   Total Bayar :'. $total.'
   =============================================================
   '.date('Y-m-d H:i:s').'<br>
   Terimakasih ';
  
  };
  $html .='


</body>
</html>
';

 

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>

  
