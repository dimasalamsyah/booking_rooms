<?php
include '../koneksi/koneksi.php';
session_start();

$query1 = mysqli_query($conn,"SELECT tahun_ajaran_akhir from penjadwalan_tahunajaran order by id desc limit 1");
$query = mysqli_query($conn,"SELECT tahun_ajaran_mulai from penjadwalan_tahunajaran order by id desc limit 1");
$query_jam = mysqli_query($conn,"SELECT kode_jam, jam from jam");
$query_room = mysqli_query($conn, "SELECT kode_ruangan, nama_ruangan, status from ruangan order by nama_ruangan asc");
$cek1 = mysqli_fetch_array($query1);
$cek = mysqli_fetch_array($query);




if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

        
<!DOCTYPE html>
<title>Form Booking</title>
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
<script type="text/javascript" src="../js/bootstrap-popover-x.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.simplePagination.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>

<!-- datepicker -->
<script type="text/javascript" src="../datepicker/javascript/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../datepicker/css/metallic.css" type="text/css">
<style>

</style>
<script>
  var form_smscek="";
</script>
<?php 

$warna = "#3786DD;";
$warna_slide = "#d1e0e0";
$image = "../images/logo.jpg";
$image_top ="../images/logo.jpg";
$foto1="";
$home = "../";
$logout="";
?>
<body style="background-color:#C7C8BF">


