<?php 
require 'functions.php'; 
require 'owner.php';

$query = mysqli_query($connection, "SELECT * FROM order_masuk");

if(isset($_POST['filter_date'])){
  $form_date = $_POST['form_date'];
  $to_date = $_POST['to_date'];
  $query =mysqli_query($connection, "SELECT * FROM order_masuk WHERE tanggal_pesan between '$form_date' AND '$to_date' ORDER BY id_order ASC");
  
  
}
$querys = mysqli_query($connection, "SELECT * FROM order_masuk");

 ?>
 
<h1><b>Laporan RL381</b></h1>


<div class="container scroll">
<div class="row ">
<form action="" method="post">

<div class="form-row">
   <div class="row">
   <div class="col-5">
      <label for="dari"><span>Pilih Tanggal</span></label>
      <input type="date" name="form_date" class="form-control" id="dari" placeholder="Dari tanggal">
   </div>
   <div class="col-5">
      <label for="ke">Sampai Tanggal</label>
      <input type="date" name="to_date" class="form-control float-right" id="ke" placeholder="Sampai tanggal">
      </div>
      <div class="col-2"><button type="submit" name="filter_date" style="margin-top:32px"class="btn btn-primary">Cari</button></div>
     </div>
    
    </div>

    </form>
    </div>
<div class="row mt-2">
<!-- tombol hari ini -->
<button href="cetak_laporan_today.php" class="col-5  d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-30"></i>Cetak Hari Ini</button>
<?php if(!isset($_POST['filter_date'])):?>
<a href="cetak_laporan_all.php" class=" ml-2 col-5 d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-30"></i>Cetak Semua </a>
 <?php endif;?>
<?php if(isset($_POST['filter_date'])):
  $form_date = $_POST['form_date'];
  $to_date = $_POST['to_date'];?>
<a href="cetak_laporan.php?tanggal_pesan=<?=$form_date?>&to_date=<?=$to_date?>" class=" ml-3 mb-2  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Cetak</a>
 <?php endif;?>
<table class="table table-striped text-center mt-4">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Tanggal Masuk</th>
              <th scope="col">Nama Pelanggan</th>
              <th scope="col">Total Pembayaran</th>
              <th scope="col">Tanggal Selesai</th>
              <th scope="col">Status</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td scope="row"><?= $i++ ?></td>
                <td><?= $row['no_resi']; ?></td>
                <td><?= $row['tanggal_pesan'] ?></td>
                <td><?= $row['nama_pemesan'] ?></td>
                <td><?= $row['total_bayar'] ?></td>
                <td><?= $row['tanggal_selesai'] ?></td>
                <td><?= $row['status_cucian'] ?></td>
                <td><button type="button" id="tombolDetail"data-resi="<?= $row['no_resi']?>" data-jumlah="<?= $row['jumlah']?>" data-satuan="<?= $row['satuan']?>"  data-nama="<?= $row['nama_pemesan']?>" data-wa="<?= $row['no_wa']?>" data-alamat="<?= $row['alamat_jemput']?>" data-layanan="<?= $row['jenis_layanan']?>" data-item="<?= $row['jenis_item']?>" data-pesan="<?= $row['tanggal_pesan']?>" data-selesai="<?= $row['tanggal_selesai']?>" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Detail
</button></td>
               
              
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
</div>
</div>
<!-- modal detail -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
    <label for="alamat_jemput">No Resi</label>
    <input type="text" class="form-control" name="no_resi" id="no_resi" aria-describedby="emailHelp">
  </div>
      <div class="form-group">
    <label for="nama_pemesan">Nama Pemesan </label>
    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" aria-describedby="emailHelp">
  </div>
      <div class="form-group">
    <label for="nama_pemesan">Nomor WA </label>
    <input type="text" class="form-control"  name="no_wa" id="no_wa" aria-describedby="emailHelp">

  </div>
  <div class="form-group">
    <label for="alamat_jemput">alamat Jemput</label>
    <input type="text" class="form-control" name="alamat_jemput" id="alamat_jemput" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_layanan">Jenis Layanan</label>
    <input type="text" class="form-control" name="jenis_layanan" id="jenis_layanan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_item">Jenis Item</label>
    <input type="text" class="form-control" name="jenis_item" id="jenis_item" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Jumlah</label>
    <input type="number" class="form-control" name="jumlah" id="jumlah" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Satuan</label>
    <input type="text" class="form-control" name="satuan" id="satuan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Tanggal Pesan</label>
    <input type="text" class="form-control" name="tgl_pesan" id="tgl_pesan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_selesai">Tanggal Selesai</label>
    <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" aria-describedby="emailHelp">
  </div>
  <!-- <div class="form-group">
    <label for="nama_pemesan">Nomor Pemesan </label>
    <input type="text" class="form-control" name="nama_pemesan" value="<?= $q['nama_pemesan']?>" aria-describedby="emailHelp">
    
  </div> -->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>

 <?php require 'template/footer.php';?>