 <html class="no-js" lang="en"> <!--<![endif]-->
    
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
$blna=$_POST['bulan'];
$bln=$_POST['bulan'];
if($bln=='01'){
	$bln="Januari";
	}else{
		if($bln=='02'){
	$bln="Februari";
	}else{
		if($bln=='03'){
	$bln="Maret";
	}else{
		if($bln=='04'){
	$bln="April";
	}else{
		if($bln=='05'){
	$bln="Mei";
	}else{
		if($bln=='06'){
	$bln="Juni";
	}else{
		if($bln=='07'){
	$bln="Juli";
	}else{
		if($bln=='08'){
	$bln="Agustus";
	}else{
		if($bln=='09'){
	$bln="September";
	}else{
		if($bln=='10'){
	$bln="Oktober";
	}else{
		if($bln=='11'){
	$bln="November";
	}else{
		$bln="Desember";
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


$thn=$_POST['tahun']; 
?>


        <meta charset="utf-8">
        <title>Retribusi Pasar</title>
         

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
p {
	padding: -20px;
}
tr:nth-child(even){background-color: #f2f2f2}
</style>
<table border="1px" style="width:90%;">
<thead>

                                             
												<th>No</th>
                                                <th>Id surat masuk</th>
                                                <th>Tanggal surat</th>
                                                <th>Tanggal masuk</th>
                                                <th>Asal surat</th>
												<th>No surat masuk</th>
												<th>Perihal</th>
												<th>Disposisi dari</th>
												<th>Bidang</th>
												<th>File</th>
												<th>Disposisi</th>
			</thead>
			<tbody>
				<?php
include '../koneksi.php';
$no=1;
$select=mysqli_query($koneksi,"select * from suratmasuk where bidang='Sekretaris' and MONTH(tglsurat)=$blna and YEAR(tglsurat)=$thn order by idsuratmasuk desc");
while ($ambil=mysqli_fetch_array($select)){
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $paj=$ambil['idsuratmasuk']; ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['tglsurat'])); ?></td>
<td><?php echo date("d-m-Y",strtotime($ambil['tglmasuk'])); ?></td>
<td><?php echo $ambil['asalsurat']; ?></td>
<td><?php echo $ambil['nosuratmasuk']; ?></td>
<td><?php echo $ambil['perihal']; ?></td>
<td><?php echo $ambil['disposisidari']; ?></td>
<td><?php echo $ambil['bidang']; ?></td>
<td><a target="_blank" href="../berkas/<?php echo $ambil['file']; ?>"><button type="button" class="btn btn-primary mb-3"><?php echo $ambil['file']; ?></button></a></td>
<td><?php echo $ambil['disposisi']; ?></td>


</tr>
<?php 
}
?>
                                        </tbody>
										
<p>Laporan perbulan : <?php echo $bln; ?> <?php echo date(' Y', strtotime($thn)); ?></p>

</table>
<center>

		<br><br>Kudus, <?php echo $tanggalini; ?><br><p class="p">Mengetahui,</p><br><br><br><b>Pak Agung</b></td>
<!--<script>
window.print();
</script>-->
		</center>
    </body>
</html>