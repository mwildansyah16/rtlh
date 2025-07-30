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
$tglawala=$_POST['tahun'];
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
												<th>Kamar</th>
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
												<th>Jumlah</th>
												
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from sampah,penyewaan where sampah.idpenyewaan=penyewaan.idpenyewaan and year(sampah.jthtempo)='$tglawala' and penyewaan.idkamar between '$level1' and '$level2' group by sampah.idpenyewaan order by penyewaan.idkamar asc");
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
$jmltarif1=0;
$jmltarif2=0;
$jmltarif3=0;
$jmltarif4=0;
$jmltarif5=0;
$jmltarif6=0;
$jmltarif7=0;
$jmltarif8=0;
$jmltarif9=0;
$jmltarif10=0;
$jmltarif11=0;
$jmltarif12=0;
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?> <?php $ambil['idsampah']; ?> <?php $ambil['idpenyewaan']; ?></td>
<?php
include "../koneksi.php";
$idx=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$que=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$da = mysqli_fetch_array($que);
?>
<td><?php 
$stspenyewaannya=$da['statuspenyewaan'];
if ($stspenyewaannya=='Non aktif'){
?><font color=red><?php echo $da['nama'];?></font><?php
}else{
echo $da['nama'];
}	?></td>
<td><?php echo $da['idkamar']; ?></td>
<td><?php $thnpo=date("Y",strtotime($ambil['jthtempo'])); echo $thnpo; ?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek1=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='01' and year(jthtempo)='$thnpo'");
$da1 = mysqli_fetch_array($cek1);
if ((mysqli_num_rows($cek1)>0)){
	$pl1=$da1['byr'];
	$hasil1='Rp.'.number_format($pl1, 0, ',', '.');
	if($pl1<0){
	$pl1=0;}else{
	$pl1=$pl1;}
	$hasil1=$pl1;
	$jthtempone1=$da1['jthtempo'];
	if ($jthtempone1<'2021-09-01'){
	$tarif1=8000;	
	}else{
	$tarif1=3000;	
	}
	
}
else {
	$hasil1=null;
	$tarif1=null;
} ?>

<td><?php echo $hasil1; $jml1+=$hasil1; $jmltarif1+=$tarif1;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek2=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='02' and year(jthtempo)='$thnpo'");
$da2 = mysqli_fetch_array($cek2);
if ((mysqli_num_rows($cek2)>0)){
	$pl2=$da2['byr'];
	$hasil2='Rp.'.number_format($pl2, 0, ',', '.');
	if($pl2<0){
	$pl2=0;}else{
	$pl2=$pl2;}
	$hasil2=$pl2; 
	$jthtempone2=$da2['jthtempo'];
	if ($jthtempone2<'2021-09-01'){
	$tarif2=8000;	
	}else{
	$tarif2=3000;	
	}
}
else {
	$hasil2=null; 
	$tarif2=null;
} ?>

<td><?php echo $hasil2; $jml2+=$hasil2; $jmltarif2+=$tarif2;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek3=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='03' and year(jthtempo)='$thnpo'");
$da3 = mysqli_fetch_array($cek3);
if ((mysqli_num_rows($cek3)>0)){
	$pl3=$da3['byr'];
	$hasil3='Rp.'.number_format($pl3, 0, ',', '.');
	if($pl3<0){
	$pl3=0;}else{
	$pl3=$pl3;}
	$hasil3=$pl3; 
	$jthtempone3=$da3['jthtempo'];
	if ($jthtempone3<'2021-09-01'){
	$tarif3=8000;	
	}else{
	$tarif3=3000;	
	}
}
else {
	$hasil3=null;
	$tarif3=null;
} ?>

<td><?php echo $hasil3; $jml3+=$hasil3; $jmltarif3+=$tarif3;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek4=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='04' and year(jthtempo)='$thnpo'");
$da4 = mysqli_fetch_array($cek4);
if ((mysqli_num_rows($cek4)>0)){
	$pl4=$da4['byr'];
	$hasil4='Rp.'.number_format($pl4, 0, ',', '.');
	if($pl4<0){
	$pl4=0;}else{
	$pl4=$pl4;}
	$hasil4=$pl4; 
	$jthtempone4=$da4['jthtempo'];
	if ($jthtempone4<'2021-09-01'){
	$tarif4=8000;	
	}else{
	$tarif4=3000;	
	}
}
else {
	$hasil4=null;
	$tarif4=null;
} ?>

