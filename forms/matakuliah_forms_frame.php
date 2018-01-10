<?php
include '../koneksi/koneksi.php';
session_start();

$query_matakuliahh = mysqli_query($conn,"SELECT * from matakuliah");
$jmldata    = mysqli_num_rows($query_matakuliahh);
?>

<!DOCTYPE html>
<title>Form Dosen</title>
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

th{
        background-color: #3786DD;
        color: #FFFFFF;
    }
/* START OF Change the Navbar Colors/Font/Size */
/* Adjust Menu (red) text color, (Garamond) font-family, (1.5em) font-size  */
/*.navbar .nav > li > a, .navbar .nav > li > a:first-letter,
.navbar .nav > li.current-menu-item > a, 
.navbar .nav > li.current-menu-ancestor > a {
display:        inline;
color:          red;                        
font-family:    Garamond;
}*/
 
/* Adjust Menu colors - Normal */
.navbar .nav > li > a, .navbar .nav > li > a:first-letter {
color:          white;
text-shadow:    none;
background-color: #3786DD;

}
.navbar .nav > li > a, .navbar .nav > li > a:first-letter {
color:          white;
text-shadow:    none;
background-color: #3786DD;
}
/* Adjust Menu colors - Hover */
/*.navbar .nav > li > a:hover, .navbar .nav > li > a:hover:first-letter { 
color:          yellow;                      
text-shadow:    none;
}*/
/* Adjust Menu colors - Active */
/*.navbar .nav > li > a:active, .navbar .nav > li > a:active:first-letter,
.navbar .nav > li.current-menu-item > a, 
.navbar .nav > li.current-menu-ancestor > a,
.navbar .nav > li.current-menu-item > a:first-letter, 
.navbar .nav > li.current-menu-ancestor > a:first-letter {
color:          blue;
text-shadow:    none;
}*/
 
/* Adjust dropdown Menu items (blue) text color, (yellow) shading and (green) border */
/*.dropdown-menu > li > a {
color:          blue;
background:     yellow;
border-bottom:  2px solid green;
}*/
 
/* Remove the Hover/Focus Colors  */
.navbar .nav > li.current-menu-item > a, .navbar .nav > li.current-menu-ancestor > a, 
.navbar .nav > li > a:hover, .navbar .nav > li > a:focus {
color:          white;
background-color: #0066cc;
}


ul > #c:hover{
    background-color: #0066cc;
}
/*.dropdown > li:hover{
    background-color: red;
}*/
.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
            background-image:none !important;
            color: red;
 }
 .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
            background-color:#3786DD;
            color: white;
 }

.submenu:hover{
  border-left:4px solid blue;
}
.background_active{
  background-color: #0066cc;
}

</style>
<?php 

$warna = "#3786DD;";
$warna_slide = "#d1e0e0";
/*#0066cc*/

?>
<body style="background-color:#C7C8BF">


       <!-- modal edit -->
    <div class="modal fade" role="dialog" id="editmatakuliah_modal"  >
    <div class="modal-dialog" style="width:500px;">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Mata Kuliah: <span id="title_matakuliah"></span></h4>
        </div>
        <div class="modal-body">
              <div class="form-group" id="matakuliah_error">
                    <input id="matakuliah_edit" name="matakuliah_edit" type="text" class="form-control has-error" placeholder="Nama Dosen" value="" />
                </div>
                <div class="form-group" id="id_error" style="display:none;">
                    <input id="id_edit" name="id_edit" type="text" class="form-control has-error" placeholder="Nama Dosen" value="" />
                </div>
            
             <button type="" class="btn btn-success" id="btn_update" >
              <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
             Save</button>
             <button type="reset" class="btn btn-success" onclick="" data-dismiss="modal" >
              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
             Cancel</button>

      <div class="modal-footer"></div>

    </div>
     
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

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

        
      <div style="width:20px; height:10%; background-color:#2267CE; float:left;">
        <div style="width:390%; height:100%; background-color:#2267CE;"></div>
      </div>
              <div class="container-fluid" style="margin-left:0px;">
                <div class="row">

                        
              
              <div id="pesan"></div>
              <div id="loading" style="display:none"><img src="../images/loading.gif" alt="loading..." /></div>
              <div id="pesan1"></div>

                        <form class="form-inline">
                          <div class="form-group">
                              <input type="text" class="form-control" id="search_box"  placeholder="Search">
                          </div>
                          
                          <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:20%;">Id Mata Kuliah</th>
                    <th style="width:40%;">Nama Mata Kuliah</th>
                    <th style="width:10%;"></th>
                  </tr>
                  <tbody id="container">
                                             <form class='a' method="get">
                                                <tr class="count">
                                                    <th id=""></th>
                                                    <td id=""></td>
                                                    <td id="">
                                                            <div class="form-group" id="nama_error">
                                                                  <input id="matakuliah" type="text" class="form-control has-error" placeholder="Mata Kuliah"/>
                                                            </div>
                                                    </td>
                                                    <td>
                                                        <button id="btn_save" type="button" class="btn btn-success form-group col-md-12 btn_hide" style="margin-top:0px; margin-bottom:2px;" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                                                        </button>
                                                        <button id="btn_cancel" type="button" class="btn btn-success form-group col-md-12 btn_hide" style="margin-top:0px; margin-bottom:0px;" aria-label="Left Align">
                                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                        </button>
                                                    </td>
                                                   
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
        
