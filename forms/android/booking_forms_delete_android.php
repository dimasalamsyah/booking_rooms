<?php

$id = @$_REQUEST['id'] ?: '';

if($id != ''){
	include '../../koneksi/koneksi.php';
	$q = mysqli_query($conn, "DELETE FROM pemesanan_detail where id = '$id' ");
	if($q){
		echo "success";
	}else{
		echo "failed";
	}
}


?>