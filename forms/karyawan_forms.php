<?php
include '../koneksi/koneksi.php';
session_start();


if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Karyawan</title>
<html lang="en" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- favicon -->
<link rel="icon" href="../images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


<link rel="stylesheet" type="text/css" href="../css/simple-sidebar.css">


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
            <div class="modal fade" role="dialog" id="editkaryawan_modal"  >
              <div class="modal-dialog" style="width:550px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Karyawan <span id="title_edit"></span></h4>
                  </div>
                  <div class="modal-body">
                  <forms>
                    <div class="form-group" id="" style="display:;">
                      <input id="kode_karyawan" name="kode_karyawan" type="text" class="form-control has-error" placeholder="" readonly="" value="<?php echo $data;?>" />
                    </div>
                    <div class="form-group" id="nama_error">
                              <input id="nama_karyawan" name="nama_karyawan" type="text" class="form-control has-error" onkeypress="return isHuruf(event)" placeholder="Nama Dosen" value="<?php  ?>" />
                    </div>
                    <div class="form-group" id="tanggal_error">
                          <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                              <input class="form-control cek_date1" size="5" type="text" name="tgl" id="tgl"  placeholder="Date" required readonly="" value="<?php  ?>">
                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="pointer2" style="cursor:pointer;" ></span></span>
                          </div>
                      </div>
                      <div class="form-group" id="tempat_error">
                          <input id="tempat_lahir" name="tempat_lahir" type="text" class="form-control" placeholder="Tempat lahir" onkeypress="return isHuruf(event)" value="<?php  ?>" />
                      </div>
                      <div class="form-group" id="tlp_error">
                          <input id="tlp" name="tlp" type="numeric" class="form-control" placeholder="No Tlp" onkeypress="return isNumberKey(event)" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" id="alamat_error">
                          <textarea class="form-control" rows="3" style="max-width:555px; max-height:170px;" type="" onkeypress="return isHuruf(event)" name="alamat" id="alamat" placeholder="Alamat" required><?php  ?></textarea>
                      </div>
                      <div class="form-group" id="username_edit_err">
                          <input id="username_edit"  type="" maxlength="13" onkeypress="return isHuruf(event)" class="form-control" placeholder="Username" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" id="password_edit_err">
                          <input id="password_edit"  type="password" maxlength="13" class="form-control" placeholder="Password" value="<?php  ?>"/>
                      </div>
                      <div class="form-group" style="margin-top:0px;" id="jabatan_edit_err">
                            <select class="form-control selectpicker"  data-size="10"  id="jabatan_edit"  style="margin-left:0px;">
                                <option value="">Level</option>
                                <option value="user">User</option>
                                <option value="super user">Super User</option>
                            </select>
                        </div>


                             <button type="" class="btn btn-success" id="" onclick="update()" >
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
                    <th style="width:8%;">Kode Karyawan</th>
                    <th style="width:12%;">Nama Karyawan</th>
                    <th style="width:10%;">Tanggal Lahir</th>
                    <th style="width:10%;">Tempat Lahir</th>
                    <th style="width:10%;">Alamat</th>
                    <th style="width:10%;">No Tlp</th>
                    <th style="width:10%;">Username</th>
                    <th style="width:10%;" hidden>Password</th>
                    <th style="width:10%;">Level</th>
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

