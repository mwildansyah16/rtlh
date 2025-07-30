<!DOCTYPE html>
<html>
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

function namaBulan($angka){
	switch ($angka) {
		case '1':
			$bulan = "Januari";
			break;
		case '2':
			$bulan = "Februari";
			break;
		case '3':
			$bulan = "Maret";
			break;
		case '4':
			$bulan = "April";
			break;
		case '5':
			$bulan = "Mei";
			break;
		case '6':
			$bulan = "Juni";
			break;
		case '7':
			$bulan = "Juli";
			break;
		case '8':
			$bulan = "Agustus";
			break;
		case '9':
			$bulan = "September";
		case '10':
			$bulan = "Oktober";
			break;
		case '11':
			$bulan = "November";
			break;
		case '12':
			$bulan = "Desember";
			break;
		default:
			$bulan = "Tidak ada bulan yang dipilih...";
			break;
	}

	return $bulan;
}

function tglIndonesia($tgl){
	$tanggal = substr($tgl,8,2);
	$bulan = namaBulan(substr($tgl,5,2));
	$tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;		 
}
?>
<head>
	<title>Dinas PKPLH</title>
	<link rel="icon" href="./assets/img/logo.png">
	<style type="text/css">
		body{
			font: 10pt "Tahoma";
			
		}
		.gambare1{
			width: 215mm;
            height: 330mm;
		}
		

		table{
			border-collapse: collapse;
		}
		 @media print {
        html, body {
            width: 215mm;
            height: 330mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
	</style>
</head>
<body>
<?php 
$aa=$_GET['idpenyewaan'];
$a=$_GET['idpembayaran']; 
$b=$_GET['idsampah']; 
$c=$_GET['idair']; 
$cek9=mysqli_query($koneksi,"select * from struk where idpenyewaan='$aa' and idpembayaran='$a' and token='1'");
if(mysqli_num_rows($cek9)>0) {
	echo "<script>alert('Struk sudah pernah tercetak. Silahkan cetak duplikatnya jika ingin mencetaknya lagi.')</script>";
	echo "<script>document.location.href='rekap-semua.php';</script>";
}else {

}?>
<center>
<div class="gambare1">
<table border="6" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%" border=1>
		<?php

		$dfg=mysqli_query($koneksi,"update struk set token='1' where idpenyewaan='$aa' and idpembayaran='$a'");
		
		
		
		$que=mysqli_query($koneksi, "SELECT * FROM pembayaran,penyewaan where pembayaran.idpenyewaan=penyewaan.idpenyewaan and pembayaran.idpembayaran='$a'");
		$da = mysqli_fetch_array($que);

$sampahe=mysqli_query($koneksi,"select *from sampah where idsampah='$b'");
$sampahea = mysqli_fetch_array($sampahe);
$byrsampah=$sampahea['byr'];

$aire=mysqli_query($koneksi,"select *from air where idair='$c'");
$airea = mysqli_fetch_array($aire);
$byrair=$airea['byrair'];
$volair=$airea['volume'];
		?>
		<?php
$idx=$da['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$brut=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$gom = mysqli_fetch_array($brut);
?>
		<tr>
			
			<td colspan="3">
				<center>
				<!--<img src="assets/img/logo.png" width="90px">-->
				<h1 style='font-size:150%;'>STRUK PEMBAYARAN SEWA HUNIAN, SAMPAH & AIR RUSUNAWA</h1>
				<hr>
				<center>
				<table width="75%">
				<tr>
				<td  width="18%">Nama</td><td>:</td><td><?php echo $gom['nama']; ?></td><td width="5%"></td><td width="15%">Periode sewa</td><td>:</td><td width="18%"><?php echo tglIndonesia (date("Y-m",strtotime($da['jatuhtempo']))); ?></td>
				</tr>
				<tr>
				<td>NIK</td><td>:</td><td><?php echo $gom['idpenghuni']; ?></td><td></td><td>Sampah & air</td><td>:</td><td>
				<?php echo tglIndonesia (date("Y-m",strtotime($airea['jthtmpair']))); ?></td>
				</tr>
				<tr>
				<td>Tgl Pembayaran</td><td>:</td><td><?php echo date("d-m-Y",strtotime($da['tglpembayaran'])); ?></td><td></td><td>Unit hunian</td><td>:</td><td><?php $kama=$gom['idkamar']; 
				$kamare=str_split($kama);
				echo $kamare[0].'.'.$kamare[1].'.'.$kamare[2].$kamare[3];
				
				?></td>
				</tr>
				</table>
				</center>
				<table width="100%">
				<tr>
<?php
		$kod=mysqli_query($koneksi, "SELECT * FROM struk where idpenyewaan='$aa' and idpembayaran='$a'");
		$kodene = mysqli_fetch_array($kod);
		$kode1=$kodene['idpenyewaan']; 
		$kode2=$kodene['idpembayaran']; 
		$kode3=$kode1.'-'.$kode2;
?>
				<td width="20%"><center><img src="../temp/<?php echo $kode3.".png"; ?>" width='100%'></center></td><td width="80%"><center>
				<p>Pengelola rusunawa menyatakan struk ini sebagai bukti pembayaran yang sah, mohon disimpan.</p>
				
				<table>
				<tr>
				<td>Tarif&emsp;</td><td>:&emsp;</td><td><?php echo 'Rp.'.number_format($tarife=$da['tarifsaatitu'], 0, ',', '.').',-'; ?></td><td>&emsp;&emsp;&emsp;&emsp;&emsp;</td><td>Sampah&emsp;</td><td>:&emsp;</td><td><?php echo 'Rp.'.number_format($byrsampah, 0, ',', '.').',-'; ?></td>
				</tr>
				<tr>
				<td>Denda&emsp;</td><td>:&emsp;</td><td><?php echo 'Rp.'.number_format($dendane=$da['denda'], 0, ',', '.').',-'; ?></td><td>&emsp;&emsp;&emsp;&emsp;&emsp;</td><td>Air&emsp;</td><td>:&emsp;</td><td><?php echo 'Rp.'.number_format($byrair, 0, ',', '.').',-'; ?>&emsp;(<?php echo $volair; ?> m<sup>3</sup>)</td>
				</tr>
				<tr>
				<td colspan=7 align=center style='font-size:130%;'><b>Total Bayar&emsp;:&emsp;<?php $totale=$da['bayar']; echo 'Rp.'.number_format($totalbyr=$tarife+$dendane+$byrsampah+$byrair, 0, ',', '.').',-'; ?></b></td>
				</tr>
				
				</table>
				
				
				
				
				
				
				<table border='2'>
				<tr><td>
				&emsp;
				<?php 
 
	// FUNGSI TERBILANG OLEH : om wildan
	// WEBSITE : 
	// AUTHOR : om wildan
 
 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
 
	$angka = 1530093;
	echo terbilang($totalbyr).' Rupiah';
	?>
				&emsp;
				</td></tr>
				</table>
				
				
				
				
				
				
				
				
				
				<p>Terima Kasih.</br>Jika terjadi tidak kesesuaian data terhadap struk pembayaran ini, silahkan menghubungi admin terkait.</br><?php $tglstruke=$kodene['tglstruk']; echo tglIndonesia($tglstruke); ?></p></center></td>
				</tr>
				</table>

				
				</center>
			</td>
		</tr>
<?php
		$kod=mysqli_query($koneksi, "SELECT * FROM struk where idpenyewaan='$aa' and idpembayaran='$a'");
		$kodene = mysqli_fetch_array($kod);
		$kode1=$kodene['idpenyewaan']; 
		$kode2=$kodene['idpembayaran']; 
		$kode3=$kode1.'-'.$kode2;
		?>
		<!--<tr>
			<td><img src="temp/<?php echo $kode3.".png"; ?>"></td>
			<td></td>
			<td width="300px">
				<center><p>Kudus, <?php echo tglIndonesia(date('Y-m-d')); ?><br/>
				Admin rusunawa,</p><center>
				<br/>
				<br/>
				<br/>
				<p>SELAMET SANTOSO</p>
			</td>
		</tr>-->
	</table>
	</td>
</tr>
</table>
</div>
</center>
<!--<br>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>-->
</body>
</html>
