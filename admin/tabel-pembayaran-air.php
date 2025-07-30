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
                                <li><span>Data air</span></li>
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
                                <h4 class="header-title">Data air</h4> 
								<form  role="form" action="cetak-pembayaran-air.php" target="_blank" method="POST" >
								<div class="row">
								<div class="form-group col-md-4">
                                            <label>Tahun</label>
                                            <select style="height:45px;" class="form-control" name="tahun" id="tahun" required>
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
												<th>Kamar</th>
												<th>Tahun</th>
                                                <th>Januari</th>
												<th>Februari</th>
												<th>Maret</th>
												<th>April</th>
												<th>Mei</th>
												<th>Juni</th>
												<th>Juli</th>
												<th>Agustus</th>
												<th>September</th>
												<th>Oktober</th>
												<th>November</th>
												<th>Desember</th>
												<th>Jumlah</th>
												
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from air group by idpenyewaan");
$select=mysqli_query($koneksi,"select * from air,penyewaan where air.idpenyewaan=penyewaan.idpenyewaan and penyewaan.idkamar between '$level1' and '$level2' group by air.idpenyewaan order by penyewaan.idkamar asc");
$jml1=0;
$jml2=0;
$jml3=0;
$jml4=0;
$jml5=0;
$jml6=0;
$jml7=0;
$jml8=0;
$jml9=0;
$jml10=0;
$jml11=0;
$jml12=0;
$total=0;
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $ambil['idair']; ?> <?php $ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);
?>
<td><?php echo $da['nama']; ?></td>
<td><?php echo $da['idkamar']; ?></td>
<td><?php $thnpo=date("Y",strtotime($ambil['jthtmpair'])); echo $thnpo; ?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek1=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='01' and year(jthtmpair)='$thnpo'");
$da1 = mysqli_fetch_array($cek1);
if ((mysqli_num_rows($cek1)>0)){
	$pl1=$da1['byrair'];
	$hasil1='Rp.'.number_format($pl1, 0, ',', '.');
	if($pl1<0){
	$pl1=0;}else{
	$pl1=$pl1;}
	$hasil1=$pl1; 
}
else {
	$hasil1=null;
} ?>

<td><?php echo $hasil1; $jml1+=$hasil1;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek2=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='02' and year(jthtmpair)='$thnpo'");
$da2 = mysqli_fetch_array($cek2);
if ((mysqli_num_rows($cek2)>0)){
	$pl2=$da2['byrair'];
	$hasil2='Rp.'.number_format($pl2, 0, ',', '.');
	if($pl2<0){
	$pl2=0;}else{
	$pl2=$pl2;}
	$hasil2=$pl2; 
}
else {
	$hasil2=null; 
} ?>

<td><?php echo $hasil2; $jml2+=$hasil2;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek3=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='03' and year(jthtmpair)='$thnpo'");
$da3 = mysqli_fetch_array($cek3);
if ((mysqli_num_rows($cek3)>0)){
	$pl3=$da3['byrair'];
	$hasil3='Rp.'.number_format($pl3, 0, ',', '.');
	if($pl3<0){
	$pl3=0;}else{
	$pl3=$pl3;}
	$hasil3=$pl3; 
}
else {
	$hasil3=null;
} ?>

<td><?php echo $hasil3; $jml3+=$hasil3;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek4=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='04' and year(jthtmpair)='$thnpo'");
$da4 = mysqli_fetch_array($cek4);
if ((mysqli_num_rows($cek4)>0)){
	$pl4=$da4['byrair'];
	$hasil4='Rp.'.number_format($pl4, 0, ',', '.');
	if($pl4<0){
	$pl4=0;}else{
	$pl4=$pl4;}
	$hasil4=$pl4; 
}
else {
	$hasil4=null;
} ?>

<td><?php echo $hasil4; $jml4+=$hasil4;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek5=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='05' and year(jthtmpair)='$thnpo'");
$da5 = mysqli_fetch_array($cek5);
if ((mysqli_num_rows($cek5)>0)){
	$pl5=$da5['byrair'];
	$hasil5='Rp.'.number_format($pl5, 0, ',', '.');
	if($pl5<0){
	$pl5=0;}else{
	$pl5=$pl5;}
	$hasil5=$pl5; 
}
else {
	$hasil5=null;
} ?>

