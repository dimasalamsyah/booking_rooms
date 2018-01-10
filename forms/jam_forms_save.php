<?php

	include '../koneksi/koneksi.php';
	$kode = $_REQUEST['kode'];
	$jam = $_REQUEST['jam'];
    $query = mysqli_query($conn,"INSERT INTO jam (kode_jam, jam) values ('$kode', '$jam')");

?>