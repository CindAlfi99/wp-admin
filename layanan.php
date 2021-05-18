<?php 
 require 'template/header.php';
require 'functions.php';
// data hari ini
$query = mysqli_query($connection, "SELECT * FROM layanan ORDER BY jenis_item ASC");
//data di layanan

$rows = mysqli_fetch_assoc($query);
// data update
if(isset($_POST['ubah'])){
  if(ubahLayanan($_POST) > 0){
    echo "<script> alert('Data berhasil diubah');
    document.location.href ='layanan.php'; </script>";
  }else{

    echo "<script> alert('Data gagal diubah!');
    document.location.href ='layanan.php'; </script>";
 
  }
}

if(isset($_POST['tambah'])){
  if(tambahLayanan($_POST) > 0){
    echo "<script> alert('Data berhasil ditambah');
    document.location.href ='layanan.php'; </script>";
  }else{

    echo "<script> alert('Data gagal ditambah!');
    document.location.href ='layanan.php'; </script>";
 
  }
}
?>


<div class="container">
<!-- search -->
<div class="row">
<div class="col-md-5">
<div class="form-group mb-3">
    <input type="text" class="form-control" id="cari" placeholder="cari" autofocus autocomplete="off">
  </div>
</div></div>
<div class="row">
<div class="col-md-12 text-right"><button type="button text-right" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
  Tambah data
</button></div></div>
<div class="row">
<h5 class="ml-3 mb-3 mt-4"><b>Daftar Layanan Rumah Laundry 381</b></h5>
<div class="col-md-12">
<div class="containe" id="containe">
<table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jenis Item</th>
      <th scope="col">Jenis Layanan</th>
      <th scope="col">Satuan</th>
      <th scope="col">Harga</th>
      <th scope="col">Opsi</th>
    </tr>
   
  </thead>
  <tbody>
  <?php
  $i = 1;
   foreach($query as $row):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?=$row['jenis_item'];?></td>
      <td><?=$row['jenis_layanan'];?></td>
      <td><?=$row['satuan'];?></td>
      <th><?=$row['harga'];?></th>
      <th><a type="submit" class="btn btn-primary" id="tombolUbah"data-id="<?= $row['id']?>" data-nama="<?= $row['nama_pemesan']?>" data-wa="<?= $row['no_wa']?>" data-alamat="<?= $row['alamat_jemput']?>" data-layanan="<?= $row['jenis_layanan']?>" data-item="<?= $row['jenis_item']?>" data-pesan="<?= $row['tanggal_pesan']?>" data-selesai="<?= $row['tanggal_selesai']?>" height="50px" data-toggle="modal" data-target="#edit"> Edit</a> <br>
      <a class="btn btn-primary" href="hapus.php?id=<?= $row['id'];?>" onclick="return confirm('Confirm');">Hapus</a>
      </th>
      <?php endforeach;?>
    </tr>
  
  </tbody>
</table>
</div>

</div>
</div>
</div>

<!-- modal edit -->
 <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Ubah Data</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group">
    <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp">
  </div>

 
  <div class="form-group">
    <label for="jenis_layanan">Jenis Layanan</label>
    <select class="form-control" id="jenis_layanan" name="jenis_layanan">
    <option selected>Pilih Layanan</option>
            <option value="Satuan" <?= $rows['jenis_layanan'] == "Satuan" ? "selected" : "" ?>>Satuan</option>
            <option value="Kiloan" <?= $rows['jenis_layanan'] == "Kiloan" ? "selected" : "" ?>>Kiloan</option>
            <option value="Karpet" <?= $rows['jenis_layanan'] == "Karpet" ? "selected" : "" ?>>Karpet</option>
            <option value="Sepatu" <?= $rows['jenis_layanan'] == "Sepatu" ? "selected" : "" ?>>Sepatu</option>

   </select>
  </div>
  <div class="form-group">
    <label for="jenis_item">Jenis Item</label>
    <input type="text" class="form-control" name="jenis_item" id="jenis_item" aria-describedby="emailHelp" value="<?= $rows['jenis_item']?>">
  </div>
  <div class="form-group">
  <label for="jenis_item">Satuan</label>
  <select class="form-control" id="satuan" name="satuan">
    <option selected>Pilih Satuan</option>
            <option value="kg" <?= $rows['satuan'] == "kg" ? "selected" : "" ?>>Kg</option>
            <option value="pcs" <?= $rows['satuan'] == "pcs" ? "selected" : "" ?>>Pcs</option>
   </select>
   </div>

  <div class="form-group">
    <label for="">Harga</label>
    <input type="number" class="form-control" name="harga" value="<?= $rows['harga']?>" id="harga" aria-describedby="emailHelp">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="ubah" class="btn btn-primary" >Update</button>
      </div>
 
    </form>
    </div>
  </div>
</div>

<!-- modal tambah -->

<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Tambah Data</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">

 
  <div class="form-group">
    <label for="jenis_layanan">Jenis Layanan</label>
    <select class="form-control" id="jenis_layanan" name="jenis_layanan">
    <option selected>Pilih Layanan</option>
            <option value="Satuan">Satuan</option>
            <option value="Kiloan">Kiloan</option>
            <option value="Karpet">Karpet</option>
            <option value="Sepatu">Sepatu</option>

   </select>
  </div>
  <div class="form-group">
    <label for="jenis_item">Jenis Item</label>
    <input type="text" class="form-control" name="jenis_item" id="jenis_item" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
  <label for="jenis_item">Satuan</label>
  <select class="form-control" id="satuan" name="satuan">
    <option selected>Pilih Satuan</option>
            <option value="kg">Kg</option>
            <option value="pcs">Pcs</option>
   </select>
   </div>

  <div class="form-group">
    <label for="">Harga</label>
    <input type="number" class="form-control" name="harga" id="harga" aria-describedby="emailHelp">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah" class="btn btn-primary" >Tambah</button>
      </div>
 
    </form>
    </div>
  </div>
</div>

 <?php require 'template/footer.php';?>
