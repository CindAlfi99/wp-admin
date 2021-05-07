<?php require 'template/header.php';
$no_resi = $_GET['no_resi'];

$query = mysqli_query($connection, "SELECT order_masuk.id,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.status ='selesai' AND order_masuk.no_resi =$no_resi");


?>
<div class="container ml-4" style="margin-bottom:150px">
<div class="row">
    <div class="col-md-11 scroll">

<h5>List Data Hitung Transaksi </h5>
<table class="table text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor resi</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Nama Layanan</th>
      <th scope="col">Biaya</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Satuan</th>
      <th scope="col">Biaya Akhir</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>

  <?php $i=1;?>
    <?php while($row = mysqli_fetch_assoc($query)):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?= $row['no_resi']; ?></td>
      <td><?= $row['nama_pemesan'];?></td>
      <td><?= $row['jenis_layanan'];?></td>
      <th><?= $row['harga'];?></th>
      <th><?= $row['jumlah'];?></th>
      <td><?= $row['satuan'];?></td>
     <?php 
$total = $row['harga'] * $row['jumlah'] + $row['ongkir'];?>
      <th><?= $total;?></th> 
      <td>Edit | hapus</td>
    </tr>
    <?php endwhile;?>

  </tbody>
</table>
</div>

</div>
<hr class="bg-primary mr-5">
<!-- transaksi -->

<div class="row ml-2"><h5>Transaksi</h5></div>
<form class="form-inline">
<div class="form-group mx-sm-3 mb-2 m-2">
<?php if(isset($no_resi)):?>
  
 <?php $no_resi = $_GET['no_resi'];
$querys = mysqli_query($connection, "SELECT order_masuk.id,order_masuk.no_resi, order_masuk.nama_pemesan, order_masuk.jenis_layanan, order_masuk.jumlah,order_masuk.tanggal_pesan, order_masuk.ongkir, order_masuk.status, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.no_resi =$no_resi AND order_masuk.status='selesai'"); ?>
<?php endif ?>


<?php if(!isset($no_resi)):?>

 <h3 class="text-center text-danger">Tidak ada transaksi ! Silakan cek di data <a href="order.php">order</a></h3> 
 <?php endif; ?>

<?php while($join_tbl = mysqli_fetch_assoc($querys)):?>

    <label for="nama_layanan" class="sr-only">Nama Layanan</label>
    <input type="text" class="form-control p-2 bg-light" id="nama_layanan" value="<?=$join_tbl['jenis_layanan']?>" placeholder="nama layanan">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="nomor_resi" class="sr-only">Nomor Resi</label>
    <input type="number" class="form-control p-2 bg-light" id="nomor_resi" placeholder="Nomor resi" value="<?=$join_tbl['no_resi']?>">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="tanggal" class="sr-only">Tanggal</label>
    <input type="text" class="form-control p-2 bg-light" id="tanggal" placeholder="Tanggal" value="<?=$join_tbl['tanggal_pesan']?>">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="nama_item" class="sr-only">Nama Item</label>
    <input type="text" class="form-control p-2 bg-light" id="nama_item" placeholder="nama item" value="<?=$join_tbl['jenis_item']?>">
  </div>
  
  <div class="form-group mx-sm-3 mb-2 m-2">
 
    <label for="biaya" class="sr-only p-4">Biaya</label>
    <input type="number" class="form-control p-2 bg-light" id="biaya" placeholder="biaya" value="<?=$join_tbl['harga']?>">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="jumlah" class="sr-only">Jumlah</label>
    <input type="number" class="form-control p-2 bg-light" id="jumlah" placeholder="jumlah" value="<?=$join_tbl['jumlah']?>">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="satuan" class="sr-only">Satuan</label>
    <input type="text" class="form-control p-2 bg-light" id="satuan" placeholder="satuan" value="<?=$join_tbl['satuan']?>">
  </div>
  <div class="form-group mx-sm-2 mb-2 m-2">
    <label for="ongkir" class="sr-only">Biaya Ongkir</label>
    <input type="number" class="form-control p-3 bg-light" id="ongkir" placeholder="ongkir" value="<?=$join_tbl['ongkir']?>">
  </div>
  <div class="form-group mx-sm-3 mb-2 m-2">
    <label for="biaya_akhir" class="sr-only">Biaya Akhir</label>
    <input type="number" class="form-control p-5 bg-light" id="biaya_akhir" placeholder="biaya_akhir" value="<?=$total?>">
  </div>
  <a href="cetak.php?no_resi=<?= $join_tbl['no_resi'] ?>&status=lunas" class="btn btn-info mb-2 col-md-2 ml-3">Cetak</a>
  
  <?php endwhile;?>
  
  
  
  


  
  
  
</form>
</div>

 <?php require 'template/footer.php';?>