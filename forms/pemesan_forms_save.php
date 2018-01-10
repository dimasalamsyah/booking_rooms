<?php 
include '../koneksi/koneksi.php';

session_start();

$kd_pemesan = $_REQUEST['kd_pemesan'];
$nama = $_REQUEST['nama'];
$jabatan = $_REQUEST['jabatan'];
$tgl = $_REQUEST['tgl'];
$tempat = $_REQUEST['tempat'];
$tlp = $_REQUEST['tlp'];
$alamat = $_REQUEST['alamat'];

$pic = $_SESSION['pic'];
$last_update = date('Y-m-d');


$q_cek = mysqli_query($conn, "SELECT kode_pemesan from pemesan where kode_pemesan='$kd_pemesan' ");
$cek = mysqli_num_rows($q_cek);

if($cek==1){
	echo "false";
}else{

	$query_save = mysqli_query($conn, "INSERT INTO pemesan (kode_pemesan, nama_pemesan, jabatan, tgl_lahir, tempat_lahir, no_tlp, alamat) VALUES
	 ('$kd_pemesan','$nama', '$jabatan', '$tgl','$tempat','$tlp','$alamat')");

	if($query_save){
		echo "a";
	}else{
		echo "b";
	}

}



?>
