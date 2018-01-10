<!-- lolos cek kondisi dan tpi masih ragu ketika ruangan pesan -->
<?php

if($pecah_pesan[0]=="BOOKING"){
    $hari_get = date('D',strtotime($pecah_pesan[3]));
}
if($pecah_pesan[0]=="EDITBOOKING"){
    $hari_get = date('D',strtotime($pecah_pesan[4]));
}



$list_hari = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
$cek_hari_ketersediaan = trim($list_hari[$hari_get]);

$tgl_cek_totime = strtotime($tgl_cek);
$ubahformat_tgl_cek = date('Y-m-d',$tgl_cek_totime);
$get_tgl_ketersediaan = date('dmY',$tgl_cek_totime);
$convert_get_tgl_ketersediaan = date('Y-m-d',$tgl_cek_totime);

$q_cek_ketersediaanbooking = "SELECT c.kode_jam, b.kode_ruangan, a.tgl from pemesanan_detail a
							 left join ruangan b on b.kode_ruangan=a.kode_ruangan
							 left join jam c on c.kode_jam = a.kode_jam
							 where c.jam='$jam_cek' and a.tgl='$ubahformat_tgl_cek' and b.nama_ruangan='$ruangan_cek' ";

$q_cek_ketersediaanjadwal = "SELECT  c.kode_jam from penjadwalan_detail a
			               left join ruangan b on b.kode_ruangan=a.kode_ruangan
			               left join jam c on c.kode_jam = a.kode_jam
			               where c.jam='$jam_cek' and a.hari='$cek_hari_ketersediaan' and b.nama_ruangan='$ruangan_cek'";

$query_pemesan = mysqli_query($conn,  $q_cek_ketersediaanbooking);
$query_jadwal = mysqli_query($conn, $q_cek_ketersediaanjadwal);

//$get_ketersediaam_p = mysqli_fetch_array($query_pemesan);
//$get_ketersediaam_j = mysqli_fetch_array($query_jadwal);

$row_ketersediaan_pemesan = mysqli_num_rows($query_pemesan);
$row_ketersediaan_jadwal = mysqli_num_rows($query_jadwal);

/*kirim no pemesanan*/
$q_getkoderungan = mysqli_query($conn, "SELECT kode_ruangan from ruangan where nama_ruangan='$ruangan_cek' ");
$get_ketersediaam_p = mysqli_fetch_array($q_getkoderungan);

/*ambil kode jam*/
$q_kodejam = mysqli_query($conn, "SELECT kode_jam from jam where jam='$jam_cek' ");
$row_kodejam = mysqli_fetch_array($q_kodejam);
$ini_kode_jam = trim($row_kodejam['kode_jam']);

$get_nopemesanan_jam = trim($jam_cek);
$get_nopemesanan_ruang = trim($get_ketersediaam_p['kode_ruangan']);
$get_nopemesanan_tgl = trim($get_tgl_ketersediaan);

$kode_pemesanan_ketersediaan = $get_nopemesanan_ruang.$get_nopemesanan_jam.$get_nopemesanan_tgl;


$convert_kode_ketersediaan = $get_nopemesanan_ruang.$get_nopemesanan_jam.$convert_get_tgl_ketersediaan;

/*$query_kode = mysqli_query($conn, "SELECT concat(a.kode_ruangan,b.jam,a.tgl) from pemesanan_detail a 
left join jam b on b.kode_jam = a.kode_jam
left join ruangan c on c.kode_ruangan = a.kode_ruangan
where c.nama_ruangan='201' and b.jam='09.00' and a.tgl='2016-05-12' ");*/


/*LULUS CEK JABATAN*/
/*cek jabtan pemesan*/
$cek_jabatan_dosenataumahasiswa = mysqli_query($conn, "SELECT nama_pemesan, kode_pemesan, jabatan from pemesan where no_tlp='$replace_num' ");
$cek_jabatan_karyawan = mysqli_query($conn, "SELECT nama_karyawan, kode_karyawan from karyawan where no_tlp='$replace_num' ");

$row_cek_dosenataumahasiswa = mysqli_fetch_array($cek_jabatan_dosenataumahasiswa);
$row_cek_karyawan = mysqli_fetch_array($cek_jabatan_karyawan);

$cek_data_dosenataumahasiswa = mysqli_num_rows($cek_jabatan_dosenataumahasiswa);
$cek_data_karyawan = mysqli_num_rows($cek_jabatan_karyawan);

