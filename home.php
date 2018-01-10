<?php 
 session_start();
 include 'koneksi/koneksi.php';
$warna = "#3786DD;";
$warna_slide = "#d1e0e0";
$image = "images/logo.jpg";
$image_top ="images/logo.jpg";
$koneksi = "koneksi/";
$setting = "forms/";
$foto1 = "forms/";
$home = "";
$logout="forms/";

?>
<!DOCTYPE html>

<title>Home</title>
<html lang="en" style="height:100%;">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!-- favicon -->
<link rel="icon" href="images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">

<!-- javascript -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/bootstrap-modal-popover.js"></script>

<body style="background-color:#C7C8BF">

<style>

</style>

<script>
var form="forms/";
var form_smscek="forms/";
</script>

<body style="background-color:#C7C8BF">

    <div id="wrapper" style="height:100%;">
      <!--sidebar -->
      <?php include 'side_bar.php'; ?>
        
  		<div style="width:20px; height:10%; background-color:#2267CE; float:left;">
  			<div style="width:390%; height:100%; background-color:#2267CE;"></div>
  		</div>
        <div id="page-content-wrapper" style="height:;">
        		<?php include 'forms/top_bar.php'; ?>

             <div id="container" style=""></div>
        </div>
</body>

<script>

var form="forms/";/*untuk side bar*/
    $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
      });

    
var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column',
            backgroundColor: '#ffffff',
         },   
         title: {
            text: 'Grafik Pemesanan Ruangan '
         },
         subtitle:{
            text: 'Politeknik LP3I Jakarta Kampus Bekasi'
         },
         xAxis: {
            categories: ['Ruangan']
         },
         yAxis: {
            title: {
               text: ''
            }
         },
              series:             
            [
            <?php 
               //config.php adalah file koneksi database bagian ini dipakai 
               //untuk mengambil data dari mysql
         
           $query   = mysqli_query($conn,"SELECT kode_ruangan, nama_ruangan  FROM ruangan");
            /*$query = mysql_query( $sql )  or die(mysql_error());*/
            while( $ret = mysqli_fetch_array( $query ) ){
              $kode_ruangan=$ret['kode_ruangan'];
              $nama_ruangan=$ret['nama_ruangan'];                     
                 $sql_jumlah   = mysqli_query($conn,"SELECT * FROM pemesanan_detail WHERE kode_ruangan='$kode_ruangan'");        
                 $count = mysqli_num_rows($sql_jumlah);

                 while( $data = mysqli_fetch_array( $sql_jumlah ) ){
                    $jumlah = $data['id'];                 
                  }             
                  ?>
                 //data yang diambil dari database dimasukan ke variable nama dan data
                 //
                  {
                      name: '<?php echo $nama_ruangan; ?>',
                      data: [<?php echo $count; ?>]
                  },
                  <?php  } ?>
            ]
      });
   });



</script>

</html>