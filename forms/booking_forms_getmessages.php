<?php
	
	include '../koneksi/koneksi.php';

	$query_message = mysqli_query($conn, "select baca from transaksi_header where baca='f' ");
	$cek = mysqli_num_rows($query_message);

	if($cek==0){
		//echo "<script>alert('b');</script>";
	}else{
		//echo "<script>alert('a');</script>";
	}

	echo $cek;
?>