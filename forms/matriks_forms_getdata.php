<?php
include '../koneksi/koneksi.php';

$ruangan = $_REQUEST['ruangan'];

	$row_jam = array();
	$sql = mysqli_query($conn, "select nama_ruangan from ruangan where kode_ruangan='$ruangan' ");
	



	while($r1 = mysqli_fetch_assoc($sql)){
		
	        $temp_cari = array(
			    "ruangan" => $r1["nama_ruangan"]);
			   
			    array_push($row_jam, $temp_cari);
	}

	echo json_encode($row_jam);

?>