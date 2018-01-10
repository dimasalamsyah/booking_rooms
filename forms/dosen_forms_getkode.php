<?php

	include '../koneksi/koneksi.php';
    $query_no = mysqli_query($conn,"SELECT max(kode_dosen) FROM dosen");
    $row = mysqli_fetch_array($query_no);
    $kode = $row[0];

    $nourut = (int)substr($kode, 2,5);
    $nourut++;

    //echo "KD".$nourut;
    echo $data = sprintf("KD%03s", $nourut);

?>