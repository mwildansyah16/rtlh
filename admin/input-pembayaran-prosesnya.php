<?php 
include '../koneksi.php';

$aa=$_POST['idpenyewaan'];
$a=$_POST['idpembayaran'];  
$b=addslashes($_POST['jatuhtempo']); 
$c=addslashes($_POST['tarif']); 
$cc=addslashes($_POST['denda']);
$d=addslashes($_POST['bayar']); 
$e=addslashes($_POST['tglpembayaran']); 
$f='Lunas'; 

$blnini=date('Y-m');
$blninidb=date('Y-m',strtotime($b));


$cek1=mysqli_query($koneksi,"select * from pembayaran where idpenyewaan='$aa' and jatuhtempo='$b' and statuspembayaran='Lunas'");
if(mysqli_num_rows($cek1)>0) {
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>document.location.href='tabel-tagihan.php';</script>";
}else {





if ($blnini!=$blninidb) {

$simpan1=mysqli_query($koneksi,"update pembayaran set tarifsaatitu='$c',denda='$cc',bayar='$d',tglpembayaran='$e',statuspembayaran='$f' where idpembayaran='$a'"); // query insert
if ($simpan1) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-tagihan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}


}
else {
$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update pembayaran set tarifsaatitu='$c',denda='$cc',bayar='$d',tglpembayaran='$e',statuspembayaran='$f' where idpembayaran='$a'"); // query insert
$simpan2= mysqli_query($koneksi,"insert into pembayaran values ('','$aa','$jatuhtempo2','','','','','Belum bayar')"); // query insert
if ($simpan1 && $simpan2) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-tagihan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}
}

}
?>