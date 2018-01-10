<?php

include '../koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$query_auto = mysqli_query($conn, "SELECT ID,ReceivingDateTime from inbox where Processed='false' and SenderNumber like '+62%' ");

while ($row_auto = mysqli_fetch_array($query_auto)) {
	
	$get_jam_auto = strtotime($row_auto[1]);
	$ambil_nilai_id_autoreplay = trim($row_auto[0]);

	$jam_sek = date('G:i:s',$get_jam_auto)."<br>";
	$jam_dat = date('G:i:s')."<br>";

	$jam_database = mktime(date('G',$get_jam_auto),date('i',$get_jam_auto),date('s',$get_jam_auto));
	$jam_sekarang = mktime(date('G'),date('i'),date('s'));
	$selisih =  $jam_sekarang - $jam_database;

	////"jam hasil: ".;

	$sisa = $selisih % 86400;
	$jumlah_jam = floor($sisa/3600)."<br>"; /*echo disini*/

	$sisa_menit = $sisa % 3600;
	$jumlah_menit = floor($sisa_menit/60)."<br>"; /*echo disini*/

	if($jumlah_jam>=1 and $jumlah_menit>=0 ){

		//"sending.."."<br>";
		echo $ambil_nilai_id_autoreplay;
		/*masukan include pesan masuk*/
		include 'sms_cek_pesanmasuk.php';
		echo "masuk";

/*		echo $jumlah_jam."<br>";
		echo $jumlah_menit."<br>";
		echo $jam_sek."<br>";
		echo $jam_dat."<br>";
		echo $row_auto[1]."<br>";*/

	}else{
		//echo "waiting.."."<br>";
		echo "gagal masuk";
		/*echo $jumlah_jam."<br>";
		echo $jumlah_menit."<br>";
		echo $jam_sek."<br>";
		echo $jam_dat."<br>";
		echo $row_auto[1]."<br>";*/



	}

}	


?>