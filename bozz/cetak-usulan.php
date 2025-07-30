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



<style>
    @media print {
        html, body {
            width: 215mm;
            height: 330;        
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
    .page {
        width: 330mm;
        min-height: 200mm;
        padding-top: 0mm;
        margin: 0mm auto;
        background: white;
        box-shadow: 0 0 0px rgba(0, 0, 0, 0.1);
    }
    body {
        font: 7pt "Tahoma";
		width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
    }
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 0px solid #000;
  text-align:center;
  font: 7pt "Tahoma";
}

th, td {
  text-align: left;
  padding: 0px 0px 0px 4px;
  border: 0px solid #000;
  text-align:left;
  font: 5pt "Tahoma";
}
#judul{
  font: 8pt "Tahoma";
  width: 100%;
}
input.largerCheckbox {
            width: 10px;
            height: 10px;
        }
</style>
    <body data-spy="scroll" data-target=".navbar-collapse">


<?php
$kecamatan=$_POST['kecamatan'];
$desa=$_POST['desa'];

				include '../koneksi.php';
                $query2= mysqli_query($koneksi,"SELECT * FROM penerima where kecamatan='$kecamatan' and desa='$desa' ORDER BY nama");
				while ($row2= mysqli_fetch_array($query2)) {
?>

<table id="dataTable3" class="text-center">
<thead class="text-capitalize">
<tr><th colspan=12 id="judul"><center><b>LEMBAR PENILAIAN RTLH</b></center></th></tr>
<tr><th style="border-bottom:1px solid #000;" colspan=12><b>A. FORMAT PENILAIAN</b></th></tr>

<tr><th style="border-left:1px solid #000; border-right:1px solid #000;" rowspan=3 colspan=6><center><b>PENILAIAN RUMAH TIDAK LAYAK HUNI</b></center></th><th></th><th style="border:1px solid #000;" colspan=5><b>II. KONDISI FISIK RUMAH</b></th></tr>

<tr><th></th><th style="border:1px solid #000;" colspan=5><b>A. ASPEK KESELAMATAN</b></th></tr>

<tr><th></th><th style="border:1px solid #000;" rowspan=2>1</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>PONDASI</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pondasi']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pondasi']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pondasi']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border-left:1px solid #000; border-right:1px solid #000;" colspan=6></th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pondasi']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pondasi']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border-left:1px solid #000;" colspan=2>DESA</th><th style="border-right:1px solid #000;" colspan=4>: <?php echo $row2['desa']; ?></th><th></th><th style="border:1px solid #000;" rowspan=2>2</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>KONDISI SLOOF</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sloof']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sloof']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sloof']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border-left:1px solid #000;" colspan=2>KECAMATAN</th><th style="border-right:1px solid #000;" colspan=4>: <?php echo $row2['kecamatan']; ?></th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sloof']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sloof']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border-left:1px solid #000;" colspan=2>KABUPATEN/KOTA</th><th style="border-right:1px solid #000;" colspan=4>: KUDUS</th><th></th><th style="border:1px solid #000;" rowspan=2>3</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>KONDISI KOLOM/TIANG</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kolom']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kolom']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kolom']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border-left:1px solid #000;" colspan=2>PROVINSI</th><th style="border-right:1px solid #000;" colspan=4>: JAWA TENGAH</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kolom']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kolom']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border-left:1px solid #000;" colspan=2>NAMA FILE FOTO</th><th  style="border-right:1px solid #000;"colspan=4>: <?php echo $row2['fotodepan']; ?></th><th></th><th style="border:1px solid #000;" rowspan=2>4</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>KONDISI BALOK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['balok']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['balok']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['balok']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th  style="border:1px solid #000;" colspan=6><b>I. IDENTITAS PENGHUNI RUMAH</b></th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['balok']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['balok']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border:1px solid #000;">1</th><th style="border:1px solid #000;">NOMOR URUT</th><th style="border:1px solid #000;" colspan=4>sa</th><th></th><th style="border:1px solid #000;" rowspan=2>5</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>KONDISI STRUKTUR ATAP</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['strukturatap']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['strukturatap']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['strukturatap']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border:1px solid #000;">2</th><th style="border:1px solid #000;">NAMA LENGKAP</th><th style="border:1px solid #000;" colspan=4><?php echo $row2['nama']; ?></th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['strukturatap']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['strukturatap']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border-left:1px solid #000;padding: 5px 0px 5px 4px;">3</th><th style="border:1px solid #000;">USIA (TAHUN)</th><th style="border:1px solid #000;" colspan=4><?php echo $row2['usia']; ?> TAHUN</th><th></th><th style="border:1px solid #000;" colspan=6><b>B. ASPEK KESEHATAN</b></th></tr>

