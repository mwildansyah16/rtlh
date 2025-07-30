<?php
session_start(); //Membuat atau memakai variabel SESSION.
//Variabel SESSION adalah Variabel yang bisa dipanggil oleh file apapun

include 'koneksi.php';


if ((isset($_POST['username']))&&(isset($_POST['password']))){
	//jika ada variabel POST umumname & password
	$username=mysqli_real_escape_string($koneksi,$_POST['username']);
	$password=md5($_POST['password']);
	
	//cek ke tabel
	$cek1=mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
	

		if(mysqli_num_rows($cek1)>0) { //cek apakah umumname dan password ada di tabel umum
			echo "<script>alert('Silahkan aktifkan GPS di HP anda sebelum mengisi form usulan RTLH!')</script>";
			$data1=mysqli_fetch_array($cek1);
			$_SESSION['iduser']=$data1['iduser'];
			$_SESSION['level']=$data1['level'];
			
			//cek ke level
			if($_SESSION['level']=='bozz'){
			header("Location:bozz/bozz.php");
			}else{
				$_SESSION['iduser']=$data1['username'];
				$_SESSION['level']=$data1['level'];
			echo "<script>window.location='admin/admin.php'</script>";
			}
			
				}
				else{
					echo "<script>alert('Username atau Password Yang Anda Masukkan Salah!!')</script>";
					echo "<script>window.location='index.php'</script>";
					}
					


	
}	
?>