<td><?php echo $hasil4; $jml4+=$hasil4; $jmltarif4+=$tarif4;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek5=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='05' and year(jthtempo)='$thnpo'");
$da5 = mysqli_fetch_array($cek5);
if ((mysqli_num_rows($cek5)>0)){
	$pl5=$da5['byr'];
	$hasil5='Rp.'.number_format($pl5, 0, ',', '.');
	if($pl5<0){
	$pl5=0;}else{
	$pl5=$pl5;}
	$hasil5=$pl5; 
	$jthtempone5=$da5['jthtempo'];
	if ($jthtempone5<'2021-09-01'){
	$tarif5=8000;	
	}else{
	$tarif5=3000;	
	}
}
else {
	$hasil5=null;
	$tarif5=null;
} ?>

<td><?php echo $hasil5; $jml5+=$hasil5; $jmltarif5+=$tarif5;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek6=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='06' and year(jthtempo)='$thnpo'");
$da6 = mysqli_fetch_array($cek6);
if ((mysqli_num_rows($cek6)>0)){
	$pl6=$da6['byr'];
	$hasil6='Rp.'.number_format($pl6, 0, ',', '.');
	if($pl6<0){
	$pl6=0;}else{
	$pl6=$pl6;}
	$hasil6=$pl6; 
	$jthtempone6=$da6['jthtempo'];
	if ($jthtempone6<'2021-09-01'){
	$tarif6=8000;	
	}else{
	$tarif6=3000;	
	}
}
else {
	$hasil6=null; 
	$tarif6=null;
} ?>

<td><?php echo $hasil6; $jml6+=$hasil6; $jmltarif6+=$tarif6;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek7=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='07' and year(jthtempo)='$thnpo'");
$da7 = mysqli_fetch_array($cek7);
if ((mysqli_num_rows($cek7)>0)){
	$pl7=$da7['byr'];
	$hasil7='Rp.'.number_format($pl7, 0, ',', '.');
	if($pl7<0){
	$pl7=0;}else{
	$pl7=$pl7;}
	$hasil7=$pl7; 
	$jthtempone7=$da7['jthtempo'];
	if ($jthtempone7<'2021-09-01'){
	$tarif7=8000;	
	}else{
	$tarif7=3000;	
	}
}
else {
	$hasil7=null;
	$tarif7=null;
} ?>

<td><?php echo $hasil7; $jml7+=$hasil7; $jmltarif7+=$tarif7;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek8=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='08' and year(jthtempo)='$thnpo'");
$da8 = mysqli_fetch_array($cek8);
if ((mysqli_num_rows($cek8)>0)){
	$pl8=$da8['byr'];
	$hasil8='Rp.'.number_format($pl8, 0, ',', '.');
	if($pl8<0){
	$pl8=0;}else{
	$pl8=$pl8;}
	$hasil8=$pl8; 
	$jthtempone8=$da8['jthtempo'];
	if ($jthtempone8<'2021-09-01'){
	$tarif8=8000;	
	}else{
	$tarif8=3000;	
	}
}
else {
	$hasil8=null;
	$tarif8=null;
} ?>

<td><?php echo $hasil8; $jml8+=$hasil8; $jmltarif8+=$tarif8;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek9=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='09' and year(jthtempo)='$thnpo'");
$da9 = mysqli_fetch_array($cek9);
if ((mysqli_num_rows($cek9)>0)){
	$pl9=$da9['byr'];
	$hasil9='Rp.'.number_format($pl9, 0, ',', '.');
	if($pl9<0){
	$pl9=0;}else{
	$pl9=$pl9;}
	$hasil9=$pl9; 
	$jthtempone9=$da9['jthtempo'];
	if ($jthtempone9<'2021-09-01'){
	$tarif9=8000;	
	}else{
	$tarif9=3000;	
	}
}
else {
	$hasil9=null;
	$tarif9=null;
} ?>

<td><?php echo $hasil9; $jml9+=$hasil9; $jmltarif9+=$tarif9;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek10=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='10' and year(jthtempo)='$thnpo'");
$da10 = mysqli_fetch_array($cek10);
if ((mysqli_num_rows($cek10)>0)){
	$pl10=$da10['byr'];
	$hasil10='Rp.'.number_format($pl10, 0, ',', '.');
	if($pl10<0){
	$pl10=0;}else{
	$pl10=$pl10;}
	$hasil10=$pl10; 
	$jthtempone10=$da10['jthtempo'];
	if ($jthtempone10<'2021-09-01'){
	$tarif10=8000;	
	}else{
	$tarif10=3000;	
	}
}
else {
	$hasil10=null;
	$tarif10=null;
} ?>

