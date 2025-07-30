<?php 
include '../koneksi.php';

$nik=$_POST['nik'];
$a=$_POST['idpenyewaan']; 
$b=addslashes($_POST['jatuhtempo']); 
$c=addslashes($_POST['tarif']); 
$d=addslashes($_POST['bayar']); 
$e=addslashes($_POST['tglpembayaran']); 
$f='Lunas'; 
$g=addslashes($_POST['jaminan']); 
$h='Aktif';
$i='aktif';

$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1= mysqli_query($koneksi,"insert into pembayaran values ('','$a','$b','$c','','$d','$e','$f')"); // query insert
$simpan2= mysqli_query($koneksi,"insert into sampah values ('','$a','$b','','','Belum bayar')"); // query insert
$simpan3= mysqli_query($koneksi,"insert into air values ('','$a','$b','','','','Belum bayar','')"); // query insert
$simpan4=mysqli_query($koneksi,"update penyewaan set jaminan='$g',statuspenyewaan='$h' where idpenyewaan='$a'"); // query insert
$simpan5=mysqli_query($koneksi,"update penghuni set statuspenghuni='$i' where idpenghuni='$nik'"); // query insert
$simpan6= mysqli_query($koneksi,"insert into pembayaran values ('','$a','$jatuhtempo2','','','','','Belum bayar')"); // query insert
if ($simpan1 && $simpan2 && $simpan3 && $simpan4 && $simpan5 && $simpan6) {
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-penyewaan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}
?>