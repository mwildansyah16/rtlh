<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
 
$tanggalini=tgl_indo(date('Y-m-d')); // 21 Oktober 2017
$blna=$_POST['bulan'];
$thn=$_POST['tahun'];
$blnkurang1=$blna-1;
$bln=$_POST['bulan'];
if($bln=='01'){
	$bln="Januari";
	$blnkurang1=12;
	$thne=$thn-1;
	}else{
		if($bln=='02'){
	$bln="Februari";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='03'){
	$bln="Maret";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='04'){
	$bln="April";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='05'){
	$bln="Mei";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='06'){
	$bln="Juni";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='07'){
	$bln="Juli";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='08'){
	$bln="Agustus";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='09'){
	$bln="September";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='10'){
	$bln="Oktober";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		if($bln=='11'){
	$bln="November";
	$blnkurang1=$blna-1;
	$thne=$thn;
	}else{
		$bln="Desember";
		$blnkurang1=$blna-1;
		$thne=$thn;
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}
	}


 
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Halaman Print A4</title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 6pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 108mm;
        min-height: 155mm;
        padding-top: 0mm;
        margin: 0mm auto;
        background: white;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 0.5cm;
        border: 0px red solid;
        height: 150mm;
        outline: 0cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 108mm;
            height: 155mm;        
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
<body>
<div class="book">

<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$blnini=date('m'); // waktu sekarang
$select=mysqli_query($koneksi,"select * from pembayaran,penyewaan where pembayaran.idpenyewaan=penyewaan.idpenyewaan and month(pembayaran.jatuhtempo)='$blna' and year(pembayaran.jatuhtempo)='$thn' and pembayaran.statuspembayaran='Belum bayar' and penyewaan.idkamar between '$level1' and '$level2' order by penyewaan.idkamar asc");
while ($ambil=mysqli_fetch_array($select)){
?>

    <div class="page">
        <div class="subpage">
<center>
<p style="width:100%;"><b style="font-size:10px;">PENGELOLA RUMAH SUSUN SEDERHANA SEWA</br>
(RUSUNAWA) KABUPATEN KUDUS
</b></br>
Jalan AKBP R. Agil Kusumadya No. IA Kudus Kode Pos 59346 </br>Telpon (0291) 435190 Faks (0291) 432808 </br>E-mail : dinaspkplh@kuduskab.go.id</p><hr/>
</center>




<td><?php $ambil['idpembayaran']; ?> <?php $ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);

$bayarsampah=3000;

$que1=mysqli_query($koneksi,"select *from penyewaan,air where penyewaan.idpenyewaan=air.idpenyewaan and month(air.jthtmpair)='$blnkurang1' and year(air.jthtmpair)='$thne' and penyewaan.idpenyewaan='$idx'");
$da1 = mysqli_fetch_array($que1);
$byraire=$da1['byrair']*(-1);
$totalbayar=$da['tarif']+$byraire+$bayarsampah;


?>
<td><?php date("d-m-Y",strtotime($ambil['jatuhtempo'])); ?></td>

<?php
$aa=date("2019-04-18");
$tglkembali=$ambil['jatuhtempo'];
$awal=strtotime($tglkembali);
$ini=time(); // waktu sekarang
$diff=$ini-$awal; // waktu sekarang dikurangi tgl kembali
$selisiha=floor($diff/(60*60*24)); //dipecah diambil tgl e tok
$denda=$da['tarif'];
if($selisiha>=1){ // cek telat atau tidak
	$selisih=$selisiha;
	}else{
	$selisih=0;
	}

if($selisih>=11){ // cek jika denda lbh dr 100000 (maksimal denda adlh 100000))
	$bayar=10/100*$denda; //besar denda jika telat
	}else{
	$bayar=0;
	}
?>





<table style="width:100%;text-align:justify;">
<tr><td colspan=5 style="width:60%;"></td><td>Kudus, <?php echo $tanggalini; ?></td></tr>
<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td><td>Kepada</td></tr>
<tr><td>Nomor</td><td>:</td><td></td><td style="width:20%;"></td><td>Yth. </td><td><?php echo $da['nama']; ?></td></tr>
<tr><td>Sifat</td><td>:</td><td>Penting</td><td></td><td></td><td><?php echo $da['idkamar']; ?></td></tr>
<tr><td>Lampiran</td><td>:</td><td>-</td><td></td><td></td><td>di -</td></tr>
<tr><td>Perihal</td><td>:</td><td>Surat Tagihan</td><td></td><td></td><td>&emsp;&emsp;&emsp;Rusunawa</td></tr>
</table>
</br>

<table border="0px" style="width:100%;text-align:justify; line-height: 2;">
<thead>

                                             
												<th align=center>
</th>
                                                
			</thead>
			<tbody>

                                        </tbody>
										<tbody>
<tr><td>&emsp;&emsp;&emsp;dengan ini disampaikan kepada saudara untuk melakukan pembayaran sewa rusunawa bulan <?php echo $bln;?> <?php echo $thn;?> sejumlah <?php echo 'Rp. '.number_format($totalbayar, 0, ',', '.'); ?> dengan rincian sebagai berikut :</td></tr>
</table></br>


<table border="1 solid" style="width:100%;text-align:center;border=1px;">
<tr><td rowspan=2>No</td><td rowspan=2>Bulan</td><td colspan=5>Tagihan (Rp)</td></tr>
<tr><td>Sewa</td><td>Pemakaian Air (m<sup>3</sup>)</td><td>Air</td><td>Sampah</td><td>Denda</td></tr>
<tr><td>1</td><td><?php echo $bln;?> <?php echo $thn;?></td><td><?php echo 'Rp. '.number_format($da['tarif'], 0, ',', '.'); ?></td><td><?php echo $da1['volume']; ?> m<sup>3</sup></td><td><?php echo 'Rp. '.number_format($byraire, 0, ',', '.'); ?></td><td><?php echo 'Rp. '.number_format($bayarsampah, 0, ',', '.'); ?></td><td>Rp. -</td></tr>
<tr><td colspan=7 style="text-align:center;"><b>Total : <?php echo 'Rp. '.number_format($totalbayar, 0, ',', '.'); ?></b></td></tr>
</table></br>

<table border="0px" style="width:100%;text-align:justify; line-height: 2;">
<tr><td>&emsp;&emsp;&emsp;Sehubungan dengan hal tersebut, diminta melakukan pembayaran jumlah tersebut diatas paling lambat tanggal <?php echo date("d",strtotime($ambil['jatuhtempo'])); ?> <?php echo $bln;?> <?php echo $thn;?> <?php echo 'pada jam 08.00 WIB';?>. Keterlambatan atas pembayaran dikenakan denda sebesar 10 % dari tarif sewa (PERBUP no 10 Tahun 2010) dan akan diberlakukan pemadaman listrik.</td></tr>
<tr><td>&emsp;</td></tr>

</table></br>
<table style='width:100%;'>
<tr><td style='width:60%;'>&nbsp;</td><td style='width=40%;text-align:center; line-height: 2;'></br>Pengelola Rusunawa</td></tr>
<tr><td style='width:60%;'></br></br>NB. Abaikan apabila sudah membayar.</td><td style='width=40%;text-align:center;'></td></tr>
</table>
        </div>    
    </div>


<?php 
}
?>
 
    <!--<div class="page">
        <div class="subpage">Page 2/2</div>    
    </div>-->

</div>
</body>
</html>