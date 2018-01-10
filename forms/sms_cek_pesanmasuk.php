<!-- lolos cek kondisi -->
<?php
include '../koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

$get_id_pesan = @$_REQUEST['id'];

if(!isset($get_id_pesan)){
	$isi_getid = $ambil_nilai_id_autoreplay; //di top_bar
}else{
	$isi_getid = $get_id_pesan;
}

$query = "SELECT * FROM inbox WHERE Processed = 'false' and SenderNumber like '+62%' and ID='$isi_getid' ";

$hasil = mysqli_query($conn,$query);

while ($row = mysqli_fetch_array($hasil)) {

	$id_getinbox = trim($row['ID']);
	$receivingdatetime = trim($row['ReceivingDateTime']);
	$sendernumber = trim($row['SenderNumber']);
	$textdecoded = strtoupper(trim($row['TextDecoded']));

	//$receivingdatetime." ".$sendernumber."<br>";
	//echo $replace_num = substr($sendernumber, 0,3);
	//echo $replace_num = ltrim($sendernumber, "+62")."<br>";

	/*replace nomor */
	$replace_num = str_replace("+62", "0", $sendernumber);

	/*include: cek no sms*/
	include 'sms_cek_nopengirim.php';


}
echo $isi_getid;

?>