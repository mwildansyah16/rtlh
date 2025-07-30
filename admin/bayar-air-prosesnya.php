<?php 
include '../koneksi.php';

$aa=$_POST['idpenyewaan']; 
$a=$_POST['idair']; 
$b=addslashes($_POST['jthtmpair']); 
$c=addslashes($_POST['volume']); 
$d=addslashes($_POST['byrair']);  
$e=addslashes($_POST['tglbyrair']);
$f='Lunas';  

$blnini=date('Y-m');
$blninidb=date('Y-m',strtotime($b));



$cek1=mysqli_query($koneksi,"select * from air where idpenyewaan='$aa' and jthtmpair='$b' and stsbyrair='Lunas'");
if(mysqli_num_rows($cek1)>0) {
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>document.location.href='tabel-air.php';</script>";
}else {



if ($blnini!=$blninidb) {
$simpan1=mysqli_query($koneksi,"update air set byrair='$d',tglbyrair='$e',stsbyrair='$f' where idair='$a'"); // query insert
if ($simpan1) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-air.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}
	
}
else {

$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update air set byrair='$d',tglbyrair='$e',stsbyrair='$f' where idair='$a'"); // query insert
$simpan2= mysqli_query($koneksi,"insert into air values ('','$aa','$jatuhtempo2','','','','Belum bayar','')"); // query insert
if ($simpan1 && $simpan2) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-air.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}
}
}
?>