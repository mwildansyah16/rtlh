<?php 
include '../koneksi.php';
$idx=$_POST['idpenerima']; 

if (!empty($_FILES["file1"]["tmp_name"]))
	{	$error = $_FILES['file1']['error']; // Menyimpan jumlah error ke variabel $error
 
    // Validasi error
    if($error == 0){
        $ukuran_file = $_FILES['file1']['size']; // Menyimpan ukuran file ke variabel $ukuran_file
 
        // Validasi ukuran file
        if($ukuran_file <= 10000000){
            $nama_file = $_FILES['file1']['name']; // Menyimpan nama file ke variabel $nama_file
            $format = pathinfo($nama_file, PATHINFO_EXTENSION); // Mendapatkan format file
 
            // Validasi format
            if( ($format == "jpg") or ($format == "png") or ($format == "jpeg") ){
                $file_asal = $_FILES['file1']['tmp_name'];
                $file_tujuan = "../foto/".$_FILES['file1']['name'];
 
                // Validasi nama file (ubah nama file jika ada nama file yang sama)
                if(file_exists($file_tujuan)){
                    $time = time();
                    $acak = rand(10000, 99999);; // Menghasilkan angka acak antara 10000 - 99999
					$h=strtoupper(addslashes($_POST['kecamatan']));
					$i=strtoupper(addslashes($_POST['desa']));
					$ii=strtoupper(addslashes($_POST['alamatlengkap']));
                    $file_tujuan = "../foto/".$h."-".$i."-".$ii."-".$time1."-".$acak1."-".$_FILES['file1']['name']; // Merubah nama file
                }
                 $foto1=$file_tujuan;
                $upload = move_uploaded_file($file_asal, $file_tujuan); // Proses upload. Menghasilkan nilai true jika upload berhasil


$simpan= mysqli_query($koneksi,"update penerima set fotosamping='$foto1' where idpenerima='$idx'"); 
	?>
	<script language="JavaScript">
	alert('Data berhasil disimpan'); //scrip peringatan
	document.location='edit-usulan.php?idpenerima=<?php echo $idx;?>'; //scrip blayune bar di proses
	</script>
	<?php
}else{ // else validasi format
                  ?>
	<script language="JavaScript">
	alert('Format gambar harus jpg atau png.'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
         <?php
	        
	   }
 
        }else{ // else validasi ukuran file
            ?>
	<script language="JavaScript">
	alert('Ukuran file gambar tidak boleh lebih dari 1000000 (1MB)'); //scrip peringatan
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
	alert('Foto belum dipilih'); //scrip peringatan
	document.location.href="javascript:history.go(-1)";//scrip blayune bar di proses
	</script>
	<?php
   }
				

?>
