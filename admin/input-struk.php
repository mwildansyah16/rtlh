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
<?php 
include '../koneksi.php';

$aa=$_GET['idpenyewaan'];
$a=$_GET['idpembayaran']; 
$b=$_GET['idsampah']; 
$c=$_GET['idair'];  


$cek1=mysqli_query($koneksi,"select * from struk where idpenyewaan='$aa' and idpembayaran='$a' and idsampah='$b' and idair='$c'");
if(mysqli_num_rows($cek1)>0) {
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>document.location.href='rekap-semua.php';</script>";
}else {

                    
					
					
					$time = time();
                    $acak1 = rand(10000, 99999); // Menghasilkan angka acak antara 10000 - 99999
                    $acak2 = rand(10000, 99999); // Menghasilkan angka acak antara 10000 - 99999
					$acakan =$aa.$a.$time.$acak1.$acak2; // Merubah nama file
					$tgl=date('Y-m-d');



$simpan1=mysqli_query($koneksi,"insert into struk values ('','$aa','$a','$b','$c','$acakan','2','$tgl')"); // query insert
if ($simpan1) {
	
	
	
// BUAT QRCODE
				// tampung data kiriman
				$kode = $acakan;
			
				// include file qrlib.php
				include "../phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "../temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $kode;
				$namafile = $aa.'-'.$a.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);	
	
	
	
	
	?>
	<script language="JavaScript">
alert('Data berhasil disimpan'); //scrip peringatan
	document.location='rekap-semua.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
echo "Data Galal Tersimpan"; echo mysqli_error();
}





}
?>