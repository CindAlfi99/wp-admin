<?php 
session_start();
require 'config/DB.php';
 require 'config/base_url.php';


 $query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE() AND status_cucian ='antar'");
    $count = mysqli_num_rows($query);
    $count;
    $total_cust = mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian !='antar'");
    $c_cust = mysqli_num_rows($total_cust);
    $total_cust_today = mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian ='antar' OR status_cucian ='selesai'");
    $total_today = mysqli_num_rows($total_cust_today);
    $penghsl = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE() AND status_pembayaran ='lunas'");
    // if (isset($_SESSION['role']) ==='owner') {
    //    $show = 'owner';
    // //    echo "<script>document.getElementById('".$show."').style.display ='block';</script>";
    // echo 'owner';
  
    // }
    // else if(isset($_SESSION['role']) ==='admin') {
    //    $show = 'admin';
    // //    echo "<script>document.getElementId('".$show."').style.display ='block';</script>";
    // echo 'admin';
    // exit;
   
    // }
    

    

?>
<!doctype html>
<html lang="en">
<?php require 'template/header.php';?>
<body id="page-top">



    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="z-index:2;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-0" href="admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-user-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><?= $_SESSION['role']==='admin'?'Admin':'Owner';?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading admin">
                Owner
            </div>
            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active">
                <a class="nav-link" href="owner.php">
                
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->

           
         
            <hr class="sidebar-divider mt-0">

            
            <!-- Nav Item - Order -->
            
            <li class="nav-item active">
                <a class="nav-link" href="laporan_owner.php">
                <i class="fas fa-book"></i>
                    <span>Laporan</span></a>
            </li>
            
           
            <!-- Divider -->
          
         
            
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            
 

            

            <!-- Sidebar Toggler (Sidebar) -->
            

            <!-- Sidebar Message -->
            

        </ul>
      
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                  
                        



                                              <!-- Nav Item - User Information -->
                                              <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['nama'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                                    <!-- <i class="fas fa-user-alt"></i> -->
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                
                                <div class="dropdown-divider"></div>
                                <!-- data-toggle="modal" data-target="#logoutModal" -->
                                <a class="dropdown-item" href="<?= BASE_URL?>/logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <?php $query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE DATE(tanggal_pesan) = CURDATE()");
$count = mysqli_num_rows($query); 
$count;?>
   <div class="container-fluid">
                
                <!-- header -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    
                  

                                    
                   <!-- batas -->
                
                  <a href="<?= BASE_URL?>/admin.php?<?=$_SESSION['role']='owner'?>" class=" mt-2 d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <!-- <i class="fas fa-download fa-sm text-white-50"></i> !-->
                   Beralih ke Halaman Admin</a>
                 
                   
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
                                    Total Costumer Masih Dalam Proses</div>
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
                                    while ($row = mysqli_fetch_assoc($penghsl)) {
                                        $total += $row['total_bayar'];
                                    } ?>
                                    Total Penghasilan Hari ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total; ?></div>
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
                                    Total Customer Hari ini</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_today; ?></div>
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
        <!--  -->
        

