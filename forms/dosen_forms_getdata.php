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
	$sql_cari = mysqli_query($conn, "SELECT * from dosen where nama_dosen like '$search_box%' order by kode_dosen desc LIMIT $posisi,$batas");
	while($r1 = mysqli_fetch_assoc($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  "kode_dosen" => $r1["kode_dosen"],
			    "nama_dosen" => $r1["nama_dosen"],
			    "tanggal_lahir" => $r1["tanggal_lahir"],
			    "tempat_lahir" => $r1["tempat_lahir"],
			    "no_tlp" => $r1["no_tlp"],
			    "alamat" => $r1["alamat"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>