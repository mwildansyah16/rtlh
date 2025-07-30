<?php 
include '../koneksi.php';

$a=$_GET['idpenerima']; 

$hapus1=mysqli_query($koneksi,"delete from penerima where idpenerima='$a'"); 

if ($hapus1) {
	
		?>
	<script language="JavaScript">
alert('Data berhasil dihapus'); //scrip peringatan
	document.location='tabel-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
?>
	<script language="JavaScript">
alert('Gagal Terhapus, Silahkan ulangi lagi'); //scrip peringatan
	document.location='tabel-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}
?>