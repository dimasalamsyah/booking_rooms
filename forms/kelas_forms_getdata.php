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
	$sql_cari = mysqli_query($conn, "SELECT *, b.nama_karyawan from kelas a left join karyawan b on b.kode_karyawan = a.pa  where a.nama_kelas like '$search_box%' order by a.nama_kelas desc LIMIT $posisi,$batas");
	while($r1 = mysqli_fetch_array($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  	"id" => $r1["id"],
			    "nama_kelas" => $r1["nama_kelas"],
		        "tingkat" => $r1["tingkat"],
				"shift" => $r1["shift"],
				"pa" => $r1["pa"],
				"nama_karyawan" => $r1["nama_karyawan"]);
			   
			    array_push($row_cari, $temp_cari);
		$i++;	  
	}

	echo json_encode($row_cari);


?>