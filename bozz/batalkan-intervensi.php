<?php 
include '../koneksi.php';

$a=$_GET['idpenerima']; 

$acc= mysqli_query($koneksi,"update penerima set kesimpulan='Tidak layak', intervensi='', tahun='', anggaran='' where idpenerima='$a'"); // query insert
if ($acc) {
	
		?>
	<script language="JavaScript">
alert('Data berhasil'); //scrip peringatan
	document.location='tabel-intervensi.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
?>
	<script language="JavaScript">
alert('Gagal, Silahkan ulangi lagi'); //scrip peringatan
	document.location='tabel-intervensi.php'; //scrip blayune bar di proses
	</script>
	<?php
}
?>