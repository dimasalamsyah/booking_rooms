<?php
include '../../koneksi/koneksi.php';


$kode = trim($_REQUEST['username']);
$password = trim($_REQUEST['password']);


$q = "SELECT * FROM pemesan where kode_pemesan = '$kode' and password = '$password' ";
$sql = mysqli_query($conn, $q);
$count = mysqli_num_rows($sql);


//echo $kode;
if($count == 1){
	echo "success";
}else{
	echo "failed";
}

?>