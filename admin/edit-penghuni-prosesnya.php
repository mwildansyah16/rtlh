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
                $file_tujuan = "../fotopenghuni/".$_FILES['file']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if(file_exists($file_tujuan)){
                    $time = time();
                    $acak = rand(10000, 99999);; // Menghasilkan angka acak antara 10000 - 99999
                    $file_tujuan = "../fotopenghuni/".$time."-".$acak."-".$_FILES['file']['name']; // Merubah nama file
                }
                 $e=$file_tujuan;
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil

$a=addslashes($_POST['idpenghuni']); 
$ab=addslashes($_POST['nokk']); 
$b=addslashes($_POST['nama']); 
$c=addslashes($_POST['alamat']); 
$d=addslashes($_POST['jenkel']); 
$f=addslashes($_POST['jmlpenghuni']); 
$g=addslashes($_POST['nohp']); 
$h=addslashes($_POST['nohpsaudara']); 

$simpan=mysqli_query($koneksi,"update penghuni set nokk='$ab', nama='$b' ,alamat='$c',jenkel='$d',foto='$e',jmlpenghuni='$f',
nohp='$g',nohpsaudara='$h' where idpenghuni='$a'"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-penghuni.php'; //scrip blayune bar di proses
	</script>
	<?php
}else{ // else validasi format
                  ?>
	<script language="JavaScript">
	alert('Format file harus jpg atau png'); //scrip peringatan
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
$a=addslashes($_POST['idpenghuni']); 
$ab=addslashes($_POST['nokk']); 
$b=addslashes($_POST['nama']); 
$c=addslashes($_POST['alamat']); 
$d=addslashes($_POST['jenkel']); 
$f=addslashes($_POST['jmlpenghuni']); 
$g=addslashes($_POST['nohp']); 
$h=addslashes($_POST['nohpsaudara']); 

$simpan=mysqli_query($koneksi,"update penghuni set nokk='$ab', nama='$b' ,alamat='$c',jenkel='$d',jmlpenghuni='$f',
nohp='$g',nohpsaudara='$h' where idpenghuni='$a'"); // query insert
	?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-penghuni.php'; //scrip blayune bar di proses
	</script>
	<?php
   }
				

?>
