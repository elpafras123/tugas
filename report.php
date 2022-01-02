<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;}
require 'function.php';

$dt = query("SELECT DISTINCT * FROM report ORDER BY deadline ASC");
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
                    <i class="icon-reorder shaded"></i></a><a class="brand" href="tabel.php">PENJADWALAN</a>
                   
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
                                <h1>Tabel Report</h1>
                            </div>
                            <div class="module-body table">
                                    
                                    <table border="0" cellpading="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
                                        <tr>
                                        <td>No</td>
                                        <td>Merk</td>
                                        <td>Jumlah</td>
                                        <td>Nama Distributor</td>
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
                                        <td>selesai</td>
                                        
                                        <td>
                                                                        
                                        
                                                                        
                                        <a href="hapus.php?id=<?php echo $row["id"] ?>" onclick="
                                        return confirm('yakin mau dihapus?');"><button>Hapus</button> </a></td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                    </table>
                                    <br>
                                    <br>


