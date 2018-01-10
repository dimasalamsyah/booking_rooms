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

$query_update = mysqli_query($conn,"UPDATE dosen set nama_dosen='$nama', tanggal_lahir='$tgl', 
	tempat_lahir='$tempat', alamat='$alamat', no_tlp='$tlp', pic='$pic', tanggal_update='$last_update'
	 where kode_dosen='$kd_dosen' ");

//echo $query_update;
header("location:dosen_forms.php");

?>
