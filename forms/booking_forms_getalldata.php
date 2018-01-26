<?php
include '../koneksi/koneksi.php';

    $query_addroom1 = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by jenis_ruangan asc");

    /*untuk mengambil nilai ruangan*/
    if(isset($_REQUEST['ruangan'])){
        $isi_ruangan = $_REQUEST['ruangan'];
        $ruangan_ = $isi_ruangan;
    }else{
    }

    function dateconvert($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
     // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
      $BulanIndo = array("Januari", "Februari", "Maret",
                 "April", "Mei", "Juni",
                 "Juli", "Agustus", "September",
                 "Oktober", "November", "Desember");
      $hari = array("Senin", "Selasa", "Rabu",
                 "Kamis", "Jum'at", "Sabtu",
                 "Minggu");
    
      $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
      $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
      $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
      
      $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
      return($result);
  }
  function hariconvert($date1) {
    $hari = array("Senin", "Selasa", "Rabu",
               "Kamis", "Jumat", "Sabtu",
               "Minggu");
  
    $tgl = substr($date1, 0, 2); // memisahkan format tahun menggunakan substring
    
    $result = $hari[(int)$tgl];
    return($result);
  }

  $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis',"Jumat", 'Sabtu','Minggu');
  
                        
?>

                            <tr id="kk">
                                <input id="ambil_ruangan" value='<?php $ruangan_; ?>'>
                                <th style="width:8%;" id="nn">Jam/Hari</th>
                                <th style="width:12%;" class="hari_cell"><?php

                                  /*mengambil nilai tanggal di url*/
                                  $datenow = $_REQUEST['datenow'];
                                  /*$datenow='2016-04-20';*/

                                  if(!isset($datenow)){
                                    $h_datenow = "now";
                                  }else{
                                    $h_datenow = $datenow;
                                  }

                                $hari = (strtotime($h_datenow));
                                $bulan = (strtotime($h_datenow));
                                echo $array_hari[date('N',$hari)].",<br>";
                                echo dateconvert(date("Y m d", $hari)); 
                                $get_date = date("Ymd", $hari);
                                $get_date_cek = date("Y-m-d", $hari);
                                $get_hari =  $array_hari[date('N',$hari)];

                                 ?></th>

                                <!-- tanggal filter -->
                                <th style="width:12%;" class=""><?php

                                $hari1 = strtotime("+1 day", $hari);
                                $bulan = strtotime("+1 day", $hari);
                                echo $array_hari[date('N',$hari1)].",<br>";
                                echo dateconvert(date("Y m d", $hari1)); 
                                $get_date1 = date("Ymd", $hari1);
                                $get_date_cek1 = date("Y-m-d", $hari1);
                                $get_hari1 =  $array_hari[date('N',$hari1)];

                                ?>
                              </th>
                              <th style="width:12%;" class=""><?php
                                
                                $hari2 = strtotime("+2 day", $hari);
                                $bulan = strtotime("+2 day", $hari);
                                echo $array_hari[date('N',$hari2)].",<br>";
                                echo dateconvert(date("Y m d", $hari2)); 
                                $get_date2 = date("Ymd", $hari2);
                                $get_date_cek2 = date("Y-m-d", $hari2);
                                $get_hari2 =  $array_hari[date('N',$hari2)];
                                ?>
                              </th>
                              <th style="width:12%;" class=""><?php

                                $hari3 = strtotime("+3 day", $hari);
                                $bulan = strtotime("+3 day", $hari);
                                echo $array_hari[date('N',$hari3)].",<br>";
                                echo dateconvert(date("Y m d", $hari3)); 
                                $get_date3 = date("Ymd", $hari3);
                                $get_date_cek3 = date("Y-m-d", $hari3);
                                $get_hari3 =  $array_hari[date('N',$hari3)];
                                ?>
                              </th>
                              <th style="width:12%;" class=""><?php

                                $hari4 = strtotime("+4 day", $hari);
                                $bulan = strtotime("+4 day", $hari);
                                echo $array_hari[date('N',$hari4)].",<br>";
                                echo dateconvert(date("Y m d", $hari4)); 
                                $get_date4 = date("Ymd", $hari4);
                                $get_date_cek4 = date("Y-m-d", $hari4);
                                $get_hari4 =  $array_hari[date('N',$hari4)];
                                ?>
                              </th>
                              <th style="width:12%;" class=""><?php

                                $hari5 = strtotime("+5 day", $hari);
                                $bulan = strtotime("+5 day", $hari);
                                echo $array_hari[date('N',$hari5)].",<br>";
                                echo dateconvert(date("Y m d", $hari5)); 
                                $get_date5 = date("Ymd", $hari5);
                                $get_date_cek5 = date("Y-m-d", $hari5);
                                $get_hari5 =  $array_hari[date('N',$hari5)];
                                ?>
                              </th>
                              <th style="width:12%;" class=""><?php

                                $hari6 = strtotime("+6 day", $hari);
                                $bulan = strtotime("+6 day", $hari);
                                echo $array_hari[date('N',$hari6)].",<br>";
                                echo dateconvert(date("Y m d", $hari6));  
                                $get_date6 = date("Ymd", $hari6);
                                $get_date_cek6 = date("Y-m-d", $hari6);
                                $get_hari6 =  $array_hari[date('N',$hari6)];
                                ?>
                              </th>
                </tr>
                             <?php

                                $query_cell = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");

                        while ($row_cell = mysqli_fetch_array($query_cell)) {

                              $pecah_jam = explode(".", $row_cell[1]);
                              $get_timenow = $pecah_jam[0].$pecah_jam[1];


                           ?>
                            <tr class="load_content">   
                                <th class="hh1" id="<?php echo $row_cell[0]; ?>" value="d" onclick=""><?php echo $row_cell[1]; ?></th>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" onclick="">
                                    
                                    <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date.$row_cell[0]; ?>" value="status_oke" style="display:none" > 
                                     <!-- untuk jam yang sudah terlewati -->
                                      <input style="display:none" id="get_datajam_<?php echo $get_date.$row_cell[0]; ?>" value="<?php echo $get_timenow; ?>" >
                                      <input style="display:none" id="get_datatgl_<?php echo $get_date.$row_cell[0]; ?>" value="<?php echo $get_date; ?>" >
                                                
                                    <?php

                                             $query_cek = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari' ");

                                            $row_cek = mysqli_fetch_array($query_cek);
                                            $h_query = mysqli_num_rows($query_cek);

                                            $row_cek_matriks = mysqli_fetch_array($query_cek_matriks);
                                            $h_query_matriks = mysqli_num_rows($query_cek_matriks);

                                            if($h_query_matriks==1){?>
                                                <strong><?php  echo $row_cek_matriks[0]."<br>".$row_cek_matriks[1]."<br>".$row_cek_matriks[2]; ?></strong>
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date.$row_cell[0]; ?>" value="true" style="display:none" >

                                             <?php }else{

                                                if($h_query==1){

                                                  if($row_cek[2]=='mahasiswa'){
                                                    $alert_pembeda = 'alert-success';
                                                  }elseif($row_cek[2]=='dosen'){
                                                    $alert_pembeda = 'alert-info';
                                                  }else{
                                                    $alert_pembeda = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek[0]."<br>".$row_cek[1]; ?></strong>
                                                  </div> 

                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date.$row_cell[0]; ?>" value="<?php echo $row_cek[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date.$row_cell[0]; ?>" value="<?php echo $row_cek[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date.$row_cell[0]; ?>" value="<?php echo $row_cek[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date.$row_cell[0]; ?>" > <?php echo $row_cek[1]; ?> </textarea>
                                                    
                                                    <!-- validasi ketika matriks sudahada -->
                                                    <input id="def_ruangan_<?php echo $get_date.$row_cell[0]; ?>" value="false" style="display:none" >


                                                <?php 
                                                  }

                                             }

                                            


                                    ?>             
                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>"  ondblclick="nilai_cell('<?php echo $get_date1; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                        
                                       <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date1.$row_cell[0]; ?>" value="status_oke" style="display:none" >
                                     <?php

                                             $query_cek1 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date1' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks1 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari1' ");

                                            $row_cek1 = mysqli_fetch_array($query_cek1);
                                            $h_query1 = mysqli_num_rows($query_cek1);

                                            $row_cek_matriks1 = mysqli_fetch_array($query_cek_matriks1);
                                            $h_query_matriks1 = mysqli_num_rows($query_cek_matriks1);

                                            if($h_query_matriks1==1){?>
                                                <strong><?php  echo $row_cek_matriks1[0]."<br>".$row_cek_matriks1[1]."<br>".$row_cek_matriks1[2]; ?></strong>
                                               
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date1.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query1==1){

                                                  if($row_cek1[2]=='mahasiswa'){
                                                    $alert_pembeda1 = 'alert-success';
                                                  }elseif($row_cek1[2]=='dosen'){
                                                    $alert_pembeda1 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda1 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda1; ?>' style='margin:0px;'>
                                                    <a  id="" onclick="del_pemesanan('<?php echo $get_date1; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek1[0]."<br>".$row_cek1[1]; ?></strong>
                                                    
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date1.$row_cell[0]; ?>" value="<?php echo $row_cek1[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date1.$row_cell[0]; ?>" value="<?php echo $row_cek1[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date1.$row_cell[0]; ?>" value="<?php echo $row_cek1[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date1.$row_cell[0]; ?>" > <?php echo $row_cek1[1]; ?> </textarea>
                                                    <!-- validasi ketika matriks sudahada -->
                                                    <input id="def_ruangan_<?php echo $get_date1.$row_cell[0]; ?>" value="false" style="display:none" >
                                                <?php 
                                                  }

                                             }

                                            


                                    ?>  

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date2; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                      <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date2.$row_cell[0]; ?>" value="status_oke" style="display:none" >                                         
                                     <?php

                                             $query_cek2 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date2' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks2 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari2' ");

                                            $row_cek2 = mysqli_fetch_array($query_cek2);
                                            $h_query2 = mysqli_num_rows($query_cek2);

                                            $row_cek_matriks2 = mysqli_fetch_array($query_cek_matriks2);
                                            $h_query_matriks2 = mysqli_num_rows($query_cek_matriks2);

                                            if($h_query_matriks2==1){?>
                                                <strong><?php  echo $row_cek_matriks2[0]."<br>".$row_cek_matriks2[1]."<br>".$row_cek_matriks2[2]; ?></strong>
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date2.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query2==1){

                                                  if($row_cek2[2]=='mahasiswa'){
                                                    $alert_pembeda2 = 'alert-success';
                                                  }elseif($row_cek2[2]=='dosen'){
                                                    $alert_pembeda2 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda2 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda2; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date2.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date2; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek2[0]."<br>".$row_cek2[1]; ?></strong>
                                                    
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date2.$row_cell[0]; ?>" value="<?php echo $row_cek2[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date2.$row_cell[0]; ?>" value="<?php echo $row_cek2[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date2.$row_cell[0]; ?>" value="<?php echo $row_cek2[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date2.$row_cell[0]; ?>" > <?php echo $row_cek2[1]; ?> </textarea>
                                                    <!-- validasi ketika matriks sudahada -->
                                                    <input id="def_ruangan_<?php echo $get_date2.$row_cell[0]; ?>" value="false" style="display:none" > 
                                                <?php 
                                                  }

                                             }

                                            


                                    ?>   

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date3 ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                    <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date3.$row_cell[0]; ?>" value="status_oke" style="display:none" >                                                   
                                     <?php

                                             $query_cek3 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date3' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks3 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari3' ");

                                            $row_cek3 = mysqli_fetch_array($query_cek3);
                                            $h_query3 = mysqli_num_rows($query_cek3);

                                            $row_cek_matriks3 = mysqli_fetch_array($query_cek_matriks3);
                                            $h_query_matriks3 = mysqli_num_rows($query_cek_matriks3);

                                            if($h_query_matriks3==1){?>
                                                <strong><?php  echo $row_cek_matriks3[0]."<br>".$row_cek_matriks3[1]."<br>".$row_cek_matriks3[2]; ?></strong>
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date3.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query3==1){

                                                  if($row_cek3[2]=='mahasiswa'){
                                                    $alert_pembeda3 = 'alert-success';
                                                  }elseif($row_cek3[2]=='dosen'){
                                                    $alert_pembeda3 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda3 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda3; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date3.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date3; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek3[0]."<br>".$row_cek3[1]; ?></strong>
                                                    
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date3.$row_cell[0]; ?>" value="<?php echo $row_cek3[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date3.$row_cell[0]; ?>" value="<?php echo $row_cek3[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date3.$row_cell[0]; ?>" value="<?php echo $row_cek3[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date3.$row_cell[0]; ?>" > <?php echo $row_cek3[1]; ?> </textarea>
                                                    <!-- validasi ketika matriks sudahada -->
                                                <input id="def_ruangan_<?php echo $get_date3.$row_cell[0]; ?>" value="false" style="display:none" >  
                                                <?php 
                                                  }

                                             }

                                            


                                    ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date4; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                     <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date4.$row_cell[0]; ?>" value="status_oke" style="display:none" >                                                  
                                     <?php

                                             $query_cek4 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date4' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks4 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari4' ");

                                            $row_cek4 = mysqli_fetch_array($query_cek4);
                                            $h_query4 = mysqli_num_rows($query_cek4);

                                            $row_cek_matriks4 = mysqli_fetch_array($query_cek_matriks4);
                                            $h_query_matriks4 = mysqli_num_rows($query_cek_matriks4);

                                            if($h_query_matriks4==1){?>
                                                <strong><?php  echo $row_cek_matriks4[0]."<br>".$row_cek_matriks4[1]."<br>".$row_cek_matriks4[2]; ?></strong>
                                                 <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date4.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query4==1){

                                                  if($row_cek4[2]=='mahasiswa'){
                                                    $alert_pembeda4 = 'alert-success';
                                                  }elseif($row_cek4[2]=='dosen'){
                                                    $alert_pembeda4 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda4 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda4; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date4.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date4; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek4[0]."<br>".$row_cek4[1]; ?></strong>
                                                   
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date4.$row_cell[0]; ?>" value="<?php echo $row_cek4[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date4.$row_cell[0]; ?>" value="<?php echo $row_cek4[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date4.$row_cell[0]; ?>" value="<?php echo $row_cek4[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date4.$row_cell[0]; ?>" > <?php echo $row_cek4[1]; ?> </textarea>
                                                     <!-- validasi ketika matriks sudahada -->
                                                     <input id="def_ruangan_<?php echo $get_date4.$row_cell[0]; ?>" value="false" style="display:none" >  
                                                <?php 
                                                  }

                                             }

                                            


                                    ?>  

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date5; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                    <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date5.$row_cell[0]; ?>" value="status_oke" style="display:none" >                                                   
                                     <?php

                                             $query_cek5 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date5' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks5 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari6' ");

                                            $row_cek5 = mysqli_fetch_array($query_cek5);
                                            $h_query5 = mysqli_num_rows($query_cek5);

                                            $row_cek_matriks5 = mysqli_fetch_array($query_cek_matriks5);
                                            $h_query_matriks5 = mysqli_num_rows($query_cek_matriks5);

                                            if($h_query_matriks5==1){?>
                                                <strong><?php  echo $row_cek_matriks5[0]."<br>".$row_cek_matriks5[1]."<br>".$row_cek_matriks5[2]; ?></strong>
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date5.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query5==1){

                                                  if($row_cek5[2]=='mahasiswa'){
                                                    $alert_pembeda5 = 'alert-success';
                                                  }elseif($row_cek5[2]=='dosen'){
                                                    $alert_pembeda5 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda5 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda5; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date5.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date5; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek5[0]."<br>".$row_cek5[1]; ?></strong>
                                                    
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date5.$row_cell[0]; ?>" value="<?php echo $row_cek5[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date5.$row_cell[0]; ?>" value="<?php echo $row_cek5[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date5.$row_cell[0]; ?>" value="<?php echo $row_cek5[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date5.$row_cell[0]; ?>" > <?php echo $row_cek5[1]; ?> </textarea>
                                                    <!-- validasi ketika matriks sudahada -->
                                                    <input id="def_ruangan_<?php echo $get_date5.$row_cell[0]; ?>" value="false" style="display:none" >   
                                                <?php 
                                                  }

                                             }

                                            


                                    ?>  

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date6; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')">
                                                                                 
                                     <!-- validasi ketika matriks sudahada -->
                                     <input id="def_<?php echo $get_date6.$row_cell[0]; ?>" value="status_oke" style="display:none" >  
                                     <?php

                                             $query_cek6 = mysqli_query($conn,"SELECT a.nama_pembooking, a.ket, a.posisi, a.kode_pembooking, a.id FROM pemesanan_detail a 
                                                                        LEFT JOIN ruangan b on a.kode_ruangan = b.kode_ruangan
                                                                        where a.kode_jam='$row_cell[0]' and a.tgl='$get_date6' and a.kode_ruangan='$ruangan_' ");

                                            $query_cek_matriks6 = mysqli_query($conn,"SELECT b.nama_dosen, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_dosen, c.id, d.id  from penjadwalan_detail a
                                                                                LEFT JOIN dosen b on b.kode_dosen = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                where a.kode_ruangan='$ruangan_'  and a.kode_jam='$row_cell[0]' and a.hari='$get_hari6' ");

                                            $row_cek6 = mysqli_fetch_array($query_cek6);
                                            $h_query6 = mysqli_num_rows($query_cek6);

                                            $row_cek_matriks6 = mysqli_fetch_array($query_cek_matriks6);
                                            $h_query_matriks6 = mysqli_num_rows($query_cek_matriks6);

                                            if($h_query_matriks6==1){?>
                                                <strong><?php  echo $row_cek_matriks6[0]."<br>".$row_cek_matriks6[1]."<br>".$row_cek_matriks6[2]; ?></strong>
                                                <!-- validasi ketika matriks sudahada -->
                                                <input id="def_matriks_<?php echo $get_date6.$row_cell[0]; ?>" value="true" style="display:none" >                                              
                                             <?php }else{

                                                if($h_query6==1){

                                                  if($row_cek6[2]=='mahasiswa'){
                                                    $alert_pembeda6 = 'alert-success';
                                                  }elseif($row_cek6[2]=='dosen'){
                                                    $alert_pembeda6 = 'alert-info';
                                                  }else{
                                                    $alert_pembeda6 = 'alert-warning';
                                                  }

                                                  ?>
                                                  
                                                  <div  class='alert <?php echo $alert_pembeda6; ?>' style='margin:0px;'>
                                                    <a  id="<?php echo 'cell_alert_'.$get_date6.$row_cell[0]; ?>" onclick="del_pemesanan('<?php echo $get_date; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')"  class='close a' data-dismiss='' data-toggle='popover' aria-label='close'>&times;</a>
                                                    <strong><?php  echo $row_cek6[0]."<br>".$row_cek6[1]; ?></strong>
                                                   
                                                  </div>


                                                  <!-- untuk keperluan edit -->
                                                    <input style="display:none" id="id_edit_<?php echo $get_date6.$row_cell[0]; ?>" value="<?php echo $row_cek6[4]; ?>" >
                                                    <input style="display:none" id="pos_edit_<?php echo $get_date6.$row_cell[0]; ?>" value="<?php echo $row_cek6[2]; ?>" >
                                                    <input style="display:none" id="nama_edit_<?php echo $get_date6.$row_cell[0]; ?>" value="<?php echo $row_cek6[3]; ?>" >
                                                    <textarea style="display:none" id="ket_edit_<?php echo $get_date6.$row_cell[0]; ?>" > <?php echo $row_cek6[1]; ?> </textarea>
                                                    <!-- validasi ketika matriks sudahada -->
                                                    <input id="def_ruangan_<?php echo $get_date6.$row_cell[0]; ?>" value="false" style="display:none" >    
                                                <?php 
                                                  }

                                             }

                                            


                                    ?> 

                                </td>
                            </tr>

                           
                          <?php } ?> <!-- akhir perulangan -->
                          <script>

                            function nilai_cell(getTgl,getKodeJam,getNamajam){
                              var kosong_data='';
                              $.ajax({
                                    url: 'booking_forms_coba.php',/*ini di gunakan untuk mengkosongkan field combobox atasnama*/
                                    dataType: 'json',
                                    success: function(data_kos) {

                                       for(var i = 0; i<data_kos.length;i++){
                                          kosong_data += '<option value='+data_kos[i].kode+'><strong>'+data_kos[i].nama+'</strong></option>';
                                      }
                                           $("#combo_atas_nama").html("<option data-hidden='true' value=''>"+kosong_data+"</option>"+kosong_data);
                                                             
                                           $('#combo_atas_nama').selectpicker('refresh');
                                           $("#loading_add").html('');
                                    }

                                  });

                              /*di substring soalnya paramter tidak bisa string*/
                              /*lalu di gabungkan */
                              var tahun = getTgl.toString();
                              var bulan = getTgl.toString();
                              var tgl = getTgl.toString();
                              var h_tahun = tahun.substring(0,4);
                              var h_bulan = bulan.substring(4,6);
                              var h_tanggal = tgl.substring(6,8);

                              var hasil_all = h_tahun + "-" + h_bulan + "-" + h_tanggal; 

                              $("#getValidasi").val('');

                              /*semua*/
                              $("#jam_add").val(getNamajam);
                              $("#jam_add_kode").val(getKodeJam);
                              $("#tanggal_add").val(hasil_all);
                              $("#note_add").val();
                              ruanga_get = $.trim($("#c_ruangan option:selected").text()); /*ambil nilai ruangan*/
                              ruanga_getID = $.trim($("#c_ruangan option:selected").val()); /*ambil nilai ruangan*/

                              $("#combo_kelas_add ").val(ruanga_get);
                              /*id ruangan*/
                              $('#getIdRuangan').val(ruanga_getID);

                              def_cek_booking_b = $("#def_ruangan_"+getTgl+getKodeJam).val();
                              def_cek_booking = $("#def_"+getTgl+getKodeJam).val();
                              def_cek_booking_m = $("#def_matriks_"+getTgl+getKodeJam).val();
                              
                              id_edit = $.trim($("#id_edit_"+getTgl+getKodeJam).val());
                              pos_edit = $.trim($("#pos_edit_"+getTgl+getKodeJam).val());
                              nama_edit = $.trim($("#nama_edit_"+getTgl+getKodeJam).val());
                              ket_edit = $.trim($("#ket_edit_"+getTgl+getKodeJam).val());

                              id_ruangan = $.trim($("#id_ruangan_"+getTgl+getKodeJam).val());

                              /*id edit*/
                              $("#getIdEdit").val(id_edit);
                              

                              /*memberikan validasi update*/
                              if(nama_edit!=''){
                                  $("#getValidasi").val("update");
                              }else{
                                $("#getValidasi").val();
                              }

                              if(def_cek_booking_m=="true" && def_cek_booking=="status_oke"){
                                  alert("Pilih cell yang lain!");
                              }else if(def_cek_booking=="status_oke" && def_cek_booking_b=="false"){
                                  buka_modal();
                              }else if(def_cek_booking=="status_oke"){
                                  buka_modal();
                              }


                           }
                                
                                /*save */
                              function save_data_permintaan(){
                                  kode_pembooking = $("#combo_atas_nama").val();
                                  combo_kelas_add = $("#combo_kelas_add").val();
                                  jam_add_kode = $("#jam_add_kode").val();
                                  tanggal_add = $("#tanggal_add").val();
                                  note_add = $("#note_add").val();
                                  cek_jabatan = $("#combo_position").val();

                                  nama_pembooking =  $("#combo_atas_nama").val();

                                  /*cek uodate*/
                                  cek_update = $("#getValidasi").val();

                                  /*id edit*/
                                  id_update = $("#getIdEdit").val();
                                  id_getRuangan = $("#getIdRuangan").val();


                                  if(cek_jabatan==''){
                                    $("#combo_position_err").addClass("has-error");
                                  }else{
                                      $("#combo_position_err").removeClass("has-error");
                                  }
                                  if(kode_pembooking==''){
                                    $("#combo_atas_nama_error").addClass("has-error");
                                  }else{
                                      $("#combo_atas_nama_error").removeClass("has-error");
                                  }
                                  if(note_add==''){
                                    $("#note_add_error").addClass("has-error");
                                  }else{
                                      $("#note_add_error").removeClass("has-error");
                                  }

                                  if(kode_pembooking!='' && cek_jabatan!='' && note_add!=''){

                                          if(cek_update==''){

                                          $.ajax({
                                            type: 'GET',
                                            url: 'booking_forms_save.php?kode_pembooking='+kode_pembooking+"&combo_kelas_add="+id_getRuangan+
                                                  "&jam_add_kode="+jam_add_kode+"&tanggal_add="+tanggal_add+"&ket="+note_add+"&nama="+nama_pembooking+"&jabatan="+cek_jabatan,
                                            data: $(this).serialize(),
                                            success: function(data) {
                                              //alert(data);
                                              $("#add_modalpemesanan").modal('hide');   
                                              getAllData();
                                            }

                                          });

                                         // alert("save");

                                      }else{

                                          $.ajax({
                                            type: 'GET',
                                            url: 'booking_forms_update.php?id='+id_update+'&kode_pembooking='+kode_pembooking+"&combo_kelas_add="+id_getRuangan+
                                                  "&jam_add_kode="+jam_add_kode+"&tanggal_add="+tanggal_add+"&ket="+note_add+"&nama="+nama_pembooking+"&jabatan="+cek_jabatan,
                                            data: $(this).serialize(),
                                            success: function(data) {
                                              $("#add_modalpemesanan").modal('hide');   
                                              getAllData();
                                            }

                                          });

                                          //alert("update");

                                      }/*akhir else*/

                                  }

                                  //alert("klik save");

                                }


                              $(function() {

                              });

                            $(document).ready(function(){

                            });

                            function del_pemesanan(a,b){
                              id_del = $.trim($("#id_edit_"+a+b).val());
                              $("#setId_del").val(id_del);

                              $("#delete_modalpemesanan").modal({backdrop: "static"});                               
                            }

                            function delete_false(){
                              $("#delete_modalpemesanan").modal('hide');   
                            }
                            function delete_true(){

                             id_delete = $("#setId_del").val();
                             
                                     $.ajax({
                                        type: 'GET',
                                        url: 'booking_forms_delete.php?id_del='+id_delete,
                                        data: $(this).serialize(),
                                        success: function(data) {
                                          $("#delete_modalpemesanan").modal('hide');   
                                          getAllData();
                                        }

                                      });
                            }

                            function buka_modal(){
                               /*mengkosoongkan field*/
                                 $("#combo_position").val("");
                                 /*$("#combo_atas_nama").val("");*/
                                 
                                 $("#note_add").val("");

                                $("#note_add").val(ket_edit);
                                $("#combo_position").val(pos_edit);


                                    combo_position_edit = $('#combo_position').val();
                                   //alert(combo_position);
                                   var url_atasnama_edit='';
                                   var data_combo_atas_nama_edit='';
                                   
                                    if(combo_position_edit=='dosen'){
                                        url_atasnama_edit='booking_forms_getdatadosen.php';
                                        valSelect_edit = "Pilih Dosen";
                                        $("#loading_add").html('<img src="../images/loader1.gif" alt="loading..." style="margin-top:-55px; margin-left:225px; margin-right:5px; width:25px; display:;" />');
                                    }else if(combo_position_edit=='mahasiswa'){
                                        url_atasnama_edit='booking_forms_getdatamahasiswa.php';
                                        valSelect_edit = "Pilih Mahasiswa";
                                        $("#loading_add").html('<img src="../images/loader1.gif" alt="loading..." style="margin-top:-55px; margin-left:225px; margin-right:5px; width:25px; display:;" />');
                                    }else if(combo_position_edit=='karyawan'){
                                        url_atasnama_edit='booking_forms_getdatakaryawan.php';
                                        valSelect_edit = "Pilih Karyawan";
                                        $("#loading_add").html('<img src="../images/loader1.gif" alt="loading..." style="margin-top:-55px; margin-left:225px; margin-right:5px; width:25px; display:;" />');
                                    }else{
                                        url_atasnama_edit='';
                                        valSelect_edit = "Kosong";
                                    }

                       
                                    /*ajax comboxbox atasnama*/
                                  $('#combo_atas_nama').selectpicker('refresh');
                                  $.ajax({
                                  url: url_atasnama_edit,
                                  dataType: 'json',
                                  success: function(data_edit) {

                                     for(var i = 0; i<data_edit.length;i++){
                                        data_combo_atas_nama_edit += '<option value='+data_edit[i].kode+'><strong>'+data_edit[i].nama+'</strong></option>';
                                         }
                                         $("#combo_atas_nama").html("<option data-hidden='true' value=''>"+valSelect_edit+"</option>"+data_combo_atas_nama_edit);
                                         
                                         $("#combo_atas_nama").val(nama_edit);/*menaruh hasil nama edit*/

                                         console.log(nama_edit);
                                         $('#combo_atas_nama').selectpicker('refresh');
                                         $("#loading_add").html('');
                                      }

                                    });

                             
                                $('.selectpicker').selectpicker('refresh');                                
                                $("#add_modalpemesanan").modal({backdrop: "static"});
                            }
                            
                                
                          </script>