<?php 
include '../koneksi.php';

$akm=$_POST['idpenyewaan'];
$bkm=addslashes($_POST['jthtmpair']); 
$cek1=mysqli_query($koneksi,"select * from air where idpenyewaan='$akm' and jthtmpair='$bkm' and fotoair!=''");
if(mysqli_num_rows($cek1)>0) {
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>document.location.href='tabel-air.php';</script>";
}else {


if (!empty($_FILES["file"]["tmp_name"]))
	{	$error = $_FILES['file']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['file']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 100000000){
            $nama_file = $_FILES['file']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") or ($format == "pdf") ){
                $file_asal = $_FILES['file']['tmp_name'];
                $file_tujuan = "../fotoair/".$_FILES['file']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if(file_exists($file_tujuan)){
                    $time = time();
                    $acak = rand(10000, 99999);; // Menghasilkan angka acak antara 10000 - 99999
                    $file_tujuan = "../fotoair/".$time."-".$acak."-".$_FILES['file']['name']; // Merubah nama file
                }
                 $foto=$file_tujuan;
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil

$aa=$_POST['idpenyewaan']; 
$a=$_POST['idair']; 
$b=addslashes($_POST['jthtmpair']); 
$c=addslashes($_POST['volume']); 
$d=addslashes($_POST['byrair']);  
$e=$d*(-1);

$jatuhtempo1=date('Y-m-d', strtotime('+5 day', strtotime($b)));
$jatuhtempo2=date('Y-m-d', strtotime('last day of this month', strtotime($jatuhtempo1)));

$simpan1=mysqli_query($koneksi,"update air set volume='$c',byrair='$e',fotoair='$foto' where idair='$a'"); // query insert
$simpan2= mysqli_query($koneksi,"insert into air values ('','$aa','$jatuhtempo2','','','','Belum bayar','')"); // query insert
?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='tabel-air.php'; //scrip blayune bar di proses
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
	    ?>
	<script language="JavaScript">
	alert('File Belum Dipilih'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   }
				
}
?>