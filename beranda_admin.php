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
    /* Memposisikan konten di tengah layar secara vertikal dan horizontal */
    .center-content {
      display: flex;
      justify-content: center; /* Mengatur posisi horizontal */
      align-items: center; /* Mengatur posisi vertikal */
      height: 80vh; /* Mengatur tinggi konten agar menyesuaikan dengan viewport */
      text-align: center; /* Menengahkan teks */
    }
    
    /* Mengatur ukuran font untuk judul */
    h1 {
      font-size: 50px; /* Membuat teks besar untuk efek visual yang lebih baik */
    }
  </style>
</head>
<body>

<!-- Membuat navigasi bar menggunakan Bootstrap -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <!-- Bagian header untuk brand atau link beranda -->
    <div class="navbar-header">
      <a class="navbar-brand" href="beranda.php">Beranda</a> <!-- Link ke halaman beranda -->
    </div>

    <!-- Menu navigasi utama -->
    <ul class="nav navbar-nav">
      <!-- Memeriksa role (admin atau mahasiswa) melalui parameter URL -->
      <?php if ($_GET['role'] == "admin") { ?>
        <!-- Jika role adalah admin, tampilkan menu khusus untuk admin -->
        <li><a href="beranda_data.php?role=admin">Overview</a></li> <!-- Link ke halaman overview -->
        <li><a href="tampil_mahasiswa.php?role=admin">Mahasiswa</a></li> <!-- Link ke halaman daftar mahasiswa -->
        
        <!-- Dropdown menu untuk nilai perbaikan -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            Nilai Perbaikan <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk admin -->
            <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
            <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
          </ul>
        </li>
      <?php } elseif ($_GET['role'] == "mahasiswa") { ?>
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

<!-- Konten utama halaman -->
<div class="container center-content">
  <div>
    <!-- Teks utama di halaman beranda admin yang berada di tengah dengan ukuran besar -->
    <h2>Selamat Datang, Admin!</h2>
    
    <!-- Subjudul atau teks tambahan untuk memberikan informasi kepada admin -->
    <p>Kelola data mahasiswa dan nilai perbaikan dengan efisien.</p>
  </div>
</div>

</body>
</html>