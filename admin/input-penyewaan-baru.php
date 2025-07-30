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
                            <h4 class="page-title pull-left">Surat Masuk</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin.php">Surat Masuk</a></li>
                                <li><span>Surat Keluar</span></li>
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
                                        <h4 class="header-title">Silahkan Mengisi Data Surat Masuk</h4>
<?php
include "../koneksi.php";
$idx=$_GET['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);

$tanggal=$da ['tglpenyewaan'];
$jatuhtempo=date('Y-m-d', strtotime('+1 month', strtotime($tanggal)));
$akhirbln=date('Y-m-d', strtotime('last day of this month', strtotime($tanggal)));
?>
										<form action='input-penyewaan-baru-prosesnya.php'enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="idpenyewaan" name="idpenyewaan" value="<?php echo $da ['idpenyewaan'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>NIK</label>
												<input type="text" class="form-control" id="nik" name="nik" value="<?php echo $da ['idpenghuni'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Nama</label>
												<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $da ['nama'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Tgl penyewaan</label>
                                                <input type="date" class="form-control" id="tglpenyewaan" name="tglpenyewaan" value="<?php echo $da ['tglpenyewaan'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Jatuh tempo</label>
                                                <input type="date" class="form-control" id="jatuhtempo" name="jatuhtempo" value="<?php echo $akhirbln;?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Tarif</label>
                                                <input type="text" class="form-control" id="tarif" name="tarif" value="<?php echo $da ['tarif'];?>" required readonly="readonlys">
                                            </div>
                                            <div class="form-group">
												<label>Bayar bulanan</label>
												<input type="text" class="form-control" id="bayar" name="bayar" value="<?php echo $da ['tarif'];?>" required readonly="readonlys">
											</div>
<?php 
$dede=$da ['tarif'];
$jaminan=3*$dede;?>
                                            <div class="form-group">
												<label>Jaminan</label>
												<input type="text" class="form-control" id="jaminan" name="jaminan" value="<?php echo $jaminan;?>" required readonly="readonlys">
											</div>
                                            <div class="form-group">
												<label>Tgl pembayaran</label>
												<input type="date" class="form-control" id="tglpembayaran" name="tglpembayaran" value="" required>
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
