<?php 
    include '../koneksi/koneksi.php';

    session_start();



if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Pemesan</title>
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
$logout="";
?>
<body style="background-color:#C7C8BF">

    <div id="wrapper" style="">
        
        <?php require_once '../side_bar.php'; ?>
        
      <div style="width:20px; height:10%; background-color:#2267CE; float:left;">
        <div style="width:390%; height:100%; background-color:#2267CE;"></div>
      </div>
        <div id="page-content-wrapper" style="height:100%;">
        
            <?php include 'top_bar.php'; ?>
          <!-- modal untuk add data -->
            <div class="modal fade" role="dialog" id="add_modal"  >
              <div class="modal-dialog" style="width:400px;">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="title_modal"></h4>
                  </div>
                  <div class="modal-body">

                    <!-- pesan -->
                      <div id="pesan_modal" style="display:none;">
                        <div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Maaf!</strong> Kode Sudah Ada.
                        </div>
                      </div>
                    <!-- akhirpesan -->
                        
                    <form class="" id="" name=""  action="" method="get">
                        <div class="form-group" id="kode_pemesan_err" style="display:;">
                          <input id="kodepemesan_add" name="kodepemesan_add" type="text" class="form-control" placeholder="Kode Pemesan" value="" />
                        </div>
                        <div class="form-group" id="nama_pemesan_err" style="display:;">
                          <input id="namapemesan_add" name="namapemesan_add" type="text" class="form-control huruf" onkeypress="return isHuruf(event)" placeholder="Nama Pemesan" value="" />
                        </div>
                        <div class="form-group" id="tanggal_add_er" style="display:;">
                            <div class="input-group date form_date col-md-12" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" >
                                    <input class="form-control" size="5" type="text" name="tanggal_add" id="tanggal_add" placeholder="Tanggal" required readonly value='' >
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon_datefilter" id="tanggal_add_icon" style="cursor:pointer;" ></span></span>
                            </div>
                        </div>
                        <div class="form-group" id="jabatan_add_err" >
                            <select id="jabatan_add" class="selectpicker" style="" data-size="5" data-live-search="true" title="Pilih Posisi">
                                <option value="" >Pilih Jabtan</option>
                                <option value="dosen" >Dosen</option>
                                <option value="mahasiswa" >Mahasiswa</option>
                                <option value="karyawan" >Karyawan</option>
                             </select>
                        </div>
                        <div class="form-group" id="tempatlahir_add_err" style="display:;">
                          <input id="tempatlahir_add" name="tempatlahir_add" type="text" class="form-control huruf" onkeypress="return isHuruf(event)" placeholder="Tempat Lahir" value="" />
                        </div>
                        <div class="form-group" id="notlp_add_er" style="display:;">
                          <input id="notlp_add" name="notlp_add" type="" maxlength="13" class="form-control numeric" onkeypress="return isNumberKey(event)" placeholder="No Tlp" value="" />
                        </div>
                        <div class="form-group" id="alamat_add_er" style="display:;">
                          <textarea id="alamat_add" name="alamat_add" style="max-width:;" type="text" class="form-control" placeholder="Alamat" /></textarea>
                        </div>
                        <button type="button" style="width:; margin-right:2px;" id="simpan_modal" onclick="" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-floppy-save" aria-hidden="true">Simpan</span></button>
                        <button id="" type="button" style="width:"; class="btn btn-default" onclick="" data-dismiss="modal" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true">Batal</span></button>   
                    </form>
                       
                        

                  </div>
                  <div class="modal-footer">
                   </div>
              

                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
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

            <div class="container-fluid" style="margin-left:0px;">
                <div class="row">

                        
              
              <div id="pesan"></div>
              <div id="loading" style="display:none"><img src="../images/loading.gif" alt="loading..." /></div>
              <div id="pesan1"></div>

                        <form class="form-inline">
                          <div class="form-group">
                              <input type="text" class="form-control" id="search_box" placeholder="Cari berdasarkan nama">

                          </div>                          
                          <span id="tambah_data" type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Data</span>
                                <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:10%;">Kode</th>
                    <th style="width:20%;">Nama</th>
                    <th style="width:10%;">Jabatan</th>
                    <th style="width:10%;">Tanggal Lahir</th>
                    <th style="width:10%;">Tempat Lahir</th>
                    <th style="width:15%;">No Tlp</th>
                    <th style="width:13%;">Alamat</th>
                    <th style="width:20%;"></th>
                  </tr>
                  <tbody id="container">


                                      </tbody>          
                                      <tbody id="data_table"></tbody>
                                
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
      /*toggle slide bar*/
      $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

        function getdata(){
            cari = $("#search_box").val();
            dataString1 = "search_box="+cari;
            var data_table1 = "";
             $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
            $.ajax({
                url: "pemesan_forms_getdata.php?"+dataString1,
                dataType: "json",
                success: function(data1) {
                
                  for(var i = 0; i<data1.length;i++){
                                data_table1 +="<tr><th>"+data1[i].no+
                                            "</th><td id='"+data1[i].no+"_kode'>"+data1[i].kode_pemesan+
                                            "</td><td id='"+data1[i].no+"_nama'>"+data1[i].nama_pemesan+
                                            "</td><td id='"+data1[i].no+"_jabatan'>"+data1[i].jabatan+
                                            "</td><td id='"+data1[i].no+"_tgl'>"+data1[i].tanggal_lahir+
                                            "</td><td id='"+data1[i].no+"_tmpt'>"+data1[i].tempat_lahir+
                                            "</td><td id='"+data1[i].no+"_tlp'>"+data1[i].no_tlp+
                                            "</td><td id='"+data1[i].no+"_alamat'>"+data1[i].alamat+
                                            "</td><td><a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data1[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                            "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data1[i].no+")' class='glyphicon glyphicon-trash'></span></a></td></tr>";
                            }
                  $('#data_table').html(data_table1); 
                  $("#loader").html("");
                }
            });
        }
        function delete_data(a){
            kode = $("#"+a+"_kode").text()
            $("#setId_del").val(kode);
            $("#delete_modal").modal({backdrop: "static"});

        }
        function delete_true(){
            kd_pemesan = $("#setId_del").val();
            $.ajax({
                        type: 'GET',
                        url: 'pemesan_forms_delete.php?kd_pemesan='+kd_pemesan,
                        data_del: $(this).serialize(),
                        success: function(data_del) {
                            getdata();    
                            $("#delete_modal").modal('hide');
                            paging();
                        }
                    });
        }

      $(document).ready(function(){
            $("#search_box").keyup(function(){
                getdata();
            });

            /*angka*/
            $('.numeric').bind('keyup blur',function(){ 
              this.value = this.value.replace(/[^0-9]/g, '');
            });
            /*hrurf*/
            $('.huruf').bind('keyup blur',function(){ 
              this.value = this.value.replace(/[^a-zA-Z-' ']/g, '');
            });
            /*add*/
            $("#tambah_data").click(function(){
                 title = $("#title_modal").text("Tambah data");
                 $("#kodepemesan_add").show();

                kode_dosen = $("#kodepemesan_add").val('');
                nama = $("#namapemesan_add").val('');
                tgl = $("#tanggal_add").val('');
                tmpt = $("#tempatlahir_add").val('');
                tlp = $("#notlp_add").val('');
                alamat = $("#alamat_add").val('');

                $("#add_modal").modal({backdrop: "static"});
            });

      
            $('#tanggal_add_icon').Zebra_DatePicker({  show_icon: false,

                onSelect: function(view, elements){
                    document.getElementById("tanggal_add").value=view;
                }
            });

            /*save*/
            $("#simpan_modal").click(function(){

                title = $("#title_modal").text();


                $("#pesan_modal").css('display','none');

                kode_dosen = $("#kodepemesan_add").val();
                nama = $("#namapemesan_add").val();
                jabatan = $("#jabatan_add").val();
                tgl = $("#tanggal_add").val();
                tmpt = $("#tempatlahir_add").val();
                tlp = $("#notlp_add").val();
                alamat = $("#alamat_add").val();

                if(kode_dosen==''){
                    $("#kode_pemesan_err").addClass("has-error");
                }else{
                    $("#kode_pemesan_err").removeClass("has-error");
                }
                if(nama==''){
                    $("#nama_pemesan_err").addClass("has-error");
                }else{
                    $("#nama_pemesan_err").removeClass("has-error");
                }
                if(jabatan==''){
                    $("#jabatan_add_err").addClass("has-error");
                }else{
                    $("#jabatan_add_err").removeClass("has-error");
                }
                if(tgl==''){
                    $("#tanggal_add_er").addClass("has-error");
                }else{
                    $("#tanggal_add_er").removeClass("has-error");
                }
                if(tmpt==''){
                    $("#tempatlahir_add_err").addClass("has-error");
                }else{
                    $("#tempatlahir_add_err").removeClass("has-error");
                }
                if(tlp==''){
                    $("#notlp_add_er").addClass("has-error");
                }else{
                    $("#notlp_add_er").removeClass("has-error");
                }
                if(alamat==''){
                    $("#alamat_add_er").addClass("has-error");             
                }else{
                    $("#alamat_add_er").removeClass("has-error");     
                }


                if(title=="Tambah data"){

                    /*save*/
                    if(nama!='' && tgl!='' && tmpt!='' && tlp!='' && alamat!=''){
                      get_url = 'pemesan_forms_save.php?kd_pemesan='+kode_dosen+'&nama='+nama+'&jabatan='+jabatan+'&tgl='+tgl+'&tempat='+tmpt+'&tlp='+tlp+'&alamat='+alamat;
                        $.ajax({
                            type: 'GET',
                            url: get_url,
                            data: $(this).serialize(),
                            success: function(data) {

                                if(data=="false"){

                                  $("#pesan_modal").css('display','block');
                                
                                }else{

                                  getdata();    
                                  $("#add_modal").modal('hide');  
                                }
                                
                                paging();
                                //alert(data);
                            }
                        });

                    }

                }else{

                  /*update*/
                  if(nama!='' && tgl!='' && tmpt!='' && tlp!='' && alamat!=''){
                      get_url = 'pemesan_forms_update.php?kd_pemesan='+kode_dosen+'&nama='+nama+'&jabatan='+jabatan+'&tgl='+tgl+'&tempat='+tmpt+'&tlp='+tlp+'&alamat='+alamat;
                        $.ajax({
                            type: 'GET',
                            url: get_url,
                            data: $(this).serialize(),
                            success: function(data_up) {

                                  getdata();    
                                  $("#add_modal").modal('hide');  
                                
                                //paging();
                                //alert(data_up);
                            }
                        });

                    }

                }
                

            });

      
        
                /*hanya angka*/
                /*$("#tlp_dosen").keyup(function(event) {        
                        this.value = this.value.replace(/[^0-9.]/g,'');
                });
                $("#nama_dosen").keyup(function(event) {        
                        this.value = this.value.replace(/[^a-z .]/g,'');
                });
*/
      });/*akhir docuement*/

            /*fungsi saat pensil di klik*/
            function edit(a){
                nama = $("#"+a+"_nama").text();
                jabatan = $.trim($("#"+a+"_jabatan").text());
                kode = $("#"+a+"_kode").text();
                tgl = $("#"+a+"_tgl").text();
                tempat = $("#"+a+"_tmpt").text();
                tlp = $("#"+a+"_tlp").text();
                alamat = $("#"+a+"_alamat").text();

                $("#jabatan_add").val(jabatan);
                $('#jabatan_add').selectpicker('refresh');

                
                $("#namapemesan_add").val(nama);

                $("#kodepemesan_add").val(kode);
                $("#kodepemesan_add").hide();

                $("#tanggal_add").val(tgl);
                $("#tempatlahir_add").val(tempat);
                $("#notlp_add").val(tlp);
                $("#alamat_add").val(alamat);

                title = $("#title_modal").text("Edit Kode Pemesan: "+kode);

                $("#add_modal").modal({backdrop: "static"});
            }

            $(function() {

                getdata();
                paging();
            });

            /*mengatur paging*/
            function paging(){
              var countdata='';
              $.ajax({
                    type: 'GET',
                    url: 'pemesan_forms_getcountdata.php',
                    data: $(this).serialize(),
                    success: function(data) {
                      countdata = data;
                  
                          $("#page").pagination({
                                items: countdata,
                                itemsOnPage: 10,
                                cssStyle: 'light-theme',

                                onPageClick: (function(a,b){
                                    var data_table='';
                                    $.ajax({
                                        type: 'GET',
                                        url: 'pemesan_forms_getdata.php?search_box=&halaman='+a,
                                        dataType: 'json',
                                        success: function(data) {
                                            for(var i = 0; i<data.length;i++){
                                                data_table +="<tr><th>"+data[i].no+
                                                             "</th><td id='"+data[i].no+"_kode'>"+data[i].kode_pemesan+
                                                              "</td><td id='"+data[i].no+"_nama'>"+data[i].nama_pemesan+
                                                              "</td><td id='"+data[i].no+"_jabatan'>"+data[i].jabatan+
                                                              "</td><td id='"+data[i].no+"_tgl'>"+data[i].tanggal_lahir+
                                                              "</td><td id='"+data[i].no+"_tmpt'>"+data[i].tempat_lahir+
                                                              "</td><td id='"+data[i].no+"_tlp'>"+data[i].no_tlp+
                                                              "</td><td id='"+data[i].no+"_alamat'>"+data[i].alamat+
                                                              "</td><td><a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                                              "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a></td></tr>";
                                            
                                            }
                                            //$("#tes").remove();
                                            $("#data_table").html(data_table);
                                        }
                                    });
                                })
                                
                            });/*akhir paging*/
                
                }/*akhir sukse*/
              });/*akhir ajax*/
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
    </script>

</html>


  <?php
}




?>
