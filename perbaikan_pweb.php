<?php
// Memanggil file Nilai_perbaikan.php
require_once 'Nilai_perbaikan.php';
// Memanggil file Matkul.php
require_once 'Matkul.php';

// Membuat objek baru dari kelas Matkul
$nilai_perbaikan = new Matkul();
// Mengambil data nilai perbaikan untuk mata kuliah "Pemrograman Web"
$dataNilai_perbaikan = $nilai_perbaikan->tampilData('Pemrograman Web');
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="beranda.php">Beranda</a>
    </div>
    <ul class="nav navbar-nav">
    <?php if ($_GET['role'] == "admin") {?>
      
      <li><a href="beranda_data.php?role=admin">Overview</a></li>
      <!-- Menambahkan link ke halaman Data Mahasiswa -->
     <li><a href="tampil_mahasiswa.php?role=admin"> Mahasiswa</a></li>
     <li class="dropdown active">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
       Nilai Perbaikan <span class="caret"></span>
       </a>
       <ul class="dropdown-menu">
         <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
         <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
       </ul>
       <?php } elseif ($_GET['role'] == "mahasiswa") {?>
         <li class="dropdown active">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
       Nilai Perbaikan <span class="caret"></span>
       </a>
       <ul class="dropdown-menu">
         <li><a href="perbaikan_mtk.php?role=mahasiswa">Matematika</a></li>
         <li><a href="perbaikan_pweb.php?role=mahasiswa">Pemrograman Web</a></li>
       </ul>
     </li>
     <?php } ?>
    </ul>
  </div>
</nav>
  
  
<div class="container mt-3">
<h2>Daftar Nilai Perbaikan Mahasiswa</h2>
<p>Daftar Nilai Perbaikan Matakuliah Pemrograman Web</p>           
  <div class="card-body">
      <!-- Membuat tabel Bootstrap dengan kelas 'table-bordered' -->
      <table class="table table-bordered" id="tableNilaiPerbaikan">
        <thead>
          <tr>
            <!-- Bagian header tabel yang mendefinisikan judul kolom -->
            <th scope="col">NO</th> <!-- Kolom untuk menampilkan nomor urut -->
            <th scope="col">ID PERBAIKAN</th> <!-- Kolom untuk menampilkan ID Perbaikan  -->
            <th scope="col">TANGGAL PERBAIKAN</th> <!-- Kolom untuk menampilkan Tanggal Perbaikan nilai -->
            <th scope="col">KETERANGAN</th> <!-- Kolom untuk menampilkan keterangan mengenai perbaikan nilai yang dilakukan -->
            <th scope="col">ID MAHASISWA</th> <!-- Kolom untuk menampilkan ID mahasiswa -->
            <th scope="col"> MATKUL</th> <!-- Kolom untuk menampilkan Nama Matkul -->
            <th scope="col">ID SEMESTER</th> <!-- Kolom untuk menampilkan ID Semester -->
            <th scope="col">ID NILAI</th> <!-- Kolom untuk menampilkan ID Nilai -->
            <th scope="col">ID DOSEN</th><!-- Kolom untuk menampilkan ID Dosen-->
          </tr>
        </thead>
        <tbody>
          <!-- Mengecek apakah data nilai perbaikan ada -->
          <?php if (!empty($dataNilai_perbaikan)): ?>
            <?php $no = 1; ?> <!-- Inisialisasi nomor urut, dimulai dari 1 untuk setiap mahasiswa -->
             <!-- Memulai perulangan untuk menampilkan data mahasiswa satu per satu -->
            <?php foreach ($dataNilai_perbaikan as $nilai): ?>
              <tr>
                <td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
                <td><?php echo $nilai['perbaikan_id'] ?></td> <!-- Menampilkan id perbaikan nilai -->
                <td><?php echo $nilai['tgl_perbaikan'] ?></td> <!-- Menampilkan Tanggal perbaikan nilai dilakukan -->
                <td><?php echo $nilai['keterangan'] ?></td> <!-- Menampilkan keterangan mengenai perbaikan nilai -->
                <td><?php echo $nilai['mahasiswa_id'] ?></td> <!-- Menampilkan ID Mahasiswa -->
                <td><?php echo $nilai['matkul'] ?></td> <!-- Menampilkan nama matakuliah -->
                <td><?php echo $nilai['semester_id'] ?></td> <!-- Menampilkan ID Semester -->
                <td><?php echo $nilai['nilai_id'] ?></td> <!-- Menampilkan ID Nilai-->
                <td><?php echo $nilai['dosen_id'] ?></td> <!-- Menampilkan ID Dosen -->
              </tr>
            <?php endforeach; ?>
          <!-- Jika data mahasiswa kosong, tampilkan pesan bahwa data mahasiswa tidak ada -->
          <?php else: ?>
            <tr>
              <!-- Menampilkan pesan ketika data kosong -->
              <td colspan="9">Tidak ada data perbaikan nilai.</td>
            </tr>
          <?php endif; ?> <!-- Penutup pengecekan data -->
        </tbody>
      </table>
      </div>
    </div>
</div>
</body>
</html>
