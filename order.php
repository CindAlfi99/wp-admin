<?php require 'template/header.php';
$query = mysqli_query($connection, "SELECT * FROM order_masuk");
?>

<div class="container scroll">

  <div class="row">
    <div class="col-md-5 mb-3">
      <div class="form-group  mb-2">
        <input type="text" class="form-control" id="cari" placeholder="cari" autofocus autocomplete="off">
      </div>
    </div>
  </div>
  <div class="row">
    <h5 class="ml-3">Data Order</h5>
    <div class="col-md-12">
      <div id="container">
        <table class="table table-striped text-center table-hover">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nomor Resi</th>
              <th scope="col">Tanggal Masuk</th>
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
                  if ($row['status_pembayaran'] === 'belum_luna'):
                  ?>
                    <a href="status.php?id_pembayaran=<?= $row['id_order'] ?>&status_pembayaran=lunas" class="btn btn-outline-info">Lunas</a>
                   <?php  elseif ($row['status_pembayaran'] === 'lunas'):?>
                    <a href="order.php" >Lunas</a>
                  
                 
                 <?php endif?></td>
               
                 </tr>
                 <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require 'template/footer.php'; ?>