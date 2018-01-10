<?php
include '../koneksi/koneksi.php';
session_start();


if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

        
<!DOCTYPE html>
<title>Form Petugas</title>
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
  .modal-header{
    cursor: move;
  }
</style>
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
            <div class="modal fade" role="dialog" id="edit_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Petugas: <span id=""></span></h4>
                  </div>
                  <div class="modal-body">
                  <!-- pesan -->
                      <div id="pesan_modal_edit" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Maaf!</strong> Nama Kelas Sudah Ada.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                  <forms>
                    <div class="form-group" id="" style="display:none;">
                      <input id="validasi_edit" name="validasi_edit" type="text" class="form-control" placeholder="validasi" value="" />
                    </div>

                    <div class="form-group" id="kode_edit_er" style="display:;">
                      <input id="kode_edit" name="kode_edit" type="text" class="form-control has-error numeric" onkeypress="return isNumberKey(event)" placeholder="" value="" readonly="" />
                    </div>
                    
                    <div class="form-group" id="nama_edit_er">
                        <input id="nama_edit" name="nama_edit" type="text" class="form-control has-error" onkeyup="this.value = this.value.toUpperCase()" placeholder="Username" value="" />
                    </div>
                    <div class="form-group" id="pass_edit_er">
                        <input id="pass_edit" name="pass_edit" type="password" class="form-control has-error" onkeyup="" placeholder="Password" value="" />
                    </div>
                      <div class="form-group" style="" id="jenis_edit_er">
                          <select class="form-control selectpicker" data-size="5" id="jenis_edit" title="" name="jenis_edit" style="width:100%;" required >
                            <option value="">Pilih Akses</option>
                            <option value="Super User">Super User</option>
                             <option value="User">User</option>
                          </select>
                      </div>
                             <button type="" class="btn btn-success" onclick="update()" >
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
            <div class="modal fade" role="dialog" id="add_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Petugas: <span id=""></span></h4>
                  </div>
                  <div class="modal-body">
                  <!-- pesan -->
                      <div id="pesan_modal" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Maaf!</strong> Username Sudah Ada.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                  <forms>
                    <div class="form-group" id="" style="display:none;">
                      <input id="validasi" name="validasi" type="text" class="form-control" placeholder="validasi" value="" />
                    </div>

                    <div class="form-group" id="kode_add_er" style="display:;">
                      <input id="kode_add" name="kode_add" type="text" class="form-control has-error numeric" onkeypress="return isNumberKey(event)" placeholder="Kode" value="" readonly="" />
                    </div>
                    
                    <div class="form-group" id="nama_add_er">
                        <input id="nama_add" name="nama_add" type="text" class="form-control has-error" onkeyup="this.value = this.value.toUpperCase()" placeholder="Username" value="" />
                    </div>
                     <div class="form-group" id="pass_add_er">
                        <input id="pass_add" name="pass_add" type="password" class="form-control has-error" onkeyup="" placeholder="Password" value="" />
                    </div>
                      <div class="form-group" style="" id="jenis_add_er">
                          <select class="form-control selectpicker" data-size="5" id="jenis_add" title="" name="jenis_add" style="width:100%;" required >
                            <option value="">Pilih Akses</option>
                            <option value="Super User">Super User</option>
                             <option value="User">User</option>
                          </select>
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
                    <th style="width:20%;">Kode Petugas</th>
                    <th style="width:25%;">Username</th>
                    <th style="width:20%;">Password</th>
                    <th style="width:20%;">Hak Akses</th>
                    <th style="width:8%;"></th>
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
              url: "petugas_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='kode_"+data[i].no+"'>"+data[i].kode+"</td><td id='nama_"+data[i].no+"' > "+data[i].nama+"</td>"+
                                    "<td id='password_"+data[i].no+"'>"+data[i].pass+"</td><td id='jabatan_"+data[i].no+"'>"+data[i].jabatan+"</td>"+
                          "<td>"+
                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
               }
                $('#data_table').html(data_table);    
              }
          });
    }



          function hapus_(a){
                kode_hapus = $("#kode_"+a).text();
                $("#setId_del").val(kode_hapus);
                //alert(nim_hapus);
                $("#delete_modal").modal({backdrop: "static"});

          }

            /*validasi if true*/
            function delete_true(){
              getid = $("#setId_del").val();
                $.ajax({
                        type: 'GET',
                        url: 'petugas_forms_delete.php?kode='+getid,
                        data: $(this).serialize(),
                        success: function(data) {
                            ambildata_cari();
                             $("#delete_modal").modal('hide');
                             paging();
                        }
                    });
            }

          function edit(a){
                $("#kode_edit").val('');
                $("#nama_edit").val('');
                $("#jenis_edit").val('');
                $("#pass_edit").val('');

                kode_edit = $.trim($("#kode_"+a).text());
                nama_edit = $.trim($("#nama_"+a).text());
                jabatan_edit = $.trim($("#jabatan_"+a).text());
                pass_edit = $.trim($("#password_"+a).text());

                $.trim($("#kode_edit").val(kode_edit));
                $.trim($("#nama_edit").val(nama_edit));
                $.trim($("#jenis_edit").val(jabatan_edit));
                $.trim($("#pass_edit").val(pass_edit));


                $("#edit_modal").modal({backdrop: "static"});
                $('.selectpicker').selectpicker('refresh');
               
            }
            function update(){
                    

                    var kode_edit = $.trim($("#kode_edit").val());
                    var nama_edit = $.trim($("#nama_edit").val());
                    var jenis_edit = $("#jenis_edit").val();
                    var pass_edit = $("#pass_edit").val();
                    
                    if(kode_edit==""){
                      $("#kode_edit_er").addClass('has-error');
                    }else{
                      $("#kode_edit_er").removeClass('has-error');
                    }
                    if(nama_edit==""){
                      $("#nama_edit_er").addClass('has-error');
                    }else{
                      $("#nama_edit_er").removeClass('has-error');
                    }
                    if(jenis_edit==""){
                      $("#jenis_edit_er").addClass('has-error');
                    }else{
                      $("#jenis_edit_er").removeClass('has-error');
                    }
                    
                    if(nama_edit!="" && jenis_edit!="" && pass_edit!=""){

                        var dataString1 = 'kode='+kode_edit+"&nama="+nama_edit+
                            "&jabatan="+jenis_edit+"&pass="+pass_edit;

                              var data_ruangan1='';
                              $.ajax({
                                 url:'petugas_forms_update.php?'+dataString1,
                                 success:function(data_r) {
                                  
                                    
                                    for(var i = 0; i<data_r.length;i++){
                                      data_ruangan1 =data_r;
                                   }
                                  
                                    validasi =  $("#validasi_edit").val(data_ruangan1);
                                    isi = $("#validasi_edit").val();

                                
                                     $("#edit_modal").modal('hide');
                                      ambildata_cari();
                                      //alert(data_r);
                                      paging();
                                    //alert(data_r);
                                  }
                              });
                        }
                
            }

            /*paging*/
            function paging(){
              var countdata='';
              $.ajax({
                    type: 'GET',
                    url: 'petugas_forms_getcountdata.php',
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
                                  url: 'petugas_forms_getdata.php?search_box=&halaman='+d,
                                  dataType: 'json',
                                  success: function(data) {
                                    $("#loader").html("");
                                     for (var i =0; i<data.length; i++){
                                           data_table +="<tr><th>"+data[i].no+"</th>"+
                                                        "<td id='kode_"+data[i].no+"'>"+data[i].kode+"</td><td id='nama_"+data[i].no+"' > "+data[i].nama+"</td>"+
                                                                  "<td id='password_"+data[i].no+"'>"+data[i].pass+"</td><td id='jabatan_"+data[i].no+"'>"+data[i].jabatan+"</td>"+
                                                        "<td>"+
                                                        "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                                                  "<a href='javascript:void(0)' class='col-md-1' id='buttonhapus_"+data[i].no+"'><span onclick='hapus_("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
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

     /*drag*/
     $("#add_modal").draggable({
          handle: ".modal-header"
      });
     $("#edit_modal").draggable({
          handle: ".modal-header"
      });
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


       /*save data*/

       $("#save_data").click(function(){
       

        var kode_add = $.trim($("#kode_add").val());
        var nama_add = $.trim($("#nama_add").val());
        var jenis_add =$("#jenis_add").val();
        var pass_add =$("#pass_add").val();
        
        if(kode_add==""){
          $("#kode_add_er").addClass('has-error');
        }else{
          $("#kode_add_er").removeClass('has-error');
        }
        if(nama_add==""){
          $("#nama_add_er").addClass('has-error');
        }else{
          $("#nama_add_er").removeClass('has-error');
        }
        if(jenis_add==""){
          $("#jenis_add_er").addClass('has-error');
        }else{
          $("#jenis_add_er").removeClass('has-error');
        }
        if(pass_add==""){
          $("#pass_add_er").addClass('has-error');
        }else{
          $("#pass_add_er").removeClass('has-error');
        }
        
        if(nama_add!="" && jenis_add!=""){

            var dataString1 = 'kode='+kode_add+"&nama="+nama_add+
                  "&jabatan="+jenis_add+"&pass="+pass_add;
                  var data_ruangan1='';
                  $.ajax({
                     url:'petugas_forms_save.php?'+dataString1,
                     success:function(data_r) {
                      
                        
                        for(var i = 0; i<data_r.length;i++){
                          data_ruangan1 =data_r;
                       }
                      
                        validasi =  $("#validasi").val(data_ruangan1);
                        isi = $("#validasi").val();

                        if(nama_add!=isi){
                          $("#add_modal").modal('hide');
                          ambildata_cari();
                        }else{
                          $("#pesan_modal").css('display','block');
                          
                        }

                        paging();
                        //alert(data_r);
                      }
                  });
            }

      });


      $("#add_btn").click(function(){
         $("#pesan_modal").css('display','none');
         $("#kode_add").val('');
          $("#nama_add").val('');
          $("#jenis_add").val('');
          $.ajax({
              type: 'GET',
              url: 'petugas_forms_getkode.php',
              data: $(this).serialize(),
              success: function(data) {
                  $('#kode_add').val(data);
              }
          });

          $('.selectpicker').selectpicker('refresh');
         $("#add_modal").modal({backdrop: "static"});
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
