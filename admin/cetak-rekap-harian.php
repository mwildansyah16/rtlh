 <html class="no-js" lang="en"> <!--<![endif]-->
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
<head>
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
$tglawala=$_POST['tglawala'];
$tglakhira=$_POST['tglakhira'];
?>


        <meta charset="utf-8">
        <title>Dinas PKPLH</title>
         

        <!--Google Font link-->
 </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
<center>
<h1 class="text-black" style="width:50%; font-size:30px">DINAS PERUMAHAN, KAWASAN PERMUKIMAN DAN LINGKUNGAN HIDUP</h1>
<p>Jalan AKBP R. Agil Kusumadya No. IA Kudus Kode Pos 59346 </br>Telpon (0291) 435190 Faks (0291) 432808 </br>E-mail : dinaspkplh@kuduskab.go.id</p>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
  text-align:center;
}

th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid #ddd;
  text-align:center;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<table border="1px" style="width:90%;">
<thead>

                                             
												<th>No</th>
                                                <th>Nama</th>
												<th>Tahun</th>
                                                <th>Januari</th>
												<th>Februari</th>
												<th>Maret</th>
												<th>April</th>
												<th>Mei</th>
												<th>Juni</th>
												<th>Juli</th>
												<th>Agustus</th>
												<th>September</th>
												<th>Oktober</th>
												<th>November</th>
												<th>Desember</th>
												<th>Total</th>
			</thead>
			<tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from pembayaran where jatuhtempo between '$tglawala' and '$tglakhira' group by idpenyewaan");
$jml1=0;
$jml2=0;
$jml3=0;
$jml4=0;
$jml5=0;
$jml6=0;
$jml7=0;
$jml8=0;
$jml9=0;
$jml10=0;
$jml11=0;
$jml12=0;
$total=0;
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $ambil['idpembayaran']; ?> <?php $ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);
?>
<td><?php echo $da['nama']; ?></td>
<td><?php $thnpo=date("Y",strtotime($ambil['jatuhtempo'])); echo $thnpo; ?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek1=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='01' and year(jatuhtempo)='$thnpo'");
$da1 = mysqli_fetch_array($cek1);
if ((mysqli_num_rows($cek1)>0)){
	$pl1=$da1['bayar'];
	$hasil1='Rp.'.number_format($pl1, 0, ',', '.');
	$hasil1=$pl1; 
}
else {
	$hasil1=null;
} ?>

<td><?php echo $hasil1; $jml1+=$hasil1;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek2=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='02' and year(jatuhtempo)='$thnpo'");
$da2 = mysqli_fetch_array($cek2);
if ((mysqli_num_rows($cek2)>0)){
	$pl2=$da2['bayar'];
	$hasil2='Rp.'.number_format($pl2, 0, ',', '.');
	$hasil2=$pl2; 
}
else {
	$hasil2=null; 
} ?>

<td><?php echo $hasil2; $jml2+=$hasil2;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek3=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='03' and year(jatuhtempo)='$thnpo'");
$da3 = mysqli_fetch_array($cek3);
if ((mysqli_num_rows($cek3)>0)){
	$pl3=$da3['bayar'];
	$hasil3='Rp.'.number_format($pl3, 0, ',', '.');
	$hasil3=$pl3; 
}
else {
	$hasil3=null;
} ?>

<td><?php echo $hasil3; $jml3+=$hasil3;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek4=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='04' and year(jatuhtempo)='$thnpo'");
$da4 = mysqli_fetch_array($cek4);
if ((mysqli_num_rows($cek4)>0)){
	$pl4=$da4['bayar'];
	$hasil4='Rp.'.number_format($pl4, 0, ',', '.');
	$hasil4=$pl14; 
}
else {
	$hasil4=null;
} ?>

<td><?php echo $hasil4; $jml4+=$hasil4;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek5=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='05' and year(jatuhtempo)='$thnpo'");
$da5 = mysqli_fetch_array($cek5);
if ((mysqli_num_rows($cek5)>0)){
	$pl5=$da5['bayar'];
	$hasil5='Rp.'.number_format($pl5, 0, ',', '.');
	$hasil5=$pl5; 
}
else {
	$hasil5=null;
} ?>

