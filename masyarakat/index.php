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
        <title>Asu</title>
        <link rel="stylesheet" href="../css/container.css">
    </head>
    <body>
        <div class="fConteiner">
            <nav class="wrapper">
                <div class="brand">
                    <div class="fristname">Pengaduan</div>
                    <div class="lastname">Masyarakat</div>
                </div>
                <ul class="navigation">
                    <li><a href="../index.php?p=logout">Log out</a></li>
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
             <h3>Sampaikan Pengaduan Anda langsung kepada <br>instansi pemerintah berwenang</h3>
             <a href="#name"><span class="white-text name"><?php echo ucwords($_SESSION['data']['nama']); ?></span></a>
             <br>
             <br>
            <a href="pengaduan.php" class="fcc-btn">Buat Pengaduan</a>
            <a href="in.php" class="fcc-btn">Data Pengaduan</a>
            </aside>
        </div>
        <!-- <footer>
            
        </footer> -->
        </div>
    </body>
</html>
