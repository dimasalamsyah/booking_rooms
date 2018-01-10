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
	$sql_cari = mysqli_query($conn, "SELECT *,a.nama_kelas from mahasiswa b left join kelas a on a.id=b.id_kelas where b.nama like '$search_box%' order by b.nim desc LIMIT $posisi,$batas");
	while($r1 = mysqli_fetch_array($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  	"nim" => $r1["nim"],
			    "nama" => $r1["nama"],
			    "id_kelas" => $r1["id_kelas"],
		        "kelas" => $r1[8],
				"jurusan" => $r1["jurusan"],
				"notlp" => $r1["tlp"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>