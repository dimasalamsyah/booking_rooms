<?php

$ruang_cekno = substr($kode_cancelbooking, 0,5);
$jam_cekno = substr($kode_cancelbooking, 5,5);

$tahun_cekno = substr($kode_cancelbooking, 14);
$bulan_cekno = substr($kode_cancelbooking, 12, 2);
$tanggal_cekno = substr($kode_cancelbooking, 10, 2);

$tgl_cekno = $tahun_cekno."-".$bulan_cekno."-".$tanggal_cekno;

$query_cekno = "SELECT a.kode_jam, a.kode_ruangan, a.tgl from pemesanan_detail a
						left join jam b on b.kode_jam = a.kode_jam
						where a.tgl='$tgl_cekno' and b.jam='$jam_cekno' and a.kode_ruangan='$ruang_cekno' ";
$q_cekno = mysqli_query($conn, $query_cekno);
/*$row_cekno = mysqli_fetch_array($q_cekno);

$kode_jam_cekno = trim($row_cekno['kode_jam']);
$kode_ruangan_cekno = trim($row_cekno['kode_ruangan']);
$tgl_cekno = trim($row_cekno['tgl']);
*/

$cek_no = mysqli_num_rows($q_cekno);

if($cek_no==1){

	if($pecah_pesan[0]=="EDITBOOKING"){

		/*include ketersediaan ruang*/
		include 'sms_cek_ketersediaanruangan.php';
		echo "editbooking no ada"."<br>";
	}
	if($pecah_pesan[0]=="CANCELBOOKING"){

		/*include hapus pemesanan detail*/
		include 'sms_cek_cancelbooking.php';
		echo "cancel booking no ada"."<br>";
	}


}else{

	echo "gag ada no booking"."<br>";
	$feedback_cekno = "Maaf, kode pemesanan tidak terdaftar";

	/*save outbox*/
	$query_saveoutbox = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                             ('".$replace_num."', '".$feedback_cekno."')");

	if($query_saveoutbox){
		echo "berhasil save outbox"."<br>";
	}else{
		echo "gagal save outbox"."<br>";
	}

	/*update inbox*/
	$query_updateinbox = mysqli_query($conn, "UPDATE inbox SET Processed = 'true' WHERE ID = '$id_getinbox'");

	if($query_updateinbox){
		echo "berhasil upadte inbox"."<br>";
	}else{
		echo "gagal upadte inbox"."<br>";
	}

}

/*echo $kode_cancelbooking."<br>";
echo $tanggal_cekno."<br>";
echo $tgl_cekno."<br>";*/

?>