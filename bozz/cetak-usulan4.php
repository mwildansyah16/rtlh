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
<th>NO DTKS</th>
<th>NAMA</th>
<th>KECAMATAN</th>
<th>DESA</th>
<th>ALAMAT LENGKAP</th>
<th>PONDASI</th>
<th>KOLOM</th>
<th>BALOK</th>
<th>STRUKTUR ATAP</th>
<th>JENDELA</th>
<th>VENTILASI</th>
<th>KM</th>
<th>AIR</th>
<th>LISTRIK</th>
<th>LUAS RUMAH</th>
<th>JML PENGHUNI</th>
<th>ATAP</th>
<th>KONDISI ATAP</th>
<th>DINDING</th>
<th>KONDISI DINDING</th>
<th>LANTAI</th>
<th>KONDISI LANTAI</th>
</tr>
</thead>
<tbody>

<?php


				include '../koneksi.php';
				$no=1;
                $query2= mysqli_query($koneksi,"SELECT * FROM penerima where kesimpulan='Tidak layak' ORDER BY kecamatan asc,desa asc, nama asc");
				while ($ambil= mysqli_fetch_array($query2)) {
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $ambil['nik']; ?></td>
<td><?php echo $ambil['nodtks']; ?></td>
<td><?php echo $ambil['nama']; ?></td>
<td><?php echo $ambil['kecamatan']; ?></td>
<td><?php echo $ambil['desa']; ?></td>
<td><?php echo $ambil['alamatlengkap']; ?></td>
<td><?php echo $ambil['pondasi']; ?></td>
<td><?php echo $ambil['sloof']; ?></td>
<td><?php echo $ambil['kolom']; ?></td>
<td><?php echo $ambil['balok']; ?></td>
<td><?php echo $ambil['strukturatap']; ?></td>
<td><?php echo $ambil['jendela']; ?></td>
<td><?php echo $ambil['ventilasi']; ?></td>
<td><?php echo $ambil['km']; ?></td>
<td><?php echo $ambil['jarakair']; ?></td>
<td><?php echo $ambil['sumberair']; ?></td>
<td><?php echo $ambil['sumberlistrik']; ?></td>
<td><?php echo $ambil['luas']; ?></td>
<td><?php echo $ambil['jmlpenghuni']; ?></td>
<td><?php echo $ambil['atap']; ?></td>
<td><?php echo $ambil['kondisiatap']; ?></td>
<td><?php echo $ambil['dinding']; ?></td>
<td><?php echo $ambil['kondisidinding']; ?></td>
<td><?php echo $ambil['lantai']; ?></td>
<td><?php echo $ambil['kondisilantai']; ?></td>
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


