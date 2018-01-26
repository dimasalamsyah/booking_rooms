<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Login</title>
<!-- favicon -->
<link rel="icon" href="images/lp3i.ico" type="image/x-icon">
<!-- css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/simple-sidebar.css">

<!-- javascript -->
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<body style="background-color:#C7C8BF">

	<div class="container">
		<div class="row">
		  <div class="col-md-4"></div>
		  <div class="col-md-4">
		  	<?php 
		  		/*agar tidak muncul error php*/
		  		//error_reporting(0);

		  		/*difinisi saat mengirim pesan error*/
		  		$error = @$_REQUEST['error'];
		  		if($error=="1"){
		  			?>
		  				<div class="alert alert-danger">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong>Peringatan!</strong> Kamu harus login terlebih dahulu.
						</div>
		  			<?php
		  		}elseif($error=="2"){
		  			?>
		  				  <div class="alert alert-warning">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Peringatan!</strong> Kamu tidak punya akses, silahkan coba lagi!
						  </div>
		  			<?php
		  		}
		  	?>
		  	    <div class="panel panel-primary" style="margin-top:10%;">
			      <div class="panel-heading"><center><img src="images/logo.png" width="150px"></center></div>
			      <div class="panel-body" style="margin:10px;">
			      		<form class="form-horizontal" action="cek_login.php" method="post">
						  <div class="form-group">
						    <label for="">Username</label>
						    <input type="text" class="form-control" id="username" name="username" placeholder="Username" onkeyup="this.value = this.value.toUpperCase()" required>
						  </div>
						  <div class="form-group">
						    <label for="">Password</label>
						    <input type="password" class="form-control" id="password" name="password"  placeholder="Password" required>
						  </div>
						  <button type="submit" class="btn btn-default">Login</button>
						  <button type="reset" class="btn btn-default">Cancel</button>
						</form>

			      </div>
			      <div class="panel-footer"><p><strong>&copyDimasAlamsyah 20160313</strong></p></div>
			    </div>
		  </div>
		  <div class="col-md-4"></div>
		</div>
	</div>

</body>

</html>