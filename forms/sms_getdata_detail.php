<?php


include '../koneksi/koneksi.php';

$batas   = 5;
$halaman = @$_REQUEST['halaman'];
if(empty($halaman)){
 $posisi  = 0;
 $halaman = 1;
 
}
else{ 
  $posisi  = ($halaman-1) * $batas; 
}

$search_box = @$_REQUEST['search_box'];

$i=1;
  $row_cari = array();
  $sql_cari = mysqli_query($conn, "SELECT a.id_info, a.nama_pembooking, a.jabatan, a.no_tlp, a.pesan, a.tgl_pesan, a.status, a.user  FROM info_sms a left join inbox b on b.ID = a.id_info where a.nama_pembooking like '$search_box%' order by a.tgl_pesan desc LIMIT $posisi,$batas");

  while($r1 = mysqli_fetch_assoc($sql_cari)){
    
          $temp_cari = array(
          "no"=> $i,
          "id_pesan"=> $r1["id_info"],
          "nama" => $r1["nama_pembooking"],
          "no_tlp" => $r1["no_tlp"],
          "jabatan" => $r1["jabatan"],
          "pesan" => $r1["pesan"],
          "tgl" => $r1["tgl_pesan"],
          "status" => $r1["status"],
          "user" => $r1["user"]);
         
          array_push($row_cari, $temp_cari);
    $i++;   
  }

  echo json_encode($row_cari);


?>