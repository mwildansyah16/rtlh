<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include '../koneksi.php';

if ((isset($_SESSION['level']))&&($_SESSION['level']=='rusun')){
	$iduser=$_SESSION['iduser'];
}
else {
	echo "<script>window.location='../index.php'</script>";
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Surat Dinas PKPLH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../assets/css/typography.css">
    <link rel="stylesheet" href="../assets/css/default-css.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include "menu-rusun.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "header-rusun.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Pembayaran</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="rusun.php">Home</a></li>
                                <li><span>Data pembayaran</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php include "toolbar-kanan-rusun.php";?>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- data table start -->
                    <!-- data table end -->
                    <!-- Primary table start -->
                    <!-- Primary table end -->
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Data pembayaran</h4> 
								<form  role="form" action="cetak-surat-keluar-rusun.php" target="_blank" method="POST" >
								<div class="row">
								<div class="form-group col-md-4">
                                            <label>Bulan</label>
                                            <select style="height:45px;" class="form-control" name="bulan" id="bulan" required>
                                                <option value="01">Januari</option>
												<option value="02">Februari</option>
												<option value="03">Maret</option>
												<option value="04">April</option>
												<option value="05">Mei</option>
												<option value="06">Juni</option>
												<option value="07">Juli</option>
												<option value="08">Agustus</option>
												<option value="09">September</option>
												<option value="10">Oktober</option>
												<option value="11">November</option>
												<option value="12">Desember</option>
												
                                            </select>
								</div>
								<div class="form-group col-md-4">
                                            <label>Tahun</label>
                                            <select style="height:45px;" class="form-control" name="tahun" id="tahun" required>
                                                <option>2019</option>
												<option>2020</option>
												<option>2021</option>
												<option>2022</option>
												<option>2023</option>
												<option>2024</option>
												<option>2025</option>
												<option>2026</option>
												<option>2027</option>
												<option>2028</option>
												<option>2029</option>
												
                                            </select>
								</div>
								<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" class="btn btn-success form-control"><i class="fa fa-print"> Cetak</i></button>
                                </div>
								</div>
								</form>
								<div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
											<th>No</th>
                                                <th>Nama</th>
												<th>Id kamar</th>
                                                <th>Jatuh tempo</th>
												<th>Tarif saat itu</th>
												<th>Denda</th>
												<th>Bayar</th>
												<th>Tgl pembayaran</th>
												<th>Status</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from pembayaran,penyewaan where pembayaran.idpenyewaan=penyewaan.idpenyewaan order by pembayaran.jatuhtempo asc");
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $ambil['idpembayaran']; ?> <?php $ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);
?>
<td><?php echo $da['nama']; ?></td>
<td><?php echo $da['idkamar']; ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['jatuhtempo'])); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['tarifsaatitu'], 0, ',', '.'); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['denda'], 0, ',', '.'); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['bayar'], 0, ',', '.'); ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['tglpembayaran'])); ?></td>
<td><?php echo $ambil['statuspembayaran']; ?></td>

</tr>
<?php 
}
?>

                                        </tbody>
									</table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2021. Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hudup Kabupaten Kudus.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/metisMenu.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../assets/js/jquery.slicknav.min.js"></script>

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