/*cek apakah di mahasiswa dosen atau karyawan */
if($cek_data_dosenataumahasiswa==0){

	if($cek_data_karyawan==1){
		$ini_jabatannya = "karyawan";
		$nama_ketersediaan = trim($row_cek_karyawan['nama_karyawan']);
		$kode_ketersediaan = trim($row_cek_karyawan['kode_karyawan']);
	}

}else{

	$ini_jabatannya = trim($row_cek_dosenataumahasiswa['jabatan']);
	$nama_ketersediaan = trim($row_cek_dosenataumahasiswa['nama_pemesan']);
	$kode_ketersediaan = trim($row_cek_dosenataumahasiswa['kode_pemesan']);

}

$berhasil_edit="";
$feedback_ketersediaan="";

if($row_ketersediaan_jadwal!="1"){

    if($row_ketersediaan_pemesan!="1"){

        
         /*untuk boooking aja*/
        if($pecah_pesan[0]=="BOOKING"){
            $feedback_ketersediaan="selamat booking berhasil jadwal 1, kode pemesanan: ".$kode_pemesanan_ketersediaan;
           /*save ke table pemesanan*/
            include 'sms_cek_savepemesanan.php';
            
            $berhasil_edit="";
        }
        if($pecah_pesan[0]=="EDITBOOKING"){

            $berhasil_edit= "berhasil edit booking 1";

            $feedback_ketersediaan="selamat update pemesanan berhasil 2, kode pemesanan: ".$kode_pemesanan_ketersediaan;
            include 'sms_cek_editbooking.php';
        }

    }else{
        $berhasil_edit="";
        $feedback_ketersediaan="Maaf, ruangan tidak tersedia";
    }


}else{

    if($row_ketersediaan_pemesan!="1"){

        if($row_ketersediaan_jadwal=="1"){


             /*untuk boooking aja*/
            if($pecah_pesan[0]=="BOOKING"){


                $berhasil_edit="";

                $feedback_ketersediaan="Maaf, ruangan tidak tersedia";
               /*save ke table pemesanan*/
                //include 'sms_cek_savepemesanan.php';
            }
            if($pecah_pesan[0]=="EDITBOOKING"){

                $berhasil_edit="";

                $feedback_ketersediaan="Maaf, ruangan tidak tersedia";
                /*update*/
                //include 'sms_cek_editbooking.php';
            }


        }else{

             /*untuk boooking aja*/
            if($pecah_pesan[0]=="BOOKING"){


                $berhasil_edit= "berhasil booking aja";

                $feedback_ketersediaan="selamat booking berhasil pemesan 3, kode pemesanan: ".$kode_pemesanan_ketersediaan;
               /*save ke table pemesanan*/
                include 'sms_cek_savepemesanan.php';
            }
            if($pecah_pesan[0]=="EDITBOOKING"){

                $berhasil_edit= "berhasil edit booking 2";

                $feedback_ketersediaan="selamat update pemesanan berhasil 4, kode pemesanan: ".$kode_pemesanan_ketersediaan;
                /*update*/
                include 'sms_cek_editbooking.php';
            }

        }

        
    }else{

         $feedback_ketersediaan="Maaf, ruangan tidak tersedia";
         $$berhasil_edit="";
    }
    
}

/*untuk boooking aja*/
if($pecah_pesan[0]=="BOOKING"){
    echo "kondisi membooking"."<br>";
    /*save ke table outbox, untuk memberi info berhasil booking*/
    include 'sms_cek_saveoutbox.php';

    /*ubah status proses menjadi true*/
    include 'sms_cek_updateinbox.php'; 
}
if($pecah_pesan[0]=="EDITBOOKING"){

    echo "kondisi editbooking"."<br>";
    /*save ke table outbox, untuk memberi info berhasil booking*/
    include 'sms_cek_saveoutbox.php';

    /*ubah status proses menjadi true*/
    include 'sms_cek_updateinbox.php'; 
    
}

echo $berhasil_edit."<br>";
echo $feedback_ketersediaan."<br>";
echo "no pemesanan: ".$kode_pemesanan_ketersediaan."<br>";
echo "jabatan: ".$ini_jabatannya."<br>";
echo "Nama: ".$nama_ketersediaan."<br>";
echo "Kode: ".$kode_ketersediaan."<br>";
echo "Kode convert: ".$convert_kode_ketersediaan."<br>";
?>