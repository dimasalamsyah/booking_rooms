<?php

include '../koneksi/koneksi.php';
session_start();
$kode = $_REQUEST['kode'];
$nama = $_REQUEST['nama'];
$jenis = $_REQUEST['jenis'];
$status = $_REQUEST['status'];

/*$kode ='LAB J';
$nama = '';
$jenis = '';*/

$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');

$sql_cek = mysqli_query($conn, "SELECT nama_ruangan from ruangan where nama_ruangan='$nama'");
$isi = mysqli_fetch_array($sql_cek);
$cek = mysqli_num_rows($sql_cek);

/*if($cek==1){
	header("location:mahasiswa_forms.php?error=1");
	echo ($isi[0]);
}else{*/
	//header("location:mahasiswa_forms.php?error=1");
	$sql = mysqli_query($conn, "UPDATE ruangan set nama_ruangan='$nama', jenis_ruangan='$jenis', 
							tanggal='$tanggal_update', pic='$pic', tanggal_update='$tanggal_update', status='$status' where  kode_ruangan='$kode' " );
	//echo "d";
	//echo ($isi[0]);
/*}*/
//echo ($isi[0]);
?>
