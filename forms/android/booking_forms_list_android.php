<?php
include '../../koneksi/koneksi.php';

$user = 'ede';//trim(@$_POST['user']);

$q = "SELECT a.tgl, b.nama_ruangan, c.jam FROM pemesanan_detail a 
	LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan 
	LEFT JOIN jam c on c.kode_jam = a.kode_jam
	where a.kode_pembooking='$user' ";
$sql = mysqli_query($conn, $q);

$data = array();

while($row = mysqli_fetch_array($sql)){

	$arr = array(
			  	"tgl" => trim($row["tgl"]),
			    "nama_ruangan" => trim($row["nama_ruangan"]),
			    "jam" => trim($row["jam"])
			   );
			   
			    array_push($data, $arr);

}

echo json_encode($data);


?>