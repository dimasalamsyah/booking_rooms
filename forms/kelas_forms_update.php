
<?php

include '../koneksi/koneksi.php';


$id = $_REQUEST['id'];
$nama_kelas = $_REQUEST['nama_kelas'];
$tingkat = $_REQUEST['tingkat'];
$shift = $_REQUEST['shift'];
$pa = $_REQUEST['pa'];

	$sql = mysqli_query($conn, "UPDATE kelas set nama_kelas='$nama_kelas', 
		tingkat='$tingkat', shift='$shift', pa='$pa' where id='$id'");



?>

