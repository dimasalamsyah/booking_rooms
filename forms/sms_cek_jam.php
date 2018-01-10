<?php

$sql_cekjam = mysqli_query($conn, "SELECT jam from jam where jam='$jam_cek'");
$row_jam = mysqli_num_rows($sql_cekjam);

if($row_jam==0){

	$feedback_jamerror = "Maaf, jam tidak ada/salah penulisan.";

	/*save outbox*/
		$query_saveoutbox_jam = mysqli_query($conn, "INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                                 ('".$replace_num."', '".$feedback_jamerror."')");

		if($query_saveoutbox_jam){
			echo "berhasil save outbox jam"."<br>";
		}else{
			echo "gagal save outbox jam"."<br>";
		}

		/*update inbox*/
		$query_updateinbox_jam = mysqli_query($conn, "UPDATE inbox SET Processed = 'true' WHERE ID = '$id_getinbox'");

		if($query_updateinbox_jam){
			echo "berhasil upadte inbox jam"."<br>";
		}else{
			echo "gagal upadte inbox jam"."<br>";
		}

}else{

	/*mengecek ruangan aktif*/
	include 'sms_cek_ruanganaktif.php';
	echo "bookin format"."<br>";

}

/*while ($row_cekjam = mysqli_fetch_array($sql_cekjam)) {
	
}*/

?>