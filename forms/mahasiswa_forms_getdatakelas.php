<?php


include '../koneksi/koneksi.php';
$query = mysqli_query($conn, "SELECT * from kelas");
$row1 = array();
	while($r = mysqli_fetch_assoc($query)){

	        /* $row1[]['id'] = $r['kode_dosen'] ;
	         $row1[]['nama'] = $r['nama_dosen'] ;*/
	         /*$row1[] = $r['nama_dosen']." | ".$r['kode_dosen'];*/
	         $row2 = array(

	         		"nama"=> $r['nama_kelas'],
	         		"kode"=> $r['id']
	         	);
	         array_push($row1, $row2);
	}
	echo json_encode($row1);
?>