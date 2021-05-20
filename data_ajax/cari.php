<?php
$tombolCari = $_GET['tombolCari'];
$db = mysqli_connect('localhost','root','','rumahlaundry381');
$result =mysqli_query($db, "SELECT * FROM order_masuk WHERE no_resi LIKE '%$tombolCari%' OR nama_pemesan LIKE '%$tombolCari%' OR status_cucian LIKE'%$tombolCari%' OR mode LIKE'%$tombolCari%'");

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
      <th scope="col">Tanggal Pesan</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Total Pembayaran</th>
      <th scope="col">Tanggal Selesai</th>
      <th scope="col">Status Cucian</th>
      <th scope="col">Proses</th>
      <th scope="col">Status Pembayaran</th>
     
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
      <td><?=$rows['status_cucian'] ?></td>
      <td>
                  <?php
                  if ($rows['status_cucian'] === 'jemput') {
                  ?>
                    <a href="status.php?id=<?= $rows['id_order'] ?>&status_cucian=proses" class="btn btn-outline-info">Proses</a>
                  <?php } elseif ($rows['status_cucian'] === 'proses') {?>
                    <a href="status.php?id=<?= $rows['id_order'] ?>&status_cucian=selesai" class="btn btn-outline-danger">Selesai</a>
                  <?php }
                  //  elseif ($row['status'] === 'selesai') {?>

                  <?php if ($rows['status_cucian'] === 'selesai'): ?>
                  <a href="transaksi.php?no_resi=<?= $rows['no_resi'] ?>" class="btn btn-outline-success">Hitung</a></td>
                 <?php endif?>
                 <td> <?php
                  if ($rows['status_pembayaran'] === 'belum_lunas'):
                  ?>
                    <a href="status.php?id_pembayaran=<?= $rows['id_order'] ?>&status_pembayaran=lunas" class="btn btn-outline-info">Lunas</a>
                   <?php  elseif ($rows['status_pembayaran'] === 'lunas'):?>
                    <a href="order.php" >Lunas</a>
                  
                 
                 <?php endif?></td>

    </tr>
    <?php endwhile;?>

  </tbody>
  </table>
  <?php }else{?>
  <p>Tidak ada hasil</p>
  <?php }?>
  