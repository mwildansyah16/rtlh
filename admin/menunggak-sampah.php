<?php 
include '../koneksi.php';




$aa=$_GET['idpenyewaan']; 
$a=$_GET['idsampah']; 
$b=$_GET['jthtempo']; 
$c=$_GET['byr']; 
$e=$c*(-1);

$cek1=mysqli_query($koneksi,"select * from sampah where byr=0 and idsampah='$a'");
if(mysqli_num_rows($cek1)>0) {
	
	
	

	
	

$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update sampah set byr='$e' where idsampah='$a'"); // query insert
$simpan2= mysqli_query($koneksi,"insert into sampah values ('','$aa','$jatuhtempo2','','','Belum bayar')"); // query insert
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

else {
	echo "<script>alert('Data tunggakan sudah tersimpan!!!')</script>";
	echo "<script>document.location.href='javascript:history.go(-1)';</script>";
}
?>