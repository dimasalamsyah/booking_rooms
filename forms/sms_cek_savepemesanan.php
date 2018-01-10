<?php

//$pic = $_SESSION['pic'];

$query_getkodejam = mysqli_query($conn, "SELECT kode_jam from jam where jam='$jam_cek' ");
$row_getkodejam = mysqli_fetch_array($query_getkodejam);
$kodejam_get = trim($row_getkodejam['kode_jam']);

$query_save_pemesanan = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking,
									posisi, kode_ruangan, kode_jam, tgl, ket, pic) values 
									('$kode_ketersediaan','$nama_ketersediaan','$ini_jabatannya',
									'$get_nopemesanan_ruang','$kodejam_get', '$hasil_ubahtglcek',
									'$keterangan_booking', 'bysms')");
if($query_save_pemesanan){
	echo "berhasil save pemesanan detail"."<br>";
}else{
	echo "gagal save pemesanan detail"."<br>";
}


?>