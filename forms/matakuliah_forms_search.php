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

$search_box = $_REQUEST['search_box'];

$i=1;
	$row_cari = array();
	$sql_cari = mysqli_query($conn, "SELECT * from matakuliah where mata_kuliah like '$search_box%' order by id desc LIMIT $posisi,$batas");
	while($r1 = mysqli_fetch_assoc($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  "id" => $r1["id"],
			    "mata_kuliah" => $r1["mata_kuliah"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>