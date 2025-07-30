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

$tglini=date("Y-m-d");
$tahunini=date("Y");
$blnini=date('m'); // waktu sekarang
$a=$_GET['idpenyewaan']; 

$que1=mysqli_query($koneksi,"select *from pembayaran where month(jatuhtempo)<='$blnini' and year(jatuhtempo)<='$tahunini' and idpenyewaan='$a'");
$da1 = mysqli_fetch_array($que1);
$statuspembayaran=$da1['statuspembayaran'];

$que2=mysqli_query($koneksi,"select *from sampah where month(jthtempo)<='$blnini' and year(jthtempo)<='$tahunini' and idpenyewaan='$a'");
$da2 = mysqli_fetch_array($que2);
$statussampah=$da2['stsbyr'];

$que3=mysqli_query($koneksi,"select *from air where month(jthtmpair)<='$blnini' and year(jthtmpair)<='$tahunini' and idpenyewaan='$a'");
$da3 = mysqli_fetch_array($que3);
$statusair=$da3['stsbyrair'];

$que4=mysqli_query($koneksi,"select *from penyewaan where idpenyewaan='$a'");
$da4 = mysqli_fetch_array($que4);
$idkamarnya=$da4['idkamar'];
$idpenghuninya=$da4['idpenghuni'];

if (($statuspembayaran=='Lunas') && ($statussampah=='Lunas') && ($statusair=='Lunas')) {
	
	$update1=mysqli_query($koneksi,"update penyewaan set jaminan='', statuspenyewaan='Non aktif' where idpenyewaan='$a'"); 
	$hapus1=mysqli_query($koneksi,"delete from pembayaran where statuspembayaran='Belum bayar' and idpenyewaan='$a'"); 
	$hapus2=mysqli_query($koneksi,"delete from sampah where stsbyr='Belum bayar' and idpenyewaan='$a'"); 
	$hapus3=mysqli_query($koneksi,"delete from air where stsbyrair='Belum bayar' and idpenyewaan='$a'"); 
	$simpan1= mysqli_query($koneksi,"insert into nonaktif values ('','$a','$tglini')");
	$update2=mysqli_query($koneksi,"update kamar set statuskamar='kosong' where idkamar='$idkamarnya'");
	$update3=mysqli_query($koneksi,"update penghuni set statuspenghuni='Non aktif' where idpenghuni='$idpenghuninya'");
	
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='penyewaan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
?>
	<script language="JavaScript">
alert('Gagal Tersimpan, Silahkan lunasi semua tagihan terlebih dahulu!'); //scrip peringatan
	document.location='tabel-tagihan.php'; //scrip blayune bar di proses
	</script>
	<?php
}
?>