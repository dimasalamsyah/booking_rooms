<?php

	include '../koneksi/koneksi.php';
	$kode = $_REQUEST['kode'];
	$jam = $_REQUEST['jam'];
    $query = mysqli_query($conn,"UPDATE jam set jam='$jam' where kode_jam='$kode' ");
    
?>