<td><?php echo $hasil10; $jml10+=$hasil10; $jmltarif10+=$tarif10;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek11=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='11' and year(jthtempo)='$thnpo'");
$da11 = mysqli_fetch_array($cek11);
if ((mysqli_num_rows($cek11)>0)){
	$pl11=$da11['byr'];
	$hasil11='Rp.'.number_format($pl11, 0, ',', '.');
	if($pl11<0){
	$pl11=0;}else{
	$pl11=$pl11;}
	$hasil11=$pl11; 
	$jthtempone11=$da11['jthtempo'];
	if ($jthtempone11<'2021-09-01'){
	$tarif11=8000;	
	}else{
	$tarif11=3000;	
	}
}
else {
	$hasil11=null;
	$tarif11=null;
} ?>

<td><?php echo $hasil11; $jml11+=$hasil11; $jmltarif11+=$tarif11;?></td>

<?php 
include "../koneksi.php";
$idn=$ambil['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$cek12=mysqli_query($koneksi,"select *from sampah where idpenyewaan='$idn' and month(jthtempo)='12' and year(jthtempo)='$thnpo'");
$da12 = mysqli_fetch_array($cek12);
if ((mysqli_num_rows($cek12)>0)){
	$pl12=$da12['byr'];
	$hasil12='Rp.'.number_format($pl12, 0, ',', '.');
	if($pl12<0){
	$pl12=0;}else{
	$pl12=$pl12;}
	$hasil12=$pl12; 
	$jthtempone12=$da12['jthtempo'];
	if ($jthtempone12<'2021-09-01'){
	$tarif12=8000;	
	}else{
	$tarif12=3000;	
	}
}
else {
	$hasil12=null;
	$tarif12=null;
} ?>

<td><?php echo $hasil12; $jml12+=$hasil12; $jmltarif12+=$tarif12;?></td>
<td><?php echo $tot=$hasil1+$hasil2+$hasil3+$hasil4+$hasil5+$hasil6+$hasil7+$hasil8+$hasil9+$hasil10+$hasil11+$hasil12; $total+=$tot; ?></td>

</tr>
<?php 
}
?>
                                        </tbody>
										<tbody>
<td colspan=4><b>TOTAL</b></td>
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
										<tbody>
<td colspan=4><b>TARGET</b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif1, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif2, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif3, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif4, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif5, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif6, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif7, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif8, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif9, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif10, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif11, 0, ',', '.'); ?></b></td>
<td><b><?php echo 'Rp.'.number_format($jmltarif12, 0, ',', '.'); ?></b></td>
<td><b></b></td>
</tr>								
										</tbody>
										<tbody>
<td colspan=4><b>PERSENTASE</b></td>
<td><b><?php if (($jmltarif1==0) && ($jml1==0)){echo '0';}else{echo number_format(($jml1/$jmltarif1)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif2==0) && ($jml2==0)){echo '0';}else{echo number_format(($jml2/$jmltarif2)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif3==0) && ($jml3==0)){echo '0';}else{echo number_format(($jml3/$jmltarif3)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif4==0) && ($jml4==0)){echo '0';}else{echo number_format(($jml4/$jmltarif4)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif5==0) && ($jml5==0)){echo '0';}else{echo number_format(($jml5/$jmltarif5)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif6==0) && ($jml6==0)){echo '0';}else{echo number_format(($jml6/$jmltarif6)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif7==0) && ($jml7==0)){echo '0';}else{echo number_format(($jml7/$jmltarif7)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif8==0) && ($jml8==0)){echo '0';}else{echo number_format(($jml8/$jmltarif8)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif9==0) && ($jml9==0)){echo '0';}else{echo number_format(($jml9/$jmltarif9)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif10==0) && ($jml10==0)){echo '0';}else{echo number_format(($jml10/$jmltarif10)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif11==0) && ($jml11==0)){echo '0';}else{echo number_format(($jml11/$jmltarif11)*100,2); }?>%</b></td>
<td><b><?php if (($jmltarif12==0) && ($jml12==0)){echo '0';}else{echo number_format(($jml12/$jmltarif12)*100,2); }?>%</b></td>
<td><b></b></td>
</tr>								
										</tbody>
<p>Laporan tahun : <?php echo date("Y",strtotime($tglawala)); ?></p>

</table>
<center>

		<br><br>Kudus, <?php echo $tanggalini; ?><br><p class="p">Mengetahui,</p><br><br><br><b>Drs. Abdul Halil</b></td>
<!--<script>
window.print();
</script>-->
		</center>
    </body>
</html>