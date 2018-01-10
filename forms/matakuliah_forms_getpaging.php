<?php


include '../koneksi/koneksi.php';
/*menentuan bnyak data*/
$batas   = 10;
$halaman = @$_GET['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

$query  = "SELECT * FROM matakuliah ";
$tampil = mysqli_query($conn, $query);

$i=$posisi+1; /*untuk agar no berlanjut*/

$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from matakuliah order by id desc LIMIT $posisi,$batas");
	while($r = mysqli_fetch_assoc($sql)){
		
	        $temp = array(
	        	"no"=> $i,
			  "id" => $r["id"],
			    "mata_kuliah" => $r["mata_kuliah"]);
			   
			    array_push($row1, $temp);
			  $i++; 
	}

	/*$result["total"] = count($row1);
	$result["rows"] = $row1;*/

	echo json_encode($row1);


?>