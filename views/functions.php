<?php 
$conn = mysqli_connect('localhost','root','','rumahlaundry381');
function ubahProduk($data){
global $conn;
$id = $data['id'];
$pemesan = $data['nama_pemesan'];
$wa = $data['no_wa'];
$alamat = $data['alamat_jemput'];
$layanan = $data['jenis_layanan'];
$item = $data['jenis_item'];
$jumlah = $data['jumlah'];

$pesan = $data['tgl_pesan'];
$selesai = $data['tgl_selesai'];
mysqli_query($conn, "UPDATE order_masuk SET nama_pemesan = '$pemesan', no_wa = '$wa', alamat_jemput = '$alamat', jenis_layanan = '$layanan', jenis_item = '$item', jumlah = '$jumlah', tanggal_pesan = '$pesan', tanggal_selesai = '$selesai' WHERE id = $id");
return mysqli_affected_rows($conn);

}
function ubahLayanan($data){
    global $conn;
    $id = $data['id'];
    $layanan = $data['jenis_layanan'];
    $item = $data['jenis_item'];
    $satuan = $data['satuan'];
    $harga = $data['harga'];
    mysqli_query($conn, "UPDATE layanan SET jenis_layanan = '$layanan', jenis_item = '$item',satuan = '$satuan',harga = '$harga' WHERE id = $id");
    return mysqli_affected_rows($conn);
}
   
function tambahLayanan($data){
    global $conn;
   
    $layanan = $data['jenis_layanan'];
    $item = $data['jenis_item'];
    $satuan = $data['satuan'];
    $harga = $data['harga'];
    $query = "INSERT INTO layanan VALUES('','$item','$layanan','$satuan','$harga')";
 mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
    
    }




// function tambahProduk($data){
//     global $conn;
//     $id = $data['id'];
//     $pemesan = $data['nama_pemesan'];
//     $wa = $data['no_wa'];
//     $alamat = $data['alamat_jemput'];
//     $layanan = $data['jenis_layanan'];
//     $item = $data['jenis_item'];
//     $jumlah= $data['jumlah'];
//     $satuan = $data['satuan'];
//     $harga = $data['harga'];
//     $totalbayar = $data['total_bayar'];
//     $status = $data['status'];
//     $pesan = $data['tgl_pesan'];
//     $selesai = $data['tgl_selesai'];
//     $query = "INSERT INTO order_masuk VALUES('','$pemesan','$wa','$alamat','$layanan','$item','$jumlah','$satuan','$harga','$totalbayar','$status','$pesan','$selesai')";
//  mysqli_query($conn,$query);
//     return mysqli_affected_rows($conn);
    
//     }
    