<tr><th  style="border:1px solid #000;" rowspan=2>4</th><th style="border:1px solid #000;" rowspan=2>PENDIDIKAN TERAKHIR</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="TIDAK PUNYA IJAZAH"){ echo "checked"; }?> onclick="return false;">
TIDAK PUNYA IJAZAH</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="SMP/SEDERAJAT"){ echo "checked"; }?> onclick="return false;">
SMP/SEDERAJAT</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="D1/D2/D3"){ echo "checked"; }?> onclick="return false;">
D1/D2/D3</th><th></th><th style="border:1px solid #000;">1</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;">JENDELA/LUBANG CAHAYA</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jendela']=="ADA, MENCUKUPI"){ echo "checked"; }?> onclick="return false;">
ADA, MENCUKUPI</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jendela']=="ADA, TIDAK MENCUKUPI"){ echo "checked"; }?> onclick="return false;">
ADA, TIDAK MENCUKUPI</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jendela']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="SD/SEDERAJAT"){ echo "checked"; }?> onclick="return false;">
SD/SEDERAJAT</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="SMA/SEDERAJAT"){ echo "checked"; }?> onclick="return false;">
SMA/SEDERAJAT</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pendidikan']=="D4/S1"){ echo "checked"; }?> onclick="return false;">
D4/S1</th><th></th><th style="border:1px solid #000;">2</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;">VENTILASI</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['ventilasi']=="ADA, MENCUKUPI"){ echo "checked"; }?> onclick="return false;">
ADA, MENCUKUPI</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['ventilasi']=="ADA, TIDAK MENCUKUPI"){ echo "checked"; }?> onclick="return false;">
ADA, TIDAK MENCUKUPI</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['ventilasi']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border:1px solid #000;">5</th><th style="border:1px solid #000;">JENIS KELAMIN</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jenkel']=="LAKI-LAKI"){ echo "checked"; }?> onclick="return false;">
LAKI-LAKI</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jenkel']=="PEREMPUAN"){ echo "checked"; }?> onclick="return false;">
PEREMPUAN</th><th></th><th style="border:1px solid #000;" rowspan=2>3</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>KEPEMILIKAN KAMAR MANDI</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['km']=="SENDIRI"){ echo "checked"; }?> onclick="return false;">
SENDIRI</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['km']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK ADA</th></tr>

<tr><th style="border:1px solid #000;">6</th><th style="border:1px solid #000;">ALAMAT LENGKAP</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=4>DESA <?php echo $row2['desa']; ?> <?php echo $row2['alamatlengkap']; ?> KECAMATAN <?php echo $row2['kecamatan']; ?> KABUPATEN KUDUS</th><th></th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['km']=="BERSAMA/MCK KOMUNAL"){ echo "checked"; }?> onclick="return false;">
BERSAMA/MCK KOMUNAL</th></tr>

<tr><th style="border:1px solid #000;">7</th><th style="border:1px solid #000;">NOMOR KTP (NIK)</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=4><?php echo $row2['nik']; ?></th><th></th><th style="border:1px solid #000;">4</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;">JARAK SUMBER AIR MINUM</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jarakair']=="LEBIH DARI 10 METER"){ echo "checked"; }?> onclick="return false;">
LEBIH DARI 10 METER</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jarakair']=="KURANG DARI 10 METER"){ echo "checked"; }?> onclick="return false;">
KURANG DARI 10 METER</th></tr>

