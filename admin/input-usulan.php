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
                            <h4 class="page-title pull-left">Penilaian</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="admin.php">Dashboard</a></li>
                                <li><span>Input usulan</span></li>
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
                                        <h4 class="header-title">LEMBAR PENILAIAN RTLH</h4>

										<form action='input-usulan-prosesnya.php'enctype="multipart/form-data" method="POST">
                                            <div class="form-group">
												<label><b>Tanggal Survey</b></label>
												<input type="date" class="form-control" id="tglsurvey" name="tglsurvey"  required>
											</div>
											<div class="form-group">
												<label><b>Nama Petugas Surveyor</b></label>
												<input type="text" class="form-control" id="petugas" name="petugas"  required>
											</div>
											<div class="form-group">
												<label><b>NIK</b></label>
												<input type="number" class="form-control" id="nik" name="nik"  >
											</div>
											<div class="form-group">
												<label><b>No KK</b></label>
												<input type="number" class="form-control" id="nokk" name="nokk"  >
											</div>
											<div class="form-group">
                                            <label><b>Apakah Terdaftar di DTKS</b></label>
                                            <select style="height:45px;" class="form-control" name="dtks" id="dtks" >
                                                <option>Tidak</option>
												<option>Ya</option>
											</select>
											<input type="text" placeholder="Silahkan isi nomor DTKS" class="form-control" id="bb" name="bb" value="" hidden />
											</div>
