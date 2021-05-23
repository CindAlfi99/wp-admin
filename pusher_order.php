<?php 
  require 'config/DB.php';
$query = mysqli_query($connection, "SELECT * FROM order_masuk ORDER BY tanggal_pesan DESC");

?>
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
               
                <td>
                  <?php
                  if ($row['status_cucian'] === 'jemput') {
                  ?>
                    <a href="status.php?id=<?= $row['id_order'] ?>&status_cucian=proses" class="btn btn-outline-info">Proses</a>
                  <?php } elseif ($row['status_cucian'] === 'proses') {?>
                    <a href="status.php?id=<?= $row['id_order'] ?>&status_cucian=selesai" class="btn btn-outline-danger">Selesai</a>
                  <?php }
                  //  elseif ($row['status'] === 'selesai') {?>

                  <?php if ($row['status_cucian'] === 'selesai'): ?>
                  <a href="transaksi.php?no_resi=<?= $row['no_resi'] ?>" class="btn btn-outline-success">Hitung</a></td>
                 <?php endif?>
              
            
            <td> <?php
                  if ($row['status_pembayaran'] === 'belum_lunas'):
                  ?>
                    <a href="status.php?id_pembayaran=<?= $row['id_order'] ?>&status_pembayaran=lunas" class="btn btn-outline-info">Lunas</a>
                   <?php  elseif ($row['status_pembayaran'] === 'lunas'):?>
                    <a href="order.php" >Lunas</a>
                  
                 
                 <?php endif?></td>
               
                 </tr>
                 <?php endwhile; ?>