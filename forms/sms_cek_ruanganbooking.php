<?php

	$isi_quota = "SELECT * from pemesanan_detail a
     left join ruangan b on b.kode_ruangan=a.kode_ruangan
     where a.kode_jam='$jam_booking' and a.tgl='$tgl_booking' and b.kode_ruangan='$ruangan' ";

    $isi_jadwal = "SELECT * from penjadwalan_detail a
                                    left join ruangan b on b.kode_ruangan=a.kode_ruangan
                                    where a.kode_jam='$jam_booking' and a.hari='$hari_' and b.kode_ruangan='$ruangan'";
    
    $query_quota = mysqli_query($conn,  $isi_quota);

    $query_jadwal = mysqli_query($conn, $isi_jadwal);

    $row_q = mysqli_num_rows($query_quota);
    $row_j = mysqli_num_rows($query_jadwal);


        $cek1 = mysqli_query($conn, "SELECT nama_dosen, kode_dosen from dosen where no_tlp='$noPengirim' ");
        $cek2 = mysqli_query($conn, "SELECT nama, nim from mahasiswa where tlp='$noPengirim' ");
        $cek3 = mysqli_query($conn, "SELECT nama_karyawan, kode_karyawan from karyawan where no_tlp='$noPengirim' ");

        $row_cek1 = mysqli_num_rows($cek1);
        $row_cek2 = mysqli_num_rows($cek2);
        $row_cek3 = mysqli_num_rows($cek3);

        if($row_cek1=="1"){
            $row_cek1 = mysqli_fetch_array($cek1);
            echo $nama_pembooking = $row_cek1[0];
            echo $kode_ = $row_cek1[1];
            $pos = "dosen";
            
            

        }
        if($row_cek2=="1"){
            $row_cek1 = mysqli_fetch_array($cek2);
            echo $nama_pembooking = $row_cek1[0];
            echo $kode_ = $row_cek1[1];
            $pos = "mahasiswa";

            

        }
        if($row_cek3=="1"){
            $row_cek1 = mysqli_fetch_array($cek3);
            echo $nama_pembooking = $row_cek1[0];
            echo $kode_ = $row_cek1[1];
            $pos = "karyawan";

            

        }


    
    if($row_j!="1"){

        if($row_q!="1"){
             $feedback="selamat booking berhasil";
             $konfirmasi_status = "Terima";

             $query_save_d = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking, posisi, kode_ruangan, kode_jam, 
                     tgl,ket) VALUES ('$kode_', '$nama_pembooking', '$pos', '$ruangan','$jam_booking','$tgl_booking', '$ket_pesan') ");

             /*UPDATE SMS INFO*/
            $query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='Terima' where id_info='$id_' ");

        }else{
             $feedback="Maaf, ruangan tidak tersedia";
             $konfirmasi_status = "Tolak";

             /*UPDATE SMS INFO*/
            $query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='Tolak' where id_info='$id_' ");
        }


    }else{

        if($row_q!="1" and $row_q=="1"){
             $feedback="selamat booking berhasil";
             $konfirmasi_status = "Terima";

             $query_save_d = mysqli_query($conn, "INSERT INTO pemesanan_detail (kode_pembooking, nama_pembooking, posisi, kode_ruangan, kode_jam, 
                     tgl,ket) VALUES ('$kode_', '$nama_pembooking', '$pos', '$ruangan','$jam_booking','$tgl_booking', '$ket_pesan') ");

             /*UPDATE SMS INFO*/
            $query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='Terima' where id_info='$id_' ");

        }else{
             $feedback="Maaf, ruangan tidak tersedia";
             $konfirmasi_status = "Tolak";

             /*UPDATE SMS INFO*/
            $query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='Tolak' where id_info='$id_' ");

        }
        
    }



    

    $query_smsinfo = mysqli_query($conn,"UPDATE info_sms set status='$konfirmasi_status' where id_info='$id_' ");

    $query=mysqli_query($conn,"INSERT INTO outbox (DestinationNumber, TextDecoded) VALUES
     ('".$noPengirim."', '".$feedback."')");    

    echo $isi_quota."<br>".$isi_jadwal."<br>".$feedback;

?>