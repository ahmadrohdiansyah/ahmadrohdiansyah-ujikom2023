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
        <title>Pengaduan Masyarakat</title>
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
                    <a href="index.php">Kembali</a>
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
             <div><h1>Layanan Aspirasi dan Pengaduan Online Rakyat</h1></div>
				
             <tr>
<td><h4 class="black-text hide-on-med-and-down">Hasil pengaduan</h4></td>
</tr>
<td>
			
			
<table border="3" class="responsive-table striped highlight">
				<tr>
					<td>No</td>
					<td>NIK</td>
					<td>Nama</td>
					<td>Tanggal Masuk</td>
					<td>Status</td>
					<td>Opsi</td>
				</tr>
                
				<?php 
					$no=1;
					$pengaduan = mysqli_query($koneksi,"SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='".$_SESSION['data']['nik']."' ORDER BY pengaduan.id_pengaduan DESC");
					while ($r=mysqli_fetch_assoc($pengaduan)) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $r['nik']; ?></td>
						<td><?php echo $r['nama']; ?></td>
						<td><?php echo $r['tgl_pengaduan']; ?></td>
						<td><?php echo $r['status']; ?></td>
						<td>
							<a class="btn blue modal-trigger" href="#tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">More</a> 
							<a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="in.php?p=pengaduan_hapus&id_pengaduan=<?php echo $r['id_pengaduan'] ?>">Hapus</a></td>
                        
<!-- ditanggapi -->
        <div id="tanggapan&id_pengaduan=<?php echo $r['id_pengaduan'] ?>" class="modal">
          <div class="modal-content">
            <h4 class="grey-text">Detail</h4>
            <div class="col s12">
				<p>NIK : <?php echo $r['nik']; ?></p>
            	<p>Dari : <?php echo $r['nama']; ?></p>
            	<p>Petugas : <?php echo $r['nama_petugas']; ?></p>
				<p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
				<p>Tanggal Ditanggapi : <?php echo $r['tgl_tanggapan']; ?></p>
				<?php 
					if($r['foto']=="kosong"){ ?>
						<img src="../img/noImage.png" width="100">
				<?php	}else{ ?>
					<img width="100" src="../img/<?php echo $r['foto']; ?>">
				<?php }
				 ?>
				<br><b>Pesan</b>
				<p><?php echo $r['isi_laporan']; ?></p>
				<br><b>Respon</b>
				<p><?php echo $r['tanggapan']; ?></p>
            </div>

          </div>
          <div class="modal-footer col s12">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
          </div>
        </div>
<!-- ditanggapi -->

					</tr>
				<?php	}
				 ?>
                 
            </aside>
        </div>
        <!-- <footer>
            
        </footer> -->
        </div>
        
    </body>
</html>

