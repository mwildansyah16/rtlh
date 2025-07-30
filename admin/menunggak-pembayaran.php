<?php 
include '../koneksi.php';




$aa=$_GET['idpenyewaan']; 
$a=$_GET['idpembayaran']; 
$b=$_GET['jatuhtempo']; 
$c=$_GET['tarif']; 
$d=$_GET['denda']; 
$e=($c+$d)*(-1);

$cek1=mysqli_query($koneksi,"select * from pembayaran where bayar=0 and idpembayaran='$a'");
if(mysqli_num_rows($cek1)>0) {
	
	
	

	
	

$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update pembayaran set tarifsaatitu='$c',denda='$d',bayar='$e' where idpembayaran='$a'"); // query insert
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

else {
	echo "<script>alert('Data tunggakan sudah tersimpan!!!')</script>";
	echo "<script>document.location.href='javascript:history.go(-1)';</script>";
}
?>