<script>
var form="";/*untuk side bar*/
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

    $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });
                                    //"<td id='username_"+data[i].no+"' > "+data[i].username+"</td><td hidden id='pass_"+data[i].no+"' > "+data[i].password+"</td><td id='level_"+data[i].no+"' > "+data[i].level+"</td>"
    function ambildata_cari(){
      cari = $("#search_box").val();
        dataString1 = "search_box="+cari;
      var data_table = "";
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
              url: "karyawan_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='kode_karyawan_"+data[i].no+"'>"+data[i].kode_karyawan+"</td><td id='nama_karyawan_"+data[i].no+"' > "+data[i].nama_karyawan+"</td>"+
                                    "<td id='tanggal_lahir_"+data[i].no+"'>"+data[i].tanggal_lahir+"</td><td id='tempat_lahir_"+data[i].no+"' > "+data[i].tempat_lahir+"</td>"+
                                    "<td id='alamat_"+data[i].no+"'>"+data[i].alamat+"</td><td id='no_tlp_"+data[i].no+"' > "+data[i].no_tlp+"</td>"+
                                    "<td id='username_"+data[i].no+"' > "+data[i].username+"</td>"+
                                    "<td id='level_"+data[i].no+"' > "+data[i].level+"</td>"+
                                    "<td hidden id='pass_"+data[i].no+"' > "+data[i].password+"</td>"+
                          "<td>"+
                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='hapus_karyawan("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
               }
                $('#data_table').html(data_table);    
              }
          });
    }



          function hapus_karyawan(a){
                $("#delete_modal").modal({backdrop: "static"});

                kode_karyawan_hapus = $("#kode_karyawan_"+a).text();
                $("#setId_del").val(kode_karyawan_hapus);
                
          }
          function delete_true(){
            kode_del =  $("#setId_del").val();

            $.ajax({
                type: 'GET',
                url: 'karyawan_forms_delete.php?kode_karyawan='+kode_del,
                data: $(this).serialize(),
                success: function(data) {
                    ambildata_cari();
                    $("#delete_modal").modal('hide');
                    paging();
                }
            });
          }

            function edit(a){
                kode_karyawan_hapus =   $.trim($("#kode_karyawan_"+a).text());
                kode_nama_hapus =   $.trim($("#nama_karyawan_"+a).text());
                kode_tanggal_hapus = $.trim($("#tanggal_lahir_"+a).text());
                kode_tempat_hapus = $.trim($("#tempat_lahir_"+a).text());
                kode_alamat_hapus = $.trim($("#alamat_"+a).text());
                kode_notlp_hapus = $.trim($("#no_tlp_"+a).text());
                kode_user = $.trim($("#username_"+a).text());
                kode_jab = $.trim($("#level_"+a).text());
                kode_pass = "";

                $.trim($("#kode_karyawan").val(kode_karyawan_hapus));
                $.trim($("#nama_karyawan").val(kode_nama_hapus));
                $.trim($("#tgl").val(kode_tanggal_hapus));
                $.trim($("#tempat_lahir").val(kode_tempat_hapus));
                $.trim($("#alamat").val(kode_alamat_hapus));
                $.trim($("#tlp").val(kode_notlp_hapus));
                $.trim($("#username_edit").val(kode_user));
                $.trim($("#password_edit").val(kode_pass));
                $.trim($("#jabatan_edit").val(kode_jab));


                 $("#editkaryawan_modal").modal({backdrop: "static"});

               
            }
            function update(){
                kode_karyawan_hapus =   $.trim($("#kode_karyawan").val());
                kode_nama_hapus =   $.trim($("#nama_karyawan").val());
                kode_tanggal_hapus = $.trim($("#tgl").val());
                kode_tempat_hapus = $.trim($("#tempat_lahir").val());
                kode_alamat_hapus = $.trim($("#alamat").val());
                kode_notlp_hapus = $.trim($("#tlp").val());
                kode_user = $.trim($("#username_edit").val());
                kode_pass = $.trim($("#password_edit").val());
                kode_jab = $.trim($("#jabatan_edit").val());

                  if(kode_nama_hapus==''){
                    $("#nama_error").addClass("has-error");
                  }else{
                      $("#nama_error").removeClass("has-error");
                  }
                  if(kode_tanggal_hapus==''){
                    $("#tanggal_error").addClass("has-error");
                  }else{
                      $("#tanggal_error").removeClass("has-error");
                  }
                  if(kode_tempat_hapus==''){
                    $("#tempat_error").addClass("has-error");
                  }else{
                      $("#tempat_error").removeClass("has-error");
                  }
                  if(kode_notlp_hapus==''){
                    $("#tlp_error").addClass("has-error");
                  }else{
                      $("#tlp_error").removeClass("has-error");
                  }
                  if(kode_alamat_hapus==''){
                    $("#alamat_error").addClass("has-error");
                  }else{
                    $("#alamat_error").removeClass("has-error");
                  }
                  if(kode_user==''){
                    $("#username_edit_err").addClass("has-error");
                  }else{
                      $("#username_edit_err").removeClass("has-error");
                  }
                  if(kode_pass==''){
                    $("#password_edit_err").addClass("has-error");
                  }else{
                      $("#password_edit_err").removeClass("has-error");
                  }
                  if(kode_jab==''){
                    $("#jabatan_edit_err").addClass("has-error");
                  }else{
                    $("#jabatan_edit_err").removeClass("has-error");
                  }

                   if(kode_nama_hapus!="" && kode_tanggal_hapus!="" && kode_tempat_hapus!=""
                    && kode_alamat_hapus!="" && kode_notlp_hapus!="" && kode_user!="" && kode_pass!="" && kode_jab!=""){

                      var data = 'karyawan_forms_update.php?kode_karyawan='+kode_karyawan_hapus+"&nama_karyawan="+kode_nama_hapus+
                              "&tanggal_lahir="+kode_tanggal_hapus+"&tempat_lahir="+kode_tempat_hapus
                              +"&alamat="+kode_alamat_hapus+"&no_tlp="+kode_notlp_hapus
                              +"&username="+kode_user+"&password="+kode_pass+"&jabatan="+kode_jab;
                            

                             $.ajax({
                                    type: 'GET',
                                    url: data,
                                    data: $(this).serialize(),
                                    success: function(data) {
                                        ambildata_cari();
                                         $("#editkaryawan_modal").modal('hide');
                                    }
                                });

                   }
                


                
                //alert(data);
            }

  $(document).ready(function(){

    $("#search_box").keydown(function(){
        ambildata_cari();
    });

    

      /*untuk paging kembali ke awal*/
      $( "#search_box" ).focus(function() {
        $("#page").pagination('selectPage', 1);
          
      });
       
      $("#add_btn").click(function(){
             $.ajax({
                type: 'GET',
                url: 'karyawan_forms_add.php',
                data: $(this).serialize(),
                success: function(data) {
                    $('#pesan').html(data);  
                    $("#addkaryawan_modal").modal({backdrop: "static"});
                }
            });

      });

      /*tanggal*/
      $('#pointer2').Zebra_DatePicker({  show_icon: false,

          onSelect: function(view, elements){
            document.getElementById("tgl").value=view;
          }
        });
     


  });/*akhir document*/

  $(function() {

    ambildata_cari();
    paging();
  });

  function paging(){
      var countdata='';
      $.ajax({
            type: 'GET',
            url: 'karyawan_forms_getcountdata.php',
            data: $(this).serialize(),
            success: function(data) {
              countdata = data;

                  $("#page").pagination({
                    items: countdata,
                    itemsOnPage: 10,

                    onPageClick: (function(d,e){
                        var data_table='';
                        $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
                        $.ajax({
                            type: 'GET',
                            url: 'karyawan_forms_getdata.php?search_box=&halaman='+d,
                            dataType: 'json',
                            success: function(data) {
                              $("#loader").html("");
                               for (var i =0; i<data.length; i++){
                                     data_table +="<tr><th>"+data[i].no+"</th>"+
                                                  "<td id='kode_karyawan_"+data[i].no+"'>"+data[i].kode_karyawan+"</td><td id='nama_karyawan_"+data[i].no+"' > "+data[i].nama_karyawan+"</td>"+
                                                            "<td id='tanggal_lahir_"+data[i].no+"'>"+data[i].tanggal_lahir+"</td><td id='tempat_lahir_"+data[i].no+"' > "+data[i].tempat_lahir+"</td>"+
                                                            "<td id='alamat_"+data[i].no+"'>"+data[i].alamat+"</td><td id='no_tlp_"+data[i].no+"' > "+data[i].no_tlp+"</td>"+
                                                            "<td id='username_"+data[i].no+"' > "+data[i].username+"</td>"+
                                                            "<td id='level_"+data[i].no+"' > "+data[i].level+"</td>"+
                                                            "<td hidden id='pass_"+data[i].no+"' > "+data[i].password+"</td>"+
                                                  "<td>"+
                                                  "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                                            "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='hapus_karyawan("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
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
  
</script>

</html>

  <?php
}


?>
