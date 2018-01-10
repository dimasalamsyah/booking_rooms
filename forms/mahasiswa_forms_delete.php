<?php 
include '../koneksi/koneksi.php';

$nim = $_REQUEST['nim'];

$query_update = mysqli_query($conn,"DELETE from mahasiswa where nim='$nim' ");

?>
