 <?php 
// require 'config/DB.php';
$no_resi = $_GET['no_resi'];
// if(!$_GET['no_resi'] || $_GET['no_resi']===''){
//   header("Location: order.php");
//   exit;
// }
?>
<!doctype html>
<html lang="en">
<?php require 'template/header.php';?>
<body id="page-top">
<?php require 'template/navbar.php';?>
<div class="container ml-4 mt-5" style="margin-bottom:150px">


<?php 
  $query = mysqli_query($connection, "SELECT order_masuk.id_order,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status_cucian, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.status_cucian ='selesai' AND order_masuk.no_resi =$no_resi");
  $querys = mysqli_query($connection, "SELECT order_masuk.id_order,order_masuk.no_resi,order_masuk.mode, order_masuk.nama_pemesan,order_masuk.tanggal_selesai,order_masuk.alamat_jemput, order_masuk.jenis_layanan, order_masuk.jumlah, order_masuk.no_wa, order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status_cucian, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.status_cucian ='selesai' AND order_masuk.no_resi =$no_resi");
  $q = mysqli_fetch_assoc($querys);?>
<div class="row">
      <div class="col-6">
        <p>No : <?= $q['no_resi']; ?></p>
      </div>
      <div class="col-6">
        <p>No. Hp : <?= $q['no_wa']; ?></p>
      </div>
      <div class="col-6">
        <p>Nama : <?= $q['nama_pemesan']; ?></p>
      </div>
      <div class="col-6">
        <p>Tgl. Pesan : <?= $q['tanggal_pesan']; ?></p>
      </div>
      <div class="col-6">
        <p>Alamat : <?= $q['alamat_jemput']; ?></p>
      </div>
      <div class="col-6">
        <p>Mode Pesan : <?= $q['mode']; ?></p>
      </div>
      <div class="col-6">
        <p>Tgl Selesai : <?= $q['tanggal_selesai']; ?></p>
      </div>
    </div>
    <br>
    <div class="row">
    <div class="col-md-11 scroll">


<h5>List Data Transaksi </h5>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">No</th>

      <th scope="col">Jenis Item</th>
      <th scope="col">Biaya</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Satuan</th>
      <th scope="col">Biaya Akhir</th>
     
    </tr>
  </thead>
  <tbody>

  <?php $i=1;
  $count = 0;
  ?>
    <?php while($row = mysqli_fetch_assoc($query)):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      
      <td><?= $row['jenis_item'];?></td>
      <th><?= $row['harga'];?></th>
      <th><?= $row['jumlah'];?></th>
      <td><?= $row['satuan'];?></td>
     <?php 
$total = $row['harga'] * $row['jumlah'] + $row['ongkir'];?>
<?php $count +=$total;?>
      <th><?= $total;?></th> 
      
    </tr>
    <?php endwhile;?>

  </tbody>
</table>
</div>

</div>
<hr class="bg-primary mr-5">
<!-- transaksi -->
<p class="text-end float-right mr-5"><strong>Jumlah</strong>: <?= $count; ?></p>
<?php if($q['mode']==='online'):?>
  <a href="cetak_payments.php?no_resi=<?= $q['no_resi'] ?>&status_cucian=antar"target="_blank" class="btn btn-info mb-2 col-md-2 ml-3">Cetak</a>
  <?php endif?>
  <?php if($q['mode']==='offline'):?>
  <a href="cetak_payments.php?no_resi=<?= $q['no_resi'] ?>&status_cucians=diambil"target="_blank" class="btn btn-info mb-2 col-md-2 ml-3">Cetak</a>
  <?php endif?>

</form>

</div>

 <?php require 'template/footer.php';?>
 </body>
 </html>