<?php

include '../koneksi/koneksi.php';

$query_dosen1 = mysqli_query($conn,"SELECT * FROM dosen order by kode_dosen desc");

while($r = mysqli_fetch_assoc($query_dosen1)){

	         $row1[] = $r['kode_dosen'];

	}

	$result["total"] = count($row1);
	$result["rows"] = $row1;

	echo json_encode($result);


?>