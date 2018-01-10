<?php

$curDate = trim(@$_REQUEST['tanggal_add']);
$curJam = trim(@$_REQUEST['jam_add_kode']);
$curKelas = trim(@$_REQUEST['combo_kelas_add']);

$kode_pembooking = trim($_REQUEST['kode_pembooking']);
$nama_pembooking = trim($_REQUEST['nama']);
$cek_jabatan = trim($_REQUEST['jabatan']);

if($curKelas != ''){
	
	include '../../koneksi/koneksi.php';
	
	$query_save_d = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking, posisi, kode_ruangan, kode_jam, 
		tgl,ket) VALUES ('$kode_pembooking', '$nama_pembooking', '$cek_jabatan', '$curKelas','$curJam','$curDate', 'KET') ");

	if($query_save_d){
		echo "success";
	}else{
		echo "failed";
	}
		
}else{
	echo "kosong";
}


?>