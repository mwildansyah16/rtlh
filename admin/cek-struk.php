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
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dinas PKPLH</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--<link rel="icon" href="./assets/img/logo.png">-->
	<!-- Bootstrap core CSS -->
    <link href="../validasistruk/css/bootstrap.min.css" rel="stylesheet">
</head>
<center>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Pengecekan Pembayaran</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <!--<img src="assets/img/logo.png" width="90px">-->
                                <center>
<h1>PENGELOLA RUMAH SUSUN SEDERHANA SEWA</br>
(RUSUNAWA) KABUPATEN KUDUS
</h1>
Jalan AKBP R. Agil Kusumadya No. IA Kudus Kode Pos 59346 </br>Telpon (0291) 435190 Faks (0291) 432808 </br>E-mail : dinaspkplh@kuduskab.go.id</p><hr/>
</center>
                            </td>
                        </tr>
                    </table>
                    <?php
					$code=$_POST['code'];
                    $teg=mysqli_query($koneksi, "SELECT * FROM struk where code='$code'");
					$pom = mysqli_fetch_array($teg);

                    if(mysqli_num_rows($teg) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Data tidak ditemukan..!</strong><br>
                            <i>Silahkan menghubungi admin terkait untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th><center>No</center></th>
                            <th><center>Nama</center></th>
                            <th><center>Kamar<center></th>
							<th><center>Periode<center></th>
                            <th><center>Tarif<center></th>
							<th><center>Denda<center></th>
                            <th><center>Bayar<center></th>
							<th><center>Tgl bayar<center></th>
                            <th><center>Status<center></th>
                        </tr>
                        <tr>
<?php
$aa=$pom['idpenyewaan'];
$a=$pom['idpembayaran']; 
		$que=mysqli_query($koneksi, "SELECT * FROM pembayaran,penyewaan where pembayaran.idpenyewaan=penyewaan.idpenyewaan and pembayaran.idpembayaran='$a'");
		$da = mysqli_fetch_array($que);
		?>
		<?php
$idx=$da['idpenyewaan']; // POST atau GET harus menggunakan huruf besar    <!-- ************ -->
$brut=mysqli_query($koneksi,"select *from penyewaan,penghuni,kamar where penyewaan.idpenghuni=penghuni.idpenghuni and penyewaan.idkamar=kamar.idkamar and penyewaan.idpenyewaan='$idx'");
$gom = mysqli_fetch_array($brut);
?>

<td><center><?php echo '1'; ?></center></td>
<td><center><?php echo $gom['nama']; ?></center></td>
<td><center><?php echo $gom['idkamar']; ?></center></td>
<td><center><?php echo date("d-m-Y",strtotime($da['jatuhtempo'])); ?></center></td>
<td><center><?php echo 'Rp.'.number_format($da['tarifsaatitu'], 0, ',', '.'); ?></center></td>
<td><center><?php echo 'Rp.'.number_format($da['denda'], 0, ',', '.'); ?></center></td>
<td><center><?php echo 'Rp.'.number_format($da['bayar'], 0, ',', '.'); ?></center></td>
<td><center><?php echo date("d-m-Y",strtotime($da['tglpembayaran'])); ?></center></td>
<td><center><?php echo $da['statuspembayaran']; ?></center></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="../validasistruk">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</center>
</html>