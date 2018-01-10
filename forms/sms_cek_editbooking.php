<?php

//$vv = $kode_editbooking;
$ruang_update = substr($kode_cancelbooking, 0,5);
$jam_update = substr($kode_cancelbooking, 5,5);

$tahun_update = substr($kode_cancelbooking, 14);
$bulan_update = substr($kode_cancelbooking, 12, 2);
$tanggal_update = substr($kode_cancelbooking, 10, 2);

$tgl_update = $tahun_update."-".$bulan_update."-".$tanggal_update;

$query_getdataupdate = "SELECT a.kode_jam, a.kode_ruangan, a.tgl from pemesanan_detail a
						left join jam b on b.kode_jam = a.kode_jam
						where a.tgl='$tgl_update' and b.jam='$jam_update' and a.kode_ruangan='$ruang_update' ";
$q_getup = mysqli_query($conn, $query_getdataupdate);
$row_getup = mysqli_fetch_array($q_getup);

$kode_jam_getup = trim($row_getup['kode_jam']);
$kode_ruangan_getup = trim($row_getup['kode_ruangan']);
$tgl_getup = trim($row_getup['tgl']);

$string_update = "UPDATE pemesanan_detail c set c.kode_pembooking='$kode_ketersediaan',
				c.nama_pembooking='$nama_ketersediaan',
				c.posisi='$ini_jabatannya', c.kode_ruangan='$get_nopemesanan_ruang',
				c.kode_jam='$ini_kode_jam', c.tgl='$convert_get_tgl_ketersediaan',
				c.ket='$keterangan_booking', c.pic='bysms' 
				where 
				c.kode_ruangan='$kode_ruangan_getup' and c.tgl='$tgl_getup ' and
				c.kode_jam = '$kode_jam_getup' ";

$query_edit = mysqli_query($conn, $string_update);

if($q_getup){
	echo "edit pemesanan berhasil"."<br>";
}else{
	echo "gagal edit pemesanan"."<br>";
}

/*echo "1.".$query_getdataupdate."<br>";
echo "2.".$string_update."<br>";
echo "3.".$ruang_update."<br>";
echo "4.".$tgl_update."<br>";*/

?>