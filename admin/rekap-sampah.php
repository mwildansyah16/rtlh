<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include '../koneksi.php';

if ((isset($_SESSION['level']))&&($_SESSION['level']=='1101')){
	$iduser=$_SESSION['iduser'];
	$level1=$_SESSION['level1'];
	$level2=$_SESSION['level2'];
}
else {
	if ((isset($_SESSION['level']))&&($_SESSION['level']=='2101')){
	$iduser=$_SESSION['iduser'];
	$level1=$_SESSION['level1'];
	$level2=$_SESSION['level2'];
}
else {
	if ((isset($_SESSION['level']))&&($_SESSION['level']=='3101')){
	$iduser=$_SESSION['iduser'];
	$level1=$_SESSION['level1'];
	$level2=$_SESSION['level2'];
}
else {
	if ((isset($_SESSION['level']))&&($_SESSION['level']=='4101')){
	$iduser=$_SESSION['iduser'];
	$level1=$_SESSION['level1'];
	$level2=$_SESSION['level2'];
}
else {
	echo "<script>window.location='../index.php'</script>";
}
}
}
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dinas PKPLH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.jqueryui.min.css">
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
        <?php include "menu-admin.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "header-admin.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Pembayaran</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin.php">Home</a></li>
                                <li><span>Data rekap harian sampah</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php include "toolbar-kanan-admin.php";?>
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
                                <h4 class="header-title">Data rekap harian sampah</h4> 
								<form  role="form" action="cetak-rekap-harian-sampah.php" target="_blank" method="POST" >
								<div class="row">
								<div class="form-group col-md-4">
                                <label>Tanggal awal</label>
                                <input type="date" class="form-control" id="tglawala" name="tglawala"  required>
								</div>
								<div class="form-group col-md-4">
                                <label>Tanggal akhir</label>
                                <input type="date" class="form-control" id="tglakhira" name="tglakhira"  required>
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
                                                <th>Masa pemakaian</th>
												<th>Bayar</th>
												<th>Tgl pembayaran</th>
												<th>Status</th>
												<!--<th>Struk</th>-->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from sampah,penyewaan where sampah.idpenyewaan=penyewaan.idpenyewaan and sampah.stsbyr='Lunas' and penyewaan.idkamar between '$level1' and '$level2' order by sampah.tglbyr desc,penyewaan.idkamar asc");
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $idpem=$ambil['idsampah']; ?> <?php $idpeny=$ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);
?>
<td><?php echo $da['nama']; ?></td>
<td><?php echo $da['idkamar']; ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['jthtempo'])); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['byr'], 0, ',', '.'); ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['tglbyr'])); ?></td>
<td><?php echo $ambil['stsbyr']; ?></td>
<!--<td><?php $cek2=mysqli_query($koneksi,"select * from struk where idpenyewaan='$idpeny' and idsampah='$idpem'");
$nie = mysqli_fetch_array($cek2);
$cek4=$nie['token'];
if(mysqli_num_rows($cek2)<1) {
	?>
	<a href="input-struk-sampah.php?idpenyewaan=<?php echo $idpeny;?>&&idsampah=<?php echo $idpem;?>"><button type="button" class="btn btn-primary mb-3"><i class="fa fa-pencil"> Buat</i></button></a>
	
<?php
}else {
	if($cek4==0){
			?>
			 Sdh tercetak
			<?php
	}else{
	?>
	<a target='_blank' href="cetak-struk-sampah.php?idpenyewaan=<?php echo $idpeny;?>&&idsampah=<?php echo $idpem;?>"><button type="button" class="btn btn-success mb-3"><i class="fa fa-print"> Cetak</i></button></a>
<?php
}}?></td>-->

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
    <script src="../assets/js/jquery.dataTables.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
	<script src="../assets/js/dataTables.responsive.min.js"></script>
    <script src="../assets/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/scripts.js"></script>
</body>

</html>
