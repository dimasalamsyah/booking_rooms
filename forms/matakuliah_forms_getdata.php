<?php
include '../koneksi/koneksi.php';


if(isset($_REQUEST['key'])){

	$key = $_REQUEST['key'];
	$i=1;
	$row_cari = array();
	$sql_cari = mysqli_query($conn, "SELECT * from matakuliah where mata_kuliah like '$key' ");
	while($r1 = mysqli_fetch_assoc($sql_cari)){
		
	        $temp_cari = array(
			    "no"=> $i,
			  	"id" => $r1["id"],
			    "mata_kuliah" => $r1["mata_kuliah"]);
			   
			    array_push($row_cari, $temp_cari);
			  
	}

	echo json_encode($row_cari);


}else{


$search_box = $_REQUEST['search_box'];
$i=1; /*untuk agar no berlanjut*/

$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from matakuliah where mata_kuliah='$search_box' order by id desc");
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

}


?>