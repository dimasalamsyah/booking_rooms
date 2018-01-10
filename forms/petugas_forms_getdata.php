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
	$sql_cari = mysqli_query($conn, "SELECT * from petugas where username like '$search_box%' order by username asc LIMIT $posisi,$batas");
	while($r1 = mysqli_fetch_array($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  	"kode" => $r1["kode_petugas"],
			    "nama" => $r1["username"],
			    "pass" => $r1["password"],
			    "jabatan" => $r1["jabatan"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>