<tr><th style="border:1px solid #000;">8</th><th style="border:1px solid #000;">JUMLAH KK DALAM 1 RUMAH</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=4><?php echo $row2['jmlkk']; ?></th><th></th><th style="border:1px solid #000;" rowspan=2>5</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" rowspan=2>SUMBER AIR MINUM</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="PDAM"){ echo "checked"; }?> onclick="return false;">
PDAM</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="SUMUR"){ echo "checked"; }?> onclick="return false;">
SUMUR</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="AIR HUJAN"){ echo "checked"; }?> onclick="return false;">
AIR HUJAN</th></tr>

<tr><th style="border:1px solid #000;" rowspan=4>9</th><th style="border:1px solid #000;" rowspan=4>PEKERJAAN UTAMA</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="PNS"){ echo "checked"; }?> onclick="return false;">
PNS</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="PRAMUWISMA"){ echo "checked"; }?> onclick="return false;">
PRAMUWISMA</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="TUKANG/MONTIR"){ echo "checked"; }?> onclick="return false;">
TUKANG/MONTIR</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="NELAYAN"){ echo "checked"; }?> onclick="return false;">
NELAYAN</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="AIR KEMASAN/ISI ULANG"){ echo "checked"; }?> onclick="return false;">
AIR KEMASAN/ISI ULANG</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="MATA AIR"){ echo "checked"; }?> onclick="return false;">
MATA AIR</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberair']=="LAINNYA"){ echo "checked"; }?> onclick="return false;">
LAINNYA</th></tr>

<tr><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="TNI/POLRI"){ echo "checked"; }?> onclick="return false;">
TNI/POLRI</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="OJEK/SUPIR"){ echo "checked"; }?> onclick="return false;">
OJEK/SUPIR</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="PETANI"){ echo "checked"; }?> onclick="return false;">
PETANI</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="BURUH HARIAN"){ echo "checked"; }?> onclick="return false;">
BURUH HARIAN</th><th></th><th style="border:1px solid #000;" rowspan=2>6</th><th style="border:1px solid #000; border-right:1px solid #000;" rowspan=2>SUMBER LISTRIK</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberlistrik']=="PLN DENGAN METERAN"){ echo "checked"; }?> onclick="return false;">
PLN DENGAN METERAN</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberlistrik']=="LISTRIK NON PLN"){ echo "checked"; }?> onclick="return false;">
LISTRIK NON PLN</th></tr>

<tr><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="BUMN/D"){ echo "checked"; }?> onclick="return false;">
BUMN/D</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="HONORER"){ echo "checked"; }?> onclick="return false;">
HONORER</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="WIRAUSAHA"){ echo "checked"; }?> onclick="return false;">
WIRAUSAHA</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="LAINNYA"){ echo "checked"; }?> onclick="return false;">
LAINNYA</th><th></th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberlistrik']=="PLN TANPA METERAN"){ echo "checked"; }?> onclick="return false;">
PLN TANPA METERAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['sumberlistrik']=="BUKAN LISTRIK"){ echo "checked"; }?> onclick="return false;">
BUKAN LISTRIK</th></tr>

<tr><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="PENSIUNAN"){ echo "checked"; }?> onclick="return false;">
PENSIUNAN</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="KARYAWAN"){ echo "checked"; }?> onclick="return false;">
KARYAWAN</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="LANSIA/RT"){ echo "checked"; }?> onclick="return false;">
LANSIA/RT</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['pekerjaan']=="TIDAK BEKERJA"){ echo "checked"; }?> onclick="return false;">
TIDAK BEKERJA</th><th></th><th style="border:1px solid #000;" colspan=5><b>C. ASPEK PERSYARATAN LUAS DAN KEBUTUHAN RUANG</b></th></tr>

<tr><th style="border:1px solid #000;" rowspan=3>10</th><th style="border:1px solid #000;" rowspan=3>PENGHASILAN ATAU PENGELUARAN PER BULAN</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="&lt; 1,2 JUTA"){ echo "checked"; }?> onclick="return false;">
&lt; 1,2 JUTA</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="2,7 - 3,1 JUTA"){ echo "checked"; }?> onclick="return false;">
2,7 - 3,1 JUTA</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="&gt; 4,2"){ echo "checked"; }?> onclick="return false;">
&gt; 4,2</th><th></th><th style="border:1px solid #000;">1</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;">LUAS RUMAH (M2)</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><?php echo $row2['luas']; ?></th></tr>

