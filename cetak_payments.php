<?php
$no_resi = $_GET['no_resi'];

require 'asset/vendor_pdf/vendor/autoload.php';
require 'config/DB.php';
$query =  mysqli_query($connection, "SELECT DISTINCT no_resi, alamat_jemput, nama_pemesan, status_cucian,status_pembayaran,mode,tanggal_pesan,tanggal_selesai FROM order_masuk WHERE no_resi = $no_resi");
$perintahQuery = mysqli_query($connection,"SELECT order_masuk.id_order, order_masuk.jenis_layanan, order_masuk.jenis_item, order_masuk.jumlah,order_masuk.ongkir, layanan.jenis_item, layanan.satuan, layanan.harga FROM order_masuk JOIN layanan ON order_masuk.jenis_item = layanan.jenis_item WHERE order_masuk.no_resi = $no_resi ");
$join_tbl = mysqli_fetch_assoc($query);





// if(isset($_GET['status_cucian'])){
    if(isset($_GET['status_cucian'])){
    $query =mysqli_query($connection, "UPDATE order_masuk SET status_cucian='antar' WHERE no_resi=$no_resi");
    
    }
// }
    



elseif(isset($_GET['status_cucians'])){
    $query =mysqli_query($connection, "UPDATE order_masuk SET status_cucian='diambil' WHERE no_resi=$no_resi");

}
// else{
//     die('Invalid query: ' . mysqli_error($connection));
// }?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>Hello, world!</title>
    <style>body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
@media print {
    
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
</style>
  </head>
  <body>
    <div class="page-content container">
    <div class="page-header text-blue-d2">
      

        <div class="page-tools">
            <div class="action-buttons">
                <button class="btn bg-white btn-light mx-1px text-95 hidden-print"  id ="btnPrint" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </button>
                <button class="btn bg-white btn-light mx-1px text-95 hidden-print" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </button>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <!-- <i class="fa fa-book fa-2x text-success-m2 mr-1"></i> -->
                            <span class="text-default-d3">Rumah Laundry 381</span><br>
                            <small class="page-info">
                <!-- <i class="fa fa-angle-double-right text-80"></i> -->
                Jalan Mayorzein 
            </small><br>
            <small class="page-info">
                <!-- <i class="fa fa-angle-double-right text-80"></i> -->
               0732-3095-234
            </small>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Nama Pemesan</span>
                            <span class="text-600 text-110 text-blue align-middle"><?=$join_tbl["nama_pemesan"]?></span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                No Resi : <?= $join_tbl["no_resi"]?>
                            </div>
                            <div class="my-1">
                            Alamat : <?= $join_tbl["alamat_jemput"]?>
                            </div>
                            <div class="my-1">
                            Mode Pesan : <?= $join_tbl["mode"]?>
                            </div>
                           
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Pesan :</span> <?= $join_tbl["tanggal_pesan"]?></div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Selesai :</span> <?= $join_tbl["tanggal_selesai"]?></div>
                            <?php if(isset($_GET['proses'])):
                                $proses = $_GET['proses'];?>
                                
                             
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status Cucian :</span> <?= $proses;?></div>
                                <?php else:?>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status Cucian :</span> <?= $join_tbl["status_cucian"]?></div>
<?php endif;?>
                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status Pembayaran:</span> <span class="badge badge-warning badge-pill px-25"><?= $join_tbl["status_pembayaran"]?></span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">No</div>
                        <div class="col-9 col-sm-5">Jenis Item</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Jumlah</div>
                        
                        <div class="d-none d-sm-block col-sm-2">Harga</div>
                        <div class="col-2">Total Bayar</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        <div class="row mb-2 mb-sm-0 py-25">
                        <?php  $count =0; 
                        $ongkir = 0;
                        $i=1;
                        while($row = mysqli_fetch_assoc($perintahQuery)):
                            $total = $row['harga'] * $row['jumlah'];
                            $count += $total; ?>
                            <div class="d-none d-sm-block col-1"><?= $i++;?></div>
                            <div class="col-9 col-sm-5"><?= $row["jenis_item"]?></div>
                            <div class="d-none d-sm-block col-2"><?= $row["jumlah"]?> <?= $row["satuan"]?></div>
                           
                            <div class="d-none d-sm-block col-2 text-95"><?= $row["harga"]?></div>
                            <div class="col-2 text-secondary-d2"><?= $total;?></div>
                            <?php $ongkir += $row['ongkir'];?>
<?php endwhile;?>
                        </div>
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                           Catatan : Periksa dengan benar 
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Ongkir
                                </div>
                                <div class="col-5">
                                <?php  if($ongkir > 10000):?>
                                 <?php  $ongkir = $ongkir - 5000;
                                  $count += $ongkir;?>
                                    <span class="text-120 text-secondary-d1"><?= $ongkir;?></span>
                                    <?php elseif($ongkir == 10000):?>
                                            <?php $count += 10000;
                                             $ong = 10000;?>
                                             <span class="text-120 text-secondary-d1"><?= $ong;?></span>
                                             <?php endif;?>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                  Total Bayar
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1"><?= $count;?></span>
                                </div>
                            </div>

                            <!-- <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">$2,475</span>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <hr />

                    <div>
                    <span class="text-secondary-d1 text-105"><?=date('Y-m-d H:i:s')?></span><br>
                        <span class="text-secondary-d1 text-105">Terimakasih</span>
                        <!-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- button kembali -->
<a href="admin.php" class="btn btn-primary mt-3 col-1 col-3 float-right mr-5 mb-5">Kembali</a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});</script>
  </body>
</html>