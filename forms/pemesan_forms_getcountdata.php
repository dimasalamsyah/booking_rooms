<?php 
    include '../koneksi/koneksi.php';

    session_start();
    $query= mysqli_query($conn,"SELECT * from pemesan");
    $jmldata    = mysqli_num_rows($query);

    echo $jmldata;
?>