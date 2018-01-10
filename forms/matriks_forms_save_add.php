<?php

include '../koneksi/koneksi.php';

$array_bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novemer','Desember');
$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');

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


$sql_detail = mysqli_query($conn, "INSERT INTO penjadwalan_detail (kode_dosen, kode_ruangan, kode_kelas, 
							kode_matakuliah, kode_jam, hari, mulai,habis)
					 values ('$kode_dosen', '$kode_ruangan', '$kode_kelas', '$kode_matakuliah', '$kode_jam', 
					 	'$hari', '$mulai','$habis') ");

/*
if($sql_detail){
	echo "a"."<br>";
	echo $sql_detail;
}else{
	echo "ab";
	echo $sql_detail;
}*/

?>