<?php

include '../koneksi/koneksi.php';

$query_getdata = mysqli_query($conn, "SELECT * FROM inbox WHERE Processed = 'false'");

$no_p=1;
$row_nama = array();

while ($row_p = mysqli_fetch_array($query_getdata)) {

	$sendernumber = trim($row_p['SenderNumber']);
	$no_pengerim = str_replace("+62", "0", $sendernumber);
	$isi_pesan = $row_p['TextDecoded'];
	$jam_terima = $row_p['ReceivingDateTime'];
	$id_pesan = $row_p['ID'];

	$query_ck_pemesan = mysqli_query($conn,"SELECT nama_pemesan, kode_pemesan, jabatan from pemesan where no_tlp='$no_pengerim' ");
	$query_ck_karyawan = mysqli_query($conn,"SELECT nama_karyawan, kode_karyawan from karyawan where no_tlp='$no_pengerim' ");

	$row_pemesan = mysqli_num_rows($query_ck_pemesan);
    $row_karyawan = mysqli_num_rows($query_ck_karyawan);

    /*cek data ada atau gag*/
    if($row_pemesan=="1"){
    	/*membaca data */
        while($row_ck1_row_pemesan = mysqli_fetch_array($query_ck_pemesan)){

        	$kode_pemesan = $row_ck1_row_pemesan['kode_pemesan'];
            $nama_pemesan = $row_ck1_row_pemesan["nama_pemesan"];
            $jabatan_pemesan = $row_ck1_row_pemesan["jabatan"];

            $hsl_pemesan = array(
			  "no"=> $no_p,
			  "nama" => $nama_pemesan,
			  "no_tlp" => $no_pengerim,
			  "jabatan" => $jabatan_pemesan,
			  "isi_pesan" => $isi_pesan,
			  "jam" => $jam_terima,
			  "id_pesan" => $id_pesan);

            array_push($row_nama, $hsl_pemesan);

        }
        //echo "pemesan muncul data"."<br>";
     }

     if($row_karyawan=="1"){
	       while($row_ck2_karyawan = mysqli_fetch_array($query_ck_karyawan)){

	        $kode_karyawan = $row_ck2['kode_karyawan'];
	        $nama_karyawan = $row_ck2['nama_karyawan'];

	          $hsl_karyawan = array(
						  "no"=> $no_p,
						  "nama" => $nama_karyawan,
						  "no_tlp" => $no_pengerim,
						  "jabatan" => "Karyawan",
						  "isi_pesan" => $isi_pesan,
						  "jam" => $jam_terima,
						  "id_pesan" => $id_pesan);
						   
						    array_push($row_nama, $hsl_karyawan);
  
	    }
	    //echo "karyawan muncul data"."<br>";
	  }


	  $no_p++;

}

echo json_encode($row_nama);

//echo  $no_pengerim;

?>