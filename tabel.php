<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;}
require 'function.php';
$reminder = query("SELECT * FROM jadwal ORDER BY deadline ASC LIMIT 1");
$dt = query("SELECT * FROM jadwal ORDER BY deadline ASC");



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

            <style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 600px;
  top: 90px;
  width: 75%; /* Full width */
  height: 50%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: #fefefe; /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
    </head>

    <body>

    
        

<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
<span class="close">&times;</span>
  <h1 style="color: red;">PERINGATAN!!!!</h1>
</div>
<div class="modal-content">
  <?php foreach($reminder as $r) : ?>
  <h3>Batas Pengerjaan <?php echo $r['merk'];?> adalah <?php echo $r['deadline']; ?> </h3>
  <?php endforeach ?>
</div>

</div>

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="">PENJADWALAN</a>
                   <h1 class="pull-right"><?php echo date("d-m-Y"); ?></h1>
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
                                    <a class="collapsed" data-toggle="collapse" href="">
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
                                <h1>Tabel Jadwal</h1>
                            </div>
                            <div class="module-body table">
                                    
                                    <table border="0" cellpading="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <tr>
                                        <td>No</td>
                                        <td>Merk</td>
                                        <td>Jumlah</td>
                                        <td>Nama Distributor</td>
                                        <td>Deadline</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                        
                                        </tr>
                                    <?php $i = 1; ?>
                                    <?php foreach($dt as $row) : ?>
                                        <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row["merk"] ?></td>
                                        <td><?php echo $row["jumlah"] ?></td>
                                        <td><?php echo $row["distributor"] ?></td>
                                        <td><?php echo $row["deadline"] ?></td>
                                        <td><a href="duplicate.php?id=<?php echo $row["id"] ?>"><button>Konfirmasi</button></a></td>
                                        <td>
                                                                        
                                        <a href="update.php?id=<?php echo $row["id"] ?>"><button>Update</button></a> | 
                                                                        
                                        <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="
                                        return confirm('yakin mau dihapus?');"><button>Hapus</button> </a></td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </table>
                                    <br>
                                    <br>
<button><a href="form.php" class="btn">Tambah Data</a></button>

<script>
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
            window.onload = function () {
                modal.style.display = "block"; 
}
span.onclick = function() {
  modal.style.display = "none";
}
        </script>

<script>

var dialog = bootbox.dialog({
    title: 'A custom dialog with buttons and callbacks',
    message: "<p>This dialog has buttons. Each button has it's own callback function.</p>",
    size: 'large',
    buttons: {
        cancel: {
            label: "I'm a cancel button!",
            className: 'btn-danger',
            callback: function(){
                console.log('Custom cancel clicked');
            }
        },
        noclose: {
            label: "I don't close the modal!",
            className: 'btn-warning',
            callback: function(){
                console.log('Custom button clicked');
                return false;
            }
        },
        ok: {
            label: "I'm an OK button!",
            className: 'btn-info',
            callback: function(){
                console.log('Custom OK clicked');
            }
        }
    }
});
</script>
