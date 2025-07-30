 <html class="no-js" lang="en"> <!--<![endif]-->
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
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
$tanggalini=tgl_indo(date('Y-m-d')); // 21 Oktober 2017
$tglawala=$_POST['tglawala'];
$tglakhira=$_POST['tglakhira'];
?>


        <meta charset="utf-8">
        <title>Dinas PKPLH</title>
         

        <!--Google Font link-->
 </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
<center>
<h1 class="text-black" style="width:50%; font-size:30px">DINAS PERUMAHAN, KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP</h1>
<p>Jalan AKBP R. Agil Kusumadya No. IA Kudus Kode Pos 59346 </br>Telpon (0291) 435190 Faks (0291) 432808 </br>E-mail : dinaspkplh@kuduskab.go.id</p>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  text-align:center;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
  text-align:center;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<table border="1px" style="width:90%;">
<thead>

                                             
												<th>No</th>
												<th>Nama</th>
												<th>Id kamar</th>
												<th>Masa pemakaian</th>
												<th>Tgl pembayaran</th>
												<th>Bayar</th>
												<th>Denda</th>
												<th>Sampah</th>
												<th>Air</th>
												<th>Status</th>
			</thead>
			<tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from pembayaran,penyewaan where pembayaran.idpenyewaan=penyewaan.idpenyewaan and pembayaran.statuspembayaran='Lunas' and pembayaran.tglpembayaran between '$tglawala' and '$tglakhira' and penyewaan.idkamar between '$level1' and '$level2' order by pembayaran.tglpembayaran desc,penyewaan.idkamar asc");
$jml1=0;
$jml2=0;
$jml3=0;
$jml4=0;
$total=0;
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $idpem=$ambil['idpembayaran']; ?> <?php $idpeny=$ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$tglidx=$ambil['tglpembayaran'];
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);


$jthtemponea=$ambil['jatuhtempo'];
$blnlalu1= date('Y-m-d', strtotime('-45 day', strtotime($jthtemponea)));
$blnlalu2=date('Y-m-d', strtotime('last day of this month', strtotime($blnlalu1)));



$cek1=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idx' and jthtempo='$blnlalu2'");
if(mysqli_num_rows($cek1)>0) {
$que2=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idx' and jthtempo='$blnlalu2' and tglbyr='$tglidx'");
	$da2 = mysqli_fetch_array($que2);
	$idsam=$da2['idsampah'];
	$tglbyrsampah=$da2['tglbyr'];
	$byrsampah=$da2['byr'];
}else{
	$tglbyrsampah='0000-00-00';
	$byrsampah=0;
}

$cek2=mysqli_query($koneksi,"select *from air where idpenyewaan='$idx' and jthtmpair='$blnlalu2'");
if(mysqli_num_rows($cek2)>0) {
$que3=mysqli_query($koneksi,"select *from air where idpenyewaan='$idx' and jthtmpair='$blnlalu2' and tglbyrair='$tglidx'");
	$da3 = mysqli_fetch_array($que3);
	$idair=$da3['idair'];
	$tglbyrair=$da3['tglbyrair'];
	$byrair=$da3['byrair'];
}else{
	$tglbyrair='0000-00-00';
	$byrair=0;
}

?>
<td><?php echo $da['nama']; ?> <?php $blnlalu2; ?></td>
<td><?php echo $da['idkamar'];  $idsam;  $idair;?></td>
<td><?php echo date("d-m-Y",strtotime($jatuhtemposewaa=$ambil['jatuhtempo'])); ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['tglpembayaran'])); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['tarifsaatitu'], 0, ',', '.'); ?></td>
<?php $hasil1=$ambil['tarifsaatitu'];  $jml1+=$hasil1;?>
<td><?php echo 'Rp.'.number_format($ambil['denda'], 0, ',', '.'); ?></td>
<?php $hasil2=$ambil['denda'];  $jml2+=$hasil2;?>
<td><?php echo 'Rp.'.number_format($byrsampah, 0, ',', '.'); ?></td>
<?php $hasil3=$byrsampah;  $jml3+=$hasil3;?>
<td><?php echo 'Rp.'.number_format($byrair, 0, ',', '.'); ?></td>
<?php $hasil4=$byrair;  $jml4+=$hasil4;?>
<td><?php echo $ambil['statuspembayaran']; ?></td>