</body>

<script>

    $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

    function ambildata(){
      cari = $("#search_box").val();
        dataString1 = "search_box="+cari;
      var data_table = "";
      $.ajax({
              url: "matakuliah_forms_getdata.php?"+dataString1,
              dataType: "json",
              success: function(data) {
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='matakuliah_"+data[i].no+"' > "+data[i].mata_kuliah+"</td>"+
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
    function ambildata_cari(){
      cari = $("#search_box").val();
        dataString1 = "search_box="+cari;
      var data_table = "";
      $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
              url: "matakuliah_forms_search.php?"+dataString1,
              dataType: "json",
              success: function(data) {
              $("#loader").html("");
               for (var i =0; i<data.length; i++){
                   data_table +="<tr><th>"+data[i].no+"</th>"+
                          "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='matakuliah_"+data[i].no+"' > "+data[i].mata_kuliah+"</td>"+
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
    var matakuliah = $("#matakuliah_"+a).text();
    var id = $("#id_"+a).text();
    $("#matakuliah_edit").val(matakuliah);
    $("#id_edit").val(id);
    $("#title_matakuliah").text(id+" | "+matakuliah);
    $("#editmatakuliah_modal").modal({backdrop: "static"});
  }

  function delete_data(a){
    //$("#hapusmatakuliah_modal").modal({backdrop: "static"});
    var id = $("#id_"+a).text();
    var matakuliah = $("#matakuliah_"+a).text();
    var dataString = "id="+id;
    $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
         type:'POST',
         data:dataString,
         url:'matakuliah_forms_delete.php',
         success:function(data) {
            $("#loader").html("");
            ambildata_cari();
            //alert("");
          }
      });
    
  } 

  $(document).ready(function(){

    /*save data*/
    $("#btn_save").click(function(){
      var matakuliah = $("#matakuliah").val();
      var dataString = 'matakuliah='+matakuliah;
      $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
         type:'POST',
         data:dataString,
         url:'matakuliah_forms_save.php',
         success:function(data) {
            ambildata_cari();
            $("#matakuliah").val('');
            $("#loader").html("");
          }
      });
    });

    /*update data*/
    $("#btn_update").click(function(){
      var matakuliah1 = $("#matakuliah_edit").val();
      var id1 = $("#id_edit").val();
      var dataString1 = 'matakuliah='+matakuliah1+"&id="+id1;
      $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
      $.ajax({
         type:'POST',
         data:dataString1,
         url:'matakuliah_forms_update.php',
         success:function(data) {
            ambildata_cari();
            $("#loader").html("");
            $("#editmatakuliah_modal").modal('hide');
          }
      });
    });

    $("#search_box").keydown(function(){
        ambildata_cari();
    });

     $("#page").pagination({
                items: "<?php echo $jmldata; ?>",
                itemsOnPage: 10,

                onPageClick: (function(d,e){
                    var data_table='';
                    $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
                    $.ajax({
                        type: 'GET',
                        url: 'matakuliah_forms_search.php?search_box=&halaman='+d,
                        dataType: 'json',
                        success: function(data) {
                          $("#loader").html("");
                            for(var i = 0; i<data.length;i++){
                                data_table +="<tr><th>"+data[i].no+"</th>"+
                                    "<td id='id_"+data[i].no+"'>"+data[i].id+"</td><td id='matakuliah_"+data[i].no+"' > "+data[i].mata_kuliah+"</td>"+
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

      /*click menu*/
      $("#master").click(function(){
          $("#submenu_master").toggle(function(){
            toggle:'slow'
          });
          $("#span_master").toggleClass('glyphicon-chevron-down');
          $("#master").toggleClass('background_active');
      });
      $("#report").click(function(){
          $("#submenu_report").toggle(function(){
            toggle:'slow';
          });
          $("#span_report").toggleClass('glyphicon-chevron-down');
           $("#report").toggleClass('background_active');
      });
      $("#transaksi").click(function(){
          $("#submenu_transaksi").toggle(function(){
            toggle:'slow';
          });
          $("#span_transaksi").toggleClass('glyphicon-chevron-down');
           $("#transaksi").toggleClass('background_active');
      });
       

     

  });/*akhir document*/

  $(function() {

    ambildata_cari();

  });
  
</script>

</html>