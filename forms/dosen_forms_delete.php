<?php 
include '../koneksi/koneksi.php';

session_start();

$kd_dosen = $_REQUEST['kd_dosen'];

$pic = $_SESSION['pic'];
$last_update = date('Y-m-d');

$query_update = mysqli_query($conn,"DELETE from dosen where kode_dosen='$kd_dosen' ");


?>
