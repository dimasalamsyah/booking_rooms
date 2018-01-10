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


	$string =  "UPDATE pemesan set nama_pemesan='$nama', jabatan='$jabatan',
	tgl_lahir='$tgl', tempat_lahir='$tempat', no_tlp='$tlp', alamat='$alamat' where kode_pemesan='$kd_pemesan' ";

	$query_upadte = mysqli_query($conn,$string);

	if($query_upadte){
		echo $string;
	}else{
		echo "b";
	}



?>
