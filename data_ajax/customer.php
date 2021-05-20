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
      <td><?=$rows['nama_pemesan'];?></td>
      <td><?=$rows['no_wa'];?></td>
      <td><?=$rows['alamat_jemput'];?></td>
      <th><?=$rows['jenis_layanan'];?></th>
      <td><?=$rows['jenis_item'];?></td>
      <td><?=$rows['tanggal_pesan'];?></td>
      <td><?=$rows['tanggal_selesai'];?></td>
      <th><a type="submit" class="btn btn-primary" id="tombolUbah" data-id="<?= $rows['id_order']?>" data-nama="<?= $rows['nama_pemesan']?>" data-cucian="<?= $rows['status_cucian']?>" data-pembayaran="<?= $rows['status_pembayaran']?>" data-wa="<?= $rows['no_wa']?>" data-alamat="<?= $rows['alamat_jemput']?>" data-layanan="<?= $rows['jenis_layanan']?>" data-item="<?= $rows['jenis_item']?>" data-jumlah="<?= $rows['jumlah']?>" data-pesan="<?= $rows['tanggal_pesan']?>" data-selesai="<?= $rows['tanggal_selesai']?>" height="50px" data-toggle="modal" data-target="#edit"> Edit</a> <br>
      <a class="btn btn-danger" href="hapus.php?id=<?= $row['id_order'];?>" onclick="return confirm('Confirm');">Hapus</a>
      <a class="btn btn-info" href="nota_sementara.php?no_resi=<?= $row['no_resi'];?>">Cetak</a>
      </th>
    </tr>
    <?php endwhile;?>

  </tbody>
  </table>
  <?php }else{?>
  <p>Tidak ada hasil</p>
  <?php }?>
  