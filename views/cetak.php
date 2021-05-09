<?php
$no_resi = $_GET['no_resi'];
require '../asset/vendor_pdf/vendor/autoload.php';
require '../config/DB.php';
$query =  mysqli_query($connection, "SELECT DISTINCT no_resi, alamat_jemput,nama_pemesan,tanggal_pesan,tanggal_selesai FROM order_masuk WHERE no_resi = $no_resi");
$perintahQuery = mysqli_query($connection,"SELECT order_masuk.id, order_masuk.jenis_layanan, order_masuk.jenis_item, order_masuk.jumlah,order_masuk.ongkir, order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.no_resi = $no_resi ");
$join_tbl = mysqli_fetch_assoc($query);




$status = $_GET['status'];
if(isset($status)){
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

</head>


<body >

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
    ============================================================<br>';
   
    $count =0;
   $ongkir = 0;
    
    
    while($row = mysqli_fetch_assoc($perintahQuery)){
      $total = $row['harga'] * $row['jumlah'];
  $count += $total;
    $html.= 'Layanan :'. $row["jenis_layanan"].'<br> Jenis : '.$row['jenis_item'].'<br>
    Harga : '. $row["harga"].' x Jumlah :'. $row["jumlah"].''. $row["satuan"].'<br>';
  $ongkir += $row['ongkir'];
    };
    
    if($ongkir > 10000){
      $ongkir = $ongkir - 5000;
      $count += $ongkir;
      $html .=' Ongkir :'. $ongkir.'<br>';
    }elseif($ongkir == 10000){
      $count += 10000;
      $ong = 10000;
    $html .=' Ongkir :'.$ong.'<br>';
    }
  
    $html.='=============================================================<br>
   Total Bayar :'. $count.'
   =============================================================<br>
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

  
