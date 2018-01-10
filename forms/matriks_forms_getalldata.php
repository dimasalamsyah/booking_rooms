<?php
include '../koneksi/koneksi.php';


    if(isset($_REQUEST['ruangan'])){
        $isi_ruangan = $_REQUEST['ruangan'];
        $ruangan_ = $isi_ruangan;
    }else{
        /*$aa = mysqli_query($conn,"SELECT kode_ruangan from ruangan order by kode_ruangan asc LIMIT 1");
        $isi_ruangan = mysqli_fetch_array($aa);
        $ruangan_ = $isi_ruangan[0];*/
    }

$array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
                                            
?>

                            <tr id="kk">
                                <th style="width:8%;" id="nn">Clock/Day</th>
                                <th style="width:12%;" class="hari_cell"><?php

                                    echo  $get_date = "Senin";


                                     ?></th>

                                    <!-- tanggal filter -->
                                <th style="width:12%;" class=""><?php

                                    echo  $get_date1 = "Selasa";
                                    ?>
                                </th>
                                <th style="width:12%;" class=""><?php

                                        echo  $get_date2 = "Rabu";
                                    ?>
                                </th>
                                <th style="width:12%;" class=""><?php

                                        echo  $get_date3 = "Kamis";
                                    ?>
                                </th>
                                <th style="width:12%;" class=""><?php

                                        echo  $get_date4 = "Jumat";
                                    ?>
                                </th>
                                <th style="width:12%;" class=""><?php

                                        echo  $get_date5 = "Sabtu";

                                    ?>
                                </th>
                                <th style="width:12%;" class=""><?php

                                        echo  $get_date6 = "Minggu";

                                    ?>
                                </th>
                            </tr>

                             <?php

                                $query_cell = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");

                             while ($row_cell = mysqli_fetch_array($query_cell)) {   ?>
                            <tr class="load_content">   
                                <th class="hh1" id="<?php echo $row_cell[0]; ?>" value="d" onclick="javascript:alert($('#<?php echo $row_cell[0]; ?>').html())"><?php echo $row_cell[1]; ?></th>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date; ?>','<?php echo $row_cell[0]; ?>')" onclick="">

                                    <?php

                                            

                                            $sub_str_jam = substr($row_cell[0], 2,5);
                                            $hasil_sub_str =$sub_str_jam.$get_date;

                                             $query_cek = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id, a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Senin' and b.jabatan='dosen'");


                                            $row_cek = mysqli_fetch_array($query_cek);
                                            $h_query = mysqli_num_rows($query_cek);

                                                if($h_query==1){

                                                    if($row_cek[3]=="1"){
                                                        $ini_pembeda = "alert alert-warning";
                                                    }elseif($row_cek[3]=="2"){
                                                        $ini_pembeda = "alert alert-success";
                                                    }elseif($row_cek[3]=="3"){
                                                        $ini_pembeda = "alert alert-info";
                                                    }

                                                    ?>

                                                    <div  class='<?php echo $ini_pembeda; ?>' style='margin:0px;'>
                                                        <a id="<?php echo 'cell_alert_'.$get_date.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                        <strong><?php echo  $row_cek[0]."<br>".$row_cek[1]."<br>".$row_cek[2]; ?></strong>
                                                    </div>

                                                    <?php

                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }
                                            echo '<input class="" style="display:none;" id="idedit_'.$get_date.$row_cell[0].'" value="'.$row_cek[10].'">';
                                            echo '<input class="" style="display:none;" id="dosen_'.$get_date.$row_cell[0].'" value="'.$row_cek[7].'">';
                                            echo '<input class="" style="display:none;" id="matakuliah_'.$get_date.$row_cell[0].'" value="'.$row_cek[8].'">';
                                            echo '<input class="" style="display:none;" id="kelas_'.$get_date.$row_cell[0].'" value="'.$row_cek[9].'">';
                                            echo '<input class="" style="display:none;" id="all_'.$get_date.$row_cell[0].'" value="'.$get_date.' '.$row_cell[1].'">';
                                        ?>
                                        <!-- untuk cek save atau update -->
                                        

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>"  ondblclick="nilai_cell('<?php echo $get_date1; ?>','<?php echo $row_cell[0]; ?>')">
                                
                                    <?php

                                            $sub_str_jam1 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str1 =$sub_str_jam1.$get_date1;

                                             $query_cek1 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan,g.jam, a.hari, b.kode_pemesan, c.id, d.id, a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Selasa' and b.jabatan='dosen'");


                                            $row_cek1 = mysqli_fetch_array($query_cek1);
                                            $h_query1 = mysqli_num_rows($query_cek1);

                                                if($h_query1==1){
                                                    if($row_cek1[3]=="1"){
                                                        $ini_pembeda1="alert alert-warning";
                                                    }elseif($row_cek1[3]=="2"){
                                                        $ini_pembeda1="alert alert-success";
                                                    }elseif($row_cek1[3]=="3"){
                                                        $ini_pembeda1="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda1; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date1.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date1; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek1[0]."<br>".$row_cek1[1]."<br>".$row_cek1[2]; ?></strong>
                                                        </div>

                                                    <?php

                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }

                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date1.$row_cell[0].'" value="'.$row_cek1[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date1.$row_cell[0].'" value="'.$row_cek1[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date1.$row_cell[0].'" value="'.$row_cek1[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date1.$row_cell[0].'" value="'.$row_cek1[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date1.$row_cell[0].'" value="'.$get_date1.' '.$row_cell[1].'">';
                                          
                                        ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date2; ?>','<?php echo $row_cell[0]; ?>')">

                                    <?php
                                             $sub_str_jam2 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str2 =$sub_str_jam2.$get_date2;

                                             $query_cek2 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id,a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Rabu' and b.jabatan='dosen'");


                                            $row_cek2 = mysqli_fetch_array($query_cek2);
                                            $h_query2 = mysqli_num_rows($query_cek2);

                                                if($h_query2==1){
                                                    if($row_cek2[3]=="1"){
                                                        $ini_pembeda2="alert alert-warning";
                                                    }elseif($row_cek2[3]=="2"){
                                                        $ini_pembeda2="alert alert-success";
                                                    }elseif($row_cek2[3]=="3"){
                                                        $ini_pembeda2="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda2; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date2.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date2; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek2[0]."<br>".$row_cek2[1]."<br>".$row_cek2[2]; ?></strong>
                                                        </div>

                                                    <?php
                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }

                                                
                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date2.$row_cell[0].'" value="'.$row_cek2[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date2.$row_cell[0].'" value="'.$row_cek2[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date2.$row_cell[0].'" value="'.$row_cek2[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date2.$row_cell[0].'" value="'.$row_cek2[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date2.$row_cell[0].'" value="'.$get_date2.' '.$row_cell[1].'">';
                                        ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date3; ?>','<?php echo $row_cell[0]; ?>')">

                                    <?php

                                            $sub_str_jam3 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str3 =$sub_str_jam3.$get_date3;

                                             $query_cek3 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id,a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Kamis' and b.jabatan='dosen'");


                                            $row_cek3 = mysqli_fetch_array($query_cek3);
                                            $h_query3 = mysqli_num_rows($query_cek3);

                                                if($h_query3==1){
                                                     if($row_cek3[3]=="1"){
                                                        $ini_pembeda3="alert alert-warning";
                                                    }elseif($row_cek3[3]=="2"){
                                                        $ini_pembeda3="alert alert-success";
                                                    }elseif($row_cek3[3]=="3"){
                                                        $ini_pembeda3="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda3; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date3.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date3; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek3[0]."<br>".$row_cek3[1]."<br>".$row_cek3[2]; ?></strong>
                                                        </div>

                                                    <?php
                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }
                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date3.$row_cell[0].'" value="'.$row_cek3[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date3.$row_cell[0].'" value="'.$row_cek3[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date3.$row_cell[0].'" value="'.$row_cek3[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date3.$row_cell[0].'" value="'.$row_cek3[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date3.$row_cell[0].'" value="'.$get_date3.' '.$row_cell[1].'">';
                                        
                                        ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date4; ?>','<?php echo $row_cell[0]; ?>')">

                                    <?php


                                             $sub_str_jam4 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str4=$sub_str_jam4.$get_date4;

                                             $query_cek4 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id, a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Jumat' and b.jabatan='dosen'");


                                            $row_cek4 = mysqli_fetch_array($query_cek4);
                                            $h_query4 = mysqli_num_rows($query_cek4);

                                                if($h_query4==1){
                                                     if($row_cek4[3]=="1"){
                                                        $ini_pembeda4="alert alert-warning";
                                                    }elseif($row_cek4[3]=="2"){
                                                        $ini_pembeda4="alert alert-success";
                                                    }elseif($row_cek4[3]=="3"){
                                                        $ini_pembeda4="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda4; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date4.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date4; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek4[0]."<br>".$row_cek4[1]."<br>".$row_cek4[2]; ?></strong>
                                                        </div>

                                                    <?php
                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }
                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date4.$row_cell[0].'" value="'.$row_cek4[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date4.$row_cell[0].'" value="'.$row_cek4[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date4.$row_cell[0].'" value="'.$row_cek4[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date4.$row_cell[0].'" value="'.$row_cek4[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date4.$row_cell[0].'" value="'.$get_date4.' '.$row_cell[1].'">';
                                        
                                        ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date5; ?>','<?php echo $row_cell[0]; ?>')">

                                    <?php


                                            $sub_str_jam5 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str5=$sub_str_jam5.$get_date5;

                                             $query_cek5 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id, a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Sabtu' and b.jabatan='dosen'");


                                            $row_cek5 = mysqli_fetch_array($query_cek5);
                                            $h_query5 = mysqli_num_rows($query_cek5);

                                                if($h_query5==1){
                                                     if($row_cek5[3]=="1"){
                                                        $ini_pembeda5="alert alert-warning";
                                                    }elseif($row_cek5[3]=="2"){
                                                        $ini_pembeda5="alert alert-success";
                                                    }elseif($row_cek5[3]=="3"){
                                                        $ini_pembeda5="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda5; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date5.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date5; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek5[0]."<br>".$row_cek5[1]."<br>".$row_cek5[2]; ?></strong>
                                                        </div>

                                                    <?php
                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }
                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date5.$row_cell[0].'" value="'.$row_cek5[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date5.$row_cell[0].'" value="'.$row_cek5[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date5.$row_cell[0].'" value="'.$row_cek5[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date5.$row_cell[0].'" value="'.$row_cek5[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date5.$row_cell[0].'" value="'.$get_date5.' '.$row_cell[1].'">';
                                        
                                        ?>

                                </td>
                                <td class="hover_cell" id="<?php echo $row_cell[0]; ?>" ondblclick="nilai_cell('<?php echo $get_date6; ?>','<?php echo $row_cell[0]; ?>')">

                                    <?php

                                            $sub_str_jam6 = substr($row_cell[0], 2,5);
                                            $hasil_sub_str6=$sub_str_jam6.$get_date6;

                                             $query_cek6 = mysqli_query($conn,"SELECT b.nama_pemesan, c.mata_kuliah, d.nama_kelas, d.tingkat, f.nama_ruangan, g.jam, a.hari, b.kode_pemesan, c.id, d.id, a.kode_transaksi  from penjadwalan_detail a
                                                                                LEFT JOIN pemesan b on b.kode_pemesan = a.kode_dosen
                                                                                LEFT JOIN matakuliah c on c.id = a.kode_matakuliah
                                                                                LEFT JOIN kelas d on d.id = a.kode_kelas
                                                                                LEFT JOIN ruangan f on f.kode_ruangan = a.kode_ruangan
                                                                                LEFT JOIN jam g on g.kode_jam = a.kode_jam
                                                                                 where a.kode_ruangan='$ruangan_' and a.kode_jam='$row_cell[0]' and a.hari='Minggu' and b.jabatan='dosen'");


                                            $row_cek6 = mysqli_fetch_array($query_cek6);
                                            $h_query6 = mysqli_num_rows($query_cek6);

                                                if($h_query6==1){
                                                     if($row_cek6[3]=="1"){
                                                        $ini_pembeda6="alert alert-warning";
                                                    }elseif($row_cek6[3]=="2"){
                                                        $ini_pembeda6="alert alert-success";
                                                    }elseif($row_cek6[3]=="3"){
                                                        $ini_pembeda6="alert alert-info";
                                                    }

                                                    ?>

                                                        <div  class='<?php echo $ini_pembeda6; ?>' style='margin:0px;'>
                                                            <a id="<?php echo 'cell_alert_'.$get_date6.$row_cell[0]; ?>" onclick="delete_jadwal('<?php echo $get_date6; ?>','<?php echo $row_cell[0]; ?>','<?php echo $row_cell[1]; ?>')" class='close a' data-dismiss='' aria-label='close'>&times;</a>
                                                            <strong><?php echo  $row_cek6[0]."<br>".$row_cek6[1]."<br>".$row_cek6[2]; ?></strong>
                                                        </div>

                                                    <?php
                                                }else{
                                                    /*echo $data = "<div class='alert alert-success' style='margin-top:10px;'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Succses!</strong> Room is Available</div>";*/
                                                }
                                                echo '<input class="" style="display:none;" id="idedit_'.$get_date6.$row_cell[0].'" value="'.$row_cek6[10].'">';
                                                echo '<input class="" style="display:none;" id="dosen_'.$get_date6.$row_cell[0].'" value="'.$row_cek6[7].'">';
                                                echo '<input class="" style="display:none;" id="matakuliah_'.$get_date6.$row_cell[0].'" value="'.$row_cek6[8].'">';
                                                echo '<input class="" style="display:none;" id="kelas_'.$get_date6.$row_cell[0].'" value="'.$row_cek6[9].'">';
                                                echo '<input class="" style="display:none;" id="all_'.$get_date6.$row_cell[0].'" value="'.$get_date6.' '.$row_cell[1].'">';
                                        
                                        ?>

                                </td>
                            </tr>



                           
                          <?php } ?>

                          <script type="text/javascript">
                            /*$(function() {
                                
                               $(".a").hover(function(){
                                    var id = this.id;
                                    //alert(id);
                                   //   $("#"+id).popover('show');

                                   $('#'+id).popover({
                                        placement: 'auto' ,
                                        title : 'Are you sure delete NIM:',
                                        html: true,
                                        content : '<button type="button" style="width:40%; margin-right:2px;" onclick="delete_kelas_deal()" class="btn btn-danger" aria-label="Left Align">'+
                                                    '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Yes'+
                                                    '</button>'+
                                                    '<button type="button" style="width:40%"; class="btn btn-default" onclick="delete_kelas_false()" aria-label="Left Align">'+
                                                    '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No'+
                                                    '</button>'
                                    });


                                }); 

                                 
                            });*/

                            function delete_jadwal(a,b){
                              id_del = $.trim($("#idedit_"+a+b).val());
                              $("#setId_del").val(id_del);

                              $("#delete_modaljadwal").modal({backdrop: "static"});                               
                              
                            }

                            function delete_false(){
                              $("#delete_modaljadwal").modal('hide');   
                            }
                            function delete_true(){

                             id_delete = $("#setId_del").val();
                             
                                     $.ajax({
                                        type: 'GET',
                                        url: 'matriks_forms_delete.php?id_del='+id_delete,
                                        data: $(this).serialize(),
                                        success: function(data) {
                                          $("#delete_modaljadwal").modal('hide');   
                                          getAllData();
                                        }

                                      });
                            }

                          </script>
