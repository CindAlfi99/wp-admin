<?php

require '../asset/vendor_pdf/vendor/autoload.php';
require '../config/DB.php';
$form_date = $_GET['tanggal_pesan'];
$to_date = $_GET['to_date'];
$perintahQuery = mysqli_query($connection,"SELECT order_masuk.id,order_masuk.alamat_jemput,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan,order_masuk.total_bayar,order_masuk.tanggal_selesai,order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.tanggal_pesan between '$form_date' AND '$to_date' ORDER BY tanggal_pesan ASC");

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
<center> <h1>Laporan Rumah Laundry</h1></center>
<br>
<table  cellpadding="7" cellspacing="0">
<tr>
<th>No</th>
<th>No Resi</th>
<th>Nama Pemesan</th>
<th>Tanggal</th>
<th>Total Bayar</th>
<th>Selesai</th>
<th>Jenis Layanan</th>
<th>Status</th>


</tr>';
$i=1;
  while($row = mysqli_fetch_assoc($perintahQuery)){
$html.=
  '<tr>
  <th>'.$i.'</th>
    <td>'. $row["no_resi"].'</td>
    <td>'. $row["nama_pemesan"].'</td>
    <td>'. $row["tanggal_pesan"].'</td>
    <td>'. $row["total_bayar"].'</td>
    <td>'. $row["tanggal_selesai"].'</td>
    <td>'. $row["jenis_layanan"].'</td>
    <td>'. $row['status'].'</td>
    
    
  </tr>';
  $i++;
  };
  $html .='
</table>
<img width="100" src="ttd.jpg" style="margin-left:80%; margin-top:5%"><h5 style="margin-left:75%">Admin</h5>
</body>
</html>
';

 

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
?>

  
