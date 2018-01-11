<?php


include '../koneksi/koneksi.php';

$batas   = 10;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
 
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

$search_box = @$_REQUEST['search_box'];

$i=1;
	$row_cari = array();
	$sql_cari = mysqli_query($conn, "SELECT * from jam where jam like '$search_box%' order by kode_jam desc LIMIT $posisi,$batas");
	if(@$_REQUEST['akses']=='android'){
		$sql_cari = mysqli_query($conn, "SELECT * from jam order by kode_jam asc");
	}
	while($r1 = mysqli_fetch_assoc($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  "id" => $r1["kode_jam"],
			    "jam" => $r1["jam"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>