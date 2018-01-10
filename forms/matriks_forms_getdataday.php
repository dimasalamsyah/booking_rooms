<?php

/*$datenow = $_REQUEST['datenow'];*/
$datenow = "2016-03-01";

if(!isset($datenow)){
    $h_datenow = "now";
}else{
    $h_datenow = $datenow;
}

/*pertama*/
$hari = (strtotime($h_datenow));
$bulan = (strtotime($h_datenow));
$isi = (date("l,", $hari) . "<br>");
$isi_ = date("d F Y", $hari)."<br>";
$get_date = date("Ymd", $hari);
$get_date_cek = date("Y-m-d", $hari);

/*kedua*/
$hari1 = strtotime("+1 day", $hari);
$bulan = strtotime("+1 day", $hari);
$isi2 = date("l,", $hari1) . "<br>";
$isi_2 = date("d F Y", $hari1); 
$get_date1 = date("Ymd", $hari1);
$get_date_cek1 = date("Y-m-d", $hari1);

/*ketiga*/

$hari2 = strtotime("+2 day", $hari);
$bulan = strtotime("+2 day", $hari);
$isi3 = date("l,", $hari2) . "<br>";
$isi_3 = date("d F Y", $hari2); 
$get_date2 = date("Ymd", $hari1);
$get_date_cek2 = date("Y-m-d", $hari2);

/*kempat*/

$hari3 = strtotime("+3 day", $hari);
$bulan = strtotime("+3 day", $hari);
$isi4 = date("l,", $hari3) . "<br>";
$isi_4 = date("d F Y", $hari3); 
$get_date3 = date("Ymd", $hari1);
$get_date_cek3 = date("Y-m-d", $hari3);

/*kelima*/

$hari4 = strtotime("+4 day", $hari);
    $bulan = strtotime("+4 day", $hari);
    $isi5 = date("l,", $hari4) . "<br>";
    $isi_5 = date("d F Y", $hari4); 
    $get_date4 = date("Ymd", $hari1);
    $get_date_cek4 = date("Y-m-d", $hari4);

/*keenam*/
$hari5 = strtotime("+5 day", $hari);
    $bulan = strtotime("+5 day", $hari);
    $isi6 = date("l,", $hari5) . "<br>";
    $isi_6 = date("d F Y", $hari5); 
    $get_date5 = date("Ymd", $hari1);
    $get_date_cek5 = date("Y-m-d", $hari5);

/*ketujuh*/
$hari6 = strtotime("+6 day", $hari);
    $bulan = strtotime("+6 day", $hari);
    $isi7 = date("l,", $hari6) . "<br>";
    $isi_7 = date("d F Y", $hari6); 
    $get_date6 = date("Ymd", $hari1);
    $get_date_cek6 = date("Y-m-d", $hari6);

$row = array();
$no=1;	
	        $tgl = array(
                "no" => $no,
                "hari" => $isi,"tanggal" => $isi_, "value1" => $get_date_cek,
			  	"hari2" => $isi2,"tanggal2" => $isi_2, "value2" => $get_date_cek1,
			  	"hari3" => $isi3,"tanggal3" => $isi_3, "value3" => $get_date_cek2,
			  	"hari4" => $isi4,"tanggal4" => $isi_4, "value4" => $get_date_cek3,
			  	"hari5" => $isi5,"tanggal5" => $isi_5, "value5" => $get_date_cek4,
			  	"hari6" => $isi6,"tanggal6" => $isi_6, "value6" => $get_date_cek5,
			  	"hari7" => $isi7,"tanggal7" => $isi_7, "value7" => $get_date_cek6
			  	 );
			   
			    array_push($row, $tgl);


	echo json_encode($row);


?>