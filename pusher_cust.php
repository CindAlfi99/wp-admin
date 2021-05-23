
  <?php
  require 'config/DB.php';
  $query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE()  ORDER BY tanggal_pesan DESC");
  //data di layanan
  $data = mysqli_query($connection,"SELECT * FROM layanan");
  // data update

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

  


