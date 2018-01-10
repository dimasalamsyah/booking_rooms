<?php
include '../koneksi/koneksi.php';
session_start();

if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Kelas</title>
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
          <div class="modal fade" role="dialog" id="hapusmatakuliah_modal"  >
    <div class="modal-dialog" style="width:250px;">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Mata Kuliah: <span id="title_hapus"></span></h4>
        </div>
        <div class="modal-body">
             <button type="" class="btn btn-danger" id="btn_hapus" >
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
             Delete</button>
             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
             Cancel</button>

      <div class="modal-footer"></div>

    </div>
     
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->




     <!-- modal add -->
            <div class="modal fade" role="dialog" id="editkelas_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kelas: <span id="id_header_edit"></span></h4>
                  </div>
                  <div class="modal-body">
                    <!-- pesan -->
                      <div id="pesan_modal" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Warning!</strong> Kelas is already exist.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                  <forms>
                    <div class="form-group" id="" style="display:none;">
                      <input id="id_edit" name="id_edit" type="text" class="form-control has-error" placeholder="Nama Kelas" value="" />
                    </div>
                    <div class="form-group" id="nama_kelas_edit_er" style="display:;">
                      <input id="nama_kelas_edit" name="nama_kelas_edit" type="text" class="form-control has-error" placeholder="Nama Kelas" value="" />
                    </div>
                    <div class="form-group" style="" id="tingkat_edit_er">
                          <select class="form-control selectpicker" id="tingkat_edit" name="tingkat_edit" style="width:100%;" required >
                             <option value="">Pilih Tingkat</option>
                             <option value="1">1 (Satu)</option>
                             <option value="2">2 (Dua)</option>
                             <option value="3">3 (Tiga)</option>
                          </select>
                      </div> 
                    <div class="form-group" style="" id="shift_edit_er">
                          <select class="form-control selectpicker" id="shift_edit" name="shift_edit" style="width:100%;" required >
                             <option value="">Pilih Shift</option>
                             <option value="Pagi">Pagi</option>
                             <option value="Sore">Sore</option>
                             <option value="Sabtu Minggu">Sabtu Minggu</option>
                          </select>
                      </div> 
                      <div class="form-group" style="" id="pa_edit_er">
                          <select class="form-control selectpicker" id="pa_edit" name="pa_edit" data-live-search="true" data-size="5" style="width:100%;" required >
                             <option value="">Pilih Pembimbing Akademik (PA)</option>
                             <?php 
                                  include '../koneksi/koneksi.php';
                                  $sql_pa = mysqli_query($conn,"SELECT * from karyawan");
                                  while ($row_pa = mysqli_fetch_array($sql_pa)) {
                                      echo '<option value='.$row_pa[0].'>'.$row_pa[1].'</option>';
                                  }

                              ?>
                          </select>
                      </div> 

                             <button type="" class="btn btn-success" id="update" onclick="update()">
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                             Simpan</button>
                             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             Batal</button>
                      </forms>
                    <div class="modal-footer"></div>

                </div>
               
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

                    <!-- modal add -->
            <div class="modal fade" role="dialog" id="addkelas_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Kelas: <span id=""></span></h4>
                  </div>
                  <div class="modal-body">
                    <!-- pesan -->
                      <div id="pesan_modal_add" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Maaf!</strong> Kelas sudah ada.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                  <forms>
                    <div class="form-group" id="" style="display:none;">
                      <input id="validasi" name="validasi" type="text" class="form-control has-error" placeholder="Nim" value="" />
                    </div>
                    <div class="form-group" id="nama_kelas_add_er" style="display:;">
                      <input id="nama_kelas_add" name="nama_kelas_add" type="text" class="form-control has-error" placeholder="Nama Kelas" value="" />
                    </div>
                    <div class="form-group" style="" id="tingkat_add_er">
                          <select class="form-control selectpicker" id="tingkat_add" name="tingkat_add" style="width:100%;" required >
                             <option value="">Pilih Tingkat</option>
                             <option value="1">1 (Satu)</option>
                             <option value="2">2 (Dua)</option>
                             <option value="3">3 (Tiga)</option>
                          </select>
                      </div> 
                    <div class="form-group" style="" id="shift_add_er">
                          <select class="form-control selectpicker" id="shift_add" name="shift_add" style="width:100%;" required >
                             <option value="">Pilih Shift</option>
                             <option value="Pagi">Pagi</option>
                             <option value="Sore">Sore</option>
                             <option value="Sabtu Minggu">Sabtu Minggu</option>
                          </select>
                      </div> 
                      <div class="form-group" style="" id="pa_add_er">
                          <select class="form-control selectpicker" id="pa_add" name="pa_add" style="width:100%;" data-size="5" data-live-search="true" required >
                             <option value="">Pilih Pembimbing Akademik (PA)</option>
                             <?php 
                                  include '../koneksi/koneksi.php';
                                  $sql_pa = mysqli_query($conn,"SELECT * from karyawan");
                                  while ($row_pa = mysqli_fetch_array($sql_pa)) {
                                      echo '<option value='.$row_pa[0].'>'.$row_pa[1].'</option>';
                                  }

                              ?>
                          </select>
                      </div> 

                             <button type="" class="btn btn-success" id="save_data" >
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                             Simpan</button>
                             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             Batal</button>
                      </forms>
                    <div class="modal-footer"></div>

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

                        <form class="form-inline">
                          <div class="form-group">
                              <input type="text" class="form-control" id="search_box"  placeholder="Cari berdasarkan nama">
                          </div>
                          <span id="add_btn" type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Data</span>
                          <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:5%;">ID</th>
                    <th style="width:20%;">Nama Kelas</th>
                    <th style="width:10%;">Tingkat</th>
                    <th style="width:20%;">Shift</th>
                    <th style="width:30%;">PA</th>
                    <th style="width:15%;"></th>
                  </tr>         
                                      <tbody id="data_table">
                                      </tbody>
                                
              </table>

                         <center>
                             <nav>
                             <ul id="page" class="pagination"></ul>
                             </nav>
                         </center>

            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

