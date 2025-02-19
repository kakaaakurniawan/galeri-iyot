<?php
	$host="localhost";
	$user="root";
	$password="";
	$db="galeri_foto_kaka3";
	$koneksi = mysqli_connect($host,$user,$password,$db);
	if (!$koneksi)
	{
			die("koneksi gagal:".mysqli_connect_error());
	}
?>