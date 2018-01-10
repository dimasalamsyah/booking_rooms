<!-- lolos cek kondisi -->
<?php

/*cek no*/
$query_cekno_pemesan = "SELECT nama_pemesan FROM pemesan WHERE no_tlp = '$replace_num'";
$hasil_cekno_pemesan = mysqli_query($conn,$query_cekno_pemesan);
$row_ceko = mysqli_num_rows($hasil_cekno_pemesan);

if($row_ceko==0){
	
	$query_ceknokaryawan = "SELECT nama_karyawan FROM karyawan WHERE no_tlp = '$replace_num'";
	$hasil_ceknokaryawan = mysqli_query($conn,$query_ceknokaryawan);
	$row_kar = mysqli_num_rows($hasil_ceknokaryawan);

	//echo "masuk ke 0 pemesan";

	if($row_kar==0){
		/*tidak ada no siaapa pun*/
		/*$string_feedbacknomor = "Maaf, Nomor Anda Tidak Terdaftar Di Sistem";
		$query_feedbacknomor = mysqli_query($conn,"INSERT INTO outbox (DestinationNumber, TextDecoded)
							 VALUES ('".$replace_num."', '".$string_feedbacknomor."')");  */ 
	
		echo "masuk ke 0 karyawan dan 0 pemesan"."<br>";

		$feedback_tidakada_no = "Maaf, nomor belum terdaftar di sistem";

		/*save outbox*/
		$query_saveoutbox = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                                 ('".$replace_num."', '".$feedback_tidakada_no."')");

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



	}else{
		
		/*include ke kondisi selanjutnya: cek format sms*/
		include 'sms_cek_formatsms.php';
		
		echo "berhasil ke cek format kondisi karyawan"."<br>";
	}

}else{
	
	/*include ke kondisi selanjutnya: cek format sms*/
	include 'sms_cek_formatsms.php';
	echo "berhasil ke cek format kondisi pemesan dan ada no pemesan"."<br>";
}

?>