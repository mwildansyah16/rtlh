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
												<th>Id kamar</th>
                                                <th>Masa pemakaian</th>
												<th>Bayar</th>
												<th>Tgl pembayaran</th>
												<th>Status</th>
			</thead>
			<tbody>
<?php
include '../koneksi.php'; //koneksi database
$no=1;
$tahunini=date("Y");
$select=mysqli_query($koneksi,"select * from sampah,penyewaan where sampah.idpenyewaan=penyewaan.idpenyewaan and sampah.stsbyr='Lunas' and sampah.tglbyr between '$tglawala' and '$tglakhira' and penyewaan.idkamar between '$level1' and '$level2' order by sampah.tglbyr asc,penyewaan.idkamar asc");
$jml1=0;
$jml2=0;
$jml3=0;
$total=0;
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
<td><?php echo $da['nama']; ?></td>
<td><?php echo $da['idkamar']; ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['jthtempo'])); ?></td>
<td><?php echo 'Rp.'.number_format($ambil['byr'], 0, ',', '.'); ?></td>
<?php $hasil1=$ambil['byr'];  $jml1+=$hasil1;?>
<td><?php echo date("d-m-Y",strtotime($ambil['tglbyr'])); ?></td>
<td><?php echo $ambil['stsbyr']; ?></td>


</tr>
<?php 
}
?>
                                        </tbody>
										<tbody>
<td colspan=4><b>TOTAL</b></td>
<td><b><?php echo 'Rp.'.number_format($jml1, 0, ',', '.'); ?></b></td>
<td colspan=2><b></b></td>
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