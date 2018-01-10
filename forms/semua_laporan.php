<?php 
    include '../koneksi/koneksi.php';

    session_start();



if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Laporan</title>
<html lang="en" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- favicon -->
<link rel="icon" href="../images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-select.css">

<!-- javascript -->
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-typeahead.min.js"></script>
<script type="text/javascript" src="../js/jquery.mockjax.js"></script>
<script type="text/javascript" src="../js/bootstrap-popover-x.min.js"></script>
<script type="text/javascript" src="../js/chosen.jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.simplePagination.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<!-- datepicker -->
<script type="text/javascript" src="../datepicker/javascript/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../datepicker/css/metallic.css" type="text/css">

<script>
  var form_smscek="";
</script>
<?php 

$warna = "#3786DD;";
$warna_slide = "#d1e0e0";
$image = "../images/logo.jpg";
$image_top ="../images/logo.jpg";
$foto1="";
$home ="../";
$setting="";
?>
<body style="background-color:#C7C8BF">

    <div id="wrapper" style="">
        
        <?php require_once '../side_bar.php'; ?>
        
      <div style="width:20px; height:10%; background-color:#2267CE; float:left;">
        <div style="width:390%; height:100%; background-color:#2267CE;"></div>
      </div>
        <div id="page-content-wrapper" style="height:100%;">
        
            <?php include 'top_bar.php'; ?>
         
          

            <div class="container-fluid" style="margin-left:0px;">
                <div class="row">

                        
              
              <div id="pesan"></div>
              <div id="loading" style="display:none"><img src="../images/loading.gif" alt="loading..." /></div>
              <div id="pesan1"></div>

        <div class="table-responsive" style="margin-top:-10px;">
              <table class="table" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <td colspan="2" align="center" style="color:#ffffff; background-color:#3786DD;">Master</td>
                  </tr>
                  <!-- <tr>
                    <td style="width:4%;">Dosen</td>
                    <td style="width:10%;"><a target="_blank" href="dosen_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Dosen</a></td>
                  </tr> -->
                  <tr>
                    <td style="width:4%;">Jam</td>
                    <td style="width:10%;"><a target="_blank" href="jam_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Jam</a></td>
                  </tr>
                  <tr>
                    <td style="width:4%;">Karyawan</td>
                    <td style="width:10%;"><a target="_blank" href="karyawan_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Karyawan</a></td>
                  </tr>
                  <tr>
                    <td style="width:4%;">Kelas</td>
                    <td style="width:10%;"><a target="_blank" href="kelas_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Kelas</a></td>
                  </tr>
                  <!-- <tr>
                    <td style="width:4%;">Mahasiswa</td>
                    <td style="width:10%;"><a  target="_blank" href="mahasiswa_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Mahasiswa</a></td>
                  </tr> -->
                  <tr>
                    <td style="width:4%;">Matakuliah</td>
                    <td style="width:10%;"><a  target="_blank" href="matakuliah_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Matakuliah</a></td>
                  </tr>
                  <tr>
                    <td style="width:4%;">Pemesan

                        <div class="form-group" style="margin-top:0px;" id="room_cek_er">
                                  <select class="form-control selectpicker"  data-size="10"  id="jabatan_lap" name="jabatan_lap" style="margin-left:0px;">
                                      <option value="semua">Semua</option>
                                      <option value="dosen">Dosen</option>
                                      <option value="mahasiswa">Mahasiswa</option>
                                  </select>
                              </div>

                    </td>
                    <td style="width:10%;"><a id="pemesan_master_lap" target="_blank" href="javascript:void(0)"><img src="../images/pdf.png" width="20px">Laporan Pemesan</a></td>
                  </tr>
                  <tr>
                    <td style="width:4%;">Ruangan</td>
                    <td style="width:10%;"><a  target="_blank" href="ruangan_forms_laporan.php"><img src="../images/pdf.png" width="20px">Laporan Ruangan</a></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" style="color:#ffffff; background-color:#3786DD;">Transaksi</td>
                  </tr>
                  <tr>
                    <td style="width:4%;">Penjadwalan Ruangan<br>
                    <form id="penjadwalan_forms" class="form-inline">
                      
                        
                          <div class="radio">
                            <label>
                              <input type="radio" name="radio_penjadwalan" id="persemua" value="Semua" checked>
                              Semua
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="radio_penjadwalan" id="perperiode_pemesanan" value="Periode">
                                Per Ruangan
                            </label>
                          </div>
                          <br>

                            <div class="form-group" style="margin-top:0px;" id="room_cek_er">
                                  <select class="form-control selectpicker"  data-size="10"  id="room_cek" name="room_cek" style="margin-left:0px;">
                                      <?php 
                                          $query_room = mysqli_query($conn, "SELECT kode_ruangan, nama_ruangan, status from ruangan order by nama_ruangan asc");
                                          while ($row_room = mysqli_fetch_array($query_room)) {   
                                              

                                              if($row_room[2]=="Aktif"){
                                                     echo "<option value=".$row_room[0].">".$row_room[1]."</option>";
                                                }else{
                                                     echo "<option disabled value=".$row_room[0].">".$row_room[1]."</option>";
                                                }
                                          }

                                      ?>
                                  </select>
                              </div>


                        </td>
                        <td style="width:10%;"><a  id="penjadwalan_lap1" target="_blank" href="javascript:void(0)"><img  src="../images/excel.png" width="20px">Laporan Penjadwalan Ruangan</a>

                      </form>
                    </td>
                    
                  </tr> 
                  <tr>
                    <td style="width:4%;">Pemesanan Ruangan<br>
                    <form id="pemsanana_forms" class="form-inline">
                      
                        
                          <div class="radio">
                            <label>
                              <input type="radio" name="radio_pemesanan" id="persemua" value="Semua Data" checked>
                              Semua
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="radio_pemesanan" id="perperiode_pemesanan" value="Periode">
                                Periode
                            </label>
                          </div>
                          <br>
                          <div style="float:right" id="error_akhir_tahunajaran" class="input-group date  col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="10" type="text" id="akhir_" name="akhir_" placeholder="awal" readonly value="<?php echo date('Y-m-d'); ?>" >
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="icon_akhir" style="cursor:pointer;"></span></span>
                          </div>
                          <label style="float:right; margin-left:5px; margin-right:5px; margin-top:3px;">-</label>
                          <div style="float:right" id="error_awal_tahunajaran" class="input-group date col-md-5" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="10" type="text" id="awal_" name="awal_" placeholder="" readonly value="<?php echo date('Y-m-d'); ?>" >
                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter"  id="icon_mulai" style="cursor:pointer;"></span></span>
                          </div> 
                        </td>
                        <td style="width:10%;"><a  id="pemesanan_lap1" target="_blank" href="javascript:void(0)"><img  src="../images/pdf.png" width="20px">Laporan Pemesanan Ruangan</a>

                      </form>
                    </td>
                    
                  </tr> 
                    
         
                                
              </table>

            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

 <script>
      var form="";/*untuk side bar*/
      /*toggle slide bar*/
      $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

      $("#pemesanan_lap1").click(function(){
          awal_tgl = $("#awal_").val();
          akhir_tgl = $("#akhir_").val();

         pemesanan_get = $('input[name=radio_pemesanan]:checked', '#pemsanana_forms').val(); 

         if(pemesanan_get=="Periode"){
            window.open("booking_forms_laporan.php?awal="+awal_tgl+"&akhir="+akhir_tgl,"_blank");
         }else{
            window.open("booking_forms_laporan.php","_blank");
         }

      })
      $("#penjadwalan_lap1").click(function(){
        room = $("#room_cek").val();
        penjadwalan_get = $('input[name=radio_penjadwalan]:checked', '#penjadwalan_forms').val(); 

         if(penjadwalan_get!="Semua"){
            window.open("matriks_forms_laporan.php?ruangan="+room,"_blank");
         }else{
            window.open("matriks_forms_laporan.php","_blank");
         }
      })
      $("#pemesan_master_lap").click(function(){
        jabatan = $("#jabatan_lap").val();
        window.open("pemesan_forms_laporan.php?jabatan="+jabatan,"_blank");
      })
      

      /*tanggal*/
           $('#icon_mulai').Zebra_DatePicker({  
            show_icon: false,
            view: 'years',
            pair: $('#icon_akhir'),
                onSelect: function(view, elements){
                    //a = $("#akhir_").text(view);
                    $("#awal_").val(view);
                }
            });
           $('#icon_akhir').Zebra_DatePicker({  
            show_icon: false,
            view: 'years',

                onSelect: function(view, elements){
                    $("#akhir_").val(view);
                }
            });
       
    </script>

</html>


  <?php
}




?>
