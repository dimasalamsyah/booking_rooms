<?php

include '../koneksi/koneksi.php';


$hari = $_REQUEST['hari'];
$kode_ruangan = $_REQUEST['kode_ruangan'];
$kode_dosen = $_REQUEST['kode_dosen'];
/*$tingkat = $_REQUEST['tingkat'];*/
$kode_kelas = $_REQUEST['kode_kelas'];
$kode_matakuliah = $_REQUEST['kode_matakuliah'];
$kode_jam = $_REQUEST['kode_jam'];
/*$tanggal = $_REQUEST['tanggal'];*/
$mulai = $_REQUEST['mulai'];
$habis = $_REQUEST['habis'];


$sql_detail = mysqli_query($conn, "UPDATE penjadwalan_detail set kode_dosen='$kode_dosen', kode_kelas='$kode_kelas', 
							kode_matakuliah='$kode_matakuliah'
							where kode_ruangan='$kode_ruangan' and  kode_jam='$kode_jam' and  hari='$hari' ");

/*
if($sql_detail){
	echo "a"."<br>";
	echo $sql_detail;
}else{
	echo "ab";
	echo $sql_detail;
}*/

?>