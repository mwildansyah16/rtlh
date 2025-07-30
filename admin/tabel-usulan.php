<!doctype html>
<html class="no-js" lang="en">
<?php
session_start();
include '../koneksi.php';

if ((isset($_SESSION['level']))&&($_SESSION['level']=='admin')){
	$iduser=$_SESSION['iduser'];
}
else {
	echo "<script>window.location='../index.php'</script>";
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
                            <h4 class="page-title pull-left">Penilaian</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin.php">Dashboard</a></li>
                                <li><span>Data usulan</span></li>
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
                                <h4 class="header-title">DATA PENILAIAN RTLH</h4> 
								<form  role="form" action="cetak-usulan.php" target="_blank" method="POST" >
								<div class="row">
                                <div class="form-group col-md-3">
											<label><b>Kecamatan</b></label>
<select style="height:45px;" class="form-control"  id="kecamatan" name="kecamatan" required>
<option> Silahkan Pilih..</option>

                <?php
				include '../koneksi.php';
                $query1=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY idkecamatan");
                while ($row1= mysqli_fetch_array($query1)) {
                ?>
                    <option value="<?php echo $row1['kecamatan']; ?>">
                         <?php echo $row1['kecamatan']; ?>
                    </option>

                <?php } ?>

</select>
								</div>
								<div class="form-group col-md-3">
											<label><b>Desa</b></label>
<select style="height:45px;" class="form-control"  id="desa" name="desa" required>
                <option value="">Silahkan Pilih..</option>
                <?php
				include '../koneksi.php';
                $query2= mysqli_query($koneksi,"SELECT * FROM desa INNER JOIN kecamatan ON desa.idkecamatan = kecamatan.idkecamatan ORDER BY iddesa");
				while ($row2= mysqli_fetch_array($query2)) {
                ?>

                    <option id="desa" class="<?php echo $row2['kecamatan']; ?>" value="<?php echo $row2['desa']; ?>">
                        <?php echo $row2['desa']; ?>
                    </option>

<?php } ?>

</select>
								</div>
								<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" name="cetak" class="btn btn-success form-control"><i class="fa fa-print"> Cetak</i></button>  
                                </div>
								<!--<div class="form-group">
								<label>&nbsp;</label>
								<button type="submit" name="download" class="btn btn-primary form-control"><i class="fa fa-download"> Download</i></button>  
                                </div>-->
								
								</div>
								</form>
								
								<div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
												<th>No</th>
                                                <th>Kecamatan</th>
												<th>Desa</th>
												<th>Alamat</th>
                                                <th>Nama</th>
												<th>Aksi</th>
			</thead>
			<tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from penerima order by kecamatan asc,desa asc, nama asc");
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; $idpenerima=$ambil['idpenerima']; ?></td>
<td><?php echo $ambil['kecamatan']; ?></td>
<td><?php echo $ambil['desa']; ?></td>
<td><?php echo $ambil['alamatlengkap']; ?></td>
<td><?php echo $ambil['nama']; ?></td>
<td><a href="edit-usulan.php?idpenerima=<?php echo $ambil['idpenerima'];?>"><button type="button" class="btn btn-success mb-3"><i class="fa fa-pencil"> </i></button></a>
<a href="lihat-usulan.php?idpenerima=<?php echo $ambil['idpenerima'];?>" target="_blank"><button type="button" class="btn btn-primary mb-3"><i class="fa fa-eye"> </i></button></a></td>
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
                <p>© Copyright 2021. Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup Kabupaten Kudus.</p>
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
	
		<!-- dropdown bertingkat alamat -->
	<script src="../assets/js/jquery-1.10.2.min.js"></script>
	<script src="../assets/js/jquery.chained.min.js"></script>
        <script>
            $("#desa").chained("#kecamatan");
        </script>
</body>

</html>
