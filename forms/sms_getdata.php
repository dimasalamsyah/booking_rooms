<?php
include '../koneksi/koneksi.php';

session_start();
$pic = $_SESSION['pic'];

 $query_p = mysqli_query($conn,"SELECT * FROM inbox WHERE Processed = 'false'");
          
          $no_p=1;
          $row_nama = array();

          while ($row_p = mysqli_fetch_array($query_p)) {
              $no_pengerim = $row_p['SenderNumber'];
              $isi_pesan = $row_p['TextDecoded'];
              $jam_terima = $row_p['ReceivingDateTime'];
              $id_pesan = $row_p['ID'];

              $query_ck_no1 = mysqli_query($conn,"SELECT nama_dosen, kode_dosen from dosen where no_tlp='$no_pengerim' ");
              $query_ck_no2 = mysqli_query($conn,"SELECT nama_karyawan, kode_karyawan from karyawan where no_tlp='$no_pengerim' ");
              $query_ck_no3 = mysqli_query($conn,"SELECT nama, nim from mahasiswa where tlp='$no_pengerim' ");

              $row_1 = mysqli_num_rows($query_ck_no1);
              $row_2 = mysqli_num_rows($query_ck_no2);
              $row_3 = mysqli_num_rows($query_ck_no3);

              
              
              if($row_1=="1"){
                  while($row_ck1 = mysqli_fetch_array($query_ck_no1)){

                    $kode_dosen = $row_ck1['kode_dosen'];
                    $nama_dosen = $row_ck1["nama_dosen"];
                  			$hsl_dosen = array(
								  "no"=> $no_p,
								  "nama" => $row_ck1["nama_dosen"],
								  "no_tlp" => $no_pengerim,
								  "jabatan" => "Dosen",
								  "isi_pesan" => $isi_pesan,
								  "jam" => $jam_terima,
								  "id_pesan" => $id_pesan);
								   
								    array_push($row_nama, $hsl_dosen);

                    $isi_infosmsm = "INSERT INTO info_sms (id_info, kode_pembooking, nama_pembooking, jabatan, no_tlp, pesan, tgl_pesan, status, user)
                                   values ('$id_pesan', '$kode_dosen', '$nama_dosen', 'dosen', '$no_pengerim', '$isi_pesan', '$jam_terima', 'pending', '$pic')";
                      
                  }
              }
              if($row_2=="1"){
                   while($row_ck2 = mysqli_fetch_array($query_ck_no2)){

                    $kode_karyawan = $row_ck2['kode_karyawan'];
                    $nama_karyawan = $row_ck2['nama_karyawan'];

                      $hsl_karyawan = array(
								  "no"=> $no_p,
								  "nama" => $row_ck2["nama_karyawan"],
								  "no_tlp" => $no_pengerim,
								  "jabatan" => "Karyawan",
								  "isi_pesan" => $isi_pesan,
								  "jam" => $jam_terima,
								  "id_pesan" => $id_pesan);
								   
								    array_push($row_nama, $hsl_karyawan);

                    $isi_infosmsm = "INSERT INTO info_sms (id_info, kode_pembooking, nama_pembooking, jabatan, no_tlp, pesan, tgl_pesan, status, user)
                                   values ('$id_pesan', '$kode_karyawan', '$nama_karyawan', 'karyawan','$no_pengerim', '$isi_pesan', '$jam_terima', 'pending', '$pic')";
                     
                }
              }
              if($row_3=="1"){
                   while($row_ck3 = mysqli_fetch_array($query_ck_no3)){

                    $nim_ = $row_ck3['nim'];
                    $nama_nim = $row_ck3["nama"];

                    $hsl_mahasiswa = array(
								  "no"=> $no_p,
								  "nama" => $row_ck3["nama"],
								  "no_tlp" => $no_pengerim,
								  "jabatan" => "Mahasiswa",
								  "isi_pesan" => $isi_pesan,
								  "jam" => $jam_terima,
								  "id_pesan" => $id_pesan);
								   
								    array_push($row_nama, $hsl_mahasiswa);

                    $isi_infosmsm = "INSERT INTO info_sms (id_info, kode_pembooking, nama_pembooking, jabatan, no_tlp, pesan, tgl_pesan, status,user) 
                                              VALUES ('$id_pesan', '$nim_', '$nama_nim', 'mahasiswa','$no_pengerim', '$isi_pesan', '$jam_terima', 'pending', '$pic')";
                     

                }
              }
              //echo $isi_infosmsm;
              //$save_smsinfo = mysqli_query($conn,$isi_infosmsm);
/*
              if($save_smsinfo){
                echo "acccccccccc";
              }else{
                //die (mysqli_error($save_smsinfo));
                //echo "dccccccccxx";
              }*/
              

            $no_p++;
          }

          echo json_encode($row_nama);
      ?>