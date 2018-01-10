
<?php

include '../koneksi/koneksi.php';
session_start();
$notlp = $_REQUEST['notlp'];
$nim = $_REQUEST['nim'];
$nama = $_REQUEST['nama'];
$id_kelas = $_REQUEST['kelas'];
$jurusan = $_REQUEST['jurusan'];
$pic = $_SESSION['pic'];
$tanggal_update = date('Y-m-d');

$sql_cek = mysqli_query($conn, "SELECT nim from mahasiswa where nim='$nim'");
$isi = mysqli_fetch_array($sql_cek);
$cek = mysqli_num_rows($sql_cek);

if($cek==1){
	//header("location:mahasiswa_forms.php?error=1");
	echo ($isi[0]);
}else{
	//header("location:mahasiswa_forms.php?error=1");
	$sql = mysqli_query($conn, "INSERT INTO mahasiswa(nim, nama, id_kelas,
 		jurusan, tlp, pic, last_update) VALUES
  		('$nim','$nama','$id_kelas','$jurusan', '$notlp','$pic','$tanggal_update')" );
	//echo "d";
	//echo ($isi[0]);
}

?>