<tr><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="1,9 - 2,1 JUTA"){ echo "checked"; }?> onclick="return false;">
1,9 - 2,1 JUTA</th><th style="border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="3,2 - 3,6 JUTA"){ echo "checked"; }?> onclick="return false;">
3,2 - 3,6 JUTA</th><th></th><th style="border:1px solid #000;">2</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;">JUMLAH PENGHUNI (ORANG)</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><?php echo $row2['jmlpenghuni']; ?></th></tr>

<tr><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="2,2 - 2,6 JUTA"){ echo "checked"; }?> onclick="return false;">
2,2 - 2,6 JUTA</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['penghasilan']=="3,7 - 4,2 JUTA"){ echo "checked"; }?> onclick="return false;">
3,7 - 4,2 JUTA</th><th></th><th style="border:1px solid #000;" colspan=5><b>D. ASPEK KOMPONEN BAHAN BANGUNAN</b></th></tr>

<tr><th style="border:1px solid #000;" rowspan=2>11</th><th style="border:1px solid #000;" rowspan=2>STATUS KEPEMILIKAN TANAH</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statustanah']=="MILIK SENDIRI"){ echo "checked"; }?> onclick="return false;">
MILIK SENDIRI</th><th style="border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statustanah']=="TANAH NEGARA"){ echo "checked"; }?> onclick="return false;">
TANAH NEGARA</th><th></th><th style="border:1px solid #000;" rowspan=3>1</th><th  style="border:1px solid #000;"rowspan=3>MATERIAL ATAP TERLUAS</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="GENTENG"){ echo "checked"; }?> onclick="return false;">
GENTENG</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="JERAMI"){ echo "checked"; }?> onclick="return false;">
JERAMI</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="RUMBIA"){ echo "checked"; }?> onclick="return false;">
RUMBIA</th></tr>

<tr><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=4><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statustanah']=="BUKAN MILIK SENDIRI"){ echo "checked"; }?> onclick="return false;">
BUKAN MILIK SENDIRI</th><th></th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="ASBES"){ echo "checked"; }?> onclick="return false;">
ASBES</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="IJUK"){ echo "checked"; }?> onclick="return false;">
IJUK</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="LAINNYA"){ echo "checked"; }?> onclick="return false;">
LAINNYA</th></tr>

<tr><th style="border:1px solid #000;">12</th><th style="border:1px solid #000;">STATUS KEPEMILIKAN RUMAH</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusrumah']=="MILIK SENDIRI"){ echo "checked"; }?> onclick="return false;">
MILIK SENDIRI</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusrumah']=="BUKAN MILIK SENDIRI"){ echo "checked"; }?> onclick="return false;">
BUKAN MILIK SENDIRI</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusrumah']=="KONTRAK/SEWA"){ echo "checked"; }?> onclick="return false;">
KONTRAK/SEWA</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="SENG"){ echo "checked"; }?> onclick="return false;">
SENG</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['atap']=="DAUN-DAUN"){ echo "checked"; }?> onclick="return false;">
DAUN-DAUN</th></tr>

<tr><th style="border:1px solid #000;">13</th><th style="border:1px solid #000;">ASET RUMAH DITEMPAT LAIN</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['asetrumah']=="ADA"){ echo "checked"; }?> onclick="return false;">
ADA</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['asetrumah']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK  ADA</th><th></th><th style="border:1px solid #000;" rowspan=2>2</th><th style="border:1px solid #000;" rowspan=2>KONDISI PENUTUP ATAP</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisiatap']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisiatap']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th></tr>

