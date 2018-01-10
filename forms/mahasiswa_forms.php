<?php
include '../koneksi/koneksi.php';
session_start();


if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Mahasiswa</title>
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




  <!-- modal untuk delete data -->
            <div class="modal fade" role="dialog" id="delete_modal"  >
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
                        <button id="" type="button" style="width:40%"; class="btn btn-default" onclick="" data-dismiss="modal" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true">Tidak</span></button>   
                    </form>
                       
                        

                  </div>
                  <div class="modal-footer">
                   </div>
              

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


     <!-- modal edit -->
            <div class="modal fade" role="dialog" id="editmahasiswa_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Mahasiswa: <span id=""></span></h4>
                  </div>
                  <div class="modal-body">
                  <forms>
                    <div class="form-group" id="nim_mahasiswa_add_edit_er" style="display:;">
                      <input id="nim_mahasiswa_edit" name="nim_mahasiswa_edit" type="text" class="form-control has-error numeric" readonly placeholder="Nim" value="" />
                    </div>
                    <div class="form-group" id="nama_mahasiswa_add_edit_er">
                        <input id="nama_mahasiswa_edit" name="nama_mahasiswa_edit" type="text" class="form-control has-error" onkeypress="return isHuruf(event)"  placeholder="Nama Mahasiswa" value="" />
                    </div>
                      <div class="form-group" id="kelas_mahasiswa_add_edit_er">
                          <select class="form-control selectpicker" id="kelas_mahasiswa_edit" name="kelas_mahasiswa_edit" data-size="5" data-live-search="true" title="Pilih Kelas" style="width:100%;" required >
                             
                          </select>
                      </div> 
                      <div class="form-group" id="jurusan_mahasiswa_add_edit_er">
                          <select class="form-control selectpicker" id="jurusan_mahasiswa_edit" name="jurusan_mahasiswa_edit" style="width:100%;" required >
                             <option value="">Pilih Jurusan</option>
                             <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                             <option value="Hubungan Masyarakat">Hubungan Masyarakat</option>
                             <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                             <option value="Manajemen Informatika">Manajemen Informatika</option>
                          </select>
                      </div> 
                      <div class="form-group" id="notlp_add_edit_er" style="display:;">
                        <input id="notlp_add_edit" name="notlp_add_edit" type="text" maxlength="13" class="form-control has-error numeric" onkeypress="return isNumberKey(event)" placeholder="No Tlp" value="" />
                      </div>


                             <button type="" class="btn btn-success" id="update_data" onclick="update()">
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                             Save</button>
                             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             Cancel</button>
                      </forms>
                    <div class="modal-footer"></div>

                </div>
               
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            <!-- modal add -->
            <div class="modal fade" role="dialog" id="addmahasiswa_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Mahasiswa: <span id=""></span></h4>
                  </div>
                  <div class="modal-body">
                    <!-- pesan -->
                      <div id="pesan_modal" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Maaf!</strong> NIM Sudah Ada.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                  <forms>
                    <div class="form-group" id="" style="display:none;">
                      <input id="validasi" name="validasi" type="text" class="form-control has-error" placeholder="Nim" value="" />
                    </div>
                    <div class="form-group" id="nim_mahasiswa_add_er" style="display:;">
                      <input id="nim_mahasiswa_add" name="nim_mahasiswa_add" type="text" class="form-control has-error numeric" onkeypress="return isNumberKey(event)" placeholder="Nim" value="" />
                    </div>
                    <div class="form-group" id="nama_mahasiswa_add_er">
                        <input id="nama_mahasiswa_add" name="nama_mahasiswa_add" type="text" class="form-control has-error" onkeypress="return isHuruf(event)" placeholder="Nama Mahasiswa" value="" />
                    </div>
                      <div class="form-group" style="" id="kelas_mahasiswa_add_er">
                          <select class="form-control selectpicker" data-size="5" data-live-search="true" id="kelas_mahasiswa_add" title="Pilih Kelas" name="kelas_mahasiswa_add" style="width:100%;" required >
                             
                          </select>
                      </div> 
                      <div class="form-group" style="" id="jurusan_mahasiswa_add_er">
                          <select class="form-control selectpicker" id="jurusan_mahasiswa_add" name="jurusan_mahasiswa_add" style="width:100%;" required >
                             <option value="">--Pilih Jurusan--</option>
                             <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                             <option value="Hubungan Masyarakat">Hubungan Masyarakat</option>
                             <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                             <option value="Manajemen Informatika">Manajemen Informatika</option>
                          </select>
                      </div>
                      <div class="form-group" id="notlp_add_er" style="display:;">
                        <input id="notlp_add" name="notlp_add" type="text" class="form-control has-error numeric" onkeypress="return isNumberKey(event)" placeholder="No Tlp" value="" />
                      </div> 


                             <button type="" class="btn btn-success" id="save_data" >
                                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                             Save</button>
                             <button type="reset" class="btn btn-default" onclick="" data-dismiss="modal" >
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                             Cancel</button>
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
                              <input type="text" class="form-control" id="search_box"  placeholder="Cari">
                          </div>
                          <span id="add_btn" type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Data</span>
                          <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:10%;">NIM</th>
                    <th style="width:25%;">Nama Mahasiswa</th>
                    <th style="width:10%;">Kelas</th>
                    <th style="width:20%;">Jurusan</th>
                    <th style="width:20%;">No Tlp</th>
                    <th style="width:10%;"></th>
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
              url: "mahasiswa_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='nim_"+data[i].no+"'>"+data[i].nim+"</td><td id='nama_"+data[i].no+"' > "+data[i].nama+"</td>"+
                                    "<td id='kelas_"+data[i].no+"'>"+data[i].kelas+"</td><td id='jurusan_"+data[i].no+"' > "+data[i].jurusan+"</td><td id='notlp_"+data[i].no+"' > "+data[i].notlp+"</td><td id='idkelas_"+data[i].no+"' style='display:none;'>"+data[i].id_kelas+"</td>"+
                          "<td>"+
                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_mahasiswa("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
               }
                $('#data_table').html(data_table);    
              }
          });
    }



          function hapus_mahasiswa(a){
                nim_hapus = $("#nim_"+a).text();
                $("#setId_del").val(nim_hapus);
                //alert(nim_hapus);
                $("#delete_modal").modal({backdrop: "static"});

          }

            /*validasi if true*/
            function delete_true(){
              getid = $("#setId_del").val();
                $.ajax({
                        type: 'GET',
                        url: 'mahasiswa_forms_delete.php?nim='+getid,
                        data: $(this).serialize(),
                        success: function(data) {
                            ambildata_cari();
                             $("#delete_modal").modal('hide');
                             paging();
                        }
                    });
            }

              function edit(a){

    

                nim_edit = $.trim($("#nim_"+a).text());
                nama_edit = $.trim($("#nama_"+a).text());
                kelas_edit = $.trim($("#kelas_"+a).text());
                jurusanedit = $.trim($("#jurusan_"+a).text());
                id_kelas = $.trim($("#idkelas_"+a).text());
                tlp_edit = $.trim($("#notlp_"+a).text());

                $.trim($("#nim_mahasiswa_edit").val(nim_edit));
                $.trim($("#nama_mahasiswa_edit").val(nama_edit));
                $.trim($("#kelas_mahasiswa_edit").val(id_kelas).change());
                $.trim($("#jurusan_mahasiswa_edit").val(jurusanedit));
                $.trim($("#notlp_add_edit").val(tlp_edit));

                //alert(tlp_edit);

                $("#editmahasiswa_modal").modal({backdrop: "static"});
                $('.selectpicker').selectpicker('refresh');
               
            }
            function update(){

                    var nim_mahasiswa_edit = $.trim($("#nim_mahasiswa_edit").val());
                    var nama_mahasiswa_edit = $.trim($("#nama_mahasiswa_edit").val());
                    var kelas_mahasiswa_edit = $.trim($("#kelas_mahasiswa_edit").val());
                    var jurusan_mahasiswa_edit = $.trim($("#jurusan_mahasiswa_edit").val());
                    var notlp_edit = $.trim($("#notlp_add_edit").val());
                    
                    if(nim_mahasiswa_edit==""){
                      $("#nim_mahasiswa_add_edit_er").addClass('has-error');
                    }else{
                      $("#nim_mahasiswa_add_edit_er").removeClass('has-error');
                    }
                    if(nama_mahasiswa_edit==""){
                      $("#nama_mahasiswa_add_edit_er").addClass('has-error');
                    }else{
                      $("#nama_mahasiswa_add_edit_er").removeClass('has-error');
                    }
                    if(kelas_mahasiswa_edit==""){
                      $("#kelas_mahasiswa_add_edit_er").addClass('has-error');
                    }else{
                      $("#kelas_mahasiswa_add_edit_er").removeClass('has-error');
                    }
                    if(jurusan_mahasiswa_edit==""){
                      $("#jurusan_mahasiswa_add_edit_er").addClass('has-error');
                    }else{
                      $("#jurusan_mahasiswa_add_edit_er").removeClass('has-error');
                    }
                    if(notlp_edit==""){
                      $("#notlp_add_edit_er").addClass('has-error');
                    }else{
                      $("#notlp_add_edit_er").removeClass('has-error');
                    }
                    
                    if(notlp_edit!="" && nim_mahasiswa_edit!="" && nama_mahasiswa_edit!="" && kelas_mahasiswa_edit!="" && jurusan_mahasiswa_edit!=""){
                        
                        nim_edit = $.trim($("#nim_mahasiswa_edit").val());
                        nama_edit = $.trim($("#nama_mahasiswa_edit").val());
                        kelas_edit = $.trim($("#kelas_mahasiswa_edit").val());
                        jurusanedit = $.trim($("#jurusan_mahasiswa_edit").val());

                        var data = 'mahasiswa_forms_update.php?nim='+nim_edit+"&nama="+nama_edit+
                          "&kelas="+kelas_edit+"&jurusan="+jurusanedit+"&notlp="+notlp_edit;

                         $.ajax({
                                type: 'GET',
                                url: data,
                                data: $(this).serialize(),
                                success: function(data) {
                                    ambildata_cari();
                                     $("#editmahasiswa_modal").modal('hide');
                                }
                        });        
                    }



                
            }

            /*paging*/
            function paging(){
              var countdata='';
              $.ajax({
                    type: 'GET',
                    url: 'mahasiswa_forms_getcountdata.php',
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
                                  url: 'mahasiswa_forms_getdata.php?search_box=&halaman='+d,
                                  dataType: 'json',
                                  success: function(data) {
                                    $("#loader").html("");
                                     for (var i =0; i<data.length; i++){
                                           data_table +="<tr><th>"+data[i].no+"</th>"+
                                                          "<td id='nim_"+data[i].no+"'>"+data[i].nim+"</td><td id='nama_"+data[i].no+"' > "+data[i].nama+"</td>"+
                                                          "<td id='kelas_"+data[i].no+"'>"+data[i].kelas+"</td><td id='jurusan_"+data[i].no+"' > "+data[i].jurusan+"</td><td id='notlp_"+data[i].no+"' > "+data[i].notlp+"</td><td id='idkelas_"+data[i].no+"' style='display:none;'>"+data[i].id_kelas+"</td>"+
                                                          "<td>"+
                                                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                                          "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_mahasiswa("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
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

  /*angka*/
  function isNumberKey(evt)
  {
     var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
        return true;
  }
   /*huruf*/
  function isHuruf(evt)
  {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
        return true;
    }

  $(document).ready(function(){

    /*hrurf*/
    $('.huruf').bind('keyup blur',function(){ 
      this.value = this.value.replace(/[^a-zA-Z-' ']/g, '');
    });

    $("#search_box").keyup(function(){
        ambildata_cari();
    });
      /*untuk paging kembali ke awal*/
      $( "#search_box" ).focus(function() {
        $("#page").pagination('selectPage', 1);
          
      });

      var data_kelas1='';
       $.ajax({
        url: 'mahasiswa_forms_getdatakelas.php',
        dataType: 'json',
        success: function(data1) {
           for(var i = 0; i<data1.length;i++){
              data_kelas1 += '<option value='+data1[i].kode+'>'+data1[i].nama+'</option>';
           }
            $("#kelas_mahasiswa_add").html('<option value="">Pilih Kelas</option>'+data_kelas1);
            $('.selectpicker').selectpicker('refresh');
        }

      });

       /*save data*/

       $("#save_data").click(function(){
        var nim_mahasiswa_add = $.trim($("#nim_mahasiswa_add").val());
        var nama_mahasiswa_add = $.trim($("#nama_mahasiswa_add").val());
        var kelas_mahasiswa_add = $.trim($("#kelas_mahasiswa_add").val());
        var jurusan_mahasiswa_add = $.trim($("#jurusan_mahasiswa_add").val());
        var notlp_add = $.trim($("#notlp_add").val());
        
        if(nim_mahasiswa_add==""){
          $("#nim_mahasiswa_add_er").addClass('has-error');
        }else{
          $("#nim_mahasiswa_add_er").removeClass('has-error');
        }
        if(nama_mahasiswa_add==""){
          $("#nama_mahasiswa_add_er").addClass('has-error');
        }else{
          $("#nama_mahasiswa_add_er").removeClass('has-error');
        }
        if(kelas_mahasiswa_add==""){
          $("#kelas_mahasiswa_add_er").addClass('has-error');
        }else{
          $("#kelas_mahasiswa_add_er").removeClass('has-error');
        }
        if(jurusan_mahasiswa_add==""){
          $("#jurusan_mahasiswa_add_er").addClass('has-error');
        }else{
          $("#jurusan_mahasiswa_add_er").removeClass('has-error');
        }
        if(notlp_add==""){
          $("#notlp_add_er").addClass('has-error');
        }else{
          $("#notlp_add_er").removeClass('has-error');
        }
        
        if(nim_mahasiswa_add!="" && nama_mahasiswa_add!="" && kelas_mahasiswa_add!="" && jurusan_mahasiswa_add!=""){
            var dataString1 = 'nim='+nim_mahasiswa_add+"&nama="+nama_mahasiswa_add+
                  "&kelas="+kelas_mahasiswa_add+"&jurusan="+jurusan_mahasiswa_add+"&notlp="+notlp_add;
                  
                  $.ajax({
                     url:'mahasiswa_forms_save.php?'+dataString1,
                     success:function(data) {
                      
                        
                        for(var i = 0; i<data.length;i++){
                          data_kelas1 =data;
                       }
                      
                        validasi =  $("#validasi").val(data_kelas1);
                        isi = $("#validasi").val();

                        if(nim_mahasiswa_add!=isi){
                          $("#addmahasiswa_modal").modal('hide');
                          ambildata_cari();
                        }else{
                          $("#pesan_modal").css('display','block');
                          
                        }

                        paging();
                      }
                  });
            }

      });


      $("#add_btn").click(function(){
        
        $('.selectpicker').selectpicker('refresh');
         $("#addmahasiswa_modal").modal({backdrop: "static"});
      });

      /*tanggal*/
      $('#pointer2').Zebra_DatePicker({  show_icon: false,

          onSelect: function(view, elements){
            document.getElementById("tgl").value=view;
          }
        });
     
              
                var data_kelas='';
                 $.ajax({
                  url: 'mahasiswa_forms_getdatakelas.php',
                  dataType: 'json',
                  success: function(data) {
                     for(var i = 0; i<data.length;i++){
                        data_kelas += '<option value='+data[i].kode+'>'+data[i].nama+'</option>';
                     }
                     /*$("#combo_dosen").html("<option>d</option>");*/
                      $("#kelas_mahasiswa_edit").html('<option value="">Pilih Kelas</option>'+data_kelas);
                      $('.selectpicker').selectpicker('refresh');
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
