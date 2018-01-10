<?php


include '../koneksi/koneksi.php';

	$row_jam = array();
	$sql = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by kode_ruangan asc");
	



	while($r1 = mysqli_fetch_assoc($sql)){
		
	        $temp_cari = array(
			  	"kode" => $r1["kode_ruangan"],
			    "ruangan" => $r1["nama_ruangan"]);
			   
			    array_push($row_jam, $temp_cari);
	}

	echo json_encode($row_jam);


?>