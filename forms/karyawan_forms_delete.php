<?php 
include '../koneksi/koneksi.php';

session_start();

$kode_karyawan = $_REQUEST['kode_karyawan'];

$query_update = mysqli_query($conn,"DELETE from karyawan where kode_karyawan='$kode_karyawan' ");


?>