<div id="wrapper" style="">
                <?php require_once '../side_bar.php'; ?>
                         <!-- modal untuk add data -->
            <div class="modal fade" role="dialog" id="add_modalpemesanan"  >
              <div class="modal-dialog" style="width:1000px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Booking Ruangan</h4>
                  </div>
                  <div class="modal-body">
                        
                    <form class="form-inline" id="frm_add" name="frm_add"  action="" method="get">
                       
                        
                        <div class="form-group col-md-3" id="combo_position_err" style="margin-top:10px; margin-left:-12px; margin-right:0px;">
                            <select id="combo_position" class="selectpicker" data-size="5" data-live-search="true" title="Pilih Posisi">
                                <option value="" >Pilih Posisi</option>
                                <option value="dosen" >Dosen</option>
                                <option value="mahasiswa" >Mahasiswa</option>
                                <option value="karyawan" >Karyawan</option>
                             </select>
                           <div id="loading_add"></div>
                                <input style="display:none" id="getValidasi">
                                <input style="display:none" id="getIdEdit">
                                <input style="display:none" id="getIdRuangan">
                        </div>

                        <div class="form-group col-md-3" id="combo_atas_nama_error" style="margin-top:10px; margin-left:10px; margin-right:0px;">
                            <select class="form-control selectpicker" data-size="5" id="combo_atas_nama" name="combo_atas_nama" data-live-search="true"  onchange="" style=" margin-left:0px;"required>
                                <!-- diisi dengan ajax -->
                            </select>
                        </div> 
                      </form>
                        <div class="form-group" style="margin-top:10px;">
                             <button type="" class="btn btn-success" id="" onclick="save_data_permintaan()" >
                                 <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>Simpan
                            </button>
                        </div>

                          <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE">
                             
                                <tr>
                                    <th style="width:25%;">Nama Ruangan</th>
                                    <th style="width:25%;">Jam</th>
                                    <th style="width:25%">Tanggal Booking</th>
                                    <th style="width:25%">Ket</th>
                                </tr>
                                <tbody id="container">

                                     <tr class="records"></td>
                                        <td>
                                            <!-- <select class="form-control selectpicker" data-live-search="true" data-size="5" title="Pilih Ruangan" onchange="" name="combo_kelas_add" id="combo_kelas_add" style="width:100%;" required >
                                                di isi dengan ajax
                                            </select> -->
                                            <div class="form-group" id="combo_kelas_add_error">
                                              <input class="form-control" size="5" type="" name="combo_kelas_add" id="combo_kelas_add" placeholder="" required readonly value="">
                                            </div>
                                        </td>
                                        <td><input class="form-control" size="5" type="" name="jam_add_kode" id="jam_add_kode" placeholder="" style="display:none;">
                                            <input class="form-control" size="5" type="" name="jam_add" id="jam_add" placeholder="" required readonly value="">
                                        </td>
                                        <td style="width:100px;">
                                                <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                                                        <input class="form-control" size="5" type="text" name="tanggal_add" id="tanggal_add" placeholder="Tanggal" required readonly value='' >
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="tanggal_add_icon" style="cursor:pointer;" ></span></span>
                                                </div>
                                        </td>
                                        <td>
                                          <div class="form-group" id="note_add_error">
                                            <textarea class="form-control" rows="3" style="max-width:175px; max-height:170px;" type="" name="note_add" id="note_add" placeholder="Catatan" required></textarea></td>                   
                                          </div>
                                    </tr>

                                </tbody>
                            </table>
                        

                  </div>
                  <div class="modal-footer">

                   </div>
              

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

              <!-- modal untuk delete data -->
            <div class="modal fade" role="dialog" id="delete_modalpemesanan"  >
              <div class="modal-dialog" style="width:200px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Data</h4>
                  </div>
                  <div class="modal-body">
                        
                    <form class="form-inline" id="frm_del" name="frm_del"  action="" method="get">
                        <input style="display:none" id='setId_del'>
                        <button type="button" style="width:40%; margin-right:2px;" onclick="delete_true()" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true">Ya</span></button>
                        <button id="" type="button" style="width:40%"; class="btn btn-default" onclick="delete_false()" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true">Tidak</span></button>   
                    </form>
                       
                        

                  </div>
                  <div class="modal-footer">
                   </div>
              

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



        
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

                        <form class="form-inline" method="post" action="" id="cek_form" name="cek_form" >

                              <div class="form-group" style="margin-top:0px;" id="room_cek_er">
                                  <select class="form-control selectpicker"  data-size="10"  id="room_cek" name="room_cek" style="margin-left:0px;">
                                      <option value="">Pilih Ruangan</option>
                                      <?php 
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

                              <div class="form-group" style="margin-top:0px;" id="cek_date1_er">
                                  <div style="" class="input-group date form_date col-md-12" >
                                      <input class="form-control" size="" type="text" id="cek_date1" name="cek_date1" placeholder="tanggal" readonly="" value="<?php echo date('Y-m-d'); ?>">
                                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="cek_date1_text" style="cursor:pointer;"></span></span>
                                  </div>  
                              </div>
                              <div class="form-group" style="margin-top:0px;" id="jam_cek_er">
                                <select row="4" class="form-control selectpicker" data-size="10" id="jam_cek" name="jam_cek" style="" >
                                      <option value="">Pilih Jam</option>
                                      <?php 
                                          while ($row_jam = mysqli_fetch_array($query_jam)) { 
                                                echo "<option value=".$row_jam[0].">".$row_jam[1]."</option>";
                                               
                                          }

                                      ?>
                                  </select>
                                  </div>

                                  <span type="" id="cek_date_button" class="btn btn-success" onclick="check_()" style="margin-top:0px;">Cek</span>
                                  <span id="loader"></span>
                                  <div id="val_cleardata" style="display:none;"></div>
                          </form>

                        <div class="table-responsive" style="margin-top:-10px;">
                          <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                                
                                <tbody id="t_ruangan">
                                      <tr>
                                        <th colspan="8">
                                             
                                            <form class="form-inline">
                                                <div class="form-group" style="margin-top:0px;">
                                                  <select class="selectpicker" data-size="5" id="c_ruangan" onchange="getComboRuangan()" style="float:left">
                                          
                                                      <?php 
                                                        $query_ruangan = mysqli_query($conn,"SELECT kode_ruangan, nama_ruangan, status from ruangan order by nama_ruangan asc "); 
                                                        while ($row_ruangan = mysqli_fetch_array($query_ruangan)) {

                                                          if($row_ruangan[2]=="Aktif"){
                                                               echo '<option value='.$row_ruangan[0].' >'.$row_ruangan[1].'</option>';
                                                          }else{
                                                               echo '<option disabled value='.$row_ruangan[0].' >'.$row_ruangan[1].'</option>';
                                                          }
                                                        }

                                                      ?>

                                                    </select>
                                              </div>

                                                <div class="form-group" style="margin-bottom:0px;">
                                                    <div style="" class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                                        <input class="form-control" size="10" type="text" id="tgl_filter" name="tgl_filter" placeholder="Tanggal Filter" readonly value="<?php echo date('Y-m-d'); ?>">
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="tgl_filter_text" style="cursor:pointer;"></span></span>
                                                    </div> 
                                                    <span id="" type="" class="btn btn-default" onclick="filter_date()" style="">Filter</span> 
                                                </div>

                                            </form>

                                        </th>

                                    </tr>
                                </tbody>

                                <tbody id="t_tanggal"></tbody>   <!-- untuk hari dan tanggal -->

                                <tbody id="t_jam"></tbody> <!-- untuk jam -->

                          </table>

                                        <!-- <center>
                                            <nav>
                                            <ul id="page" class="pagination"></ul>
                                            </nav>
                                        </center>-->                                        
                                      
                                      <div><b style="float:left;">Keterangan:</b><br><br>
                                          <div class="alert alert-info" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left">Untuk menandakan bahwa pemesan adalah<strong> Dosen.</strong></div><br><br><br>

                                          <div class="alert alert-success" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left;">Untuk menandakan bahwa pemesan adalah<strong> Mahasiswa.</strong></div><br><br><br>

                                          <div class="alert alert-warning" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left;">Untuk menandakan bahwa pemesan adalah<strong> Karyawan.</strong></div>
                                          
                                      </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

