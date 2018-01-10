<?php

include '../koneksi/koneksi.php';

echo $hasil_get = @$_REQUEST['SenderNumber'];

echo $noPengirim = str_replace("+62", "0", $hasil_get);

	$cek1 = mysqli_query($conn, "SELECT nama_dosen, kode_dosen from dosen where no_tlp='$noPengirim' ");
    $cek2 = mysqli_query($conn, "SELECT nama, nim from mahasiswa where tlp='$noPengirim' ");
    $cek3 = mysqli_query($conn, "SELECT nama_karyawan, kode_karyawan from karyawan where no_tlp='$noPengirim' ");

    /*if($cek1){
        $row_cek1 = mysqli_fetch_array($cek1);
        echo $nama_pembooking = $row_cek1[0];
        echo $kode_ = $row_cek1[1];
        echo $pos = "dosen";
    }*/
    //if($cek2){
        $row_cek1 = mysqli_fetch_array($cek2);
        echo $nama_pembooking = $row_cek1[0];
        echo $kode_ = $row_cek1[1];
        echo $pos = "mahasiswa";
    //}
    /*if($cek3){
        $row_cek1 = mysqli_fetch_array($cek3);
        echo $nama_pembooking = $row_cek1[0];
        echo $kode_ = $row_cek1[1];
        echo $pos = "karyawan";
    }*/

    $query_save_d = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking, posisi, kode_ruangan, kode_jam, 
    tgl,ket) VALUES ('$kode_', '$nama_pembooking', '$pos', '','','', '') ");



?>