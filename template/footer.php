

<footer class="sticky-footer bg-white bottom">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rumah Laundry 381 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
 <script>$(document).ready(function() {
    $('#layanan').DataTable();
} );</script>
<script>$(document).ready(function() {
    $('#laporan').DataTable();
} );</script>
<script>$(document).ready(function() {
    $('#cust').DataTable();
} );</script>
<script>$(document).ready(function() {
    $('#order').DataTable();
} );</script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js" crossorigin="anonymous"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   

    <!-- Page level plugins -->
    <script src="<?= BASE_URL; ?>/js/order.js"></script>
    <script>
  function my_fun(str, id) {
    fetch(`helper.php?jenis=${str}`)
    .then(res => res.text())
    .then(data => document.querySelector(`.jenis-item-${id}`).innerHTML = data)
    .catch(err => console.log(err))
  }
</script>
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    
    <!-- <script src="ajax/customer.js"></script> -->
    <script src="ajax/ajax.js"></script>
    <!-- js untuk dihalaman konsumen -->
    <script src="ajax/ajax_customer.js"></script>
 <!-- js untuk dihalaman layanan -->
 <script src="ajax/ajax_layanan.js"></script>
    <script>
    $(document).on('click','#tombolUbah', function(){
let id = $(this).data('id');
let nama = $(this).data('nama');
let wa = $(this).data('wa');
let alamat = $(this).data('alamat');
let layanan = $(this).data('layanan');
let item = $(this).data('item');
let jumlah = $(this).data('jumlah');
let cucian = $(this).data('cucian');
let pembayaran = $(this).data('pembayaran');
let pesan = $(this).data('pesan');
let selesai = $(this).data('selesai');

$('#id').val(id);
$('.modal-body #nama_pemesan').val(nama);
$('.modal-body #no_wa').val(wa);
$('.modal-body #alamat_jemput').val(alamat);
$('.modal-body #jenis_layanan').val(layanan);
$('.modal-body #jenis_item').val(item);
$('.modal-body #jumlah').val(jumlah);
$('.modal-body #cucian').val(cucian);
$('.modal-body #pembayaran').val(pembayaran);
$('.modal-body #tgl_pesan').val(pesan);
$('.modal-body #tgl_selesai').val(selesai);



    })
    </script>
     <script>
    $(document).on('click','#tombolDetail', function(){
let resi = $(this).data('resi');
let nama = $(this).data('nama');
let wa = $(this).data('wa');
let alamat = $(this).data('alamat');
let layanan = $(this).data('layanan');
let item = $(this).data('item');
let jumlah = $(this).data('jumlah');
let satuan = $(this).data('satuan');
let pesan = $(this).data('pesan');
let selesai = $(this).data('selesai');

$('.modal-body #no_resi').val(resi);
$('.modal-body #nama_pemesan').val(nama);
$('.modal-body #no_wa').val(wa);
$('.modal-body #alamat_jemput').val(alamat);
$('.modal-body #jenis_layanan').val(layanan);
$('.modal-body #jenis_item').val(item);
$('.modal-body #jumlah').val(jumlah);
$('.modal-body #satuan').val(satuan);
$('.modal-body #tgl_pesan').val(pesan);
$('.modal-body #tgl_selesai').val(selesai);



    })
    </script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ee0a2d4a7d1a6c8ef4f8', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  alert(JSON.stringify(data));
$.ajax({url: "notif.php", success: function(result){
 
    $("#div1").html(result);
    
  }});
});
</script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ee0a2d4a7d1a6c8ef4f8', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  
$.ajax({url: "pusher_cust.php", success: function(result){
 
    $("#hy").html("");
    $("#hy").append(result);
    
  }});
});
</script>
<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('ee0a2d4a7d1a6c8ef4f8', {
  cluster: 'ap1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  
$.ajax({url: "pusher_order.php", success: function(result){
 
    $("#order").html("");
    $("#order").append(result);
    
  }});
});
</script>




