<?php

include '../koneksi/koneksi.php';
session_start();

$id_ = @$_REQUEST['id'];

$query = "SELECT * FROM inbox WHERE ID='$id_' ";

$hasil = mysqli_query($conn,$query);
	
	while($data= mysqli_fetch_array($hasil)){

		$id_tolak = $data['ID'];
		$number_ = $data['SenderNumber'];

		$query3 = mysqli_query($conn,"UPDATE inbox SET Processed = 'true' WHERE ID = '$id_tolak'");

		   /*UPDATE SMS INFO*/
		//$query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='Tolak' where id_info='$id_' ");

		$feedback_tolak = "Maaf pemesanan ruangan tidak diterima.";

		$query_tolak=mysqli_query($conn,"INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
                                 ('".$number_."', '".$feedback_tolak."')");   
	}

?>