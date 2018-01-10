<?php
include '../koneksi/koneksi.php';
date_default_timezone_set('Asia/Jakarta');

/*include auto replat sms*/
//include 'sms_cek_autoreplay.php';

$query = "SELECT * FROM inbox WHERE Processed = 'false' ";


$hasil = mysqli_query($conn,$query);

$countsms = mysqli_num_rows($hasil);


/*validasi 1 jam auto reply*/
/*while ($row = mysqli_fetch_array($hasil)) {
	# code...
	
	$getjam = strtotime($row['ReceivingDateTime']);
	//echo $jam_full =  date('H:i:s',$getjam)."<br>";
	$jam =  date('H',$getjam)." ";
	$menit =  date('i',$getjam)."<br>";
	$detik = date('s',$getjam)."<br>";

	echo $jam1 =  date('H')." ";
	echo $menit1 =  date('i')."<br>";
	echo $detik1 = date('s')."<br>";

	$h_jam = $jam1 - $jam;
	$h_menit = $menit1 - $menit;
	$total = $h_jam.$h_menit;
	//echo $skrng = mktime(date('H',$jam), date('i',$menit), date('s',$detik))."<br>";
	//echo $getjam = mktime(date('H'), date('i'), date('s'))."<br>";


	if($total=="10"){
		echo "auto reply";
	}else{
		echo "pending"."<br>";
	}


}*/

//echo date('H:i:s');
//echo date('Y m d');
if($countsms==0){
	/*tidak di sisi dengan apa apa*/
}else{
	echo $countsms;
	/*biar gag ada tulisan nol klo gag notif*/
}

?>