<td><?php echo $hasil5; $jml5+=$hasil5;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek6=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='06' and year(jatuhtempo)='$thnpo'");
$da6 = mysqli_fetch_array($cek6);
if ((mysqli_num_rows($cek6)>0)){
	$pl6=$da6['bayar'];
	$hasil6='Rp.'.number_format($pl6, 0, ',', '.');
	$hasil6=$pl6; 
}
else {
	$hasil6=null; 
} ?>

<td><?php echo $hasil6; $jml6+=$hasil6;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek7=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='07' and year(jatuhtempo)='$thnpo'");
$da7 = mysqli_fetch_array($cek7);
if ((mysqli_num_rows($cek7)>0)){
	$pl7=$da7['bayar'];
	$hasil7='Rp.'.number_format($pl7, 0, ',', '.');
	$hasil7=$pl7; 
}
else {
	$hasil7=null;
} ?>

<td><?php echo $hasil7; $jml7+=$hasil7;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek8=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='08' and year(jatuhtempo)='$thnpo'");
$da8 = mysqli_fetch_array($cek8);
if ((mysqli_num_rows($cek8)>0)){
	$pl8=$da8['bayar'];
	$hasil8='Rp.'.number_format($pl8, 0, ',', '.');
	$hasil8=$pl8; 
}
else {
	$hasil8=null;
} ?>

<td><?php echo $hasil8; $jml8+=$hasil8;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek9=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='09' and year(jatuhtempo)='$thnpo'");
$da9 = mysqli_fetch_array($cek9);
if ((mysqli_num_rows($cek9)>0)){
	$pl9=$da9['bayar'];
	$hasil9='Rp.'.number_format($pl9, 0, ',', '.');
	$hasil9=$pl9; 
}
else {
	$hasil9=null;
} ?>

<td><?php echo $hasil9; $jml9+=$hasil9;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek10=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='10' and year(jatuhtempo)='$thnpo'");
$da10 = mysqli_fetch_array($cek10);
if ((mysqli_num_rows($cek10)>0)){
	$pl10=$da10['bayar'];
	$hasil10='Rp.'.number_format($pl10, 0, ',', '.');
	$hasil10=$pl10; 
}
else {
	$hasil10=null;
} ?>

<td><?php echo $hasil10; $jml10+=$hasil10;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek11=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='11' and year(jatuhtempo)='$thnpo'");
$da11 = mysqli_fetch_array($cek11);
if ((mysqli_num_rows($cek11)>0)){
	$pl11=$da11['bayar'];
	$hasil11='Rp.'.number_format($pl11, 0, ',', '.');
	$hasil11=$pl11; 
}
else {
	$hasil11=null;
} ?>

<td><?php echo $hasil11; $jml11+=$hasil11;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek12=mysqli_query($koneksi,"select *from pembayaran where idpenyewaan='$idn' and month(jatuhtempo)='12' and year(jatuhtempo)='$thnpo'");
$da12 = mysqli_fetch_array($cek12);
if ((mysqli_num_rows($cek12)>0)){
	$pl12=$da12['bayar'];
	$hasil12='Rp.'.number_format($pl12, 0, ',', '.');
	$hasil12=$pl12; 
}
else {
	$hasil12=null;
} ?>

<td><?php echo $hasil12; $jml12+=$hasil12;?></td>
<td><?php echo $tot=$hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12; $total+=$tot; ?></td>

</tr>
<?php 
}
?>
                                        </tbody>
										<tbody>
<td colspan=3><b>TOTAL</b></td>
<td><b><?php echo 'Rp.'.number_format($jml1, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml2, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml3, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml4, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml5, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml6, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml7, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml8, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml9, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml10, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml11, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jml12, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($total, 0, ',', '.'); ?></b></td>
</tr>								
										</tbody>
<p>Laporan perbulan : <?php echo date("d-m-Y",strtotime($tglawala)); ?> - <?php echo date("d-m-Y",strtotime($tglakhira)); ?></p>

</table>
<center>

		<br><br>Kudus, <?php echo $tanggalini; ?><br><p class="p">Mengetahui,</p><br><br><br><b>Drs. Abdul Halil</b></td>
<!--<script>
window.print();
</script>-->
		</center>
    </body>
</html>