<script src="../assets/js/jquery.min.js"></script>
<script type='text/javascript'>
$(window).load(function(){
$("#dtks").change(function() {
			console.log($("#dtks option:selected").val());
			if ($("#dtks option:selected").val() == 'Ya') {
				$('#bb').prop('hidden', false);
			} else {
				$('#bb').prop('hidden', true);
			}
		});
});
</script>	
											<div class="form-group">
                                            <label><b>Skala Prioritas</b></label>
                                            <select style="height:45px;" class="form-control" name="prioritas" id="prioritas" >
                                                <option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
											</div>	
											<div class="form-group">
												<label><b>Jumlah KK Dalam 1 Rumah</b></label>
												<input type="number" class="form-control" id="jmlkk" name="jmlkk"  >
											</div>
											<div class="form-group">
												<label><b>Nama</b></label>
												<input type="text" class="form-control" id="nama" name="nama"  required>
											</div>
											<div class="form-group">
												<label><b>Usia</b></label>
												<input type="number" class="form-control" id="usia" name="usia"  >
											</div>
											<div class="form-group">
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
											<div class="form-group">
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
												<label><b>Alamat Lengkap ( isikan Jalan / RT RW)</b></label>
												<input type="text" class="form-control" id="alamatlengkap" name="alamatlengkap"  required>
											</div>
											<div class="form-group">
                                            <label><b>Pendidikan terakhir</b></label>
                                            <select style="height:45px;" class="form-control" name="pendidikan" id="pendidikan" >
                                                <option>TIDAK PUNYA IJAZAH</option>
												<option>SD/SEDERAJAT</option>
												<option>SMP/SEDERAJAT</option>
												<option>SMA/SEDERAJAT</option>
												<option>D1/D2/D3</option>
												<option>D4/S1</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Jenis kelamin</b></label>
                                            <select style="height:45px;" class="form-control" name="jenkel" id="jenkel" required>
                                                <option>LAKI-LAKI</option>
												<option>PEREMPUAN</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Pekerjaan utama</b></label>
                                            <select style="height:45px;" class="form-control" name="pekerjaan" id="pekerjaan" required>
                                                <option>PNS</option>
												<option>TNI/POLRI</option>
												<option>BUMN/D</option>
												<option>PENSIUNAN</option>
												<option>PRAMUWISMA</option>
												<option>OJEK/SUPIR</option>
												<option>HONORER</option>
												<option>KARYAWAN</option>
												<option>TUKANG/MONTIR</option>
												<option>PETANI</option>
												<option>WIRAUSAHA</option>
												<option>LANSIA/RT</option>
												<option>NELAYAN</option>
												<option>BURUH HARIAN</option>
												<option>LAINNYA</option>
												<option>TIDAK BEKERJA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Penghasilan</b></label>
                                            <select style="height:45px;" class="form-control" name="penghasilan" id="penghasilan" required>
                                                <option>KURANG 1,2 JUTA</option>
												<option>1,9-2,1 JUTA</option>
												<option>2,2-2,6 JUTA</option>
												<option>2,7-3,1 JUTA</option>
												<option>3,2-3,6 JUTA</option>
												<option>3,7-4,2 JUTA</option>
												<option>LEBIH 4,2 JUTA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Status Kepemilikan Tanah</b></label>
                                            <select style="height:45px;" class="form-control" name="statustanah" id="statustanah" >
                                                <option>MILIK SENDIRI</option>
												<option>BUKAN MILIK SENDIRI</option>
												<option>TANAH NEGARA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Status Kepemilikan Rumah</b></label>
                                            <select style="height:45px;" class="form-control" name="statusrumah" id="statusrumah" >
                                                <option>MILIK SENDIRI</option>
												<option>BUKAN MILIK SENDIRI</option>
												<option>KONTRAK/SEWA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Aset Rumah Ditempat Lain</b></label>
                                            <select style="height:45px;" class="form-control" name="asetrumah" id="asetrumah" >
                                                <option>ADA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Aset Tanah Ditempat Lain</b></label>
                                            <select style="height:45px;" class="form-control" name="asettanah" id="asettanah" >
                                                <option>ADA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Pernah Mendapatkan Bantuan Perumahan</b></label>
                                            <select style="height:45px;" class="form-control" name="statusbantuan" id="statusbantuan" >
                                                <option>YA, LEBIH DARI 10 TAHUN YANG LALU</option>
												<option>YA, KURANG DARI 10 TAHUN YANG LALU</option>
												<option>BELUM PERNAH</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Jenis Kawasan Lokasi Rumah yang Ditempati</b></label>
                                            <select style="height:45px;" class="form-control" name="jeniskawasan" id="jeniskawasan" >
                                                <option>DIPERUNTUKKAN UNTUK PERMUKIMAN</option>
												<option>DATARAN BANJIR</option>
												<option>KEK</option>
												<option>PERBATASAN</option>
												<option>KUMUH</option>
												<option>TRANSMIGRASI</option>
												<option>RAWAN BENCANA</option>
												<option>KSPN</option>
												<option>PESISIR/NELAYAN</option>
												<option>PULAU-PULAU KECIL</option>
												<option>DAERAH TERTINGGAL DAN TERPENCIL</option>
												<option>DEKAT JALUR BAHAYA (JALUR KERETA, LERENG, SUTET)</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Pondasi</b></label>
                                            <select style="height:45px;" class="form-control" name="pondasi" id="pondasi" >
                                                <option>BAIK</option>
												<option>RUSAK RINGANA</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Sloof</b></label>
                                            <select style="height:45px;" class="form-control" name="sloof" id="sloof" >
                                                <option>BAIK</option>
												<option>RUSAK RINGANA</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Kolom/Tiang</b></label>
                                            <select style="height:45px;" class="form-control" name="kolom" id="kolom" >
                                                <option>BAIK</option>
												<option>RUSAK RINGANA</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Balok</b></label>
                                            <select style="height:45px;" class="form-control" name="balok" id="balok" >
                                                <option>BAIK</option>
												<option>RUSAK RINGANA</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Struktur Atap</b></label>
                                            <select style="height:45px;" class="form-control" name="strukturatap" id="strukturatap" >
                                                <option>BAIK</option>
												<option>RUSAK RINGANA</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Jendela/Lubang Cahaya</b></label>
                                            <select style="height:45px;" class="form-control" name="jendela" id="jendela" >
                                                <option>ADA, MENCUKUPI</option>
												<option>ADA, TIDAK MENCUKUPI</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Ventilasi</b></label>
                                            <select style="height:45px;" class="form-control" name="ventilasi" id="ventilasi" >
                                                <option>ADA, MENCUKUPI</option>
												<option>ADA, TIDAK MENCUKUPI</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kepemilikan Kamar Mandi</b></label>
                                            <select style="height:45px;" class="form-control" name="km" id="km" >
                                                <option>SENDIRI</option>
												<option>BERSAMA/MCK KOMUNAL</option>
												<option>TIDAK ADA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Jarak Sumber Air Minum</b></label>
                                            <select style="height:45px;" class="form-control" name="jarakair" id="jarakair" >
                                                <option>LEBIH DARI 10 METER</option>
												<option>KURANG DARI 10 METER</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Sumber Air Minum</b></label>
                                            <select style="height:45px;" class="form-control" name="sumberair" id="sumberair" >
                                                <option>PDAM</option>
												<option>AIR KEMASAN/ISI ULANG</option>
												<option>SUMUR</option>
												<option>MATA AIR</option>
												<option>AIR HUJAN</option>
												<option>LAINNYA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Sumber Listrik</b></label>
                                            <select style="height:45px;" class="form-control" name="sumberlistrik" id="sumberlistrik" >
                                                <option>PLN DENGAN METERAN</option>
												<option>PLN TANPA METERAN</option>
												<option>LISTRIK NON PLN</option>
												<option>BUKAN LISTRIK</option>
											</select>
											</div>
                                            <div class="form-group">
												<label><b>Luas Rumah (M2)</b></label>
												<input type="number" class="form-control" id="luas" name="luas"  >
											</div>
											<div class="form-group">
												<label><b>Jumlah Penghuni (Orang)</b></label>
												<input type="number" class="form-control" id="jmlpenghuni" name="jmlpenghuni"  >
											</div>
											<div class="form-group">
                                            <label><b>Material Atap Terluas</b></label>
                                            <select style="height:45px;" class="form-control" name="atap" id="atap" >
                                                <option>GENTENG</option>
												<option>ASBES</option>
												<option>SENG</option>
												<option>JERAMI</option>
												<option>IJUK</option>
												<option>DAUN-DAUN</option>
												<option>RUMBIA</option>
												<option>LAINNYA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Penutup Atap</b></label>
                                            <select style="height:45px;" class="form-control" name="kondisiatap" id="kondisiatap" >
                                                <option>BAIK</option>
												<option>RUSAK RINGAN</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Material Dinding Terluas</b></label>
                                            <select style="height:45px;" class="form-control" name="dinding" id="dinding" >
                                                <option>TEMBOK PLESTERAN</option>
												<option>TEMBOK TANPA PLESTERAN</option>
												<option>GRC/ASBES</option>
												<option>KAYU/PAPAN</option>
												<option>PLESTERAN ANYAMAN BAMBU</option>
												<option>ANYAMAN BAMBU/BILIK</option>
												<option>BAMBU</option>
												<option>RUMBIA</option>
												<option>LAINNYA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Dinding</b></label>
                                            <select style="height:45px;" class="form-control" name="kondisidinding" id="kondisidinding" >
                                                <option>BAIK</option>
												<option>RUSAK RINGAN</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Material Lantai Terluas</b></label>
                                            <select style="height:45px;" class="form-control" name="lantai" id="lantai" >
                                                <option>MARMER/GRANIT</option>
												<option>KERAMIK</option>
												<option>UBIN/TEGEL</option>
												<option>PLESTERAN</option>
												<option>KAYU</option>
												<option>BAMBU</option>
												<option>TANAH</option>
											</select>
											</div>
											<div class="form-group">
                                            <label><b>Kondisi Lantai</b></label>
                                            <select style="height:45px;" class="form-control" name="kondisilantai" id="kondisilantai" >
                                                <option>BAIK</option>
												<option>RUSAK RINGAN</option>
												<option>RUSAK SEDANG/SEBAGIAN</option>
												<option>RUSAK BERAT/SELURUHNYA</option>
											</select>
											</div>
                                            <div class="form-group">
                                                <label><b>Foto Rumah (Tampak Depan)</b></label>
                                                <input type="file" class="form-control" accept="image/*" name="file1" id="file1" value="browse" />
											</div>
											<div class="form-group">
                                                <label><b>Foto Rumah (Tampak Samping)</b></label>
                                                <input type="file" class="form-control" accept="image/*" name="file2" id="file2" value="browse" />
											</div>		
                                            <div class="form-group">
                                                <label><b>Foto Rumah (Dalam Rumah)</b></label>
                                                <input type="file" class="form-control" accept="image/*" name="file3" id="file3" value="browse" />
											</div>
											<div class="form-group">
                                                <label><b>Foto Rumah (Kamar Mandi)</b></label>
                                                <input type="file" class="form-control" accept="image/*" name="file4" id="file4" value="browse" />
											</div>	
                                            <div class="form-group">
												<label><b>Titik Lokasi</b></label>
												<input type="text" class="form-control" name="latitude" id="latitude" readonly='readonlys'>
												<input type="text" class="form-control" name="longitude" id="longitude" readonly='readonlys'>
<script type="text/javascript">
      function getLocation(){
        navigator.geolocation.getCurrentPosition(showPosition);
      }
      function showPosition(position){
        document.querySelector('#latitude').value = position.coords.latitude;
        document.querySelector('#longitude').value = position.coords.longitude;
      }
      getLocation();
    </script>

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
    <?php include "jquery-admin.php";?>
</body>

</html>
