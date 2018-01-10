<?php

	include '../koneksi/koneksi.php';
	$kode = $_REQUEST['kode'];
	//$jam = $_REQUEST['jam'];
    $query = mysqli_query($conn,"DELETE FROM info_sms where id_info='$kode' ");

    $query_inbox = mysqli_query($conn,"DELETE FROM inbox where ID='$kode' ");

    $query_inbox = mysqli_query($conn,"DELETE FROM sentitems ");

    if($query){
    	echo "a";
    }else{
    	echo "b";
    }
?>