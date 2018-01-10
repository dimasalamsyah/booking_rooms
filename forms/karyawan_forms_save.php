<?php

include '../koneksi/koneksi.php';

$kode_karyawan = $_REQUEST['kode_karyawan'];
$nama_karyawan = $_REQUEST['nama_karyawan'];
$tanggal_lahir = $_REQUEST['tanggal_lahir'];
$tempat_lahir = $_REQUEST['tempat_lahir'];
$alamat = $_REQUEST['alamat'];
$no_tlp = $_REQUEST['no_tlp'];
$username = $_REQUEST['username'];
$password = md5($_REQUEST['password']);
$jabatan = $_REQUEST['jabatan'];
$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');


$sql = mysqli_query($conn, "INSERT INTO karyawan(kode_karyawan, nama_karyawan, tanggal_lahir,
 tempat_lahir, alamat, no_tlp, username, password, level) VALUES
  ('$kode_karyawan','$nama_karyawan','$tanggal_lahir','$tempat_lahir','$alamat','$no_tlp','$username','$password', '$jabatan')" );


?>

