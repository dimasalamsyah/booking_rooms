<?php

include '../koneksi/koneksi.php';
session_start();
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$pass = md5($_REQUEST['pass']);
$jabatan = $_REQUEST['jabatan'];

/*$kode ='LAB J';
$nama = '';
$jenis = '';*/

$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');

$sql_cek = mysqli_query($conn, "SELECT username from petugas where username='$nama'");
$isi = mysqli_fetch_array($sql_cek);
$cek = mysqli_num_rows($sql_cek);

if($cek==1){
	//header("location:mahasiswa_forms.php?error=1");
	echo ($isi[0]);
}else{
	//header("location:mahasiswa_forms.php?error=1");
	$sql = mysqli_query($conn, "INSERT INTO petugas(kode_petugas, username, password, jabatan,  tanggal, pic, tanggal_update) VALUES
  		('$kode','$nama', '$pass', '$jabatan', '$tanggal_update','$pic','$tanggal_update')" );
	//echo "d";
	//echo ($isi[0]);
}
//echo ($isi[0]);
?>
