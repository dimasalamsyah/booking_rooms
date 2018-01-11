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
	$sql_cari = mysqli_query($conn, "SELECT * from ruangan where nama_ruangan like '$search_box%' order by nama_ruangan desc LIMIT $posisi,$batas");
	if(@$_REQUEST['akses']=='android'){
		$sql_cari = mysqli_query($conn, "SELECT * from ruangan order by nama_ruangan asc");
	}
	while($r1 = mysqli_fetch_array($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  	"kode" => $r1["kode_ruangan"],
			    "nama" => $r1["nama_ruangan"],
			    "jenis" => $r1["jenis_ruangan"],
			    "status" => $r1["status"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>