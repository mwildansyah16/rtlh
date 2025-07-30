<html class="no-js" lang="en"> <!--<![endif]-->
<?php
session_start();
include '../koneksi.php';

if ((isset($_SESSION['level']))&&($_SESSION['level']=='bozz')){
	$iduser=$_SESSION['iduser'];
}
else {
	echo "<script>window.location='../index.php'</script>";
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
 

?>


        <meta charset="utf-8">
        <title>Dinas PKPLH</title>
         

        <!--Google Font link-->
 </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
<center>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #000;
  text-align:center;
}

th, td {
  text-align: left;
  height: 5px;
  padding: 8px;
  border: 1px solid #000;
  text-align:center;
}

tr:nth-child(even){background-color: #f2f2f2}




</style>
<table border="1px" style="width:90%;">
<thead class="text-capitalize">
<tr>
<th>NO</th>
<th>NIK</th>
<th>NAMA</th>
<th>KECAMATAN</th>
<th>DESA</th>
<th>ALAMAT LENGKAP</th>
<th>FOTO</th>
<th>JML KK</th>
<th>JML PENGHUNI</th>
<th>PEKERJAAN</th>
<th>KAMAR MANDI</th>
</tr>
</thead>
<tbody>

<?php
if(isset($_POST['kecamatan'])){
	$kecamatan=$_POST['kecamatan'];
}else{
	$kecamatan='';
}
if(isset($_POST['desa'])){
	$desa=$_POST['desa'];
}else{
	$desa='';
}
$tglsurvey1=$_POST['tglsurvey1'];
$tglsurvey2=$_POST['tglsurvey2'];

				include '../koneksi.php';
				$no=1;
if($kecamatan==''){                
				$query2= mysqli_query($koneksi,"SELECT * FROM penerima where tglsurvey between '$tglsurvey1' and '$tglsurvey2' ORDER BY nama");
}else{
if($desa=='SEMUA'){                
				$query2= mysqli_query($koneksi,"SELECT * FROM penerima where kecamatan='$kecamatan' and tglsurvey between '$tglsurvey1' and '$tglsurvey2' ORDER BY nama");
}else{
				$query2= mysqli_query($koneksi,"SELECT * FROM penerima where kecamatan='$kecamatan' and desa='$desa' and tglsurvey between '$tglsurvey1' and '$tglsurvey2' ORDER BY nama");	
}
}
				while ($ambil= mysqli_fetch_array($query2)) {
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $ambil['nik']; ?></td>
<td><?php echo $ambil['nama']; ?></td>
<td><?php echo $ambil['kecamatan']; ?></td>
<td><?php echo $ambil['desa']; ?></td>
<td><?php echo $ambil['alamatlengkap']; ?></td>
<td>
<a href="<?php echo $ambil['fotodepan'];?>" target="_blank"><img src="<?php echo $ambil['fotodepan'];?>" style="height:70px; width:100px;"></a></td>

<td><?php echo $ambil['jmlkk']; ?></td>
<td><?php echo $ambil['jmlpenghuni']; ?></td>
<td><?php echo $ambil['pekerjaan']; ?></td>
<td><?php echo $ambil['km']; ?></td>
</tr>
<?php 
}
?>		
</tbody>
										
									</table>
									</br>
									</br>

<!--<script>
window.print();
</script>-->
    </body>
</html>


