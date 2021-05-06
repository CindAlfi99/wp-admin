
</body>
<footer class="sticky-footer bg-light bottom">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Rumah Laundry 381 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->
    
    <!-- <script src="ajax/customer.js"></script> -->
    <script src="ajax/ajax.js"></script>
    <script>
    $(document).on('click','#tombolUbah', function(){
let id = $(this).data('id');
let nama = $(this).data('nama');
let wa = $(this).data('wa');
let alamat = $(this).data('alamat');
let layanan = $(this).data('layanan');
let item = $(this).data('item');
let pesan = $(this).data('pesan');
let selesai = $(this).data('selesai');

$('#id').val(id);
$('.modal-body #nama_pemesan').val(nama);
$('.modal-body #no_wa').val(wa);
$('.modal-body #alamat_jemput').val(alamat);
$('.modal-body #jenis_layanan').val(layanan);
$('.modal-body #jenis_item').val(item);
$('.modal-body #tgl_pesan').val(pesan);
$('.modal-body #tgl_selesai').val(selesai);



    })
    </script>




</html>