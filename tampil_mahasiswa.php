<?php
// Memanggil file Mahasiswa.php
require_once 'Mahasiswa.php';

// Membuat instance dari kelas Mahasiswa
$mahasiswa = new Mahasiswa();

// Mengambil data mahasiswa
$dataMahasiswa = $mahasiswa->tampilData();
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
       <!-- Menambahkan link Beranda di navigasi yang mengarah ke halaman index.php -->
      <li><a href="beranda_data.php">Overview</a></li>
       <!-- Menambahkan link ke halaman Data Mahasiswa -->
      <li class="active"><a href="tampil_mahasiswa.php"> Mahasiswa</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        Nilai Perbaikan <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="perbaikan_mtk.php">Matematika</a></li>
          <li><a href="perbaikan_pweb.php">Pemrograman Web</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  
  
  
<div class="container mt-3">
  <h2>Daftar Mahasiswa </h2>   <!-- Judul halaman -->
  <p>Daftar Mahasiswa D3 Teknik Informatika</p>            
  <div class="card-body">
               <!-- Membuat tabel Bootstrap dengan kelas 'table-bordered' -->
              <table class="table table-bordered" id="tableMahasiswae">
                <thead>
                  <tr>
                    <!-- Bagian header tabel yang mendefinisikan judul kolom -->
                  <th scope="col">NO</th>  <!-- Kolom untuk menampilkan nomor urut -->
                    <th scope="col">ID MAHASISWA</th> <!-- Kolom untuk menampilkan ID mahasiswa -->
                    <th scope="col">NIM</th> <!-- Kolom untuk menampilkan NIM mahasiswa -->
                    <th scope="col">NAMA MAHASISWA</th> <!-- Kolom untuk menampilkan nama mahasiswa -->
                    <th scope="col">ALAMAT</th> <!-- Kolom untuk menampilkan alamat mahasiswa -->
                    <th scope="col">EMAIL</th> <!-- Kolom untuk menampilkan email mahasiswa -->
                    <th scope="col">NO TELEPON</th> <!-- Kolom untuk menampilkan nomor telepon mahasiswa -->
                  </tr>
                </thead>
                <tbody>
                 <!-- Mengecek apakah data mahasiswa ada -->
            <?php if (!empty($dataMahasiswa)): ?>
                   <!-- Inisialisasi nomor urut, dimulai dari 1 untuk setiap mahasiswa -->
                   <?php $no = 1; ?> 
                  <!-- Memulai perulangan untuk menampilkan data mahasiswa satu per satu -->
                  <?php foreach ($dataMahasiswa as $mhs): ?>
                  <!-- Menampilkan data mahasiswa dalam satu baris tabel -->
                  <tr>
                      <td><?php echo $no++ ?></td> <!-- Menampilkan nomor urut -->
                      <td><?php echo $mhs['mahasiswa_id'] ?></td> <!-- Menampilkan ID mahasiswa -->
                      <td><?php echo $mhs['nim'] ?></td> <!-- Menampilkan NIM mahasiswa -->
                      <td><?php echo $mhs['nama_mhs'] ?></td> <!-- Menampilkan Nama mahasiswa -->
                      <td><?php echo $mhs['alamat'] ?></td> <!-- Menampilkan Alamat mahasiswa -->
                      <td><?php echo $mhs['email'] ?></td> <!-- Menampilkan Email mahasiswa -->
                      <td><?php echo $mhs['no_telp'] ?></td> <!-- Menampilkan No telp mahasiswa -->
                  </tr>
            <?php endforeach; ?>
        <!-- Jika data mahasiswa kosong, tampilkan pesan bahwa data mahasiswa tidak ada -->
        <?php else: ?>
            <tr>
              <!-- Menampilkan pesan ketika data kosong -->
                <td colspan="7">Tidak ada data mahasiswa.</td>
            </tr>
        <?php endif; ?> <!-- Penutup pengecekan data -->
    </table>

</body>
</html>
