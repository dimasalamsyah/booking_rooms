<?php


include '../koneksi/koneksi.php';
/*menentuan bnyak data*/
/*$batas   = 10;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

$query  = "SELECT * FROM dosen ";
$tampil = mysqli_query($conn, $query);
*/
$i=1;

$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from dosen order by kode_dosen desc LIMIT $posisi,$batas");
	while($r = mysqli_fetch_assoc($sql)){
		
	        $temp = array(
	        	"no"=> $i,
			  "kode_dosen" => $r["kode_dosen"],
			    "nama_dosen" => $r["nama_dosen"],
			    "tanggal_lahir" => $r["tanggal_lahir"],
			    "tempat_lahir" => $r["tempat_lahir"],
			    "no_tlp" => $r["no_tlp"],
			    "alamat" => $r["alamat"]);
			   
			    array_push($row1, $temp);
			  $i++; 
	}

	/*$result["total"] = count($row1);
	$result["rows"] = $row1;*/

	echo json_encode($row1);


?>