<script>
        var form="";/*untuk side bar*/
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function getAllData(){
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
              $.ajax({
                    type: 'GET',
                    url: 'booking_forms_getalldata.php?ruangan='+$("#c_ruangan").val()+"&datenow="+$("#tgl_filter").val(),
                    data: $(this).serialize(),
                    success: function(data) {

                      $('#t_tanggal').html(data);
                      $("#loader").html("");
                    }
                  });
        }

        function getAllData_refresh(){
            //$("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
              $.ajax({
                    type: 'GET',
                    url: 'booking_forms_getalldata.php?ruangan='+$("#c_ruangan").val()+"&datenow="+$("#tgl_filter").val(),
                    data: $(this).serialize(),
                    success: function(data) {

                      $('#t_tanggal').html(data);
                      //$("#loader").html("");
                    }
                  });
        }

        function getComboRuangan(){
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
              $.ajax({
                    type: 'GET',
                    url: 'booking_forms_getalldata.php?ruangan='+$("#c_ruangan").val()+"&datenow="+$("#tgl_filter").val(),
                    data: $(this).serialize(),
                    success: function(data) {
                        $('#t_tanggal').html(data);
                        $("#loader").html("");
                    }
                  });
        }

        var data_cell=''
       /* function nilai_cell(a,b){
          c_ruangan = $("#c_ruangan").val();
          
          data_cell = 'kode_ruangan='+c_ruangan+'&hari='+a+'&kode_jam='+b;

          akhir_tahunajaran = $("#akhir_tahunajaran").val();
          mulai_tahunajaran = $("#mulai_tahunajaran").val();

          if(akhir_tahunajaran=="" || mulai_tahunajaran==""){
              $("#pesan").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Perhatian!</strong>Harap Mengisi Tahun Ajaran.</div>');
              $("#error_akhir_tahunajaran").addClass("has-error");
              $("#error_awal_tahunajaran").addClass("has-error");
          }else{
            $("#add_modalpemesanan").modal({backdrop: "static"});
          }


            dosen_get = $("#dosen_"+a+b).val();
            matakuliah_get = $("#matakuliah_"+a+b).val();
            kelas_get = $("#kelas_"+a+b).val();
            all_get = $("#all_"+a+b).val();

            /*untuk validasi ketika klik tombol save
            $("#validasi_save_update").val(dosen_get);

            $("#combo_dosen").val(dosen_get).change();
            $("#combo_matakuliah").val(matakuliah_get).change();
            $("#combo_kelas").val(kelas_get).change();


            if(dosen_get!=""){
                $("#header_add").html("Edit Penjadawalan: <br>"+all_get+' '+c_ruangan);
                $("#span_header_add").text(all_get+c_ruangan);
                
            }else{
                $("#header_add").html("Add Penjadawalan: <br>"+all_get+' '+c_ruangan);
                $("#span_header_add").text(all_get+c_ruangan);
                
            }
        }*/


        function filter_date(){
            getAllData();
        }

        function getValComboPembooking(){
            /*$('#combo_position').change(function(e){*/
                combo_position = $('#combo_position').val();
                /*alert(combo_position);*/
                var valSelect=''
                var data_combo_atas_nama='';
                var url_atasnama='';
                   //alert(combo_position);
                    if(combo_position=='dosen'){
                        url_atasnama='booking_forms_getdatadosen.php';
                        valSelect = "Pilih Dosen";
                    }else if(combo_position=='mahasiswa'){
                        url_atasnama='booking_forms_getdatamahasiswa.php';
                        valSelect = "Pilih Mahasiswa";
                    }else{
                        url_atasnama='booking_forms_getdatakaryawan.php';
                        valSelect = "Pilih Karyawan";
                    }

                       
                  /*ajax comboxbox atasnama*/
                $("#loading_add").html('<img src="../images/loader1.gif" alt="loading..." style="margin-top:-55px; margin-left:225px; margin-right:5px; width:25px; display:;" />');
                $.ajax({
                url: url_atasnama,
                dataType: 'json',
                success: function(data1) {

                   for(var i = 0; i<data1.length;i++){
                      data_combo_atas_nama += '<option value='+data1[i].kode+'><strong>'+data1[i].nama+'</strong></option>';
                       }
                       $("#combo_atas_nama").html("<option data-hidden='true' value=''>"+valSelect+"</option>"+data_combo_atas_nama);
                       //$("#combo_atas_nama").val('44');
                       $('#combo_atas_nama').selectpicker('refresh');
                       $("#loading_add").html('');
                    }

                  });
                        
                /*});akhir dari combo position*/ 

        }

        function check_(){
          room_cek = $("#room_cek").val();
          jam_cek = $("#jam_cek").val();
          

            if(room_cek==""){
               $("#room_cek_er").addClass('has-error');
            }else{
              $("#room_cek_er").removeClass('has-error');
            }
            if(jam_cek==""){
                 $("#jam_cek_er").addClass('has-error');
            }else{
                $("#jam_cek_er").removeClass('has-error');                        
            }

            if(room_cek!="" && jam_cek!=""){
                ruangan_cek = $("#room_cek").val();
                    tgl_cek = $("#cek_date1").val();
                    jam_cek = $("#jam_cek").val();

                    $.ajax({
                        type: 'GET',
                        url: 'booking_forms_cek.php?ruangan='+ruangan_cek+"&tgl="+tgl_cek+"&jam="+jam_cek,
                        data: $(this).serialize(),
                        success: function(data) {
                            $("#pesan").html(data);
                        }

                      });

            }   
        }


        $(document).ready(function(){
            /*drag*/
           $("#add_modalpemesanan").draggable({
                handle: ".modal-header"
            });
                
            $('#combo_position').change(function(e){
                combo_position = $(this).val();
                /*alert(combo_position);*/
                var valSelect=''
                var data_combo_atas_nama='';
                var url_atasnama='';
                   //alert(combo_position);
                    if(combo_position=='dosen'){
                        url_atasnama='booking_forms_getdatadosen.php';
                        valSelect = "Pilih Dosen";
                    }
                    if(combo_position=='mahasiswa'){
                        url_atasnama='booking_forms_getdatamahasiswa.php';
                        valSelect = "Pilih Mahasiswa";
                    }
                    if(combo_position=='karyawan'){
                        url_atasnama='booking_forms_getdatakaryawan.php';
                        valSelect = "Pilih Karyawan";
                    }

                       
                  /*ajax comboxbox atasnama*/
                $("#loading_add").html('<img src="../images/loader1.gif" alt="loading..." style="margin-top:-55px; margin-left:225px; margin-right:5px; width:25px; display:;" />');
                $.ajax({
                url: url_atasnama,
                dataType: 'json',
                success: function(data1) {

                   for(var i = 0; i<data1.length;i++){
                      data_combo_atas_nama += '<option value='+data1[i].kode+'><strong>'+data1[i].nama+'</strong></option>';
                       }
                       $("#combo_atas_nama").html("<option data-hidden='true' value=''>"+valSelect+"</option>"+data_combo_atas_nama);
                       $('#combo_atas_nama').selectpicker('refresh');
                       $("#loading_add").html('');
                    }

                  });

                });/*akhir dari combo position*/ 


                  /*ajax comboxbox kelas*/
          var data_combo_kelas='';
           $.ajax({
            url: 'matakuliah_forms_getdataruangan.php',
            dataType: 'json',
            success: function(data) {
               for(var i = 0; i<data.length;i++){
                  data_combo_kelas += '<option value='+data[i].kode+'><strong>'+data[i].ruangan+'</strong></option>';
               }
               $("#combo_kelas_add").html(data_combo_kelas);
            }
          });


            /*tanggal filter*/
            $('#tgl_filter_text').Zebra_DatePicker({  show_icon: false,

                onSelect: function(view, elements){
                    document.getElementById("tgl_filter").value=view;
                }
            });
            $('#cek_date1_text').Zebra_DatePicker({  show_icon: false,

                onSelect: function(view, elements){
                    document.getElementById("cek_date1").value=view;
                }
            });


            //check_();
                
        });/*akhir document*/

    function refresh_cleardata(){
      setTimeout(refresh_cleardata,5000);
      $.get('booking_forms_cleardata.php',function(data){
          /*$("#val_cleardata").html(data);
          get_cleardata = $("#val_cleardata").text();
          //alert(data);
          if(get_cleardata=="0"){
             //alert("berhasil aja");
              getAllData();
          }else{
             //alert("gagal");
             getAllData();
          }*/

          getAllData_refresh();

      });
    }
 


    $(function() {
        getAllData();
        refresh_cleardata();
      

    });/*akhir function*/
    
</script>

</html>

  <?php
}


?>

