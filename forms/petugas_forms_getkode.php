<?php

	include '../koneksi/koneksi.php';
    $query_no = mysqli_query($conn,"SELECT max(kode_petugas) FROM petugas");
    $row = mysqli_fetch_array($query_no);
    $kode = $row[0];

    $nourut = (int)substr($kode, 2,5);
    $nourut++;

    //echo "KD".$nourut;
    echo $data = sprintf("KP%03s", $nourut);

?>