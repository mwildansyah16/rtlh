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
<th>FOTO</th>
<th>FOTO</th>
<th>FOTO</th>
</tr>
</thead>
<tbody>

<?php
$kecamatan=$_POST['kecamatan'];
$desa=$_POST['desa'];
//$tglsurvey1=$_POST['tglsurvey1'];
//$tglsurvey2=$_POST['tglsurvey2'];

				include '../koneksi.php';
				$no=1;
                $query2= mysqli_query($koneksi,"SELECT * FROM penerima where kesimpulan='Tidak layak' and kecamatan='$kecamatan' and desa='$desa' ORDER BY kecamatan asc,desa asc, nama asc");
				while ($ambil= mysqli_fetch_array($query2)) {
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $ambil['nik']; ?></td>
<td><?php echo $ambil['nama']; ?></td>
<td><?php echo $ambil['kecamatan']; ?></td>
<td><?php echo $ambil['desa']; ?></td>
<td><?php echo $ambil['alamatlengkap']; ?></td>
<td><img src="<?php echo $ambil['fotodepan'];?>" style="height:70px; width:100px;"></td>
<td><img src="<?php echo $ambil['fotosamping'];?>" style="height:70px; width:100px;"></td>
<td><img src="<?php echo $ambil['fotodalam'];?>" style="height:70px; width:100px;"></td>
<td><img src="<?php echo $ambil['fotokm'];?>" style="height:70px; width:100px;"></td>

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


