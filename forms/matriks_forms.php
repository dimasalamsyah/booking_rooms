<?php
include '../koneksi/koneksi.php';
session_start();  

$query_a = mysqli_query($conn,"SELECT tahun_ajaran_akhir from penjadwalan_tahunajaran order by id desc limit 1");
$query_m = mysqli_query($conn,"SELECT tahun_ajaran_mulai from penjadwalan_tahunajaran order by id desc limit 1");

$cek_a = mysqli_fetch_array($query_a);
$cek_m = mysqli_fetch_array($query_m);


if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  if($_SESSION['pic']=="super user"){
      echo "Anda tidak mempunyai hak akses!";
  }else{
  ?>

      
<!DOCTYPE html>
<title>Form Matriks</title>
<html lang="en" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- favicon -->
<link rel="icon" href="../images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="../css/select2.min.css">

<!-- javascript -->
<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap-typeahead.min.js"></script>
<script type="text/javascript" src="../js/select2.min.js"></script>


<script type="text/javascript" src="../js/jquery.mockjax.js"></script>
<script type="text/javascript" src="../js/bootstrap-popover-x.min.js"></script>
<script type="text/javascript" src="../js/chosen.jquery.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui.js"></script>
<script type="text/javascript" src="../js/jquery.simplePagination.js"></script>
<script type="text/javascript" src="../js/bootstrap-select.min.js"></script>
<!-- <script type="text/javascript" src="../js/typeahead.bundle.js"></script> -->

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
$home ="../";
$setting="";
$logout="";
?>
<body style="background-color:#C7C8BF">


<div id="wrapper" style="">
       <?php require_once '../side_bar.php'; ?>

                             <!-- modal edit -->
            <div class="modal fade" role="dialog" id="addpenjadwalan_modal"  >
              <div class="modal-dialog" style="width:350px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="header_add">Tambah Penjadwalan Kelas<span id="span_header_add"></span></h4>
                  </div>
                  <div class="modal-body">
                                  <input style="display:none;" id="validasi_save_update" >
                                   <form class="" id="frm_add" name="frm_add"  action="" method="get">
                                        <div class="form-group" style="">
                                            <select class="form-control" id="combo_dosen" name="combo_dosen" style="width:100%;" required>
                                               
                                            </select>
                                        </div> 
                                        <div class="form-group" style="">
                                            <select class="form-control" id="combo_matakuliah" name="combo_matakuliah" style="width:100%;" required >
                                               
                                            </select>
                                        </div> 
                                        <div class="form-group" style="">
                                            <select class="form-control" id="combo_kelas" name="combo_kelas" style="width:100%;" required >
                                               
                                            </select>
                                        </div> 
                                      </form>
                                      <button type="" class="btn btn-success" id="" onclick="save_data()" >
                                              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                                           Simpan</button>
                                           <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                           Batal</button>

                           

                    <div class="modal-footer"></div>

                </div>
               
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


             <!-- modal untuk delete data -->
            <div class="modal fade" role="dialog" id="delete_modaljadwal"  >
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

                        <div class="table-responsive" style="margin-top:-10px;">
                          <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                                
                                <tbody id="t_ruangan">
                                      <tr><th colspan="8">
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


                                          <span type="" id="" class="btn btn-success" onclick="save_tahunajaran()" style="margin-left:5px; float:right">Set</span>
                                          <checkbox></checkbox>
                                          <div style="float:right" id="error_akhir_tahunajaran" class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="10" type="text" id="akhir_tahunajaran" name="akhir_tahunajaran" placeholder="Tahun Ajaran" readonly value="<?php echo $cek_a[0]; ?>" >
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="icon_akhir" style="cursor:pointer;"></span></span>
                                          </div>
                                          <label style="float:right; margin-left:5px; margin-right:5px; margin-top:3px;">ke </label>
                                          <div style="float:right" id="error_awal_tahunajaran" class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                            <input class="form-control" size="10" type="text" id="mulai_tahunajaran" name="mulai_tahunajaran" placeholder="Tahun Ajaran" readonly value="<?php  echo $cek_m[0];?>" >
                                          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="icon_mulai" style="cursor:pointer;"></span></span>
                                          </div>  
                                          <label style="float:right; margin-left:5px; margin-right:5px; margin-top:3px;">Tahun Ajaran </label>
                                      </th>

                                    </tr>
                                </tbody>

                                <tbody id="t_tanggal"></tbody>   <!-- untuk hari dan tanggal -->

                                <tbody id="t_jam"></tbody> <!-- untuk jam -->
                                
                          </table>

                                        <div><b style="float:left;">Keterangan:</b><br><br>
                                          <div class="alert alert-info" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left">Untuk menandakan bahwa jadwal adalah<strong> Tingkat 3.</strong></div><br><br><br>

                                          <div class="alert alert-success" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left;">Untuk menandakan bahwa jadwal adalah<strong> Tingkat 2.</strong></div><br><br><br>

                                          <div class="alert alert-warning" style="width:5%; float:left; margin-right:5px;">
                                          </div>
                                          <div style="float:left;">Untuk menandakan bahwa jadwal adalah<strong> Tingkat 1.</strong></div>
                                          
                                      </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

<script>
        var form='';
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        function getAllData(){
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
              $.ajax({
                    type: 'GET',
                    url: 'matriks_forms_getalldata.php?ruangan='+$("#c_ruangan").val(),
                    data: $(this).serialize(),
                    success: function(data) {

                      $('#t_tanggal').html(data);
                      $("#loader").html("");
                    }
                  });
        }

        function getComboRuangan(){
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
              $.ajax({
                    type: 'GET',
                    url: 'matriks_forms_getalldata.php?ruangan='+$("#c_ruangan").val(),
                    data: $(this).serialize(),
                    success: function(data) {

                      $('#t_tanggal').html(data);
                      $("#loader").html("");
                      //alert($("#c_ruangan").val());
                    }
                  });
        }

        var data_cell=''
        function nilai_cell(a,b){
          c_ruangan = $("#c_ruangan").val();
          
          data_cell = 'kode_ruangan='+c_ruangan+'&hari='+a+'&kode_jam='+b;

          akhir_tahunajaran = $("#akhir_tahunajaran").val();
          mulai_tahunajaran = $("#mulai_tahunajaran").val();

          if(akhir_tahunajaran=="" || mulai_tahunajaran==""){
              $("#pesan").html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Perhatian!</strong>Harap Mengisi Tahun Ajaran.</div>');
              $("#error_akhir_tahunajaran").addClass("has-error");
              $("#error_awal_tahunajaran").addClass("has-error");
          }else{
            $("#addpenjadwalan_modal").modal({backdrop: "static"});
          }


            dosen_get = $("#dosen_"+a+b).val();
            matakuliah_get = $("#matakuliah_"+a+b).val();
            kelas_get = $("#kelas_"+a+b).val();
            all_get = $("#all_"+a+b).val();

            /*untuk validasi ketika klik tombol save*/
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
        }

        var isi_a ='';
        var isi_b ='';
        

        function save_data(){
         
          kode_dosen = $("#combo_dosen").val();
          //tingkat = $("#combo_tingkat").val();
          kode_kelas = $("#combo_kelas").val();
          kode_matakuliah = $("#combo_matakuliah").val();
          mulai = $("#mulai_tahunajaran").val();
          habis = $("#akhir_tahunajaran").val();

          string1 = "&kode_dosen="+kode_dosen+"&kode_kelas="+kode_kelas+
                    "&kode_matakuliah="+kode_matakuliah+"&mulai="+mulai+"&habis="+habis;

                   $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
           
          cek_kondisi = $("#validasi_save_update").val();
          
          if(cek_kondisi!=""){
            data_kirim = "matriks_forms_update.php?"+data_cell+string1;
            //alert(cek_kondisi);
          }else{
             data_kirim = "matriks_forms_save_add.php?"+data_cell+string1;
             //alert(cek_kondisi);
          }

         

           $.ajax({
             url: data_kirim,
             success:function(data) {
                $("#loader").html("");
              
                getAllData();
                $("#addpenjadwalan_modal").modal('hide');
              //alert(data_kirim);
                //window.location.href="matriks_forms_save_add.php?"+data_cell+string1;
             }

           


          });

          

        }

        function save_tahunajaran(){
          mulai = $("#mulai_tahunajaran").val();
          akhir = $("#akhir_tahunajaran").val();

          $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
          data_save = 'matriks_forms_save_tahunajaran.php?mulai='+mulai+'&akhir='+akhir;
          $.ajax({
             url:data_save,
             success:function(data) {
              $("#loader").html("");
               $("#pesan").html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Sukses!</strong> Sukses Simpan Tahun Ajaran.</div>');
             }
          });
           
        }


        $(document).ready(function(){

           $("#button").click(function(){
               getAllData();
               //alert();
           });

           /*autocomplte*/
           $('#input_dosen').typeahead({
              prefetch: 'matriks_forms_getdatadosen.php',
            });

           /*combo box dosen*/
          $("#combo_dosen").select2({
            placeholder: "Pilih Dosen",
            allowClear: true
          });

          /*ajax comboxbox dosen*/
          var data_table='';
           $.ajax({
            url: 'matriks_forms_getdatadosen.php',
            dataType: 'json',
            success: function(data) {
               for(var i = 0; i<data.length;i++){
                  data_table += '<option value='+data[i].kode+'><strong>'+data[i].nama+'</strong> | '+data[i].kode+'</option>';
               }
               /*$("#combo_dosen").html("<option>d</option>");*/
               $("#combo_dosen").html("<option value=''>Pilih Dosen</option>"+data_table);
            }
          });

           /*combo box matakuliah*/
          $("#combo_matakuliah").select2({
            placeholder: "Pilih Matakuliah",
            allowClear: true
          });

          /*ajax comboxbox dosen*/
          var data_matakuliah='';
           $.ajax({
            url: 'matriks_forms_getdatamatakuliah.php',
            dataType: 'json',
            success: function(data) {
               for(var i = 0; i<data.length;i++){
                  data_matakuliah += '<option value='+data[i].kode+'>'+data[i].nama+'</option>';
               }
               /*$("#combo_dosen").html("<option>d</option>");*/
               $("#combo_matakuliah").html("<option value=''>Pilih Matakuliah</option>"+data_matakuliah);
            }
          });


            /*combo box kelas*/
          $("#combo_kelas").select2({
            placeholder: "Pilih Kelas",
            allowClear: true
          });

          /*ajax comboxbox dosen*/
          var data_kelas='';
           $.ajax({
            url: 'matriks_forms_getdatakelas.php',
            dataType: 'json',
            success: function(data) {
               for(var i = 0; i<data.length;i++){
                  data_kelas += '<option value='+data[i].kode+'>'+data[i].nama+' | '+data[i].tingkat+'</option>';
               }
               /*$("#combo_dosen").html("<option>d</option>");*/
               $("#combo_kelas").html("<option value=''>Pilih Kelas</option>"+data_kelas);
            }
          });

           /*tanggal*/
           $('#icon_mulai').Zebra_DatePicker({  
            show_icon: false,
            direction: true,
            view: 'years',
            disabled_dates: '["* * * 0,6"]',
            pair: $('#icon_akhir'),
                onSelect: function(view, elements){
                    document.getElementById("mulai_tahunajaran").value=view;
                    //document.getElementById("#tgl_filter").innerHTML = "aa";
                    //alert(view);
                }
            });
           $('#icon_akhir').Zebra_DatePicker({  
            show_icon: false,
            view: 'years',

                onSelect: function(view, elements){
                    document.getElementById("akhir_tahunajaran").value=view;
                    //document.getElementById("#tgl_filter").innerHTML = "aa";
                    //alert(view);
                }
            });

           /*drag*/
           $("#addpenjadwalan_modal").draggable({
                handle: ".modal-header"
            });
          /* $("#editdosen_modal").draggable({
                handle: ".modal-header"
            });*/
            

            
             
            



            


        });/*matriks_forms_getdatadosen akhir document https://select2.github.io/examples.html*/



    $(function() {
        getAllData();

        
    });
    
</script>

</html>

  <?php
  }
}



?>
