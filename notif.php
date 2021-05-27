<?php
require 'config/DB.php';
$query = mysqli_query($connection, "SELECT * FROM order_masuk WHERE status_cucian='jemput'");
$count = mysqli_num_rows($query); 
 ?>
   <li class="nav-item dropdown no-arrow mx-1 show">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                         
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><?=$count;?>+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right items shadow animated--grow-in show" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifikasi
                                </h6>
                           
                                <?php $i =1;
                                while($row = mysqli_fetch_assoc($query)):?>i
                                <a class="dropdown-item items d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"> <?=$i++; ?>. <?= $row['tanggal_pesan'];?></div>
                                        <span class="font-weight-bold"> <?= $row['nama_pemesan'];?> Memesan <?= $row['jenis_layanan'];?> jumlah <?= $row['jumlah'];?></span>
                                    </div>
                                </a>
                                <?php endwhile;?>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>