
<?php

include '../koneksi/koneksi.php';
session_start();
$nama_kelas = $_REQUEST['nama_kelas'];
$tingkat = $_REQUEST['tingkat'];
$shift = $_REQUEST['shift'];
$pa = $_REQUEST['pa'];



$sql_cek = mysqli_query($conn, "SELECT nama_kelas from kelas where nama_kelas='$nama_kelas'");
$isi = mysqli_fetch_array($sql_cek);
$cek = mysqli_num_rows($sql_cek);

if($cek==1){
	//header("location:mahasiswa_forms.php?error=1");
	echo ($isi[0]);
}else{
	//header("location:mahasiswa_forms.php?error=1");
	$sql = mysqli_query($conn, "INSERT INTO kelas(nama_kelas, tingkat, shift, pa) VALUES
  		('$nama_kelas','$tingkat','$shift','$pa')" );


}

?>

