<?php


include '../koneksi/koneksi.php';

	$row_jam = array();
	$sql = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");
	



	while($r1 = mysqli_fetch_assoc($sql)){
		
	        $temp_cari = array(
			  	"kode" => $r1["kode_jam"],
			    "jam" => $r1["jam"]);
			   
			    array_push($row_jam, $temp_cari);
	}

	echo json_encode($row_jam);


?>