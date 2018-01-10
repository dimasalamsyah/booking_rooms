<?php

include '../koneksi/koneksi.php';

session_start();

$notlp = $_REQUEST['notlp'];
$nim = $_REQUEST['nim'];
$nama = $_REQUEST['nama'];
$id_kelas = $_REQUEST['kelas'];
$jurusan = $_REQUEST['jurusan'];
$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');


$sql = mysqli_query($conn, "UPDATE mahasiswa set nama='$nama', id_kelas='$id_kelas',
 jurusan='$jurusan', pic='$pic', last_update='$tanggal_update', tlp='$notlp' where nim='$nim' " );


?>

