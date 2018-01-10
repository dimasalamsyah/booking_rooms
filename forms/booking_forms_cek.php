<?php

$room = $_REQUEST['ruangan'];
$cek_date = $_REQUEST['tgl'];
$clock = $_REQUEST['jam'];

$hari = (strtotime($cek_date));
$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis',"Jumat", 'Sabtu','Minggu');
$get_hari =  $array_hari[date('N',$hari)];

	include '../koneksi/koneksi.php';

	    $query_cek4 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                        where a.kode_jam='$clock' and a.tgl='$cek_date' and a.kode_ruangan='$room' ");
	     

        $query_cek_matriks4 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                            LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                            LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                            LEFT JOIN kelas d on d.id = a.kode_kelas
                                            LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                            LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                            where a.kode_ruangan='$room'  and a.kode_jam='$clock' and a.hari='$get_hari' ");

        $h_query = mysqli_num_rows($query_cek4);
        $h_query_matriks = mysqli_num_rows($query_cek_matriks4);


		if($h_query==1){
			echo $data = "<div class='alert alert-warning' style='margin-top:10px; margin-bottom:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf!</strong> Ruangan sudah dipesan</div>";
		}else{
			if($h_query_matriks==1){
				echo $data = "<div class='alert alert-warning' style='margin-top:10px; margin-bottom:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf!</strong> Ruangan sudah dijadwalkan</div>";
			}else{
				echo $data = "<div class='alert alert-success' style='margin-top:10px; margin-bottom:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Selamat!</strong> Ruangan tersedia</div>";
			}
			
		}
?>