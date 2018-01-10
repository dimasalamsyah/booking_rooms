<!-- lolos cek kondisi -->
<?php

$query_cek_ruanganaktif = mysqli_query($conn, "SELECT status from ruangan where nama_ruangan='$ruangan_cek' ");
$row_cek_ruanganaktif = mysqli_fetch_array($query_cek_ruanganaktif);

if(trim($row_cek_ruanganaktif[0]=='Aktif')){

	

	if($pecah_pesan[0]=="BOOKING"){
		/*include ke proses selanjutnya: cek ketersediaan ruangan*/
		include 'sms_cek_ketersediaanruangan.php';
	}
	if($pecah_pesan[0]=="EDITBOOKING"){
		/*include cek no pemesanan*/
		include 'sms_cek_nopemesanan.php';
	}

	

	echo "ruangan aktif"."<br>";

}else{
	$feedback_ruangan= "Maaf Ruangan Tidak Dapat Digunakan Untuk Sementara.";
	echo "masuk ke kondisi ruangan nonaktif"."<br>";

	/*save outbox*/
	$query_saveoutbox = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                             ('".$replace_num."', '".$feedback_ruangan."')");

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