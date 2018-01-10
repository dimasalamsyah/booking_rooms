<?php 

/*
  if(!isset($_SESSION)){
   
  }*/
  //include $koneksi.'koneksi.php';

  $cek1 = mysqli_query($conn,"SELECT nama from gambar where username = '".$_SESSION['pic']."' ");
  $row_cek1 = mysqli_fetch_array($cek1);
  $count = mysqli_num_rows($cek1);
  
 
  
  if($count==1){
    $foto = "images/".$row_cek1[0];
  }else{
    $cek2 = mysqli_query($conn,"SELECT nama from gambar where username = '' ");
    $row_cek2 = mysqli_fetch_array($cek2);
    $foto = "images/".$row_cek2[0];
  }
  


?>

<!-- <nav class="navbar navbar-primary" style="background-color:#3786DD;"> -->
  <nav class="navbar navbar-primary" style="background-color:#3786DD;">
    <div class="container-fluid" style="">
          <a href="#" class="glyphicon glyphicon-menu-hamburger" id="menu-toggle" style="border:none; background-color:#3786DD; color:white; font-size:15px; height:45px; padding-top:10px;"></a>
         
          <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
              <li style="margin-right:0px;">
                <a class="navbar-brand" href="<?php echo $home."home.php"; ?>">
                      <span class="glyphicon glyphicon-home"></span>
                </a>
              </li>

             <li id="pesan_click" class="dropdown" style="color:white; font-family:arial; padding-top: 15px; padding-left:10px; padding-right:7px; padding-bottom: 15px;">
                  <span class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true" style="margin-right:10px;">
                          <span class="glyphicon glyphicon-bell" style="margin-top:0px;"></span>
                          <span class="badge" id="messages" style="margin-top:-20px; border-radius:100px; background-color:white; color:blue;"><!-- angka pesan masuk --></span>
                  </span>
                  
                  <!-- width:1000px; -->
                  <ul id="pesan_show" class="dropdown-menu" style="background-color:white; width:1000px; height:; overflow:auto; padding:10px;">
                      <li class="login" id="" style="color:red">*Batas waktu tolak 1 jam dari pesan di terima <span style="color:black" id="loader_sms"></span></li>
                      
                      <li>
                          <table class="table table-bordered">
                              <tr >
                                <th style="width:3%">No</th>
                                <th style="width:12%">Nama</th>
                                <th style="width:12%">No tlp</th>
                                <th style="width:10%">Jabatan</th>
                                <th style="width:20%">Pesan</th>
                                <th style="width:10%">Tgl</th>
                                <th style="width:14%">Terima/Tolak</th>
                              </tr>
                             
                             <tbody style="color:black" id="getdatasms"></tbody>
                              
                          </table>
                      </li>
                      <!-- <a target="_blank" href="sms_detail.php">Lihat semua sms</a> -->
                  </ul>
              </li>
            
              <li id="c" class="dropdown" style="color:white; font-family:arial; padding-top: 9px; padding-bottom: 11px;">
                  <span class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-right:10px;"><?php //echo $_SESSION['pic']; ?>
                    <img class="img-circle"  src="<?php echo $foto1.$foto; ?>" style="width:30px; height:30px; margin-left:5px;">
                  </span>
                  
                  <ul class="dropdown-menu" style="background-color:white;">
                      <li><center><img src="<?php echo $foto1.$foto; ?>" style="width:100px; height:100px;" alt="Dp" class="img-circle"></center></li>
                       <li role="separator" class="divider"></li>
                      <li class="login" id="a" style="" ><a href="<?php echo $setting.'setting.php'; ?>"><span class="glyphicon glyphicon-cog" style="margin-right:5px;"></span>Setting</a></li>
                      <li class="login" id="" style=""><a href="<?php echo $logout."logout.php" ?>"><span class="glyphicon glyphicon-log-out" style="margin-right:5px;"></span>Logout</a></li>
                  </ul>
              </li>
          </ul>

      <div class="navbar-header" style=""></div>
    </div>
  </nav>


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

.background_active{
  background-color: #0066cc;
}

</style>
<script>

var sms_autoreplay= form_smscek+"sms_cek_autoreplay.php";
var sms_cek= form_smscek+"sms_cek.php";
var sms_cek_getdatanew= form_smscek+"sms_cek_getdatanew.php";
var sms_cek_pesanmasuk= form_smscek+"sms_cek_pesanmasuk.php";

/*$(function(){
   setInterval(function(){$("#pesan_click").load("sms_cek.php")},5000);
}*/
$(function(){
   refresh();
   auto_replay();
})
  


function refresh(){
  setTimeout(refresh,5000);
  $.get(sms_cek,function(data){
      $("#messages").html(data);
      //alert(data);
  });
}

function auto_replay(){
  setTimeout(auto_replay,5000);
  $.get(sms_autoreplay,function(data1){
      //$("#messages").html(data);
      //alert(data1);
  });
}

function getdata_(){
            var data_sms = "";
             $("#loader_sms").text("Mohon tunggu...");
            $.ajax({
                url: sms_cek_getdatanew,
                dataType: "json",
                success: function(data_s) {
                
                  for(var i = 0; i<data_s.length;i++){
                                data_sms +="<tr>"+
                                            "<th>"+data_s[i].no+"</th>"+
                                            "<td id='"+data_s[i].no+"_nama'>"+data_s[i].nama+"</td>"+
                                            "<td id='"+data_s[i].no+"_tlp'>"+data_s[i].no_tlp+"</td>"+
                                            "<td id='"+data_s[i].no+"_jabatan'>"+data_s[i].jabatan+"</td>"+
                                            "<td id='"+data_s[i].no+"_isi_pesan'>"+data_s[i].isi_pesan+"</td>"+
                                            "<td id='"+data_s[i].no+"_jam'>"+data_s[i].jam+"</td>"+
                                            "<td id='"+data_s[i].no+"_id_pesan' style='display:none;'>"+data_s[i].id_pesan+"</td>"+
                                            "<td>"+
                                              "<button type='button' style='width:40%; margin-right:2px;' onclick='setuju("+data_s[i].no+")' class='btn btn-success'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span></button>"+
                                              "<button type='button' style='width:40%; margin-right:2px;' onclick='tolak("+data_s[i].no+")' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></button>"+
                                            "</td>"+
                                            "</tr>";
                            }
                  $('#getdatasms').html(data_sms); 
                  $("#loader_sms").text("");
                }
            });
        }

$("#pesan_click").click(function(){
  getdata_();
})

function setuju(a){
  id_pesan = $("#"+a+"_id_pesan").text();
    $.ajax({
          type: 'GET',
          url: sms_cek_pesanmasuk+'?id='+id_pesan,
          data_del: $(this).serialize(),
          success: function(data_set) {
            getdata_();
            //refresh();
            //alert(data_set);
          }
      });
    //alert(id_pesan);
}

function tolak(a){
  id_pesan = $("#"+a+"_id_pesan").text();
    $.ajax({
          type: 'GET',
          url: 'sms_tolak.php?id='+id_pesan,
          data_tol: $(this).serialize(),
          success: function(data_tolak) {
            getdata_();
            //refresh();
          }
      });
   // alert(id_pesan);
}

</script>