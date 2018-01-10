<?php 
include '../koneksi/koneksi.php';

session_start();

$id_del = $_REQUEST['id_del'];

$query = mysqli_query($conn,"DELETE FROM pemesanan_detail where id='$id_del' ");


if($query){
	echo "c";
}else{
	echo "a";
}
?>