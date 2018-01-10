<?php 

include '../koneksi/koneksi.php';

session_start();

$matakuliah = trim($_REQUEST['matakuliah']);
$pic = $_SESSION['pic'];

$save = mysqli_query($conn, "INSERT INTO matakuliah (mata_kuliah) values ('$matakuliah')");

?>