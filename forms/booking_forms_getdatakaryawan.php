<?php 

include '../koneksi/koneksi.php';


$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from karyawan");
	while($r = mysqli_fetch_assoc($sql)){

	        /* $row1[]['id'] = $r['kode_dosen'] ;
	         $row1[]['nama'] = $r['nama_dosen'] ;*/
	         /*$row1[] = $r['nama_dosen']." | ".$r['kode_dosen'];*/
	         $row2 = array(

	         		"nama"=> $r['nama_karyawan'],
	         		"kode"=> $r['kode_karyawan']
	         	);
	         array_push($row1, $row2);
	}
	echo json_encode($row1);

?>