<?php 
    include '../koneksi/koneksi.php';

    session_start();

    $query= mysqli_query($conn,"SELECT * from info_sms");
    $jmldata    = mysqli_num_rows($query);

if(!isset($_SESSION['pic'])){
  header("location:../index.php?error=1");
}else{
  ?>

      
<!DOCTYPE html>
<title>SMS Detail</title>
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
                                <span id="loader"></span>
                        </form>

                      <div class="table-responsive" style="margin-top:-10px;">
              <table class="table table-bordered table-hover table-striped" style="margin-top:20px; background-color:#FEFEFE" id="coba2">
                  
                  <tr>
                    <th style="width:4%;"></th>
                    <th style="width:10%;">Nama</th>
                    <th style="width:15%;">Jabatan</th>
                    <th style="width:20%;">No tlp</th>
                    <th style="width:15%;">Pesan</th>
                    <th style="width:18%;">Tgl Pesan</th>
                    <th style="width:10%;">Status</th>
                    <th style="width:10%;">User</th>
                    <th style="width:10%;"></th>
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
            var data_sms = "";
            cari = $("#search_box").val();
             $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
            dataString1 = "search_box="+cari;
              $.ajax({
                url: "sms_getdata_detail.php?"+dataString1,
                dataType: "json",
                success: function(data_s) {
                $("#loader").html("");
                  for(var i = 0; i<data_s.length;i++){
                                data_sms +="<tr>"+
                                            "<th>"+data_s[i].no+"</th>"+
                                            "<td id='"+data_s[i].no+"_nama'>"+data_s[i].nama+"</td>"+
                                            "<td id='"+data_s[i].no+"_jabatan'>"+data_s[i].jabatan+"</td>"+
                                            "<td id='"+data_s[i].no+"_tlp'>"+data_s[i].no_tlp+"</td>"+
                                            "<td id='"+data_s[i].no+"_isi_pesan'>"+data_s[i].pesan+"</td>"+
                                            "<td id='"+data_s[i].no+"_jam'>"+data_s[i].tgl+"</td>"+
                                            "<td id='"+data_s[i].no+"_status'>"+data_s[i].status+"</td>"+
                                            "<td id='"+data_s[i].no+"_user'>"+data_s[i].user+"</td>"+
                                            "<td id='"+data_s[i].no+"_id_pesan' style='display:none;'>"+data_s[i].id_pesan+"</td>"+
                                            "<td>"+
                                              "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data_s[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                            "</td>"+
                                            "</tr>";
                            }
                  $('#data_table').html(data_sms); 
                  //alert();
                }
            });
        }

        function delete_data(a){
              kode_edit = $("#"+a+"_id_pesan").text();
              $("#setId_del").val(kode_edit);
              $("#delete_modal").modal({backdrop: "static"});
              //alert(kode_edit);
        }

        function delete_true(){
            getid = $("#setId_del").val();
            $.ajax({
                   type:'GET',
                   url:'sms_deleteinfo.php?kode='+getid,
                   success:function(data_del) {
                      getdata();
                        $("#delete_modal").modal('hide');
                        //alert(data_del);
                    }
                });
        }     

        $(document).ready(function(){
            $("#search_box").keyup(function(){
                getdata();
            });

            /*untuk paging kembali ke awal*/
          $( "#search_box" ).focus(function() {
            $("#page").pagination('selectPage', 1);
              
          });

            $("#page").pagination({
                items: "<?php echo $jmldata; ?>",
                itemsOnPage: 5,

                onPageClick: (function(d,e){
                    var data_table='';
                    $("#loader").html("<img src='../images/loader1.gif' style='width:30px; height:30px;'>");
                    $.ajax({
                        type: 'GET',
                        url: 'sms_getdata_detail.php?search_box=&halaman='+d,
                        dataType: 'json',
                        success: function(data) {
                          $("#loader").html("");
                            for(var i = 0; i<data.length;i++){
                               data_table +="<tr>"+
                                            "<th>"+data[i].no+"</th>"+
                                            "<td id='"+data[i].no+"_nama'>"+data[i].nama+"</td>"+
                                            "<td id='"+data[i].no+"_jabatan'>"+data[i].jabatan+"</td>"+
                                            "<td id='"+data[i].no+"_tlp'>"+data[i].no_tlp+"</td>"+
                                            "<td id='"+data[i].no+"_isi_pesan'>"+data[i].pesan+"</td>"+
                                            "<td id='"+data[i].no+"_jam'>"+data[i].tgl+"</td>"+
                                            "<td id='"+data[i].no+"_status'>"+data[i].status+"</td>"+
                                            "<td id='"+data[i].no+"_user'>"+data[i].user+"</td>"+
                                            "<td id='"+data[i].no+"_id_pesan' style='display:none;'>"+data[i].id_pesan+"</td>"+
                                            "<td>"+
                                              "<a href='javascript:void(0)' class='col-md-1'><span id='' onclick='delete_data("+data[i].no+")' class='glyphicon glyphicon-trash'></span></a>"+
                                            "</td>"+
                                            "</tr>";
                                  }
                                  //alert();
                            //$("#tes").remove();
                            $("#data_table").html(data_table);
                            //alert("a");
                        }
                    });
                })
                
            });


        });

        $(function() {
            getdata();
        
        });
    </script>

</html>


  <?php
}




?>
