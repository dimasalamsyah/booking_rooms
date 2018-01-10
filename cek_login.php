<?php
include 'koneksi/koneksi.php';

session_start();

$nama = $_POST['username'];
$pass = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT kode_karyawan, level from karyawan where username='$nama' and password='$pass' ");
/*$query = mysqli_query($conn, "SELECT kode_karyawan, level from karyawan where username='nisa' and password='8046e184484c7a03bc57f88199cbaf49' ");*/
$h_query = mysqli_num_rows($query);

$row_cek = mysqli_fetch_array($query);
$level = trim($row_cek[1]);

if($h_query==0){//kalau gag ada
	header("location:index.php?error=2");
	//echo $level;
}else{//kalau ada
	header("location:home.php");
	$_SESSION['pic'] = $nama;
	$_SESSION['level'] = $level;
}


?>