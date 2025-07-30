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
  text-align:justify;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
<table border="1px" style="width:90%;">
<thead>

                                             
												<th align=center>
</th>
                                                
			</thead>
			<tbody>

                                        </tbody>
										<tbody>
<tr><td text-align='justify'>Bersama dengan surat ini kami sampaikan bahwa menurut pembukuan kami, Atas Nama Suharto Twin Blok 2 Lantai 1 Nomor 01 belum melakukan pembayaran bulan September 2021. Adapun jumlah yang harus dibayarkan adalah Rp. 226.200. Sebagai informasi kami sampaikan rincian pembayaran bulan September 2021 sebagai berikut :</td></tr>
<tr><td>Sehubungan dengan hal tersebut, diharapkan kepada yang bersangkutan agar segera melakukan pembayaran bulan September 2021 selambat-lambatnya tanggal 30 September 2021. Apabila lewat dari batas waktu tersebut penghuni akan dikenakan denda sebesar 10 % dari tarif sewa.</td></tr>
<tr><td>Demikian disampaikan untuk menjadi perhatian.</td></tr>
</tr>								
										</tbody>
<p>Laporan perbulan : <?php echo date("d-m-Y",strtotime($tglawala)); ?> - <?php echo date("d-m-Y",strtotime($tglakhira)); ?></p>

</table>
<center>

		<br><br>Kudus, <?php echo $tanggalini; ?><br><p class="p">Mengetahui,</p><br><br><br><b>Agung Karyanto</b></td>
<!--<script>
window.print();
</script>-->
		</center>
    </body>
</html>