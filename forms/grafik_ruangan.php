<?php

include '../koneksi/koneksi.php';


$row1 = array();
	$sql = mysqli_query($conn, "SELECT * from matakuliah");
	while($r = mysqli_fetch_assoc($sql)){
	         $row2 = array(

	         		"categories"=> $r['id'],
	         		"impression"=> $r['id']
	         	);
	         array_push($row1, $row2);
	}
	echo json_encode($row1);

/*
$categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
$impression = array(12, 25, 100, 58, 63, 30, 5, 40, 91, 10, 50, 36);
$click = array(6, 12, 40, 28, 31, 15, 2, 20, 45, 5, 25, 18);

$graph_data = array('categories'=>$categories, 'impression'=>$impression, 'clicks'=>$click);

echo json_encode($graph_data);*/
exit;

?>