<tr><th style="border:1px solid #000;">14</th><th style="border:1px solid #000;">ASET TANAH DITEMPAT LAIN</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['asettanah']=="ADA"){ echo "checked"; }?> onclick="return false;">
ADA</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['asettanah']=="TIDAK ADA"){ echo "checked"; }?> onclick="return false;">
TIDAK  ADA</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisiatap']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisiatap']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th style="border:1px solid #000;" rowspan=2>15</th><th style="border:1px solid #000;" rowspan=2>PERNAH MENDAPATKAN BANTUAN</th><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusbantuan']=="YA, LEBIH DARI 10 TAHUN YANG LALU"){ echo "checked"; }?> onclick="return false;">
YA, LEBIH DARI 10 TAHUN YANG LALU</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusbantuan']=="BELUM PERNAH"){ echo "checked"; }?> onclick="return false;">
BELUM PERNAH</th><th></th><th style="border:1px solid #000;" rowspan=3>3</th><th  style="border:1px solid #000;"rowspan=3>MATERIAL DINDING TERLUAS</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="TEMBOK PLESTERAN"){ echo "checked"; }?> onclick="return false;">
TEMBOK PLESTERAN</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="KAYU/PAPAN"){ echo "checked"; }?> onclick="return false;">
KAYU/PAPAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="BAMBU"){ echo "checked"; }?> onclick="return false;">
BAMBU</th></tr>

<tr><th style="border-bottom:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['statusbantuan']=="YA, KURANG DARI 10 TAHUN YANG LALU"){ echo "checked"; }?> onclick="return false;">
YA, KURANG DARI 10 TAHUN YANG LALU</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"colspan=2></th><th></th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="TEMBOK TANPA PLESTERAN"){ echo "checked"; }?> onclick="return false;">
TEMBOK TANPA PLESTERAN</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="PLESTERAN ANYAMAN BAMBU"){ echo "checked"; }?> onclick="return false;">
PLESTERAN ANYAMAN BAMBU</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="RUMBIA"){ echo "checked"; }?> onclick="return false;">
RUMBIA</th></tr>

<tr><th style="border:1px solid #000;" rowspan=7>16</th><th style="border:1px solid #000;" rowspan=7>JENIS KAWASAN LOKASI RUMAH</th><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="DATARAN BANJIR"){ echo "checked"; }?> onclick="return false;">
DATARAN BANJIR</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="KSPN"){ echo "checked"; }?> onclick="return false;">
KSPN</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="GRC/ASBES"){ echo "checked"; }?> onclick="return false;">
GRC/ASBES</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="ANYAMAN BAMBU/BILIK"){ echo "checked"; }?> onclick="return false;">
ANYAMAN BAMBU/BILIK</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['dinding']=="LAINNYA"){ echo "checked"; }?> onclick="return false;">
LAINNYA</th></tr>

<tr><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="KEK"){ echo "checked"; }?> onclick="return false;">
KEK</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="PESISIR/NELAYAN"){ echo "checked"; }?> onclick="return false;">
PESISIR/NELAYAN</th><th></th><th style="border:1px solid #000;" rowspan=2>4</th><th style="border:1px solid #000;" rowspan=2>KONDISI DINDING</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisidinding']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisidinding']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th></tr>

<tr><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="PERBATASAN"){ echo "checked"; }?> onclick="return false;">
PERBATASAN</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="PULAU-PULAU KECIL"){ echo "checked"; }?> onclick="return false;">
PULAU-PULAU KECIL</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisidinding']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisidinding']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="KUMUH"){ echo "checked"; }?> onclick="return false;">
KUMUH</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="DAERAH TERTINGGAL DAN TERPENCIL"){ echo "checked"; }?> onclick="return false;">
DAERAH TERTINGGAL DAN TERPENCIL</th><th></th><th style="border:1px solid #000;" rowspan=3>5</th><th style="border:1px solid #000;" rowspan=3>MATERIAL LANTAI TERLUAS</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="MARMER/GRANIT"){ echo "checked"; }?> onclick="return false;">
MARMER/GRANIT</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="PLESTERAN"){ echo "checked"; }?> onclick="return false;">
PLESTERAN</th><th style="border-right:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="TANAH"){ echo "checked"; }?> onclick="return false;">
TANAH</th></tr>

