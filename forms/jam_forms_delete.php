<?php

	include '../koneksi/koneksi.php';
	$kode = $_REQUEST['kode'];
	//$jam = $_REQUEST['jam'];
    $query = mysqli_query($conn,"DELETE FROM jam where kode_jam='$kode' ");

    if($query){
    	echo "a";
    }else{
    	echo "b";
    }
?>