<?php 
	session_start();
	error_reporting(0);
	include '../conn/koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:../index.php');
	}
	elseif($_SESSION['level'] != "masyarakat"){
		header('location:../index.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../img/icon.jpg">
</head>
<body>

		<tr>
			<td>
				<h4 class="orange-text hide-on-med-and-down">Tulis Laporan</h4>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px;">
				<form method="POST" enctype="multipart/form-data">
					<textarea class="materialize-textarea" name="laporan" placeholder="Tulis Laporan"></textarea><br><br>
					<label>Gambar</label>
					<input type="file" name="foto"><br><br>
					<input type="submit" name="kirim" value="Kirim" class="btn">
				</form>
			</td>
		</tr>
	
<?php 
	session_start();
	// koneksi ke database dilakukan di sini, atau di file terpisah yang di-include ke halaman ini

	// cek apakah tombol kirim sudah di klik
	if(isset($_POST['kirim'])){
		$nik = $_SESSION['data']['nik'];
		$tgl = date('Y-m-d');
		$foto = $_FILES['foto']['name'];
		$source = $_FILES['foto']['tmp_name'];
		$folder = './../img/';
		$listeks = array('jpg','png','jpeg');
		$pecah = explode('.', $foto);
		$eks = $pecah['1'];
		$size = $_FILES['foto']['size'];
		$nama = date('dmYis').$foto;

		if($foto !=""){
			if(in_array($eks, $listeks)){
				if($size<=10000000){ //kode untuk mengatur batas size image//
					move_uploaded_file($source, $folder.$nama);
					$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses')");

					if($query){
						echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
						echo "<script>location='index.php';</script>";
					}
				}
				else{
					echo "<script>alert('Ukuran Gambar Tidak Lebih Dari 10mb')</script>";
				}
			}
			else{
				echo "<script>alert('Format File Tidak Didukung')</script>";
			}
		}
		else{
			$query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses')");
			if($query){
				echo "<script>alert('Pengaduan Akan Segera Ditanggapi')</script>";
				echo "<script>location='index.php';</script>";
			}
		}
	}
?>
</body>
</html> 