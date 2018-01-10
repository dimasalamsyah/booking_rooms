<?php

include '../koneksi/koneksi.php';
session_start();
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$pass = md5($_REQUEST['pass']);
$jabatan = $_REQUEST['jabatan'];


$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');



	$sql = mysqli_query($conn, "UPDATE petugas set username='$nama', password='$pass', 
		jabatan='$jabatan',  tanggal='$tanggal_update', pic='$pic', tanggal_update='$tanggal_update'
		 where kode_petugas='$kode' " );

	if($sql){
		echo "sukses";
	}else{
		echo "gagal";
	}

?>
