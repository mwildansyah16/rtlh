<?php 
include '../koneksi.php';
$idx=$_POST['idpenerima']; 
$dtks=$_POST['dtks']; 
if ($dtks=='Tidak'){

$a=strtoupper(addslashes($_POST['tglsurvey'])); 
$b=strtoupper(addslashes($_POST['petugas'])); 
$c=strtoupper(addslashes($_POST['nik'])); 
$d=strtoupper(addslashes($_POST['nokk'])); 
$da='';
$db=strtoupper(addslashes($_POST['prioritas']));
$e=strtoupper(addslashes($_POST['jmlkk'])); 
$f=strtoupper(addslashes($_POST['nama'])); 
$g=strtoupper(addslashes($_POST['usia'])); 
$h=strtoupper(addslashes($_POST['kecamatan']));
$i=strtoupper(addslashes($_POST['desa']));
$ii=strtoupper(addslashes($_POST['alamatlengkap']));
$j=strtoupper(addslashes($_POST['pendidikan'])); 
$k=strtoupper(addslashes($_POST['jenkel'])); 
$l=strtoupper(addslashes($_POST['pekerjaan'])); 
$m=strtoupper(addslashes($_POST['penghasilan'])); 
$n=strtoupper(addslashes($_POST['statustanah'])); 
$o=strtoupper(addslashes($_POST['statusrumah'])); 
$p=strtoupper(addslashes($_POST['asetrumah'])); 
$q=strtoupper(addslashes($_POST['asettanah'])); 
$r=strtoupper(addslashes($_POST['statusbantuan'])); 
$s=strtoupper(addslashes($_POST['jeniskawasan']));
$t=strtoupper(addslashes($_POST['pondasi']));
$u=strtoupper(addslashes($_POST['sloof'])); 
$v=strtoupper(addslashes($_POST['kolom']));
$w=strtoupper(addslashes($_POST['balok'])); 
$x=strtoupper(addslashes($_POST['strukturatap'])); 
$y=strtoupper(addslashes($_POST['jendela'])); 
$z=strtoupper(addslashes($_POST['ventilasi'])); 
$aa=strtoupper(addslashes($_POST['km'])); 
$ab=strtoupper(addslashes($_POST['jarakair'])); 
$ac=strtoupper(addslashes($_POST['sumberair']));
$ad=strtoupper(addslashes($_POST['sumberlistrik']));
$ae=strtoupper(addslashes($_POST['luas'])); 
$af=strtoupper(addslashes($_POST['jmlpenghuni']));
$ag=strtoupper(addslashes($_POST['atap'])); 
$ah=strtoupper(addslashes($_POST['kondisiatap'])); 
$ai=strtoupper(addslashes($_POST['dinding']));
$aj=strtoupper(addslashes($_POST['kondisidinding']));
$ak=strtoupper(addslashes($_POST['lantai'])); 
$al=strtoupper(addslashes($_POST['kondisilantai']));
$am=strtoupper(addslashes($_POST['latitude'])); 
$an=strtoupper(addslashes($_POST['longitude'])); 

$simpan= mysqli_query($koneksi,"update penerima set tglsurvey='$a',petugas='$b',nik='$c',nokk='$d',nodtks='$da',prioritas='$db',jmlkk='$e',nama='$f',usia='$g',kecamatan='$h',desa='$i',alamatlengkap='$ii',pendidikan='$j',jenkel='$k',pekerjaan='$l',penghasilan='$m',statustanah='$n',statusrumah='$o',asetrumah='$p',asettanah='$q',statusbantuan='$r',jeniskawasan='$s',pondasi='$t',sloof='$u',kolom='$v',balok='$w',strukturatap='$x',jendela='$y',ventilasi='$z',km='$aa',jarakair='$ab',sumberair='$ac',sumberlistrik='$ad',luas='$ae',jmlpenghuni='$af',atap='$ag',kondisiatap='$ah',dinding='$ai',kondisidinding='$aj',lantai='$ak',kondisilantai='$al',latitude='$am',longitude='$an' where idpenerima='$idx'"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil diubah'); //scrip peringatan
	document.location='tabel-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{
	$dtks=$_POST['dtks']; 
	if ($dtks==''){
		?>
		<script language="JavaScript">
		alert('No DTKS belum anda isi, Silahkan isi terlebih dahulu!'); //scrip peringatan
		document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
		</script>
        <?php
	
	}else{

$a=strtoupper(addslashes($_POST['tglsurvey'])); 
$b=strtoupper(addslashes($_POST['petugas'])); 
$c=strtoupper(addslashes($_POST['nik'])); 
$d=strtoupper(addslashes($_POST['nokk'])); 
$da=strtoupper(addslashes($_POST['bb']));
$db=strtoupper(addslashes($_POST['prioritas']));
$e=strtoupper(addslashes($_POST['jmlkk'])); 
$f=strtoupper(addslashes($_POST['nama'])); 
$g=strtoupper(addslashes($_POST['usia'])); 
$h=strtoupper(addslashes($_POST['kecamatan']));
$i=strtoupper(addslashes($_POST['desa']));
$ii=strtoupper(addslashes($_POST['alamatlengkap']));
$j=strtoupper(addslashes($_POST['pendidikan'])); 
$k=strtoupper(addslashes($_POST['jenkel'])); 
$l=strtoupper(addslashes($_POST['pekerjaan'])); 
$m=strtoupper(addslashes($_POST['penghasilan'])); 
$n=strtoupper(addslashes($_POST['statustanah'])); 
$o=strtoupper(addslashes($_POST['statusrumah'])); 
$p=strtoupper(addslashes($_POST['asetrumah'])); 
$q=strtoupper(addslashes($_POST['asettanah'])); 
$r=strtoupper(addslashes($_POST['statusbantuan'])); 
$s=strtoupper(addslashes($_POST['jeniskawasan']));
$t=strtoupper(addslashes($_POST['pondasi']));
$u=strtoupper(addslashes($_POST['sloof'])); 
$v=strtoupper(addslashes($_POST['kolom']));
$w=strtoupper(addslashes($_POST['balok'])); 
$x=strtoupper(addslashes($_POST['strukturatap'])); 
$y=strtoupper(addslashes($_POST['jendela'])); 
$z=strtoupper(addslashes($_POST['ventilasi'])); 
$aa=strtoupper(addslashes($_POST['km'])); 
$ab=strtoupper(addslashes($_POST['jarakair'])); 
$ac=strtoupper(addslashes($_POST['sumberair']));
$ad=strtoupper(addslashes($_POST['sumberlistrik']));
$ae=strtoupper(addslashes($_POST['luas'])); 
$af=strtoupper(addslashes($_POST['jmlpenghuni']));
$ag=strtoupper(addslashes($_POST['atap'])); 
$ah=strtoupper(addslashes($_POST['kondisiatap'])); 
$ai=strtoupper(addslashes($_POST['dinding']));
$aj=strtoupper(addslashes($_POST['kondisidinding']));
$ak=strtoupper(addslashes($_POST['lantai'])); 
$al=strtoupper(addslashes($_POST['kondisilantai']));
$am=strtoupper(addslashes($_POST['latitude'])); 
$an=strtoupper(addslashes($_POST['longitude'])); 

$simpan= mysqli_query($koneksi,"update penerima set tglsurvey='$a',petugas='$b',nik='$c',nokk='$d',nodtks='$da',prioritas='$db',jmlkk='$e',nama='$f',usia='$g',kecamatan='$h',desa='$i',alamatlengkap='$ii',pendidikan='$j',jenkel='$k',pekerjaan='$l',penghasilan='$m',statustanah='$n',statusrumah='$o',asetrumah='$p',asettanah='$q',statusbantuan='$r',jeniskawasan='$s',pondasi='$t',sloof='$u',kolom='$v',balok='$w',strukturatap='$x',jendela='$y',ventilasi='$z',km='$aa',jarakair='$ab',sumberair='$ac',sumberlistrik='$ad',luas='$ae',jmlpenghuni='$af',atap='$ag',kondisiatap='$ah',dinding='$ai',kondisidinding='$aj',lantai='$ak',kondisilantai='$al',latitude='$am',longitude='$an' where idpenerima='$idx'"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil diubah'); //scrip peringatan
	document.location='tabel-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}
	
	
}
?>
