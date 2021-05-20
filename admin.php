
<?php require 'template/header.php';

$query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE() AND status_cucian ='antar'");
$count = mysqli_num_rows($query); 
$count;
$total_cust= mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian !='antar'");
$c_cust = mysqli_num_rows($total_cust);
$penghsl= mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_pembayaran ='lunas'");

  ?>
  <!-- alert ubah -->

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Login!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  <!-- menu -->
                <div class="container-fluid">
                
                    <!-- header -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                      

                                        
                       <!-- batas -->
                    
                       <?php if($_SESSION['role']==='owner'):?>
                       
                        <a href="<?= BASE_URL?>/owner.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Beralih ke Halaman Owner</a>
                        
                        <?php endif; ?>
                       
                    </div>
                    
                    <!-- Content Row -->
                    <div class="row">

                        <!--  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Pesan Hari Ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count ?></div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-cart-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Costumer</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $c_cust; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <!-- Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            <?php $total = 0;
                                             while($row= mysqli_fetch_assoc($penghsl)){
$total += $row['total_bayar'];
                                            } ?>
                                                Total Penghasilan Hari ini</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!-- batas -->

            </div>
          
            
         
         
        
            
            <!-- Footer -->
            <?php require 'template/footer.php';?>
            