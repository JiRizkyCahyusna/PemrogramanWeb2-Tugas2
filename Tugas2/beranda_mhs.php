<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Judul halaman yang ditampilkan di tab browser -->
  <title>Selamat Datang di Sistem Informasi Akademik</title>
  <meta charset="utf-8"> <!-- Mengatur karakter dan responsivitas halaman -->
  <!-- Memuat Bootstrap CSS dan JavaScript -->
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
      <a class="navbar-brand" href="beranda.php">Beranda</a>
    </div>
    <!-- Menu navigasi utama -->
    <ul class="nav navbar-nav"> 
        <!-- Dropdown menu untuk nilai perbaikan -->
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        Nilai Perbaikan <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk Mahasiswa -->
          <li><a href="perbaikan_mtk.php?role=mahasiswa">Matematika</a></li>
          <li><a href="perbaikan_pweb.php?role=mahasiswa">Pemrograman Web</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
  

<!-- Konten Utama -->
<div class="container center-content">
  <div>
    <!-- Teks utama di halaman beranda mahasiswa yang berada di tengah dengan ukuran besar -->
    <h2>Selamat Datang, Mahasiswa!</h2>
    
    <!-- Subjudul atau teks tambahan untuk memberikan informasi kepada mahasiswa -->
    <p>Anda dapat melihat data nilai perbaikan Anda di sini.</p>
  </div>
</div>
</div>
</body>
</html>
