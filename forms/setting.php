<!DOCTYPE html>
<?php 
  session_start();
  include '../koneksi/koneksi.php';

  $cek1 = mysqli_query($conn,"SELECT nama from gambar where username = '".$_SESSION['pic']."' ");
  $row_cek1 = mysqli_fetch_array($cek1);
  $foto = "images/".$row_cek1[0];
?>
<title>Pengaturan</title>
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
<script type="text/javascript" src="../js/highcharts.js"></script>

<body style="background-color:#C7C8BF">

<style>

</style>

<script>
var form="";
</script>

<?php 

$warna = "#3786DD;";
$warna_slide = "#d1e0e0";
$image = "../images/logo.jpg";
$image_top ="../images/logo.jpg";
$koneksi = "";
$setting = "";
$foto1 = "";
$home="../";
$logout="";
?>
<body style="background-color:#C7C8BF">

    <div id="wrapper" style="height:100%;">
      <!--sidebar -->
      <?php include '../side_bar.php'; ?>
        
  		<div style="width:20px; height:10%; background-color:#2267CE; float:left;">
  			<div style="width:390%; height:100%; background-color:#2267CE;"></div>
  		</div>
        <div id="page-content-wrapper" style="height:;">
        		<?php include 'top_bar.php'; ?>

            <div class="container-fluid" style="margin-left:0px;">
                <div class="row">

                    <div class="panel panel-primary" style="margin-top:; width:40% auto">
                      <div class="panel-heading"><center>Foto Profil</center></div>
                        <div class="panel-body" style="margin:0px;">
                          
                          <center><span id="getvalueImg"></span></center>

                      </div>
                      <div class="panel-footer" style="">
                          
                            <form class="" id="form_upload" action="setting_save.php" method="post" enctype="multipart/form-data">

                                <div class="form-group" >
                                  <div class="input-group " style="width:100%">
                                    <input type="file" name="gambar" class="form-control" style="width:100%" id="" placeholder="">
                                      
                                    <span class="input-group-btn">
                                      
                                      <button type="submit" class="btn btn-primary">Unggah</button>
                                    </span>
                                </div>

                              </div>

                                
                            </form>
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

$(document).ready(function(e){

    $("#form_upload").on('submit',(function(e){

        e.preventDefault();
        $.ajax({
          url:'setting_save.php',
          type:'POST',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          success: function(data){
            $("#getvalueImg").html(data);

          },error: function(){
            alert();
          }
        });

    }))

});

$(function(){
    $("#getvalueImg").html(" <img src='<?php echo $foto; ?>' width='150px' >");
})
</script>

</html>