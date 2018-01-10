<!DOCTYPE html>
<?php 
	
	include '../koneksi/koneksi.php';

	$query_cell = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");
	$query_room = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by jenis_ruangan asc");
	$query_jam = mysqli_query($conn, "select kode_jam, jam from jam order by kode_jam asc");
	$query_addroom = mysqli_query($conn, "select kode_ruangan, nama_ruangan from ruangan order by jenis_ruangan asc");
?>
<title>Form Booking Ruangan</title>
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
<!-- datepicker -->
<script type="text/javascript" src="../datepicker/javascript/zebra_datepicker.js"></script>
<link rel="stylesheet" href="../datepicker/css/metallic.css" type="text/css">


<body>
	
	<button style="color:black;" id="gh" type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?">Click to toggle popover</button>
</body>

<script>
	
		$(document).ready(function(){ 
			$('#gh').popover();

		});
</script>

</html>