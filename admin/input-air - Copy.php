<!doctype html>
<html class="no-js" lang="en">
<?php include "head-rusun.php";?>
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
                                <li><a href="rusun.php">Pembayaran</a></li>
                                <li><span>Air</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php include "toolbar-kanan-rusun.php";?>
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
                                        <h4 class="header-title">Silahkan Mengisi Data Air</h4>
<?php
include "../koneksi.php";
$idx=$_GET['idair']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from air where idair='$idx'");
$da = mysqli_fetch_array($que);
$tanggal=$da ['jthtmpair'];
$jatuhtempo=date('Y-m-d', strtotime('+1 month', strtotime($tanggal)));
$akhirbln=date('Y-m-d', strtotime('last day of this month', strtotime($tanggal)));
?>
										<form action='input-air-prosesnya.php'enctype="multipart/form-data" method="POST" id="formD" name="formD">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="idair" name="idair" value="<?php echo $da ['idair'];?>" required readonly="readonlys">
												<input type="hidden" class="form-control" id="idpenyewaan" name="idpenyewaan" value="<?php echo $da ['idpenyewaan'];?>" required readonly="readonlys">
                                            </div>
<?php
include "../koneksi.php";
$idx=$_GET['idair']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que1=mysqli_query($koneksi,"select *from air,penyewaan,penghuni where air.idpenyewaan=penyewaan.idpenyewaan and penyewaan.idpenghuni=penghuni.idpenghuni and air.idair='$idx'");
$da1 = mysqli_fetch_array($que1);
?>
											<div class="form-group">
                                                <label>Nama</label>
												<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $da1 ['nama'];?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Jatuh tempo</label>
                                                <input type="date" class="form-control" id="jthtmpair" name="jthtmpair" value="<?php echo $tanggal;?>" required readonly="readonlys">
                                            </div>
											<div class="form-group">
                                                <label>Volume</label>
                                                <input type="text" class="form-control" id="volume" name="volume"  onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" required>
                                            </div>
											<div class="form-group">
                                                <label>Tarif</label>
                                                <input type="text" class="form-control" id="byrair" name="byrair" value="" required  readonly="readonlys">
                                            </div>
<script type="text/javascript" language="Javascript">
   jumlah = document.formD.volume.value;
   document.formD.byrair.value = jumlah;
   function OnChange(value){
     jumlah = document.formD.volume.value;
     if(jumlah>=21){
		 jumlaha=jumlah-20;
		 hargasatuan=1000;
		 hargasatuan2=1200;
	 total = (hargasatuan * 20)+(hargasatuan2 * jumlaha);
     document.formD.byrair.value = total;
	 }else{
		 hargasatuan=1000;
	 total = hargasatuan * jumlah;
     document.formD.byrair.value = total;
	 }

   }
</script>
											<div class="form-group">
												<label>Tgl pembayaran</label>
												<input type="date" class="form-control" id="tglbyrair" name="tglbyrair" value="" required>
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
                <p>© Copyright 2021. Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hudup Kabupaten Kudus.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <!-- offset area end -->
    <!-- jquery latest version -->
    <?php include "jquery-rusun.php";?>
</body>

</html>
