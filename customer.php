<?php require 'template/header.php';
require 'functions.php';
// data hari ini
$query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE()");
//data di layanan
$data = mysqli_query($connection,"SELECT * FROM layanan");
// data update
if(isset($_POST['ubah'])){
  if(ubahProduk($_POST) > 0){
    $alert_ubah = true;
  }else{
$alert_gagal = true;
 
  }
}

// if (isset($_POST['tampil'])) {
//   $value = $_POST['show'];
//   $perintahQuery = "SELECT * FROM order_masuk LIMIT $value";
//   $query = mysqli_query($connection, $perintahQuery);
// }



// if(isset($_POST['tambah'])){
//   if(tambahProduk($_POST) > 0){
//     echo "<script> alert('Data berhasil diubah');
//     document.location.href ='customer.php'; </script>";
//   }else{

//     echo "<script> alert('Data gagal diubah!');
//     document.location.href ='customer.php'; </script>";
 
//   }
// }
?>

<head>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/> -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css"/> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

 
   
 
    

</head>




<div class="container scroll">
<!-- search -->
<div class="row">
<div class="col-md-5">
<!-- alert simpan -->
<div class="alert alert-success alert-dismissible fade" role="alert">
  <strong>Berhasil disimpan!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<!-- alert end -->
<!-- alert ubah -->
<?php if(isset($alert_ubah)):?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Berhasil diubah!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif?>
<?php if(isset($alert_gagal)):?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Gagal diubah!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif?>
<!-- alert end -->



<!-- <div class="form-group mb-2">
    <input type="text" class="form-control" id="cari_customer" placeholder="cari.." autofocus autocomplete="off">
  </div> -->
</div></div>
<div class="row">
  <div class="col-md-12">
   
  </div> 
<div class="col-md-12 text-right"><button type="button text-right" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
  Tambah data
</button></div>
<div class="col-md-12 text-right"><a href="#" onclick="window.location.reload();"> Segarkan Halaman </a></div></div>
<div class="row">
<h5 class="ml-3 mb-3">Data Konsumen Hari Ini</h5>
<div class="col-md-12">

<div class="containe" id="containers">

