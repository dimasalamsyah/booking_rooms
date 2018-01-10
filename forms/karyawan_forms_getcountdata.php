<?php
include '../koneksi/koneksi.php';
session_start();

$query_karyawan = mysqli_query($conn,"SELECT * from karyawan");
echo $jmldata    = mysqli_num_rows($query_karyawan);
?>