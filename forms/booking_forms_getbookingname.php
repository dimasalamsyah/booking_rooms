<?php 

include '../koneksi/koneksi.php';

//$cari     = isset($_GET['cari']) ? $_GET['cari']:'';

$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from ruangan");
	while($r = mysqli_fetch_assoc($sql)){
/*
	         $row1[]['id'] = $r['kode_ruangan'] ;
	         $row1[]['name'] = $r['nama_ruangan'] ;*/
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];
	         $row1[] = $r['kode_ruangan']." | ".$r['nama_ruangan'];

	}
	echo $json_kelas =  json_encode($row1);

?>