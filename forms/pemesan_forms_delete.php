<?php 
include '../koneksi/koneksi.php';

session_start();

$kd_pemesan = $_REQUEST['kd_pemesan'];

$pic = $_SESSION['pic'];
$last_update = date('Y-m-d');

$query_update = mysqli_query($conn,"DELETE from pemesan where kode_pemesan='$kd_pemesan' ");


?>