<tr><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="TRANSMIGRASI"){ echo "checked"; }?> onclick="return false;">
TRANSMIGRASI</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="DEKAT JALUR BAHAYA (JALUR KERETA, LERENG, SUTET"){ echo "checked"; }?> onclick="return false;">
DEKAT JALUR BAHAYA (JALUR KERETA,LERENG, SUTET</th><th></th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="KERAMIK"){ echo "checked"; }?> onclick="return false;">
KERAMIK</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="KAYU"){ echo "checked"; }?> onclick="return false;">
KAYU</th></tr>

<tr><th colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="RAWAN BENCANA"){ echo "checked"; }?> onclick="return false;">
RAWAN BENCANA</th><th style="border-right:1px solid #000;" colspan=2>
&emsp;</th><th></th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="UBIN/TEGEL"){ echo "checked"; }?> onclick="return false;">
UBIN/TEGEL</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['lantai']=="BAMBU"){ echo "checked"; }?> onclick="return false;">
BAMBU</th></tr>

<tr><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=4><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['jeniskawasan']=="DIPERUNTUKKAN UNTUK PERMUKIMAN"){ echo "checked"; }?> onclick="return false;">
DIPERUNTUKKAN UNTUK PERMUKIMAN</th><th></th><th style="border:1px solid #000;" rowspan=2>6</th><th style="border:1px solid #000;" rowspan=2>KONDISI LANTAI</th><th><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisilantai']=="BAIK"){ echo "checked"; }?> onclick="return false;">
BAIK</th><th style="border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisilantai']=="RUSAK SEDANG/SEBAGIAN"){ echo "checked"; }?> onclick="return false;">
RUSAK SEDANG/SEBAGIAN</th></tr>

<tr><th style="border:1px solid #000;" colspan=6><center>
BERI TANDA SILANG (X) DI KOTAK JAWABAN YANG DIPILIH</center></th><th>
</th><th style="border-bottom:1px solid #000;"><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisilantai']=="RUSAK RINGAN"){ echo "checked"; }?> onclick="return false;">
RUSAK RINGAN</th><th style="border-bottom:1px solid #000; border-right:1px solid #000;" colspan=2><input type="checkbox"  class="largerCheckbox"name="toping" <?php if ($row2['kondisilantai']=="RUSAK BERAT/SELURUHNYA"){ echo "checked"; }?> onclick="return false;">
RUSAK BERAT/SELURUHNYA</th></tr>

<tr><th colspan=13><br></th></tr>

<tr><th colspan=6><b>
B. FOTO/DOKUMENTASI</b></th><th>
</th><th colspan=6><b>
C. KESIMPULAN/PENILAIAN HASIL KONDISI RUMAH</b></th></tr>

<tr><th rowspan=4 colspan=6><center>
<img src="<?php echo $row2['fotodepan'];?>" width="150px" height="80px"></center></th><th>
</th><th style="padding: 5px 0px 5px 4px; border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3>
RUMAH LAYAK HUNI</th><th style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></th></tr>

<tr><th>
</th><th style="padding: 5px 0px 5px 4px; border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3>
RUMAH TIDAK LAYAK HUNI</th><th style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></th></tr>

<tr><th>
</th><th style="padding: 5px 0px 5px 4px; border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3>
RUMAH RUSAK TOTAL</th><th style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></th></tr>

<tr><th>
</th><th style="padding: 5px 0px 5px 4px; border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;" colspan=3>
BELUM ADA RUMAH</th><th style="border-top:1px solid #000; border-left:1px solid #000; border-bottom:1px solid #000; border-right:1px solid #000;"></th></tr>

<tr><th colspan=13><br></th></tr>

<tr><th colspan=6><center>
VERIFIKATOR</center></th><th>
</th><th colspan=6><center>
KUDUS, 18 JANUARI 2024<br>CALON PENERIMA BANTUAN</center></th></tr>

<tr><th colspan=13><br><br><br></th></tr>

<tr><th colspan=3><center>
(...................................)    </center></th><th colspan=3><center>
    (...................................)</center></th><th>
</th><th colspan=6><center>
<b><u><?php echo $row2['nama']; ?></u></b></center></th></tr>
			</thead>
			<tbody>

                                        </tbody>
										
									</table>
									</br>
									</br>
<?php } ?>

<!--<script>
window.print();
</script>-->
    </body>
</html>