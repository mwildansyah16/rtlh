<?php 

$host='localhost'; // nama
$user='root';
$pass='c9au8naa';
$dbname='rtlh'; //nama database
$koneksi=mysqli_connect($host,$user,$pass,$dbname);

if(mysqli_connect_errno()){
	echo "koneksi terjadi masalah: ".mysqli_connect_errno();
	}
?>