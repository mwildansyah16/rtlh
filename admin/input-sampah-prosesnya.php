<?php 
include '../koneksi.php';


$aa=$_POST['idsampah']; 
$a=$_POST['idpenyewaan']; 
$b=addslashes($_POST['jthtempo']); 
$c=addslashes($_POST['byr']); 
$d=addslashes($_POST['tglbyr']); 
$e='Lunas'; 






$blnini=date('Y-m-d');
$blnlalu= date('Y-m', strtotime('-1 month', strtotime($blnini)));
$blninidb=date('Y-m',strtotime($b));



$cek2=mysqli_query($koneksi,"select * from sampah where idpenyewaan='$a' and jthtempo='$b' and stsbyr='Lunas'");
if(mysqli_num_rows($cek2)>0) {
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>document.location.href='tabel-sampah.php';</script>";
}else {	



if ($blnlalu!=$blninidb) {
	
	
$simpan1=mysqli_query($koneksi,"update sampah set byr='$c',tglbyr='$d',stsbyr='$e' where idsampah='$aa'"); // query insert

if ($simpan1) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-sampah.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}

}
else {

$jatuhtempo1=date('Y-m-d', strtotime('+10 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update sampah set byr='$c',tglbyr='$d',stsbyr='$e' where idsampah='$aa'"); // query insert
$simpan2= mysqli_query($koneksi,"insert into sampah values ('','$a','$jatuhtempo2','','','Belum bayar')"); // query insert
if ($simpan1 && $simpan2) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-sampah.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}
}
}
?>