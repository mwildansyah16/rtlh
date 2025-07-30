<!doctype html>
<html class="no-js" lang="en">
<?php include "head-admin.php";?>
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
                                <li><a href="admin.php">Pembayaran</a></li>
                                <li><span>Sampah</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php include "toolbar-kanan-admin.php";?>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Silahkan Mengisi Data Sampah</h4>
<?php
include "../koneksi.php";
$idx=$_GET['idsampah']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from sampah where idsampah='$idx'");
$da = mysqli_fetch_array($que);
$tanggal=$da ['jthtempo'];
$jatuhtempo=date('Y-m-d', strtotime('+1 month', strtotime($tanggal)));

$tgliniya=date('Y-m-d');
$idpenyewaan=$da ['idpenyewaan'];
$utang=$da ['byr'];
$cek1=mysqli_query($koneksi,"select * from sampah where byr<0 and stsbyr='Belum bayar' and idpenyewaan='$idpenyewaan'");
if(mysqli_num_rows($cek1)>0) {
	if($utang<0) {

		}
		else {
		echo "<script>alert('Orang ini memiliki tunggakan, silahkan lunasi terlebih dahulu!!!')</script>";
		echo "<script>document.location.href='javascript:history.go(-1)';</script>";
			}
}
else {

}
?>
										<form action='input-sampah-prosesnya.php'enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="idsampah" name="idsampah" value="<?php echo $da ['idsampah'];?>" required readonly="readonlys">
												<input type="hidden" class="form-control" id="idpenyewaan" name="idpenyewaan" value="<?php echo $da ['idpenyewaan'];?>" required readonly="readonlys">
                                            </div>
<?php
include "../koneksi.php";
$idx=$_GET['idsampah']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que1=mysqli_query($koneksi,"select *from sampah,penyewaan,penghuni where sampah.idpenyewaan=penyewaan.idpenyewaan and penyewaan.idpenghuni=penghuni.idpenghuni and sampah.idsampah='$idx'");
$da1 = mysqli_fetch_array($que1);
?>
											<div class="form-group">
                                                <label>Nama</label>
												<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $da1 ['nama'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Masa pemakaian</label>
                                                <input type="date" class="form-control" id="jthtempo" name="jthtempo" value="<?php echo $tanggal;?>" required readonly="readonlys">
                                            </div>
<?php 

$byr=$da ['byr'];
if($byr<0){ // cek jika denda lbh dr 100000 (maksimal denda adlh 100000))
	$byr=$byr*(-1); //besar denda jika telat
	}else{
	if($tanggal<'2021-09-01'){
		$byr=8000;
	
}else{
	$byr=3000;
	
}
	}
?>
											<div class="form-group">
                                                <label>Tarif</label>
                                                <input type="text" class="form-control" id="byr" name="byr" value="<?php echo $byr;?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
												<label>Tgl pembayaran</label>
												<input type="date" class="form-control" id="tglbyr" name="tglbyr" value="" required>
											</div>
											<button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                            <!-- basic form start -->
                            <!-- basic form end -->
                            <!-- Input Sizes start -->
                            <!-- Input Sizes end -->
                            <!-- Input Sizes Rounded start -->
                            <!-- Input Sizes Rounded end -->
                            <!-- Input Grid start -->
                            <!-- Input Grid end -->
                            <!-- Disabled forms start -->
                            <!-- Disabled forms end -->
                            <!-- Server side start -->
                            <!-- Server side end -->
                            <!-- Input Group start -->
                            <!-- Input Group end -->
                            <!-- Custom file input start -->
                            <!-- Custom file input end -->
                        </div>
                    </div>
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
    <?php include "jquery-admin.php";?>
</body>

</html>
