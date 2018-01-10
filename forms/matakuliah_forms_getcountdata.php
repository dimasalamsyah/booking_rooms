<?php
include '../koneksi/koneksi.php';
session_start();

$query_matakuliahh = mysqli_query($conn,"SELECT * from matakuliah");
echo $jmldata    = mysqli_num_rows($query_matakuliahh);
?>