<?php
$tombolCari = $_GET['tombolCari'];
$db = mysqli_connect('localhost','root','','rumahlaundry381');
$result =mysqli_query($db, "SELECT * FROM order_masuk WHERE no_resi LIKE '%$tombolCari%' OR nama_pemesan LIKE '%$tombolCari%' OR status LIKE'%$tombolCari%'");

// $row = mysqli_fetch_assoc($result);
//     $rows[] = $row;
    // cek seluruh data mahasiswa
    ?>
            <?php if(mysqli_num_rows($result) > 0){?>
    <table class="table table-striped text-center">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nomor Resi</th>
      <th scope="col">Tanggal Masuk</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Tanggal Selesai</th>
      <th scope="col">Proses</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i = 1;
  while($rows = mysqli_fetch_assoc($result)):
   ?>
    <tr>
      <th scope="row"><?=$i++?></th>
      <td><?=$rows['no_resi'];?></td>
      <td><?=$rows['tanggal_pesan'] ?></td>
      <td><?=$rows['nama_pemesan'] ?></td>
      <th><?=$rows['total_bayar'] ?></th>
      <td><?=$rows['tanggal_selesai'] ?></td>
      <td><?=$rows['status'] ?></td>
      <td></td>
    </tr>
    <?php endwhile;?>

  </tbody>
  </table>
  <?php }else{?>
  <p>Tidak ada hasil</p>
  <?php }?>
  