﻿<?php
session_start();
	require 'function.php';
	if(isset($_POST['login'])){

		$username = $_POST['pengguna'];
		$pw = $_POST['password'];
	
		$hasil = mysqli_query($c, "SELECT * FROM akun WHERE username = '$username' AND password = '$pw'");
		$r = mysqli_fetch_array($hasil);
		$user = $r['username'];
		$pass = $r['password'];
		// $level = $r['level'];
		if ($user == $username && $pass == $pw){
			$_SESSION["login"] = true ;
			header('location:tabel.php');
		}else{
			echo
			"<script>
			alert('Username atau password salah');
			</script>";
		}
		}
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PENJADWALAN PT. BENIN</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="tabel.php">
			  		Penjadwalan
			  	</a>

				
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
						<div class="module-body">
						
							<div class="control-group">
								
								<div class="controls row-fluid">
									<input class="span12" type="text" name="pengguna" id="inputEmail" placeholder="Username">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="password" name="password" id="inputPassword" placeholder="Password">
								</div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" name="login" class="btn btn-primary pull-right">Login</button>
									
								</div>
								
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright pull-right">Elpafras | 18.51.0015 </b> 
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>