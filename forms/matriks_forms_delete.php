<?php

include '../koneksi/koneksi.php';

session_start();

$id_del = $_REQUEST['id_del'];

$query = mysqli_query($conn,"DELETE FROM penjadwalan_detail where kode_transaksi='$id_del' ");


if($query){
	echo "c";
}else{
	echo "a";
}

?>