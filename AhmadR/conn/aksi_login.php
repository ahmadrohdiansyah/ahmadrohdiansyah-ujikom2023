<?php
session_start();

include 'koneksi.php';

$username   = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * from masyarakat where username='$username' and password='$password'");

$cek = mysqli_num_rows($data);
$data = mysqli_fetch_assoc($data);

$sql2 = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
$cek2 = mysqli_num_rows($sql2);
$data2 = mysqli_fetch_assoc($sql2);

if ($cek > 0) {
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../masyarakat/index.php");
}
elseif($cek2>0){
	if($data2['level']=="admin"){
		session_start();
		$_SESSION['username']=$username;
			$_SESSION['data']=$data2;
		header('location:../admin/index.php');
}
elseif($data2['level']=="petugas"){
				session_start();
				$_SESSION['username']=$username;
				$_SESSION['data']=$data2;
				header('location:../petugas/index.php');
			}
		}
else{
	header("location:login.php?pesan=gagal");
}
?>