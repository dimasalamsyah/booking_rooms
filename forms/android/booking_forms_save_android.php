<?php

$option = @$_REQUEST['option'] ?: '';

$curDate = trim(@$_REQUEST['tanggal_add']);
$curJam = trim(@$_REQUEST['jam_add_kode']);
$curKelas = trim(@$_REQUEST['combo_kelas_add']);

$kode_pembooking = trim(@$_REQUEST['kode_pembooking']);
$nama_pembooking = trim(@$_REQUEST['nama']);
$cek_jabatan = trim(@$_REQUEST['jabatan']);
$ket = trim(@$_REQUEST['ket']);

if($option == 'update'){
	
	include '../../koneksi/koneksi.php';

	$id = @$_REQUEST['id'];
	$query_save_d = mysqli_query($conn, "UPDATE pemesanan_detail set kode_ruangan = '$curKelas', kode_jam = '$curJam', tgl = '$curDate', ket = '$ket' where id = '$id' ");

	if($query_save_d){
		echo "success";
	}else{
		echo "failed";
	}
	
		
}else{
	include '../../koneksi/koneksi.php';

	//cek
	$q = "SELECT count(id) from pemesanan_detail where kode_ruangan = '$curKelas' and kode_jam = '$curJam' and tgl = '$curDate' ";
	$cek = mysqli_query($conn,$q);
	$row_cek = mysqli_fetch_array($cek);
	if($row_cek[0] != 0){
		echo "full";
	}else{
		$query_save_d = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking, posisi, kode_ruangan, kode_jam, 
		tgl,ket) VALUES ('$kode_pembooking', '$nama_pembooking', '$cek_jabatan', '$curKelas','$curJam','$curDate', '$ket') ");

		if($query_save_d){
			echo "success";
		}else{
			echo "failed";
		}
	}
}


?>