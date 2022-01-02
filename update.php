<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;}


require 'function.php';

$id = $_GET["id"];

$new = query("SELECT * FROM jadwal WHERE id = $id")[0];


//cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])){
        
        // cek apakah data berhasil ditambahkan atau tidak
        if( update($_POST)>0){
            echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'tabel.php';
            </script>
            ";
        }else{
             
            echo "
            <script>
                alert('data gagal ditambahkan!');
                document.location.href = 'tabel.php';
            </script>
            ";
        }

        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PENJADWALAN PT. BENIN</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="#">PENJADWALAN</a>
                   
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                
                                
                            <li>
                                    <a class="collapsed" data-toggle="collapse" href="tabel.php">
                                        <i class="menu-icon icon-table"></i>
                                        Tabel</a>
                                    
                                </li>
                                <li>
                                    <a class="collapsed" data-toggle="collapse" href="report.php">
                                        <i class="menu-icon icon-table"></i>
                                        Report</a>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                
                                <li><a href="logout.php"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <div class="span9">
                        <div class="module">
                            <div class="module-head">
                            <h1>Form</h1>
							</div>
						
							<div class="module-body">
								<form class="form-horizontal row-fluid" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $new['id'] ?>">
                                    <div class="control-group">
										<label class="control-label" for="basicinput">Merk</label>
										<div class="controls">
											<input type="text" id="basicinput" name="merk" value="<?php echo $new['merk'] ?>" placeholder="Masukkan Nama Merk" class="span8" required>
										</div>
									</div>
                                    
                                    <div class="control-group">
										<label class="control-label" for="basicinput">Jumlah</label>
										<div class="controls">
											<input type="number" id="basicinput" name="jumlah" value="<?php echo $new['jumlah'] ?>" placeholder="Masukkan Jumlah" class="span8" required>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label" for="basicinput">Distributor</label>
										<div class="controls">
											<input type="text" id="basicinput" name="distributor" value="<?php echo $new['distributor'] ?>" placeholder="Masukkan Nama Distributor" class="span8" required>
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label" for="basicinput">Deadline</label>
										<div class="controls">
											<input type="date" id="basicinput" name="deadline" value="<?php echo $new['deadline'] ?>"  class="span8" required>
										</div>
									</div>
                                    
											
                                    <div class="control-group">
										<div class="controls">
                                            
											    <button type="submit" name="submit" value="submit" class="btn">KIRIM</button>
                                            
										</div>
									</div>      
        
        
        
                        </form>
                        </div>

						</div>
								

							
							
						
					</div>
					<!--/.content-->
				</div>
				<!--/.span9-->
			</div>
		</div>
		<!--/.container-->
	</div>
	<!--/.wrapper-->
	
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
</html>