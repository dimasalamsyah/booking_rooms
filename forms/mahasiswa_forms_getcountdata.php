<?php
include '../koneksi/koneksi.php';
session_start();

$query_mahasiswa = mysqli_query($conn,"SELECT * from mahasiswa");
$jmldata    = mysqli_num_rows($query_mahasiswa);

echo $jmldata;
?>