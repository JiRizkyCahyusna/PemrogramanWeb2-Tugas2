<!DOCTYPE html>
<html lang="en">
<head>
  <title>Selamat Datang di Sistem Informasi Akademik</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Memposisikan konten ke tengah layar */
    .center-content {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
      text-align: center;
    }
    h1 {
      font-size: 50px; /* Ukuran font yang besar */
    }
  </style>
</head>
<body>

<!-- Membuat navigasi bar menggunakan Bootstrap -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Beranda</a>
    </div>
    <ul class="nav navbar-nav">
       <!-- Menambahkan link Beranda di navigasi yang mengarah ke halaman index.php -->
      <li><a href="beranda_data.php">Overview</a></li>
       <!-- Menambahkan link ke halaman Data Mahasiswa -->
      <li><a href="tampil_mahasiswa.php"> Mahasiswa</a></li>
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
  

<!-- Konten Utama -->
<div class="container center-content">
  <div>
    <h1>Selamat Datang di Sistem Informasi Akademik</h1> <!-- Teks di tengah dengan font besar -->
    <p>Akses data mahasiswa dan nilai perbaikan dengan mudah.</p>
  </div>
</div>

</body>
</html>