<td><?php echo $hasil5; $jml5+=$hasil5;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek6=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='06' and year(jthtmpair)='$thnpo'");
$da6 = mysqli_fetch_array($cek6);
if ((mysqli_num_rows($cek6)>0)){
	$pl6=$da6['byrair'];
	$hasil6='Rp.'.number_format($pl6, 0, ',', '.');
	if($pl6<0){
	$pl6=0;}else{
	$pl6=$pl6;}
	$hasil6=$pl6; 
}
else {
	$hasil6=null; 
} ?>

<td><?php echo $hasil6; $jml6+=$hasil6;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek7=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='07' and year(jthtmpair)='$thnpo'");
$da7 = mysqli_fetch_array($cek7);
if ((mysqli_num_rows($cek7)>0)){
	$pl7=$da7['byrair'];
	$hasil7='Rp.'.number_format($pl7, 0, ',', '.');
	if($pl7<0){
	$pl7=0;}else{
	$pl7=$pl7;}
	$hasil7=$pl7; 
}
else {
	$hasil7=null;
} ?>

<td><?php echo $hasil7; $jml7+=$hasil7;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek8=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='08' and year(jthtmpair)='$thnpo'");
$da8 = mysqli_fetch_array($cek8);
if ((mysqli_num_rows($cek8)>0)){
	$pl8=$da8['byrair'];
	$hasil8='Rp.'.number_format($pl8, 0, ',', '.');
	if($pl8<0){
	$pl8=0;}else{
	$pl8=$pl8;}
	$hasil8=$pl8; 
}
else {
	$hasil8=null;
} ?>

<td><?php echo $hasil8; $jml8+=$hasil8;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek9=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='09' and year(jthtmpair)='$thnpo'");
$da9 = mysqli_fetch_array($cek9);
if ((mysqli_num_rows($cek9)>0)){
	$pl9=$da9['byrair'];
	$hasil9='Rp.'.number_format($pl9, 0, ',', '.');
	if($pl9<0){
	$pl9=0;}else{
	$pl9=$pl9;}
	$hasil9=$pl9; 
}
else {
	$hasil9=null;
} ?>

<td><?php echo $hasil9; $jml9+=$hasil9;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek10=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='10' and year(jthtmpair)='$thnpo'");
$da10 = mysqli_fetch_array($cek10);
if ((mysqli_num_rows($cek10)>0)){
	$pl10=$da10['byrair'];
	$hasil10='Rp.'.number_format($pl10, 0, ',', '.');
	if($pl10<0){
	$pl10=0;}else{
	$pl10=$pl10;}
	$hasil10=$pl10; 
}
else {
	$hasil10=null;
} ?>

<td><?php echo $hasil10; $jml10+=$hasil10;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek11=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='11' and year(jthtmpair)='$thnpo'");
$da11 = mysqli_fetch_array($cek11);
if ((mysqli_num_rows($cek11)>0)){
	$pl11=$da11['byrair'];
	$hasil11='Rp.'.number_format($pl11, 0, ',', '.');
	if($pl11<0){
	$pl11=0;}else{
	$pl11=$pl11;}
	$hasil11=$pl11; 
}
else {
	$hasil11=null;
} ?>

<td><?php echo $hasil11; $jml11+=$hasil11;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek12=mysqli_query($koneksi,"select *from air where idpenyewaan='$idn' and month(jthtmpair)='12' and year(jthtmpair)='$thnpo'");
$da12 = mysqli_fetch_array($cek12);
if ((mysqli_num_rows($cek12)>0)){
	$pl12=$da12['byrair'];
	$hasil12='Rp.'.number_format($pl12, 0, ',', '.');
	if($pl12<0){
	$pl12=0;}else{
	$pl12=$pl12;}
	$hasil12=$pl12; 
}
else {
	$hasil12=null;
} ?>

<td><?php echo $hasil12; $jml12+=$hasil12;?></td>
<td><?php echo $tot=$hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12; $total+=$tot; ?></td>

</tr>
<?php 
}
?>
                                        </tbody>
										<tbody>
<td colspan=4><b>TOTAL</b></td>
<td><b><?php echo 'Rp.'.number_format($jml1, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml2, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml3, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml4, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml5, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml6, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml7, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml8, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml9, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml10, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml11, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml12, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($total, 0, ',', '.'); ?></b></td>
</tr>								
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
