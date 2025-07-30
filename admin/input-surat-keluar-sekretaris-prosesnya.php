<?php 
include '../koneksi.php';
if (!empty($_FILES["file"]["tmp_name"]))
	{	$error = $_FILES['file']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['file']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 10000000){
            $nama_file = $_FILES['file']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") or ($format == "pdf") ){
                $file_asal = $_FILES['file']['tmp_name'];
                $file_tujuan = "../suratkeluar/sekretaris/".$_FILES['file']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if(file_exists($file_tujuan)){
                    $time = time();
                    $acak = rand(10000, 99999);; // Menghasilkan angka acak antara 10000 - 99999
                    $file_tujuan = "../suratkeluar/sekretaris/".$time."-".$acak."-".$_FILES['file']['name']; // Merubah nama file
                }
                 $h=$file_tujuan;
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil

$a=addslashes($_POST['indek']); 
$b=addslashes($_POST['kode']); 
$c=addslashes($_POST['nourut']); 
$d=addslashes($_POST['isiringkasan']); 
$e=addslashes($_POST['kepada']); 
$f=addslashes($_POST['tglsuratkeluar']); 
$g=addslashes($_POST['bidang']); 
$i=addslashes($_POST['lampiran']);
$j=addslashes($_POST['statussuratkeluar']);
$k=addslashes($_POST['catatan']); 
$l=addslashes($_POST['aprove']); 

$simpan= mysqli_query($koneksi,"insert into suratkeluar values ('','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l')"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='input-surat-keluar-sekretaris.php'; //scrip blayune bar di proses
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
				

?>
