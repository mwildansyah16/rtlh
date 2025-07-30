<!doctype html>
<html class="no-js" lang="en">
<?php include "head-sekretaris.php";?>
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
        <?php include "menu-sekretaris.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "header-sekretaris.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Surat Keluar</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="sekretaris.php">Surat keluar</a></li>
                                <li><span>Surat Keluar</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php include "toolbar-kanan-sekretaris.php";?>
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
                                        <h4 class="header-title">Silahkan Mengisi Data Surat Keluar</h4>
<?php
include "../koneksi.php";
$idx=$_GET['idsuratkeluar']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from suratkeluar where idsuratkeluar='$idx'");
$da = mysqli_fetch_array($que);
?>
										<form action='edit-surat-keluar-sekretaris-prosesnya.php'enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
                                                <label>Tanggal surat</label>
												<input type="hidden" class="form-control" id="idsuratkeluar" name="idsuratkeluar" value="<?php echo $da ['idsuratkeluar'];?>" required>
                                                <input type="text" class="form-control" id="indek" name="indek" value="<?php echo $da ['indek'];?>" required>
                                            </div>
											<div class="form-group">
                                                <label>Kode</label>
                                                <input type="text" class="form-control" id="kode" name="kode" value="<?php echo $da ['kode'];?>" required>
                                            </div>
											<div class="form-group">
                                                <label>No urut</label>
                                                <input type="text" class="form-control" id="nourut" name="nourut" value="<?php echo $da ['nourut'];?>" required>
                                            </div>
                                            <div class="form-group">
												<label>Isi ringkasan</label>
												<textarea class="form-control" id="isiringkasan" name="isiringkasan" value="" required><?php echo $da ['isiringkasan'];?></textarea>
											</div>
                                            <div class="form-group">
                                                <label>Kepada</label>
                                                <input type="text" class="form-control" id="kepada" name="kepada" value="<?php echo $da ['kepada'];?>" required>
                                            </div>
                                            <div class="form-group">
												<label>Tanggal surat</label>
												<input type="date" class="form-control" id="tglsuratkeluar" name="tglsuratkeluar" value="<?php echo $da ['tglsuratkeluar'];?>" required>
											</div>
											<div class="form-group">
												<label>Bidang</label>
												<input type="text" class="form-control" id="bidang" name="bidang"  value="<?php echo $da ['bidang'];?>" required readonly="readonlys">
											</div>
											<div class="form-group">
                                                <label>File</label>
                                                <input type="file" class="form-control" accept="image/*" name="file" id="file" value="<?php echo $da ['file'];?>" />
											<div class="form-group">
                                                <label>Lampiran</label>
                                                <textarea class="form-control" id="lampiran" name="lampiran" value="" required><?php echo $da ['lampiran'];?></textarea>
                                            </div>
											<div class="form-group">
                                            <label>Status surat</label>
                                            <select style="height:45px;" class="form-control" name="statussuratkeluar" id="statussuratkeluar" value="<?php echo $da ['statussuratkeluar'];?>" required>
                                                <option><?php echo $da ['statussuratkeluar'];?></option>
												<option>Biasa</option>
												<option>Undangan</option>
											</select>
											</div>
											<div class="form-group">
                                                <label>Catatan</label>
                                                <textarea class="form-control" id="catatan" name="catatan" value="" ><?php echo $da ['catatan'];?></textarea>
                                            </div>
											<div class="form-group">
                                            <label>Aprove</label>
                                            <select style="height:45px;" class="form-control" name="aprove" id="aprove" value="<?php echo $da ['aprove'];?>" required>
                                                <option><?php echo $da ['aprove'];?></option>
												<option>Selesai</option>
												<option>Belum selesai</option>
											</select>
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
    <?php include "jquery-sekretaris.php";?>
</body>

</html>