<style>

    .popover{
        width:400px;
        /*height:250px;   */ 
    }

</style>

<script>
    var form="";/*untuk side bar*/
    $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

    function ambildata_cari(){
      cari = $("#search_box").val();
        dataString1 = "search_box="+cari;
      var data_table = "";
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
              url: "kelas_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='nama_kelas_"+data[i].no+"' > "+data[i].nama_kelas+"</td>"+
                                    "<td id='tingkat_"+data[i].no+"'>"+data[i].tingkat+"</td><td id='shift_"+data[i].no+"' > "+data[i].shift+"</td><td id='pa_"+data[i].no+"' style='display:;'>"+data[i].nama_karyawan+"</td>"+
                                    "<td id='kode_pa_edit_"+data[i].no+"' style='display:none;'> "+data[i].pa+"</td>"+
                          "<td>"+
                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_kelas("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
               }
                $('#data_table').html(data_table);    
              }
          });
    }



          function hapus_kelas(a){
                id_edit = $.trim($("#id_"+a).text());

                $('#buttonhapus_'+a).popover({
                    placement : 'left',
                    title : 'Are you sure delete NIM: '+id_edit,
                    html: true,
                    content : '<button type="button" style="width:40%; margin-right:2px;" onclick="delete_kelas_deal('+id_edit+')" class="btn btn-danger" aria-label="Left Align">'+
                                '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Yes'+
                                '</button>'+
                                '<button type="button" style="width:40%"; class="btn btn-default" onclick="delete_kelas_false('+a+')" aria-label="Left Align">'+
                                '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> No'+
                                '</button>'
                });
                
            }

            /*validasi if true*/
            function delete_kelas_deal(a){
                $.ajax({
                        type: 'GET',
                        url: 'kelas_forms_delete.php?id='+a,
                        data: $(this).serialize(),
                        success: function(data) {
                            ambildata_cari();
                        }
                    });
                //paging();/*memperbarui pagiing*/

            }
            /*validasi if true*/
              function delete_kelas_false(a){
                $("#buttonhapus_"+a).popover('hide');
              }

              function edit(a){

                id_edit = $.trim($("#id_"+a).text());
                kode_pa_edit_ = $.trim($("#kode_pa_edit_"+a).text());
                nama_kelas_edit = $.trim($("#nama_kelas_"+a).text());
                tingkat_edit = $.trim($("#tingkat_"+a).text());
                shift_edit = $.trim($("#shift_"+a).text());
                kelas_edit = $.trim($("#pa_"+a).text());

                id_header_edit = $("#id_header_edit").html(id_edit);

                $.trim($("#id_edit").val(id_edit));
                $.trim($("#nama_kelas_edit").val(nama_kelas_edit));
                $.trim($("#tingkat_edit").val(tingkat_edit));
                $.trim($("#shift_edit").val(shift_edit));
                $.trim($("#pa_edit").val(kode_pa_edit_).change());


                $("#editkelas_modal").modal({backdrop: "static"});
                 $('.selectpicker').selectpicker('refresh');
                //alert(id_kelas);
               
            }
            function update(){
                id_edit = $.trim($("#id_edit").val());
                nama_kelas_edit = $.trim($("#nama_kelas_edit").val());
                tingkat_edit = $.trim($("#tingkat_edit").val());
                shift_edit = $.trim($("#shift_edit").val());
                pa_edit = $.trim($("#pa_edit").val());

                if(nama_kelas_edit==''){
                    $("#nama_kelas_edit_er").addClass("has-error");
                  }else{
                      $("#nama_kelas_edit_er").removeClass("has-error");
                  }
                  if(tingkat_edit==''){
                    $("#tingkat_edit_er").addClass("has-error");
                  }else{
                      $("#tingkat_edit_er").removeClass("has-error");
                  }
                  if(shift_edit==''){
                    $("#shift_edit_er").addClass("has-error");
                  }else{
                      $("#shift_edit_er").removeClass("has-error");
                  }
                  if(pa_edit==''){
                    $("#pa_edit_er").addClass("has-error");
                  }else{
                      $("#pa_edit_er").removeClass("has-error");
                  }

                  if(id_edit!="" && nama_kelas_edit!="" && tingkat_edit!="" && shift_edit!="" && pa_edit!=""){
                      var data1 = 'kelas_forms_update.php?id='+id_edit+"&nama_kelas="+nama_kelas_edit+
                      "&tingkat="+tingkat_edit+"&shift="+shift_edit+"&pa="+pa_edit;

                     $.ajax({
                            type: 'GET',
                            url: data1,
                            data: $(this).serialize(),
                            success: function(data) {
                                ambildata_cari();
                                 $("#editkelas_modal").modal('hide');
                                 paging();
                            }
                        });
                  }
                
            }

            /*paging*/
            function paging(){
                  var countdata='';
                  $.ajax({
                    type: 'GET',
                    url: 'kelas_forms_getcountdata.php',
                    data: $(this).serialize(),
                    success: function(data) {
                      countdata = data;
                      //alert(countdata);
                      $("#page").pagination({
                            items: countdata,
                            itemsOnPage: 10,

                            onPageClick: (function(d,e){
                                var data_table='';
                                $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
                                $.ajax({
                                    type: 'GET',
                                    url: 'kelas_forms_getdata.php?search_box=&halaman='+d,
                                    dataType: 'json',
                                    success: function(data) {
                                      $("#loader").html("");
                                       for (var i =0; i<data.length; i++){
                                              data_table +="<tr><th>"+data[i].no+"</th>"+
                                              "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='nama_kelas_"+data[i].no+"' > "+data[i].nama_kelas+"</td>"+
                                            "<td id='tingkat_"+data[i].no+"'>"+data[i].tingkat+"</td><td id='shift_"+data[i].no+"' > "+data[i].shift+"</td><td id='pa_"+data[i].no+"' style='display:;'>"+data[i].nama_karyawan+"</td>"+
                                            "<td id='kode_pa_edit_"+data[i].no+"' style='display:none;'> "+data[i].pa+"</td>"+
                                              "<td>"+
                                              "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                            "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_kelas("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                            "</td>"+
                                            "</tr>";
                                                 }
                                          $('#data_table').html(data_table); 
                                        }
                                });
                            })
                            
                        });

                    }


                  });
            }

  $(document).ready(function(){

    $("#search_box").keyup(function(){
        ambildata_cari();
    });

     

      /*untuk paging kembali ke awal*/
      $( "#search_box" ).focus(function() {
        $("#page").pagination('selectPage', 1);
          
      });

    

      $("#add_btn").click(function(){
          $("#nama_kelas_add").val("");
           $("#tingkat_add").val("");
           $("#shift_add").val("");
           $("#pa_add").val("");
           $("#pesan_modal_add").css("display","none");
           $("#addkelas_modal").modal({backdrop: "static"});
            $('.selectpicker').selectpicker('refresh');
       });

       /*combox kelas*/
       /*$("#kelas_edit").select2({
         placeholder: "--Pilih Pembimbing Akademik (PA)--",
         allowClear: true
       });*/

      /*tanggal*/
      $('#pointer2').Zebra_DatePicker({  show_icon: false,

          onSelect: function(view, elements){
            document.getElementById("tgl").value=view;
          }
        });
     
      /*combox kelas*/
                /*$("#kelas_mahasiswa_edit").select2({
                  placeholder: "--Pilih Kelas--",
                  allowClear: true
                });*/
                /*ajax comboxbox kelas*/
                var data_kelas='';
                 $.ajax({
                  url: 'mahasiswa_forms_getdatakelas.php',
                  dataType: 'json',
                  success: function(data) {
                     for(var i = 0; i<data.length;i++){
                        data_kelas += '<option value='+data[i].kode+'>'+data[i].nama+'</option>';
                     }
                     /*$("#combo_dosen").html("<option>d</option>");*/
                      $("#kelas_mahasiswa_edit").html("<option value='a'>---Pilih Kelas---</option>"+data_kelas);
                  }

                });


        $("#save_data").click(function(){


                  var nama_kelas_add = $("#nama_kelas_add").val();
                  var tingkat_add = $("#tingkat_add").val();
                  var shift_add = $("#shift_add").val();
                  var pa_add = $("#pa_add").val();

                  if(nama_kelas_add==''){
                    $("#nama_kelas_add_er").addClass("has-error");
                  }else{
                      $("#nama_kelas_add_er").removeClass("has-error");
                  }
                  if(tingkat_add==''){
                    $("#tingkat_add_er").addClass("has-error");
                  }else{
                      $("#tingkat_add_er").removeClass("has-error");
                  }
                  if(shift_add==''){
                    $("#shift_add_er").addClass("has-error");
                  }else{
                      $("#shift_add_er").removeClass("has-error");
                  }
                  if(pa_add==''){
                    $("#pa_add_er").addClass("has-error");
                  }else{
                      $("#pa_add_er").removeClass("has-error");
                  }

                  if(nama_kelas_add!="" && tingkat_add!="" && shift_add!="" && pa_add!=""){

                      var dataString1 = 'nama_kelas='+nama_kelas_add+"&tingkat="+tingkat_add+
                      "&shift="+shift_add+"&pa="+pa_add;
                      
                      $.ajax({
                         url:'kelas_forms_save.php?'+dataString1,
                         success:function(data) {
                         
                            
                            for(var i = 0; i<data.length;i++){
                              data_kelas1 =data;
                           }
                          
                            validasi =  $("#validasi").val(data_kelas1);
                            isi = $("#validasi").val();

                            if(nama_kelas_add!=isi){
                              $("#addkelas_modal").modal('hide');
                              ambildata_cari();
                            }else{
                              $("#pesan_modal_add").css('display','block');
                              //alert();
                            }
                            paging();
                            
                          }
                      });
                  }

                });

  });/*akhir document*/




  $(function() {

    ambildata_cari();
    paging();

  });
  
</script>

</html>

  <?php
}


?>
