<?php
// Memanggil file Matkul
require_once 'matkul.php';

// Membuat objek baru dari kelas Matkul
$Matematika = new Matematika();
// Mengambil data nilai perbaikan untuk mata kuliah "Matematika"
$dataMatematika = $Matematika->tampilData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title> <!-- Judul dan pengaturan dasar halaman -->
  <meta charset="utf-8">
  <!-- Memuat Bootstrap CSS dan JavaScript -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Membuat navigasi bar menggunakan Bootstrap -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="beranda.php">Beranda</a>
    </div>
    <!-- Menu navigasi utama -->
    <ul class="nav navbar-nav">
      <!-- Memeriksa role (admin atau mahasiswa) melalui parameter URL -->
<?php if (isset($_GET['role']) && $_GET['role'] == "admin") { ?>
  <!-- Jika role adalah admin, tampilkan menu khusus untuk admin -->
  <li><a href="beranda_data.php?role=admin">Overview</a></li> <!-- Link ke halaman overview -->
  <li><a href="tampil_mahasiswa.php?role=admin">Mahasiswa</a></li> <!-- Link ke halaman daftar mahasiswa -->
  <!-- Dropdown menu untuk nilai perbaikan -->
  <li class="dropdown active">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
      Nilai Perbaikan <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk admin -->
      <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
      <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
    </ul>
  </li>
<?php } elseif (isset($_GET['role']) && $_GET['role'] == "mahasiswa") { ?>
  <!-- Jika role adalah mahasiswa, tampilkan menu khusus untuk mahasiswa -->
  <li class="dropdown active">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
      Nilai Perbaikan <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk mahasiswa -->
      <li><a href="perbaikan_mtk.php?role=mahasiswa">Matematika</a></li>
      <li><a href="perbaikan_pweb.php?role=mahasiswa">Pemrograman Web</a></li>
    </ul>
  </li>
<?php } ?>
    </ul>
  </div>
</nav>
  
  
<div class="container mt-3">
  <!-- Judul halaman untuk daftar nilai perbaikan mahasiswa -->
  <h2>Daftar Nilai Perbaikan Mahasiswa</h2>
  <!-- Deskripsi singkat tentang daftar perbaikan untuk matkul Matematika -->
  <p>Daftar Nilai Perbaikan Matakuliah Matematika</p>           
  <!-- Bagian untuk menampilkan tabel nilai perbaikan -->
  <div class="card-body">
    <!-- Tabel dengan garis pembatas menggunakan Bootstrap -->
    <table class="table table-bordered" id="tableNilaiPerbaikan">
      <!-- Header tabel -->
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
          <?php if (!empty($dataMatematika)): ?>
            <?php $no = 1; ?> <!-- Inisialisasi nomor urut, dimulai dari 1 untuk setiap mahasiswa -->
             <!-- Memulai perulangan untuk menampilkan data mahasiswa satu per satu -->
            <?php foreach ($dataMatematika as $nilai): ?>
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
