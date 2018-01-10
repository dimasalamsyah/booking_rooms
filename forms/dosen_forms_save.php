<?php 
include '../koneksi/koneksi.php';

session_start();

$kd_dosen = $_REQUEST['kd_dosen'];
$nama = $_REQUEST['nama'];
$tgl = $_REQUEST['tgl'];
$tempat = $_REQUEST['tempat'];
$tlp = $_REQUEST['tlp'];
$alamat = $_REQUEST['alamat'];

$pic = $_SESSION['pic'];
$last_update = date('Y-m-d');

$query_save = mysqli_query($conn, "INSERT INTO dosen (kode_dosen, nama_dosen, tanggal_lahir, tempat_lahir, alamat, no_tlp, pic, tanggal_update) VALUES
 ('$kd_dosen','$nama','$tgl','$tempat','$alamat','$tlp','$pic','$last_update')");

if($query_save){
//echo "a";
}else{
//echo "b";
}

?>
