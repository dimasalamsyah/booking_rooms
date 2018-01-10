<?php 
include '../koneksi/koneksi.php';

session_start();

$id_pemesanan = trim($_REQUEST['id']);
$kode_pembooking = trim($_REQUEST['kode_pembooking']);
$last_update = date('Y-m-d');
$pic = $_SESSION['pic'];
$combo_kelas_add = trim($_REQUEST['combo_kelas_add']);
$jam_add_kode = trim($_REQUEST['jam_add_kode']);
$tanggal_add = trim($_REQUEST['tanggal_add']);
$ket = trim($_REQUEST['ket']);
$nama_pembooking = trim($_REQUEST['nama']);

$cek_jabatan = trim($_REQUEST['jabatan']);

	/*$query_save = mysqli_query($conn, "INSERT INTO pemesanan_header (kode_pembooking, last_update, 
		pic) VALUES ('$kode_pembooking','$last_update','$pic')");*/


	if($cek_jabatan=='dosen'){
		$cek = mysqli_query($conn, "SELECT nama_pemesan from pemesan where jabatan='dosen' and kode_pemesan='$kode_pembooking' ");
		$pos = 'dosen';
	}
	if ($cek_jabatan=='mahasiswa') {
		$cek = mysqli_query($conn, "SELECT nama_pemesan from pemesan where jabatan='mahasiswa' and kode_pemesan='$kode_pembooking' ");
		$pos = 'mahasiswa';
	}
	if($cek_jabatan=='karyawan'){
		$cek = mysqli_query($conn, "SELECT nama_karyawan from karyawan where kode_karyawan='$kode_pembooking' ");
		$pos = 'karyawan';
	}

	$isi_cek = mysqli_fetch_array($cek);
	echo $nama_dosen = $isi_cek[0];

	$query_save_d = mysqli_query($conn, "UPDATE pemesanan_detail set kode_pembooking='$kode_pembooking',
									 nama_pembooking='$nama_dosen', posisi='$pos', kode_ruangan='$combo_kelas_add',
									 kode_jam='$jam_add_kode', tgl='$tanggal_add', ket='$ket' where id='$id_pemesanan' ");



?>
