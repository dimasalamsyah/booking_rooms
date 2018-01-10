<?php
include '../koneksi/koneksi.php';
session_start();

$query= mysqli_query($conn,"SELECT * from jam");
$jmldata    = mysqli_num_rows($query);



if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>Form Jam</title>
<html lang="en" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- favicon -->
<link rel="icon" href="../images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../css/bootstrap-select.css">
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

  <!-- modal addd -->
  <div class="modal fade" role="dialog" id="add_modal"  >
    <div class="modal-dialog" style="width:250px;">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah data jam<span id=""></span></h4>
        </div>
        <div class="modal-body">
            <div class="form-group" id="" style="display:;">
                <label for="kode_jam">Kode</label>
              <input id="kode_jam" name="kode_jam" type="text" class="form-control" placeholder="" readonly="" value="" />
            </div>
            <div class="form-group" style="margin-top:0px;">
                <label for="jam_modal">Jam</label>
                  <select class="form-control selectpicker"  data-size="5"  id="jam_modal" name="jam_modal" style="margin-left:0px;"> 
                        <option value="08">08</option>
                        <option value="09">09</option>
                      <?php 
                          for ($i=10; $i<25 ; $i++) { 
                            echo "<option value=".$i.">".$i."</option>";
                          }

                      ?>
                  </select>
            </div>
            <div class="form-group" style="margin-top:0px;">
                <label for="menit_modal">Menit</label>
                  <select class="form-control selectpicker"  data-size="5"  id="menit_modal" name="menit_modal" style="margin-left:0px;"> 
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                      <?php 
                          for ($i=10; $i<61 ; $i++) { 
                            echo "<option value=".$i.">".$i."</option>";
                          }

                      ?>
                  </select>
            </div>


           <button type="" class="btn btn-success" id="simpan_modal" >
            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
           Simpan</button>
           <button type="reset" class="btn btn-default" id="batal_modal" onclick="" data-dismiss="modal" >
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
           Batal</button>

      <div class="modal-footer"></div>

    </div>
     
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

    <!-- modal edit -->
  <div class="modal fade" role="dialog" id="edit_modal"  >
      <div class="modal-dialog" style="width:250px;">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit data jam<span id=""></span></h4>
          </div>
          <div class="modal-body">
            <div class="form-group" id="" style="display:;">
                <label for="kode_jam_edit">Kode</label>
              <input id="kode_jam_edit" name="kode_jam_edit" type="text" class="form-control" placeholder="" readonly="" value="" />
            </div>
            <div class="form-group" style="margin-top:0px;">
                <label for="jam_modal_edit">Jam</label>
                  <select class="form-control selectpicker"  data-size="5"  id="jam_modal_edit" name="jam_modal_edit" style="margin-left:0px;"> 
                        <option value="08">08</option>
                        <option value="09">09</option>
                      <?php 
                          for ($i=10; $i<25 ; $i++) { 
                            echo "<option value=".$i.">".$i."</option>";
                          }

                      ?>
                  </select>
            </div>
            <div class="form-group" style="margin-top:0px;">
                <label for="menit_modal_edit">Menit</label>
                  <select class="form-control selectpicker"  data-size="5"  id="menit_modal_edit" name="menit_modal_edit" style="margin-left:0px;"> 
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                      <?php 
                          for ($i=10; $i<61 ; $i++) { 
                            echo "<option value=".$i.">".$i."</option>";
                          }

                      ?>
                  </select>
            </div>


             <button type="" class="btn btn-success" id="simpan_modal_edit" >
                <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
             Simpan</button>
             <button type="reset" class="btn btn-default" id="batal_modal_edit" onclick="" data-dismiss="modal" >
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
             Batal</button>

            <div class="modal-footer"></div>

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
                            <input type="text" class="form-control" id="search_box"  placeholder="Cari Berdasarkan Jam">
                            <span id="add_btn" type="button" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah Data</span>
                            <span id="loader"></span>
                          </div>
                          
                          <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:20%;">Kode Jam</th>
                    <th style="width:40%;">Jam</th>
                    <th style="width:10%;"></th>
                  </tr>
                  <tbody id="container">
                                             <form class='a' method="get">
                                                <tr class="count">
                                                </tr>
                                                </form>

                                      </tbody>          
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
              url: "jam_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='jam_"+data[i].no+"' > "+data[i].jam+"</td>"+
                          "<td>"+
                          "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
               }
                $('#data_table').html(data_table);    
              }
          });
    }

  function edit(a){

        kode_edit = $("#id_"+a).text();
        $("#kode_jam_edit").val(kode_edit);

        jam_edit = $("#jam_"+a).text();
        

        potong_jam = jam_edit.substring(0,3);
        potong_menit = jam_edit.substring(4,7);

        $("#jam_modal_edit").val($.trim(potong_jam));
        $("#menit_modal_edit").val($.trim(potong_menit));
        $("#edit_modal").modal({backdrop: "static"});
        $('.selectpicker').selectpicker('refresh');
  }
 
  function delete_data(a){
        kode_edit = $("#id_"+a).text();
        $("#setId_del").val(kode_edit);
        $("#delete_modal").modal({backdrop: "static"});
  }

    function delete_true(){
        getid = $("#setId_del").val();
        $.ajax({
               type:'GET',
               url:'jam_forms_delete.php?kode='+getid,
               success:function(data_del) {
                  ambildata_cari();
                     $("#nama_jam").val('');
                    $("#loader").html("");
                    $("#delete_modal").modal('hide');
                    //alert(data_del);
                }
            });
    }


  $(document).ready(function(){

        $("#add_btn").click(function(){
            
                $.ajax({
                        type: 'GET',
                        url: 'jam_forms_getkode.php',
                        data_kode: $(this).serialize(),
                        success: function(data_kode) {
                            $("#kode_jam").val(data_kode);
                        }
                });


            $("#add_modal").modal({backdrop: "static"});
        });

    /*save data*/
    $("#simpan_modal").click(function(){
      var kode_modal = $("#kode_jam").val();
      var jam_modal =  $("#jam_modal").val();
            var menit_modal =  $("#menit_modal").val();

            var hasil_jam = jam_modal+"."+menit_modal;

            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
         type:'POST',
         url:'jam_forms_save.php?kode='+kode_modal+'&jam='+hasil_jam,
         success:function(data) {
            ambildata_cari();
               $("#nama_jam").val('');
                    $("#loader").html("");
                    $("#add_modal").modal('hide');
          }
      });
    });

    /*update data*/
    $("#simpan_modal_edit").click(function(){
      var kode_modal = $("#kode_jam_edit").val();
            var jam_modal =  $("#jam_modal_edit").val();
            var menit_modal =  $("#menit_modal_edit").val();
            var hasil_jam = jam_modal+"."+menit_modal;
            $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
         type:'POST',
         url:'jam_forms_update.php?kode='+kode_modal+'&jam='+hasil_jam,
         success:function(data) {
            ambildata_cari();
            $("#loader").html("");
            $("#edit_modal").modal('hide');
          }
      });
    });

    $("#search_box").keyup(function(){
        ambildata_cari();
    });

     $("#page").pagination({
                items: "<?php echo $jmldata; ?>",
                itemsOnPage: 10,
                /*nextText: "Slnjt",
                prevText: "Seb",*/
                onPageClick: (function(d,e){
                    var data_table='';
                    $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
                    $.ajax({
                        type: 'GET',
                        url: 'jam_forms_getdata.php?search_box=&halaman='+d,
                        dataType: 'json',
                        success: function(data) {
                          $("#loader").html("");
                            for(var i = 0; i<data.length;i++){
                                data_table +="<tr><th>"+data[i].no+"</th>"+
                                    "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='jam_"+data[i].no+"' > "+data[i].jam+"</td>"+
                                    "<td>"+
                                    "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='edit("+data[i].no+")' class='glyphicon glyphicon-pencil'></span></a>"+
                                    "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                    "</td>"+
                                    "</tr>";
                                  }
                                  //alert();
                            //$("#tes").remove();
                            $("#data_table").html(data_table);
                            //alert(data_table);
                        }
                    });
                })
                
            });

      /*untuk paging kembali ke awal*/
      $( "#search_box" ).focus(function() {
        $("#page").pagination('selectPage', 1);
          
      });


  });/*akhir document*/

  $(function() {

    ambildata_cari();

  });
  
</script>

</html>

  <?php
}


?>
