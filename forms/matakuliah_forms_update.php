<?php 

include '../koneksi/koneksi.php';

session_start();

$matakuliah = $_REQUEST['matakuliah'];
$id = $_REQUEST['id'];

$pic = $_SESSION['pic'];

$update = mysqli_query($conn, " UPDATE matakuliah set mata_kuliah='$matakuliah' where id='$id' ");


if($update){
echo "berhasil";
}else{
	echo "gagal";
}
?>