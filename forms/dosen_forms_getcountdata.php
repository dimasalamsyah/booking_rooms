<?php 
    include '../koneksi/koneksi.php';

    session_start();
    $query= mysqli_query($conn,"SELECT * from dosen");
    $jmldata    = mysqli_num_rows($query);

    echo $jmldata;
?>