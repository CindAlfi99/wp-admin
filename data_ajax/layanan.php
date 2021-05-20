<?php
$tombolCari = $_GET['Carie'];
$db = mysqli_connect('localhost','root','','rumahlaundry381');
$result =mysqli_query($db, "SELECT * FROM layanan WHERE jenis_item LIKE '%$tombolCari%' OR jenis_layanan LIKE '%$tombolCari%' OR harga LIKE'%$tombolCari%'");

// $row = mysqli_fetch_assoc($result);
//     $rows[] = $row;
    // cek seluruh data mahasiswa
    ?>
            <?php if(mysqli_num_rows($result) > 0){?>
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
   while($row = mysqli_fetch_assoc($result)):?>
    <tr>
      <th scope="row"><?= $i++;?></th>
      <td><?=$row['jenis_item'];?></td>
      <td><?=$row['jenis_layanan'];?></td>
      <td><?=$row['satuan'];?></td>
      <th><?=$row['harga'];?></th>
      <th><a type="submit" class="btn btn-primary" id="tombolUbah"data-id="<?= $row['id_layanan']?>" data-nama="<?= $row['nama_pemesan']?>" data-wa="<?= $row['no_wa']?>" data-alamat="<?= $row['alamat_jemput']?>" data-layanan="<?= $row['jenis_layanan']?>" data-item="<?= $row['jenis_item']?>" data-pesan="<?= $row['tanggal_pesan']?>" data-selesai="<?= $row['tanggal_selesai']?>" height="50px" data-toggle="modal" data-target="#edit"> Edit</a> <br>
      <a class="btn btn-primary" href="hapus.php?id=<?= $row['id'];?>" onclick="return confirm('Confirm');">Hapus</a>
      </th>
      <?php endwhile;?>
    </tr>
  
  </tbody>
</table>
<?php }else{?>
  <p>Tidak ada hasil</p>
  <?php }?>