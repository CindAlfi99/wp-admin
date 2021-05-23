<?php
require 'config/DB.php';
$query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian='jemput'");
$count = mysqli_num_rows($query); 
 ?>
       <i class="fa fa-bell mt-4" aria-hidden="true" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <span class="text-danger" id="div2"> <?= $count;?></span>
  </i>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2" height="60%" width="70%">
  
  <?php while($row = mysqli_fetch_assoc($query)):?>
    <a class="dropdown-item" href="customer.php?id_order=<?=$row['id_order'];?>"><i class="far fa-user"></i> Konsumen : <?= $row['nama_pemesan'];?><br>Layanan : <span class="text-danger"><?= $row['jenis_layanan'];?></span><br><span>Time <?= $row['tanggal_pesan'];?><br></span><br> Jumlah: <?= $row['jumlah'] ?></a>
   <?php endwhile;?>
    
  </div>