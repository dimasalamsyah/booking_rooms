<?php

include '../koneksi/koneksi.php';

$mulai = $_REQUEST['mulai'];
$akhir = $_REQUEST['akhir'];

$sql = mysqli_query($conn,"INSERT INTO penjadwalan_tahunajaran (tahun_ajaran_mulai, tahun_ajaran_akhir)
					 values ('$mulai','$akhir') ");

?>