</tr>
<?php 
}
?>
                                        </tbody>

<?php 
// jika ada yang keluar
$cek1=mysqli_query($koneksi,"select * from nonaktif where tglnonaktif between '$tglawala' and '$tglakhira'");
if(mysqli_num_rows($cek1)>0) {
	?>
<tbody>
<tr>
<td colspan=10>Penghuni Sudah Keluar</td>
</tr>
</tbody>
			<tbody>
<?php
include '../koneksi.php'; //koneksi database
$noa=1;
$tahuninia=date("Y");
$selecta=mysqli_query($koneksi,"select * from air,penyewaan where air.idpenyewaan=penyewaan.idpenyewaan and penyewaan.statuspenyewaan='Non aktif' and air.stsbyrair='Lunas' and air.jthtmpair<='$jatuhtemposewaa' and air.tglbyrair between '$tglawala' and '$tglakhira' and penyewaan.idkamar between '$level1' and '$level2' order by air.tglbyrair desc,penyewaan.idkamar asc");
$jml1a=0;
$jml2a=0;
$jml3a=0;
$jml4a=0;
$totala=0;
while ($ambila=mysqli_fetch_array($selecta)){
?>
<tr>
<td><?php echo $noa++; ?> <?php $idpema=$ambila['idair']; ?> <?php $idpenya=$ambila['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idxa=$ambila['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$tglidxa=$ambila['tglbyrair'];
$quea=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idxa'");
$daa = mysqli_fetch_array($quea);


$jthtemponeaa=$ambila['jthtmpair'];

$que2a=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idxa' and jthtempo='$jthtemponeaa' and tglbyr='$tglidxa'");
$da2a = mysqli_fetch_array($que2a);
$idsama=$da2a['idsampah'];

$que3a=mysqli_query($koneksi,"select *from air where idpenyewaan='$idxa' and jthtmpair='$jthtemponeaa' and tglbyrair='$tglidxa'");
$da3a = mysqli_fetch_array($que3a);
$idaira=$da3a['idair'];

?>
<td><?php echo $daa['nama']; ?></td>
<td><?php echo $daa['idkamar'];  $idsama;  $idaira;?></td>
<td><?php echo date("d-m-Y",strtotime($jatuhtemposewaa)); ?></td>
<td><?php echo date("d-m-Y",strtotime($ambila['tglbyrair'])); ?></td>
<td><?php echo 'Rp.'.number_format(0, 0, ',', '.'); ?></td>
<?php $hasil1a=0;  $jml1a+=$hasil1a;?>
<td><?php echo 'Rp.'.number_format(0, 0, ',', '.'); ?></td>
<?php $hasil2a=0;  $jml2a+=$hasil2a;?>
<td><?php echo 'Rp.'.number_format($da2a['byr'], 0, ',', '.'); ?></td>
<?php $hasil3a=$da2a['byr'];  $jml3a+=$hasil3a;?>
<td><?php echo 'Rp.'.number_format($da3a['byrair'], 0, ',', '.'); ?></td>
<?php $hasil4a=$da3a['byrair'];  $jml4a+=$hasil4a;?>
<td><?php echo $ambila['stsbyrair']; ?></td>

</tr>
<?php 
}
?>
                                        </tbody>
<?php
}else {
	$jml1a=0;
	$jml2a=0;
	$jml3a=0;
	$jml4a=0;
}
// tutup jika ada yang keluar
?>


										<tbody>
<td colspan=5><b>TOTAL</b></td>
<td><b><?php echo 'Rp.'.number_format($toto1=$jml1+$jml1a, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($toto2=$jml2+$jml2a, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($toto3=$jml3+$jml3a, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($toto4=$jml4+$jml4a, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmlttl=$toto1+$toto2+$toto3+$toto4, 0, ',', '.'); ?></b></td>
</tr>								
										</tbody>
<p>Laporan perbulan : <?php echo date("d-m-Y",strtotime($tglawala)); ?> - <?php echo date("d-m-Y",strtotime($tglakhira)); ?></p>

</table>
<center>

		<br><br>Kudus, <?php echo $tanggalini; ?><br><p class="p">Mengetahui,</p><br><br><br><b>Drs. Abdul Halil</b></td>
<!--<script>
window.print();
</script>-->
		</center>
    </body>
</html>