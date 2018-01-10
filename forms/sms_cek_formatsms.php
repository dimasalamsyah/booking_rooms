<!-- lolos cek kondisi -->
<?php

/*cek format*/
$pecah_pesan = explode("#", $textdecoded);

if ($pecah_pesan[0]=="BOOKING" and $pecah_pesan[1]!="" and 
	$pecah_pesan[2]!="" and $pecah_pesan[3]!="" and $pecah_pesan[4]!=""){

	/* BOOKING#kelas#jam#tgl#ket */
	/*cek ketersediaan ruangan aktif*/
	$ruangan_cek = trim($pecah_pesan[1]);
	$jam_cek = trim($pecah_pesan[2]);
	$tgl_cek = trim($pecah_pesan[3]);
	$keterangan_booking = trim($pecah_pesan[4]);

	$ubah_tglcek = strtotime($tgl_cek);
	$hasil_ubahtglcek = date('Y-m-d',$ubah_tglcek);

	include 'sms_cek_jam.php';
	echo "booking format"."<br>";

}elseif ($pecah_pesan[0]=="EDITBOOKING" and $pecah_pesan[1]!="" and 
	$pecah_pesan[2]!="" and $pecah_pesan[3]!="" and $pecah_pesan[4]!="" and $pecah_pesan[5]!="") {
	/* EDITBOOKING#kode_pemesanan#kelas#jam#tgl#ket */

	$kode_cancelbooking = trim($pecah_pesan[1]);
	$ruangan_cek = trim($pecah_pesan[2]);
	$jam_cek = trim($pecah_pesan[3]);
	$tgl_cek = trim($pecah_pesan[4]);
	$keterangan_booking = trim($pecah_pesan[5]);


	echo "edit booking format"."<br>";

	/*include cek ketersediaan*/
	/*include 'sms_cek_ketersediaanruangan.php';*/

	/*cek ruang booking aktif*/
	include 'sms_cek_jam.php';

}elseif ($pecah_pesan[0]=="CANCELBOOKING" and $pecah_pesan[1]!="" ) {
	/* CANCELBOOKING#kode_pemesanan */
	/*cek no pemesanan*/
	$kode_cancelbooking = trim($pecah_pesan[1]);
	include 'sms_cek_nopemesanan.php';

	echo "cancel booking format"."<br>";

}else{
	echo "fomat salah"."<br>";

	$feedback_formaterror = "Salah Formar,booking:BOOKING#201#08.00#12-05-2016,edit:EDITBOOKING#KR01808.0012052016#202#08.00#12-05-2016,cancel:CANCELBOOKING#KR01808.0012052016";

	/*save outbox*/
		$query_saveoutbox = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                                 ('".$replace_num."', '".$feedback_formaterror."')");

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

?>