<?php 
include '../koneksi/koneksi.php';

$kode = $_REQUEST['kode'];

$query_update = mysqli_query($conn,"DELETE from petugas where kode_petugas='$kode' ");

?>
