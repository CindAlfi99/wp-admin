<?php
$Cari = $_GET['Cari'];
$db = mysqli_connect('localhost','root','','rumahlaundry381');
$result =mysqli_query($db, "SELECT * FROM order_masuk WHERE nama_pemesan LIKE '%$Cari%' OR tanggal_pesan LIKE '%$Cari%' OR jenis_layanan LIKE'%$Cari%' OR jenis_item LIKE'%$Cari%'");

// $row = mysqli_fetch_assoc($result);
//     $rows[] = $row;
    // cek seluruh data mahasiswa
    ?>
            <?php if(mysqli_num_rows($result) > 0){?>
    <table class="table table-striped text-center">
  <thead>
    <tr>
    <th scope="col">No</th>
      <th scope="col">Nama Konsumen</th>
      <th scope="col">Nomor WA</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jenis Layanan</th>
      <th scope="col">Jenis Item</th>
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Tanggal Selesai</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
  while($rows = mysqli_fetch_assoc($result)):
   ?>
    <tr>
    <th scope="row"><?= $i++;?></th>
      <td><?=$row['nama_pemesan'];?></td>
      <td><?=$row['no_wa'];?></td>
      <td><?=$row['alamat_jemput'];?></td>
      <th><?=$row['jenis_layanan'];?></th>
      <td><?=$row['jenis_item'];?></td>
      <td><?=$row['tanggal_pesan'];?></td>
      <td><?=$row['tanggal_selesai'];?></td>
      <td>Edit |Hapus</td>
    </tr>
    <?php endwhile;?>

  </tbody>
  </table>
  <?php }else{?>
  <p>Tidak ada hasil</p>
  <?php }?>
  