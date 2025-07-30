<?php 
include '../koneksi.php';
$idx=$_POST['idpenerima']; 
$dtks=$_POST['dtks']; 
if ($dtks=='Tidak'){
if ((!empty($_FILES["file1"]["tmp_name"])) && (!empty($_FILES["file2"]["tmp_name"])) && (!empty($_FILES["file3"]["tmp_name"])) && (!empty($_FILES["file4"]["tmp_name"])))
	{	$error1 = $_FILES['file1']['error']; // Menyimpan jumlah error ke variabel $error
		$error2 = $_FILES['file2']['error'];
		$error3 = $_FILES['file3']['error'];
		$error4 = $_FILES['file4']['error'];
 
    // Validasi error
    if(($error1 == 0) && ($error2 == 0) && ($error3 == 0) && ($error4 == 0)){
        $ukuran_file1 = $_FILES['file1']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
		$ukuran_file2 = $_FILES['file2']['size'];
		$ukuran_file3 = $_FILES['file3']['size'];
		$ukuran_file4 = $_FILES['file4']['size'];
 
        // Validasi ukuran file
        if(($ukuran_file1 <= 15000000) && ($ukuran_file2 <= 15000000) && ($ukuran_file3 <= 15000000) && ($ukuran_file4 <= 15000000)){
            $nama_file1 = $_FILES['file1']['name']; // Menyimpan nama file ke variabel $nama_file
			$nama_file2 = $_FILES['file2']['name'];
			$nama_file3 = $_FILES['file3']['name'];
			$nama_file4 = $_FILES['file4']['name'];
            $format1 = pathinfo($nama_file1, PATHINFO_EXTENSION); // Mendapatkan format file
			$format2 = pathinfo($nama_file2, PATHINFO_EXTENSION);
			$format3 = pathinfo($nama_file3, PATHINFO_EXTENSION);
			$format4 = pathinfo($nama_file4, PATHINFO_EXTENSION);
 
            // Validasi format
            if((($format1 == "jpg") or ($format1 == "png") or ($format1 == "jpeg")) && (($format2 == "jpg") or ($format2 == "png") or ($format1 == "jpeg")) && (($format3 == "jpg") or ($format3 == "png") or ($format1 == "jpeg")) && (($format4 == "jpg") or ($format4 == "png") or ($format1 == "jpeg"))){
                $file_asal1 = $_FILES['file1']['tmp_name'];
				$file_asal2 = $_FILES['file2']['tmp_name'];
				$file_asal3 = $_FILES['file3']['tmp_name'];
				$file_asal4 = $_FILES['file4']['tmp_name'];
                $file_tujuan1 = "../foto/".$_FILES['file1']['name'];
				$file_tujuan2 = "../foto/".$_FILES['file2']['name'];
				$file_tujuan3 = "../foto/".$_FILES['file3']['name'];
				$file_tujuan4 = "../foto/".$_FILES['file4']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if((file_exists($file_tujuan1)) && (file_exists($file_tujuan2)) && (file_exists($file_tujuan3)) && (file_exists($file_tujuan4))){
                    $time1 = time();
					$time2 = time();
					$time3 = time();
					$time4 = time();
                    $acak1 = rand(10000, 99999); // Menghasilkan angka acak antara 10000 - 99999
					$acak2 = rand(10000, 99999);
					$acak3 = rand(10000, 99999);
					$acak4 = rand(10000, 99999);
					$h=strtoupper(addslashes($_POST['kecamatan']));
					$i=strtoupper(addslashes($_POST['desa']));
					$ii=strtoupper(addslashes($_POST['alamatlengkap']));
                    $file_tujuan1 = "../foto/".$h."-".$i."-".$ii."-".$time1."-".$acak1."-".$_FILES['file1']['name']; // Merubah nama file
					$file_tujuan2 = "../foto/".$h."-".$i."-".$ii."-".$time2."-".$acak2."-".$_FILES['file2']['name'];
					$file_tujuan3 = "../foto/".$h."-".$i."-".$ii."-".$time3."-".$acak3."-".$_FILES['file3']['name'];
					$file_tujuan4 = "../foto/".$h."-".$i."-".$ii."-".$time4."-".$acak4."-".$_FILES['file4']['name'];
                }
					$foto1=$file_tujuan1;
					$foto2=$file_tujuan2;
					$foto3=$file_tujuan3;
					$foto4=$file_tujuan4;
                $upload1 = move_uploaded_file($file_asal1, $file_tujuan1); // Proses upload. Menghasilkan nilai true jika upload berhasil
				$upload2 = move_uploaded_file($file_asal2, $file_tujuan2);
				$upload3 = move_uploaded_file($file_asal3, $file_tujuan3);
				$upload4 = move_uploaded_file($file_asal4, $file_tujuan4);

$a=strtoupper(addslashes($_POST['tglsurvey'])); 
$b=strtoupper(addslashes($_POST['petugas'])); 
$c=strtoupper(addslashes($_POST['nik'])); 
$d=strtoupper(addslashes($_POST['nokk'])); 
$da='';
$db=strtoupper(addslashes($_POST['prioritas']));
$e=strtoupper(addslashes($_POST['jmlkk'])); 
$f=strtoupper(addslashes($_POST['nama'])); 
$g=strtoupper(addslashes($_POST['usia'])); 
$h=strtoupper(addslashes($_POST['kecamatan']));
$i=strtoupper(addslashes($_POST['desa']));
$ii=strtoupper(addslashes($_POST['alamatlengkap']));
$j=strtoupper(addslashes($_POST['pendidikan'])); 
$k=strtoupper(addslashes($_POST['jenkel'])); 
$l=strtoupper(addslashes($_POST['pekerjaan'])); 
$m=strtoupper(addslashes($_POST['penghasilan'])); 
$n=strtoupper(addslashes($_POST['statustanah'])); 
$o=strtoupper(addslashes($_POST['statusrumah'])); 
$p=strtoupper(addslashes($_POST['asetrumah'])); 
$q=strtoupper(addslashes($_POST['asettanah'])); 
$r=strtoupper(addslashes($_POST['statusbantuan'])); 
$s=strtoupper(addslashes($_POST['jeniskawasan']));
$t=strtoupper(addslashes($_POST['pondasi']));
$u=strtoupper(addslashes($_POST['sloof'])); 
$v=strtoupper(addslashes($_POST['kolom']));
$w=strtoupper(addslashes($_POST['balok'])); 
$x=strtoupper(addslashes($_POST['strukturatap'])); 
$y=strtoupper(addslashes($_POST['jendela'])); 
$z=strtoupper(addslashes($_POST['ventilasi'])); 
$aa=strtoupper(addslashes($_POST['km'])); 
$ab=strtoupper(addslashes($_POST['jarakair'])); 
$ac=strtoupper(addslashes($_POST['sumberair']));
$ad=strtoupper(addslashes($_POST['sumberlistrik']));
$ae=strtoupper(addslashes($_POST['luas'])); 
$af=strtoupper(addslashes($_POST['jmlpenghuni']));
$ag=strtoupper(addslashes($_POST['atap'])); 
$ah=strtoupper(addslashes($_POST['kondisiatap'])); 
$ai=strtoupper(addslashes($_POST['dinding']));
$aj=strtoupper(addslashes($_POST['kondisidinding']));
$ak=strtoupper(addslashes($_POST['lantai'])); 
$al=strtoupper(addslashes($_POST['kondisilantai']));
$am=strtoupper(addslashes($_POST['latitude'])); 
$an=strtoupper(addslashes($_POST['longitude'])); 

$simpan= mysqli_query($koneksi,"update penerima set tglsurvey='$a',petugas='$b',nik='$c',nokk='$d',nodtks='$da',prioritas='$db',jlmkk='$e',nama='$f',usia='$g',kecamatan='$h',desa='$i',alamatlengkap='$ii',pendidikan='$j',jenkel='$k',pekerjaan='$l',penghasilan='$m',statustanah'$n',statusrumah='$o',asetrumah='$p',asettanah='$q',statusbantuan='$r',jeniskawasan='$s',pondasi='$t',sloof='$u',kolom='$v',balok='$w',strukturatap='$x',jendela='$y',ventilasi='$z',km='$aa',jarakair='$ab',sumberair='$ac',sumberlistrik='$ad',luas='$ae',jmlpenghuni='$af',atap='$ag',kondisiatap='$ah',dinding='$ai',kondisidinding='$aj',lantai='$ak',kondisilantai='$al',fotodepan='$foto1',fotosamping='$foto2',fotodalam='$foto3',fotokm='$foto4',latitude='$am',longitude='$an','')where idpenerima='$idx'"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='input-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{ // else validasi format
                  ?>
	<script language="JavaScript">
	alert('Format file harus jpg,png atau pdf.'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
         <?php
	        
	   }
 
        }else{ // else validasi ukuran file
            ?>
	<script language="JavaScript">
	alert('Ukuran file gambar tidak boleh lebih dari 10000000 (10MB)'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
	        }
 
    }else{ // else validasi error
        ?>
	<script language="JavaScript">
	alert('Ada kesalahan. Gagal upload.'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   } }else{
	    ?>
	<script language="JavaScript">
	alert('File Belum Dipilih'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   }
				



}else{
	$dtks=$_POST['dtks']; 
	if ($dtks==''){
		?>
		<script language="JavaScript">
		alert('No DTKS belum anda isi, Silahkan isi terlebih dahulu!'); //scrip peringatan
		document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
		</script>
        <?php
	
	}else{
	

//kalau ada no DTKSnya
if ((!empty($_FILES["file1"]["tmp_name"])) && (!empty($_FILES["file2"]["tmp_name"])) && (!empty($_FILES["file3"]["tmp_name"])) && (!empty($_FILES["file4"]["tmp_name"])))
	{	$error1 = $_FILES['file1']['error']; // Menyimpan jumlah error ke variabel $error
		$error2 = $_FILES['file2']['error'];
		$error3 = $_FILES['file3']['error'];
		$error4 = $_FILES['file4']['error'];
 
    // Validasi error
    if(($error1 == 0) && ($error2 == 0) && ($error3 == 0) && ($error4 == 0)){
        $ukuran_file1 = $_FILES['file1']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
		$ukuran_file2 = $_FILES['file2']['size'];
		$ukuran_file3 = $_FILES['file3']['size'];
		$ukuran_file4 = $_FILES['file4']['size'];
 
        // Validasi ukuran file
        if(($ukuran_file1 <= 15000000) && ($ukuran_file2 <= 15000000) && ($ukuran_file3 <= 15000000) && ($ukuran_file4 <= 15000000)){
            $nama_file1 = $_FILES['file1']['name']; // Menyimpan nama file ke variabel $nama_file
			$nama_file2 = $_FILES['file2']['name'];
			$nama_file3 = $_FILES['file3']['name'];
			$nama_file4 = $_FILES['file4']['name'];
            $format1 = pathinfo($nama_file1, PATHINFO_EXTENSION); // Mendapatkan format file
			$format2 = pathinfo($nama_file2, PATHINFO_EXTENSION);
			$format3 = pathinfo($nama_file3, PATHINFO_EXTENSION);
			$format4 = pathinfo($nama_file4, PATHINFO_EXTENSION);
 
            // Validasi format
            if((($format1 == "jpg") or ($format1 == "png")) && (($format2 == "jpg") or ($format2 == "png")) && (($format3 == "jpg") or ($format3 == "png")) && (($format4 == "jpg") or ($format4 == "png"))){
                $file_asal1 = $_FILES['file1']['tmp_name'];
				$file_asal2 = $_FILES['file2']['tmp_name'];
				$file_asal3 = $_FILES['file3']['tmp_name'];
				$file_asal4 = $_FILES['file4']['tmp_name'];
                $file_tujuan1 = "../foto/".$_FILES['file1']['name'];
				$file_tujuan2 = "../foto/".$_FILES['file2']['name'];
				$file_tujuan3 = "../foto/".$_FILES['file3']['name'];
				$file_tujuan4 = "../foto/".$_FILES['file4']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if((file_exists($file_tujuan1)) && (file_exists($file_tujuan2)) && (file_exists($file_tujuan3)) && (file_exists($file_tujuan4))){
                    $time1 = time();
					$time2 = time();
					$time3 = time();
					$time4 = time();
                    $acak1 = rand(10000, 99999); // Menghasilkan angka acak antara 10000 - 99999
					$acak2 = rand(10000, 99999);
					$acak3 = rand(10000, 99999);
					$acak4 = rand(10000, 99999);
                    $file_tujuan1 = "../foto/".$time1."-".$acak1."-".$_FILES['file1']['name']; // Merubah nama file
					$file_tujuan2 = "../foto/".$time2."-".$acak2."-".$_FILES['file2']['name'];
					$file_tujuan3 = "../foto/".$time3."-".$acak3."-".$_FILES['file3']['name'];
					$file_tujuan4 = "../foto/".$time4."-".$acak4."-".$_FILES['file4']['name'];
                }
					$foto1=$file_tujuan1;
					$foto2=$file_tujuan2;
					$foto3=$file_tujuan3;
					$foto4=$file_tujuan4;
                $upload1 = move_uploaded_file($file_asal1, $file_tujuan1); // Proses upload. Menghasilkan nilai true jika upload berhasil
				$upload2 = move_uploaded_file($file_asal2, $file_tujuan2);
				$upload3 = move_uploaded_file($file_asal3, $file_tujuan3);
				$upload4 = move_uploaded_file($file_asal4, $file_tujuan4);

$a=strtoupper(addslashes($_POST['tglsurvey'])); 
$b=strtoupper(addslashes($_POST['petugas'])); 
$c=strtoupper(addslashes($_POST['nik'])); 
$d=strtoupper(addslashes($_POST['nokk'])); 
$da=strtoupper(addslashes($_POST['bb']));
$db=strtoupper(addslashes($_POST['prioritas']));
$e=strtoupper(addslashes($_POST['jmlkk'])); 
$f=strtoupper(addslashes($_POST['nama'])); 
$g=strtoupper(addslashes($_POST['usia'])); 
$h=strtoupper(addslashes($_POST['kecamatan']));
$i=strtoupper(addslashes($_POST['desa']));
$ii=strtoupper(addslashes($_POST['alamatlengkap']));
$j=strtoupper(addslashes($_POST['pendidikan'])); 
$k=strtoupper(addslashes($_POST['jenkel'])); 
$l=strtoupper(addslashes($_POST['pekerjaan'])); 
$m=strtoupper(addslashes($_POST['penghasilan'])); 
$n=strtoupper(addslashes($_POST['statustanah'])); 
$o=strtoupper(addslashes($_POST['statusrumah'])); 
$p=strtoupper(addslashes($_POST['asetrumah'])); 
$q=strtoupper(addslashes($_POST['asettanah'])); 
$r=strtoupper(addslashes($_POST['statusbantuan'])); 
$s=strtoupper(addslashes($_POST['jeniskawasan']));
$t=strtoupper(addslashes($_POST['pondasi']));
$u=strtoupper(addslashes($_POST['sloof'])); 
$v=strtoupper(addslashes($_POST['kolom']));
$w=strtoupper(addslashes($_POST['balok'])); 
$x=strtoupper(addslashes($_POST['strukturatap'])); 
$y=strtoupper(addslashes($_POST['jendela'])); 
$z=strtoupper(addslashes($_POST['ventilasi'])); 
$aa=strtoupper(addslashes($_POST['km'])); 
$ab=strtoupper(addslashes($_POST['jarakair'])); 
$ac=strtoupper(addslashes($_POST['sumberair']));
$ad=strtoupper(addslashes($_POST['sumberlistrik']));
$ae=strtoupper(addslashes($_POST['luas'])); 
$af=strtoupper(addslashes($_POST['jmlpenghuni']));
$ag=strtoupper(addslashes($_POST['atap'])); 
$ah=strtoupper(addslashes($_POST['kondisiatap'])); 
$ai=strtoupper(addslashes($_POST['dinding']));
$aj=strtoupper(addslashes($_POST['kondisidinding']));
$ak=strtoupper(addslashes($_POST['lantai'])); 
$al=strtoupper(addslashes($_POST['kondisilantai']));
$am=strtoupper(addslashes($_POST['latitude'])); 
$an=strtoupper(addslashes($_POST['longitude'])); 

$simpan= mysqli_query($koneksi,"update penerima set tglsurvey='$a',petugas='$b',nik='$c',nokk='$d',nodtks='$da',prioritas='$db',jlmkk='$e',nama='$f',usia='$g',kecamatan='$h',desa='$i',alamatlengkap='$ii',pendidikan='$j',jenkel='$k',pekerjaan='$l',penghasilan='$m',statustanah'$n',statusrumah='$o',asetrumah='$p',asettanah='$q',statusbantuan='$r',jeniskawasan='$s',pondasi='$t',sloof='$u',kolom='$v',balok='$w',strukturatap='$x',jendela='$y',ventilasi='$z',km='$aa',jarakair='$ab',sumberair='$ac',sumberlistrik='$ad',luas='$ae',jmlpenghuni='$af',atap='$ag',kondisiatap='$ah',dinding='$ai',kondisidinding='$aj',lantai='$ak',kondisilantai='$al',fotodepan='$foto1',fotosamping='$foto2',fotodalam='$foto3',fotokm='$foto4',latitude='$am',longitude='$an','')where idpenerima='$idx'"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='input-usulan.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{ // else validasi format
                  ?>
	<script language="JavaScript">
	alert('Format file harus jpg,png atau pdf.'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
         <?php
	        
	   }
 
        }else{ // else validasi ukuran file
            ?>
	<script language="JavaScript">
	alert('Ukuran file gambar tidak boleh lebih dari 10000000 (10MB)'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
	        }
 
    }else{ // else validasi error
        ?>
	<script language="JavaScript">
	alert('Ada kesalahan. Gagal upload.'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   } }else{
	    ?>
	<script language="JavaScript">
	alert('File Belum Dipilih'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   }
}
	
	
}
?>
