 
 <?php require 'config/base_url.php';
 require 'config/DB.php';
session_start();
$query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian='jemput'");
$querys = mysqli_query($connection, "SELECT * FROM users");
$user = mysqli_fetch_assoc($querys);
$count = mysqli_num_rows($query); 
?><!-- Page Wrapper -->
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
        Administrator
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="admin.php">
        
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    

    <!-- Nav Item - Utilities Collapse Menu -->
   
    <!-- Divider -->
 
    <hr class="sidebar-divider mt-0">

    <!-- Heading -->
   

    <!-- Nav Item - Pages Collapse Menu -->
   
  
    <!-- Nav Item - Customer -->

    <li class="nav-item active">
        <a class="nav-link collapsed" href="customer.php" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-users"></i>
            <span>Customer</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select Menu</h6>
                <a class="collapse-item" href="customer.php">Customer Today</a>
                <a class="collapse-item" href="all_customer.php">Customer Get All</a>
            </div>
        </div>
    </li>
  
    <!-- Nav Item - Order -->
    
    <li class="nav-item active">
        <a class="nav-link" href="order.php">
        <i class="fas fa-cart-plus"></i>
            <span>Order</span></a>
    </li>
    
   
    <!-- Divider -->
    <!-- Nav Item - Layanan -->
    <li class="nav-item active">
        <a class="nav-link" href="layanan.php">
        <i class="fas fa-hands"></i>
            <span>Layanan</span></a>
    </li>
    

     <!-- <li class="nav-item active">
        <a class="nav-link" href="transaksi.php">
        <i class="far fa-sticky-note"></i>
            <span>Transaksi</span></a>
    </li> -->
     <!-- Nav Item - Laporan -->
     <li class="nav-item active">
        <a class="nav-link" href="laporan.php">
        <i class="fas fa-book"></i>
            <span>Laporan</span></a>
    </li>
   
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
                <!-- welcome -->
                <!-- <div class="row">
                    <div class="col-md-12 float-left">
                        <h3>Welcome, Admin Rumah Laundry 381</h3>
                    </div>
                </div> -->
                <!-- batas -->

                <!-- Nav Item - Alerts -->
             
                <div class="dropdown" id="div1" >
                <i class="fa fa-bell mt-4" aria-hidden="true"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="text-danger"> <?= $count;?></span>
</i>
<div  class="dropdown-menu" aria-labelledby="dropdownMenu2" >

<?php 
$i =1;while($row = mysqli_fetch_assoc($query)):?>i
<a class="dropdown-item"  type="button"><?= $i++;?>. <i class="far fa-user"></i> Konsumen : <?= $row['nama_pemesan'];?><br>Layanan : <span class="text-danger"><?= $row['jenis_layanan'];?></span><br><span>Time <?= $row['tanggal_pesan'];?><br></span><br> Jumlah: <?= $row['jumlah'] ?></a>
<?php endwhile;?>

</div>
</div>

                



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

