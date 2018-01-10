<?php

	include '../koneksi/koneksi.php';
    $query_no = mysqli_query($conn,"SELECT max(kode_jam) FROM jam");
    $row = mysqli_fetch_array($query_no);
    $kode = $row[0];

    $nourut = (int)substr($kode, 2,4);
    $nourut++;

    //echo "KD".$nourut;
    echo $data = sprintf("KJ%02s", $nourut);

?>