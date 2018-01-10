<?php
include '../koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

/*$tgl_now = date('Y-m-d')."<br>";
$time_now = date('Hi')."<br>";

$where = "WHERE a.tgl<='$tgl_now' and CONCAT(substring(b.jam,1,2), substring(b.jam,4,2)) < '$time_now'";

$query = "SELECT a.id, a.tgl, a.kode_jam, b.jam FROM pemesanan_detail a
		LEFT JOIN jam b on b.kode_jam= a.kode_jam $where";


$hasil = mysqli_query($conn,$query);

$countsms = mysqli_num_rows($hasil);

while ($row = mysqli_fetch_array($hasil)) {
	$kode_pemesanan = $row[0]."<br>";
	//$sql_clear = mysqli_query($conn, "DELETE from pemesanan_detail where id='$kode_pemesanan' ");
	
}


echo trim($countsms);
*/

//$query_refreshform = mysqli_query($conn, "SELECT kode_jam from pemesanan_detail");


?>