<table id="example">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Konsumen</th>
      <th scope="col">Nomor WA</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Layanan</th>
      <th scope="col">Jenis Item</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Status Cucian</th>
      <th scope="col">Status Pembayaran</th>
      <th scope="col">Mode Pesan</th>
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Tanggal Selesai</th>
      <th scope="col">Opsi</th>
    </tr>
   
  </thead>
  <tbody id="div1">
  <?php

  $i = 1;
   foreach($query as $row):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?=$row['nama_pemesan'];?></td>
      <td><?=$row['no_wa'];?></td>
      <td><?=$row['alamat_jemput'];?></td>
      <th><?=$row['jenis_layanan'];?></th>
      <td><?=$row['jenis_item'];?></td>
      <td><?=$row['jumlah'];?></td>
      <td><?=$row['status_cucian'];?></td>
      <td><?=$row['status_pembayaran'];?></td>
      <td><?=$row['mode'];?></td>
      <td><?=$row['tanggal_pesan'];?></td>
      <td><?=$row['tanggal_selesai'];?></td>
      <th><a type="submit" class="btn btn-primary" id="tombolUbah" data-id="<?= $row['id_order']?>" data-nama="<?= $row['nama_pemesan']?>" data-cucian="<?= $row['status_cucian']?>" data-pembayaran="<?= $row['status_pembayaran']?>" data-wa="<?= $row['no_wa']?>" data-alamat="<?= $row['alamat_jemput']?>" data-layanan="<?= $row['jenis_layanan']?>" data-item="<?= $row['jenis_item']?>" data-jumlah="<?= $row['jumlah']?>" data-pesan="<?= $row['tanggal_pesan']?>" data-selesai="<?= $row['tanggal_selesai']?>" height="50px" data-toggle="modal" data-target="#edit"> Edit</a> <br>
      <a class="btn btn-danger" href="hapus.php?id=<?= $row['id_order'];?>" onclick="return confirm('Confirm');">Hapus</a>
      <a class="btn btn-info" href="nota_sementara.php?no_resi=<?= $row['no_resi'];?>">Cetak</a>
      </th>
      
    </tr>
    <?php endforeach;?>
   
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
    <label for="nama_pemesan">Nama Pemesan </label>
    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="no_wa">No_Wa</label>
    <input type="number" class="form-control" name="no_wa" id="no_wa" aria-describedby="emailHelp">
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
    <label for="jenis_item">Jumlah</label>
    <input type="number" class="form-control"  name="jumlah" id="jumlah" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_item">Status Cucian</label>
    <input type="text" class="form-control" name="cucian" id="cucian" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_item">Status Pembayaran</label>
    <input type="text" class="form-control" name="pembayaran" id="pembayaran" aria-describedby="emailHelp">
  </div>
  
 
  <div class="form-group">
    <label for="tgl_pesan">Tanggal Pesan</label>
    <input type="text" class="form-control" name="tgl_pesan" id="tgl_pesan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_selesai">Tanggal Selesai</label>
    <input type="text" class="form-control" name="tgl_selesai" id="tgl_selesai" aria-describedby="emailHelp">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="ubah" class="btn btn-primary" id="btn" >Update</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

      <form id="form-order">
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="name">Nama</label>
            <input type="text" name="nama" class="form-control" required id="name" autofocus>
          </div>
          <div class="form-group col-md-12">
            <label for="wa">No.Telp (WA)</label>
            <input type="number" name="no_wa" class="form-control" required id="wa">
          </div>
          
          
          <div class="form-group col-md-12">
            <label for="address col-md-12">Alamat </label>
            <textarea name="alamat" class="form-control" required id="address" placeholder="Masukkan Alamat Penjemputan"></textarea>
          </div>
          <div class="form-group col-md-3 layanan">
            <label>Layanan</label>
            <select name="layanan[0][jenis]" class="form-control" required onchange="my_fun(this.value, 0);">
              <option selected>Pilih..</option>
              <option value="Kiloan">Kiloan</option>
              <option value="Satuan">Satuan</option>
              <option value="Karpet">Karpet</option>
              <option value="Sepatu">Sepatu</option>
            </select>
          </div>
          <div class="form-group col-md-7">
            <label>Jenis item</label>
            <select name="layanan[0][item]" class="form-control jenis-item-0">
              <option>Pilih Layanan</option>
            </select>
          </div>
          <div class="form-group col-md-2 jumlah">
            <label>Jumlah</label>
            <input type="number" name="layanan[0][jml_item]" class="form-control">
          </div>
          
          <div class="form-group col-md-2 offset-md-10">
            <button type="button" class="btn btn-link btn-tambah">Tambah +</button>
          </div>
        </div>

        <input type="submit"  value="Order Sekarang" class="btn btn-primary">
      </form>
    
      </div>
    </div>
  </div>


 

<!-- modal tambah -->

<!-- <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
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
    <label for="nama_pemesan">Nama Pemesan </label>
    <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="no_wa">No_Wa</label>
    <input type="number" class="form-control" name="no_wa" id="no_wa" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="alamat_jemput">alamat Jemput</label>
    <input type="text" class="form-control" name="alamat_jemput" id="alamat_jemput" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_layanan">Jenis Layanan</label>
    <select class="form-control" id="jenis_layanan" name="jenis_layanan">
                            <option value="kiloan">Kiloan</option>
                            <option value="satuan">Satuan</option>   
                            <option value="sepatu">Sepatu</option>   
                            <option value="karpet">Karpet</option>   
   </select>
   
  </div>
  <div class="form-group">
    <label for="jenis_item">Jenis Item</label>
      <select class="form-control" id="jenis_item" name="jenis_item">

   </select>
 
  </div>
  <div class="form-group">
    <label for="jenis_item">Jumlah</label>
    <input type="number" class="form-control" name="jumlah" id="jumlah" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="jenis_item">Satuan</label>
    <select class="form-control" id="satuan" name="satuan">
                            <option value="kg">Kg</option>
                            <option value="pcs">Pcs</option>   
   </select>
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Harga</label>
    <input type="number" class="form-control" name="harga" id="harga" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Status</label>
    <input type="text" value="jemput" class="form-control" name="status" id="status" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_pesan">Tanggal Pesan</label>
    <input type="date" class="form-control" name="tgl_pesan" id="tgl_pesan" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="tgl_selesai">Tanggal Selesai</label>
    <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" aria-describedby="emailHelp">
  </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="tambah" class="btn btn-primary" >Tambah</button>
      </div>
 
    </form>
      </div>
    </div>
  </div> -->


 <?php require 'template/footer.php';?>