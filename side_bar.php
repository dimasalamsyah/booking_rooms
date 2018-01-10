<?php 
//session_start();
include 'koneksi/koneksi.php';
$pic = $_SESSION['pic'];
$query_val = mysqli_query($conn, "SELECT level from karyawan where username='$pic' ");
$row_val = mysqli_fetch_array($query_val);
$validasi = $row_val[0];

if($validasi=="user"){
  $cursor="cursor: not-allowed;";
}else{
  $cursor="";
}
?>
<link href='https://fonts.googleapis.com/css?family=Fauna+One' rel='stylesheet' type='text/css'>
<style type="text/css">
 .submenu:hover{
  border-left:4px solid #0066cc;
}
*{
font-family: 'Fauna One', serif;
}
</style>

 <div id="sidebar-wrapper" style="height:100%; background-color:<?php echo $warna; ?>">
            <ul class="sidebar-nav" style=" background-color:<?php echo $warna; ?>">
                <li class="">
                    <center><img id="" src="<?php echo $image; ?>" width="100px" alt="profile" class="img-default"></center>
                </li>
                <li style="margin-top:20px;">
                    <a href="javascript:void(0)" id="master" class="" style="background-color:; color:white;">Master<span id="span_master" class="glyphicon glyphicon-chevron-right" style="margin-left:140px;"></span></a>

                    <ul id="submenu_master" style="list-style:none; display:none; margin-top:0px; margin-left:-35px; " >
                        <!-- <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="dosen_sidebar" style="background-color:; color:white;">Dosen</a>
                        </li> -->
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="jam_sidebar" style="background-color:; color:white;">Jam</a>
                        </li>
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="karyawan_sidebar" style="background-color:; color:white;">Karyawan</a>
                        </li>
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="kelas_sidebar" style="background-color:; color:white;">Kelas</a>
                        </li>
                        <!-- <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="mahasiswa_sidebar" style="background-color:; color:white;">Mahasiswa</a>
                        </li> -->
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="matakuliah_sidebar" style="background-color:; color:white;">Matakuliah</a>
                        </li>
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="pemesan_sidebar" style="background-color:; color:white;">Pemesan</a>
                        </li>
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="ruangan_sidebar" style="background-color:; color:white;">Ruangan</a>
                        </li>
                        
                    </ul>
                </li>
                <li style="margin-top:0px;">
                    <a href="javascript:void(0)" id="transaksi" style="background-color:; color:white;">Transaksi<span id="span_transaksi" class="glyphicon glyphicon-chevron-right" style="margin-left:122px;"></span></a>

                    <ul id="submenu_transaksi" style="list-style:none; display:none; margin-top:0px; margin-left:-35px;" >
                        <li style="margin-top:0px; " class="submenu">
                            <a href="javascript:void(0)" id="penjadwalan_t" style="background-color:; color:white; <?php echo $cursor; ?>">Penjadwalan Ruangan</a>
                        </li>
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="pemesanan_t" style="background-color:; color:white;">Pemesanan Ruangan</a>
                        </li>
                    </ul>
                </li>
                <li style="margin-top:0px;">
                    <a href="javascript:void(0)" id="report" style="background-color:; color:white;">Laporan<span id="span_report" class="glyphicon glyphicon-chevron-right" style="margin-left:130px;"></span></a>

                    <ul id="submenu_report" style="list-style:none; display:none; margin-top:0px; margin-left:-35px;" >
                        <li style="margin-top:0px;" class="submenu">
                            <a href="javascript:void(0)" id="semua_laporan" style="background-color:; color:white;">Semua Laporan</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>




<script>
    $( "#penjadwalan_t" ).prop( "disabled", false );

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    $(document).ready(function(){
         /*click menu*/
          $("#master").click(function(){
              $("#submenu_master").toggle(function(){
                toggle:'slow'
              });
              $("#span_master").toggleClass('glyphicon-chevron-down');
              $("#submenu_report").hide('slow');
              $("#submenu_transaksi").hide('slow');

              $("#span_report").removeClass('glyphicon-chevron-down');
              $("#span_report").addClass('glyphicon-chevron-right');

              $("#span_transaksi").removeClass('glyphicon-chevron-down');
              $("#span_transaksi").addClass('glyphicon-chevron-right');
          });
          $("#report").click(function(){
              $("#submenu_report").toggle(function(){
                toggle:'slow';
              });
              $("#span_report").toggleClass('glyphicon-chevron-down');
              $("#submenu_master").hide('slow');
              $("#submenu_transaksi").hide('slow');

              $("#span_master").removeClass('glyphicon-chevron-down');
              $("#span_master").addClass('glyphicon-chevron-right');

              $("#span_transaksi").removeClass('glyphicon-chevron-down');
              $("#span_transaksi").addClass('glyphicon-chevron-right');
          });
          $("#transaksi").click(function(){
              $("#submenu_transaksi").toggle(function(){
                toggle:'slow';
              });
              $("#span_transaksi").toggleClass('glyphicon-chevron-down');
              $("#submenu_report").hide('slow');
              $("#submenu_master").hide('slow');

              $("#span_report").removeClass('glyphicon-chevron-down');
              $("#span_report").addClass('glyphicon-chevron-right');

              $("#span_master").removeClass('glyphicon-chevron-down');
              $("#span_master").addClass('glyphicon-chevron-right');
          });
          
          /*$("#dosen_sidebar").click(function(){
              window.location.href=form+"dosen_forms.php";
          });
          $("#mahasiswa_sidebar").click(function(){
              window.location.href=form+"mahasiswa_forms.php";
          });*/
          $("#matakuliah_sidebar").click(function(){
              window.location.href=form+"matakuliah_forms.php";
          });
          $("#karyawan_sidebar").click(function(){
              window.location.href=form+"karyawan_forms.php";
          });
          $("#penjadwalan_t").click(function(){
              window.location.href=form+"matriks_forms.php";
          });
           $("#pemesanan_t").click(function(){
              window.location.href=form+"booking_forms.php";
          });
          $("#jam_sidebar").click(function(){
              window.location.href=form+"jam_forms.php";
          });
          $("#kelas_sidebar").click(function(){
              window.location.href=form+"kelas_forms.php";
          });
          $("#pemesan_sidebar").click(function(){
              window.location.href=form+"pemesan_forms.php";
          });
          $("#ruangan_sidebar").click(function(){
              window.location.href=form+"ruangan_forms.php";
          });
          $("#semua_laporan").click(function(){
              window.location.href=form+"semua_laporan.php";
          });
          

    });
    </script>