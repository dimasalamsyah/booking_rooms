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


$sql = mysqli_query($conn, "UPDATE karyawan set nama_karyawan='$nama_karyawan', tanggal_lahir='$tanggal_lahir',
 tempat_lahir='$tempat_lahir', alamat='$alamat', no_tlp='$no_tlp', username='$username', password='$password', level='$jabatan' 
 where kode_karyawan='$kode_karyawan'" );


?>

