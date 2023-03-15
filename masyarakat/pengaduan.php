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
        <meta charset="utf-8">
        <title>Pengaduan</title>
        <link rel="stylesheet" href="../css/container.css">
    </head>
    <body>
        <div class="fConteiner">
            <nav class="wrapper">
                <div class="brand">
                    <a href="index.php" class="fristname">Pengaduan</a>
                    <a href="index.php" class="lastname">Masyarakat</a>
                </div>
                <ul class="navigation">
				<li><a href="index.php">Kembali</a></li>
                    <li><a href="../index.php?p=logout" class="active">Log out</a></li>
                </ul>
            </nav>
        </div>
        <div >
            <main>
            <div class="slide">
                <div class="kanan">
                    <span id="slide-1"></span>
                    <span id="slide-2"></span>
                    <span id="slide-3"></span>
                <div class="image">
                    <img src="https://web.kominfo.go.id/sites/default/files/layanan%20aduan.jpg">
                    <img src="https://www.kemenpppa.go.id/lib/uploads/feature_image/0fe01-perkawinan-anak.jpg">
                    <img src="https://solusiprinting.com/wp-content/uploads/2019/11/Gambar-Iklan-Layanan-Masyarakat-1200px-x-675px-1024x576.jpg">
                </div>
            </div>
                <!-- navigasi -->
                <div class="geser">
                    <a href="#slide-1">1</a>
                    <a href="#slide-2">2</a>
                    <a href="#slide-3">3</a>

                </div>
            </div>
             </main>
             <aside>
             <div><h1>Layanan Aspirasi dan Pengaduan Online Rakyat</h1><br></div>
				
		<tr>
			<td style="padding: px;">
				<form method="POST" enctype="multipart/form-data">
				<div class="area">
					<h2>Tulis Pengaduan</h2><br>
					<textarea class="" name="laporan" placeholder="Tulis Pengaduan....." required></textarea><br></div>
					<label>Gambar</label>
					<input type="file" name="foto"><br><br>
					<input type="submit" name="kirim" value="Kirim" class="fcc-btn">
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
            </aside>
        </div>
        <!-- <footer>
            
        </footer> -->
        </div>
    </body>
</html>
