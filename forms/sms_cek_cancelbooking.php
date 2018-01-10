<?php

$ruang_del = substr($kode_cancelbooking, 0,5);
$jam_del = substr($kode_cancelbooking, 5,5);

$tahun_del = substr($kode_cancelbooking, 14);
$bulan_del = substr($kode_cancelbooking, 12, 2);
$tanggal_del = substr($kode_cancelbooking, 10, 2);

$tgl_del = $tahun_del."-".$bulan_del."-".$tanggal_del;

$query_getdel = "SELECT a.kode_jam, a.kode_ruangan, a.tgl from pemesanan_detail a
						left join jam b on b.kode_jam = a.kode_jam
						where a.tgl='$tgl_del' and b.jam='$jam_del' and a.kode_ruangan='$ruang_del' ";
$q_getdel = mysqli_query($conn, $query_getdel);
$row_getdel = mysqli_fetch_array($q_getdel);

$kode_jam_getdel = trim($row_getdel['kode_jam']);
$kode_ruangan_getdel = trim($row_getdel['kode_ruangan']);
$tgl_getdel = trim($row_getdel['tgl']);

$string_del = "DELETE from pemesanan_detail 
			where kode_jam='$kode_jam_getdel' and kode_ruangan='$kode_ruangan_getdel' and tgl='$tgl_getdel' ";

$query_del = mysqli_query($conn, $string_del);

if($query_del){
	echo "cancel booking berhasil $string_del "."<br>";
	
	$feedback_ketersediaan = "Cancel booking berhasil";

}else{
	echo "gagal cancel booking "."<br>";
}

/*save ke table outbox, untuk memberi info*/
include 'sms_cek_saveoutbox.php';

/*ubah status proses menjadi true*/
include 'sms_cek_updateinbox.php'; 

?>