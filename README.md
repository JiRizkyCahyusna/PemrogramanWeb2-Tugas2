# Tugas2 PWEB 2

### Case Study Tabel 
- mahasiswa & nilai_perbaikan
### Task
1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study 


### Penyelesaian:
### 1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
#### Langkah 1 
- Membuat Database yaitu persuratan, setelah membuat database lalu membuat tabel Mahasiswa:
![alt text](/img/tabel_mahasiswa.png)
dan tabel Nilai_perbaikan:
![alt text](/img/tabel_nilai_perbaikan.png)

- Membuat Kelas Koneksi Database<br>
Berikut adalah coding secara keseluruhan yang dibuat:
```php
<?php
// Membuat kelas Database
class Database {
    // Mendefinisikan properti yang berisi informasi koneksi ke database
    private $host = "localhost";  // Nama host untuk koneksi database 
    private $username = "root";   // Nama pengguna database 
    private $password = "";       // Kata sandi untuk pengguna database 
    private $database = "persuratan"; // Nama database yang akan digunakan
    protected $koneksi;           // Properti yang akan menyimpan objek koneksi ke database

    // Konstruktor kelas yang otomatis dijalankan saat objek dibuat
    public function __construct() {
        // Membuat koneksi menggunakan mysqli dengan informasi yang telah didefinisikan di properti
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Mengecek apakah koneksi gagal, jika iya akan menampilkan pesan error
        if ($this->koneksi->connect_error) {
            // Jika gagal koneksi, program akan berhenti dan menampilkan pesan error
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    // Metode untuk menjalankan query SQL
    public function query($sql) {
        // Menjalankan query SQL yang diterima sebagai parameter dan mengembalikan hasil query
        return $this->koneksi->query($sql);
    }
    
    // Metode kosong tampilData yang dapat digunakan untuk menampilkan data di kelas turunan atau diperluas
    function tampilData(){
        // Kosong: bisa diimplementasikan sesuai kebutuhan untuk menampilkan data
    }
}
?>
```
### Penjelasan: 
1. Mendefinisikan Kelas Database:
Kelas Database dibuat untuk mengelola koneksi dan operasi terhadap database MySQL.
    - Properti: Ada beberapa properti yang disiapkan untuk menyimpan informasi koneksi ke database. <br>
`$host`: Menyimpan nama host, dalam contoh ini diatur ke "localhost".<br>
`$username`: Menyimpan nama pengguna untuk koneksi database, yaitu "root".<br>
`$password`: Menyimpan kata sandi untuk pengguna database, diatur kosong karena tidak ada password pada database lokal.<br>
`$database`: Menyimpan nama database yang akan digunakan, yaitu "persuratan".<br>
Protected Property `$koneksi`: Properti ini digunakan untuk menyimpan objek koneksi yang dibuat menggunakan mysqli.
2. Konstruktor: __construct():  Metode ini dijalankan secara otomatis ketika objek dari kelas Database dibuat. Di sini, objek mysqli diinisialisasi dengan informasi koneksi yang didefinisikan sebelumnya.
3. Metode query($sql): untuk menjalankan query SQL yang diberikan sebagai parameter.
4.  Metode tampilData(): sebagai template kosong yang bisa diperluas pada kelas turunan untuk menampilkan data dari database.
<br><br>
- Membuat view beranda untuk tampilan awal <br>
Berikut adalah coding secara keseluruhan yang dibuat:
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Judul halaman yang ditampilkan di tab browser -->
  <title>Selamat Datang di Sistem Informasi Akademik</title>
  <meta charset="utf-8">  <!-- Mengatur karakter dan responsivitas halaman -->
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
      <a class="navbar-brand" href="#">Beranda</a>
    </div>
    <!-- Menu navigasi utama -->
    <ul class="nav navbar-nav">
       <!-- Menambahkan link Beranda di navigasi yang mengarah ke halaman index.php -->
      <li><a href="beranda_admin.php?role=admin">Admin</a></li>
       <!-- Menambahkan link ke halaman Data Mahasiswa -->
      <li><a href="beranda_mhs.php?role=mahasiswa"> Mahasiswa</a></li> 
      <!-- <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        Nilai Perbaikan <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="perbaikan_mtk.php">Matematika</a></li>
          <li><a href="perbaikan_pweb.php">Pemrograman Web</a></li>
        </ul> -->
      </li>
    </ul>
  </div>
</nav>
<!-- Konten Utama -->
<div class="container center-content">
  <div>
    <h1>Selamat Datang di Sistem Informasi Akademik</h1> <!-- Teks utama di halaman beranda yang berada di tengah dengan ukuran besar -->
    <p>Akses data mahasiswa dan nilai perbaikan.</p> <!-- Subjudul atau teks tambahan -->
  </div>
</div>

</body>
</html>
```
### Penjelasan :

1. Mendefinisikan Struktur Dasar HTML:
Dimulai dengan `<!DOCTYPE html>` yang menentukan tipe dokumen sebagai HTML5.
2. Membuat Navigasi Bar: Menggunakan Bootstrap  untuk membuat navigasi bar dengan tautan ke halaman admin dan mahasiswa.
3. Konten Utama: Membuat konten tengah dengan judul besar "Selamat Datang di Sistem Informasi Akademik". Menambahkan subjudul deskriptif yang menjelaskan akses ke data mahasiswa dan nilai perbaikan.


### Output yang dihasilkan: 
![alt text](/img/beranda.png)


### 2. Gunakan _construct sebagai link ke database
```php
// Konstruktor kelas yang otomatis dijalankan saat objek dibuat
    public function __construct() {
        // Membuat koneksi menggunakan mysqli dengan informasi yang telah didefinisikan di properti
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Mengecek apakah koneksi gagal, jika iya akan menampilkan pesan error
        if ($this->koneksi->connect_error) {
            // Jika gagal koneksi, program akan berhenti dan menampilkan pesan error
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }
```
- `public function __construct()`: Ini adalah konstruktor kelas yang secara otomatis dipanggil ketika sebuah objek dari kelas ini dibuat. Dalam konteks ini, fungsinya adalah untuk menginisialisasi koneksi ke database.
- `new mysqli($this->host, $this->username, $this->password, $this->database)`: Kode ini membuat objek baru dari kelas mysqli dengan parameter 
- `if ($this->koneksi->connect_error)`: Ini adalah pengecekan untuk melihat apakah koneksi berhasil. Jika ada kesalahan dalam koneksi, maka properti connect_error akan berisi pesan kesalahan.
- `die("Koneksi database gagal: " . $this->koneksi->connect_error)`: Jika koneksi gagal, program akan berhenti (die) dan menampilkan pesan kesalahan yang menyebutkan bahwa koneksi database gagal.

### 3. Terapkan enkapsulasi sesuai logika studi kasus

Berikut adalah coding secara keseluruhan yang dibuat:
```php
<?php
// Membuat kelas Database
class Database {
    // Mendefinisikan properti yang berisi informasi koneksi ke database
    private $host = "localhost";  // Nama host untuk koneksi database 
    private $username = "root";   // Nama pengguna database 
    private $password = "";       // Kata sandi untuk pengguna database 
    private $database = "persuratan"; // Nama database yang akan digunakan
    protected $koneksi;           // Properti yang akan menyimpan objek koneksi ke database

    // Konstruktor kelas yang otomatis dijalankan saat objek dibuat
    public function __construct() {
        // Membuat koneksi menggunakan mysqli dengan informasi yang telah didefinisikan di properti
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Mengecek apakah koneksi gagal, jika iya akan menampilkan pesan error
        if ($this->koneksi->connect_error) {
            // Jika gagal koneksi, program akan berhenti dan menampilkan pesan error
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    // Metode untuk menjalankan query SQL
    public function query($sql) {
        // Menjalankan query SQL yang diterima sebagai parameter dan mengembalikan hasil query
        return $this->koneksi->query($sql);
    }
    
    // Metode kosong tampilData yang dapat digunakan untuk menampilkan data di kelas turunan atau diperluas
    function tampilData(){
        // Kosong: bisa diimplementasikan sesuai kebutuhan untuk menampilkan data
    }
}
?>

```
<b>Penerapan Enkapsulasi dalam Kelas Database : </b>
- Penggunaan Akses Modifikator:<br>
    - `private`: Properti seperti `$host`, `$username`, `$password`, dan `$database` dideklarasikan sebagai private, yang berarti tidak dapat diakses langsung dari luar kelas.
    -  `protected`: Properti `$koneksi` dideklarasikan sebagai protected, yang memungkinkan akses dari kelas turunan tetapi tidak dari luar. Ini memungkinkan kelas yang mewarisi untuk menggunakan koneksi database tanpa membiarkan akses langsung dari luar kelas.
- Konstruktor __construct() bertanggung jawab untuk inisialisasi objek. 
- Metode query($sql): Metode ini memberikan antarmuka untuk menjalankan query SQL tanpa memperlihatkan cara kerja internal dari objek koneksi.
- Metode tampilData(): Meskipun saat ini kosong, metode ini adalah contoh lain dari enkapsulasi

### 4. Membuat kelas turunan menggunakan konsep pewarisan

a. Membuat kelas Database (Induk)
```php
class Database {
    // Mendefinisikan properti yang berisi informasi koneksi ke database
    private $host = "localhost";  // Nama host untuk koneksi database 
    private $username = "root";   // Nama pengguna database 
    private $password = "";       // Kata sandi untuk pengguna database 
    private $database = "persuratan"; // Nama database yang akan digunakan
    protected $koneksi;           // Properti yang akan menyimpan objek koneksi ke database

    // Konstruktor kelas yang otomatis dijalankan saat objek dibuat
    public function __construct() {
        // Membuat koneksi menggunakan mysqli dengan informasi yang telah didefinisikan di properti
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Mengecek apakah koneksi gagal, jika iya akan menampilkan pesan error
        if ($this->koneksi->connect_error) {
            // Jika gagal koneksi, program akan berhenti dan menampilkan pesan error
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }

    // Metode untuk menjalankan query SQL
    public function query($sql) {
        // Menjalankan query SQL yang diterima sebagai parameter dan mengembalikan hasil query
        return $this->koneksi->query($sql);
    }
    
    // Metode kosong tampilData yang dapat digunakan untuk menampilkan data di kelas turunan atau diperluas
    function tampilData(){
        // Kosong: bisa diimplementasikan sesuai kebutuhan untuk menampilkan data
    }
}
```
- Kelas `Database` bertujuan untuk mengelola koneksi ke database, menjalankan query SQL, dan menangani error yang mungkin terjadi. Kelas ini merupakan kelas dasar yang dapat digunakan oleh kelas-kelas lain yang memerlukan akses ke database.
<br> 
<br>

b. Membuat Kelas Mahasiswa yang turunan dari kelas Database
```php
<?php
<?php
// Memanggil file database.php yang berisi koneksi ke database
require_once 'database.php';
// Membuat kelas Mahasiswa yang mewarisi kelas Database
class Mahasiswa extends Database {
   // Construktor untuk inisialisasi koneksi
    public function __construct() {
        parent::__construct(); // Mewarisi koneksi dari kelas Database
    }

    // Fungsi untuk mengambil data mahasiswa dari tabel 'mahasiswa' di database
    public function tampilData() {
        $sql = "SELECT * FROM mahasiswa";  // Query SQL untuk mengambil semua data dari tabel 'mahasiswa'
        $result = $this->koneksi->query($sql); // Menggunakan properti koneksi dari Database
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        // Mengecek apakah hasil query tidak kosong
        if ($result && $result->num_rows > 0) {
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
            while ($row = $result->fetch_assoc()) {
                $hasil[] = $row;  // Menambahkan data ke dalam array hasil
            }
        }
        return $hasil; // Mengembalikan array yang berisi data mahasiswa
    }
}
?>
?>
```
- Kelas `Mahasiswa` berfungsi untuk mengambil dan menampilkan data mahasiswa dari tabel `mahasiswa` dalam database, dengan mewarisi koneksi database dari kelas `Database`. Konstruktor kelas ini memanggil konstruktor kelas dasar untuk memastikan bahwa koneksi ke database sudah terjalin, dan metode tampilData() menjalankan query SQL untuk mendapatkan semua data mahasiswa, kemudian mengembalikan hasilnya dalam bentuk array. Kelas ini memungkinkan akses dan pengelolaan data mahasiswa dengan lebih terstruktur dan efisien.
<br><br>

c.  Membuat Kelas Nilai_Perbaikan yang Turunan dari Kelas Database
```php
<?php
// Memanggil file database.php yang berisi koneksi ke database
require_once 'database.php';
// Membuat kelas Nilai_Perbaikan yang mewarisi kelas Database
class Nilai_Perbaikan extends Database {
   // Construktor untuk inisialisasi koneksi
    public function __construct() {
        parent::__construct(); // Mewarisi koneksi dari kelas Database
    }

    // Fungsi untuk mengambil data nilai_perbaikan dari tabel 'nilai_perbaikan' di database
    public function tampilData() {
        $sql = "SELECT * FROM nilai_perbaikan"; // Query SQL untuk mengambil semua data dari tabel 'nilai_perbaikan'
        $result = $this->koneksi->query($sql); // Menggunakan properti koneksi dari Database
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
            while ($row = $result->fetch_assoc()) { 
                $hasil[] = $row; // Menambahkan data ke dalam array hasil
            }
        }
        return $hasil; // Mengembalikan array yang berisi data Nilai_perbaikan
    } 
}
?>
```
- Kelas `Nilai_Perbaikan` berfungsi untuk mewarisi koneksi dari kelas `Database` dan memiliki konstruktor yang memanggil konstruktor induk untuk inisialisasi koneksi ke database, serta metode tampilData() yang menjalankan query SQL untuk mengambil semua data dari tabel `nilai_perbaikan`, memanfaatkan properti koneksi dari kelas induk; metode ini memeriksa apakah hasil query tidak kosong, mengumpulkan setiap baris data ke dalam array, dan akhirnya mengembalikan array tersebut yang berisi semua data nilai perbaikan dari database.

d. Membuat Kelas Matematika dan Kelas Pweb yang Turunan dari Kelas Nilai_Perbaikan
```php
<?php
// Memastikan file nilai_perbaikan.php sudah di-include
require_once 'nilai_perbaikan.php';
// Membuat kelas Matematika yang mewarisi kelas Nilai_Perbaikan
class Matematika extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan mata kuliah matematika
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah Matematika
        $sql = "SELECT * FROM nilai_perbaikan where matkul = 'Matematika'";
        $result = $this->koneksi->query($sql); // Menjalankan query dan menyimpan hasilnya
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
             while ($row = $result->fetch_assoc()) { 
                 $hasil[] = $row;  // Menambahkan data ke dalam array hasil
             }
         }
        return $hasil; // Mengembalikan array yang berisi Matakuliah Matematika
     }
 
 }
 // Membuat kelas Pweb yang mewarisi kelas Nilai_Perbaikan
 class Pweb extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan mata kuliah PemrogramanWeb
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah Matematika
        $sql = "SELECT * FROM nilai_perbaikan where matkul = 'Pemrograman Web'";
        $result = $this->koneksi->query($sql); // Menjalankan query dan menyimpan hasilnya
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
             while ($row = $result->fetch_assoc()) { 
                 $hasil[] = $row;  // Menambahkan data ke dalam array hasil
             }
         }
        return $hasil; // Mengembalikan array yang berisi Matakuliah Pemrograman Web
     }
 
}
?>
```
- Kelas `Matematika` mewarisi dari kelas `Nilai_Perbaikan` dan memiliki konstruktor yang memanggil konstruktor induk untuk inisialisasi koneksi ke database, sementara metode tampilData() menjalankan query SQL yang dirancang untuk mengambil semua data nilai perbaikan yang terkait dengan mata kuliah Matematika; setelah mengeksekusi query, metode ini memeriksa apakah hasilnya tidak kosong dan, jika ada data, setiap baris hasil diambil dan disimpan dalam array, yang akhirnya dikembalikan sebagai output dari metode tersebut. 
- Kelas `Pweb`, yang juga mewarisi dari kelas `Nilai_Perbaikan`, memiliki konstruktor yang sama untuk inisialisasi koneksi, sementara metode tampilData() berfungsi untuk mengeksekusi query SQL yang mengambil data nilai perbaikan untuk mata kuliah Pemrograman Web, dengan proses serupa untuk mengumpulkan hasil ke dalam array dan mengembalikannya.
<br>


### 5. Terapkan polimorfisme untuk minimal 2 peran sesuai dengan studi kasus
a. pada kelas Matematika dan Pweb yang turunan dari kelas Nilai_Perbaikan
```php
<?php
// Memastikan file nilai_perbaikan.php sudah di-include
require_once 'nilai_perbaikan.php';
// Membuat kelas Matematika yang mewarisi kelas Nilai_Perbaikan
class Matematika extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan mata kuliah matematika
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah Matematika
        $sql = "SELECT * FROM nilai_perbaikan where matkul = 'Matematika'";
        $result = $this->koneksi->query($sql); // Menjalankan query dan menyimpan hasilnya
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
             while ($row = $result->fetch_assoc()) { 
                 $hasil[] = $row;  // Menambahkan data ke dalam array hasil
             }
         }
        return $hasil; // Mengembalikan array yang berisi Matakuliah Matematika
     }
 
 }
 // Membuat kelas Pweb yang mewarisi kelas Nilai_Perbaikan
 class Pweb extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan mata kuliah PemrogramanWeb
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah Matematika
        $sql = "SELECT * FROM nilai_perbaikan where matkul = 'Pemrograman Web'";
        $result = $this->koneksi->query($sql); // Menjalankan query dan menyimpan hasilnya
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
             while ($row = $result->fetch_assoc()) { 
                 $hasil[] = $row;  // Menambahkan data ke dalam array hasil
             }
         }
        return $hasil; // Mengembalikan array yang berisi Matakuliah Pemrograman Web
     }
 
}
?>
```
- Dalam implementasi ini, baik kelas `Matematika` maupun kelas  `Pweb` menggunakan metode tampilData() yang memiliki nama sama tetapi dengan isi yang berbeda. Metode ini digunakan untuk mengambil data nilai perbaikan berdasarkan mata kuliah masing-masing. Polimorfisme sudah diterapkan meskipun metode yang dipanggil `tampilData()` sama, implementasinya berbeda sesuai dengan objek yang dipanggil (apakah itu objek Matematika atau Pweb). Dengan cara ini, dapat menggunakan metode dengan cara yang konsisten di seluruh aplikasi, sementara isi spesifik dari metode tersebut disesuaikan dengan konteks kelas yang bersangkutan. <br><br>

b. Terdapat pada file perbaikan_mtk.php dan perbaikan_pweb.php
```php
// Membuat objek baru dari kelas Matkul
$Matematika = new Matematika();
// Mengambil data nilai perbaikan untuk mata kuliah "Matematika"
$dataMatematika = $Matematika->tampilData();
?> 
```
```php
// Membuat objek baru dari kelas Matkul
$Pweb = new Pweb();
// Mengambil data nilai perbaikan untuk mata kuliah "Pemrograman Web"
$dataPweb = $Pweb->tampilData();
?>
```
- Dalam coding di atas, dapat memanggil metode `tampilData()` pada objek yang berbeda ($matematika dan $pweb), hasil yang diperoleh akan berbeda sesuai dengan implementasi spesifik dari setiap kelas. Polimorfisme memungkinkan penggunaan metode yang sama dengan perilaku yang berbeda, meningkatkan fleksibilitas dan keterbacaan kode.
<br> <br>

### 6. Menampilkan data mahasiswa dan data nilai perbaikan (beranda_data)
- pada beranda_data.php adalah halaman utama yang menampilkan daftar mahasiswa dan nilai perbaikan mereka, di mana data tersebut diambil langsung dari database dan ditampilkan menggunakan antarmuka Bootstrap.
<br>

Berikut adalah coding secara keseluruhan yang dibuat:
```php
<?php
// Memanggil file Mahasiswa.php
require_once 'Mahasiswa.php';
// Memanggil file Nilai_perbaikan.php
require_once 'nilai_perbaikan.php';

// Membuat instance dari kelas Mahasiswa
$mahasiswa = new Mahasiswa();
// Membuat instance dari kelas Mahasiswa
$nilai_perbaikan = new Nilai_perbaikan();

// Mengambil data mahasiswa
$dataMahasiswa = $mahasiswa->tampilData();

// Mengambil data nilai_perbaikan
$dataNilai_perbaikan = $nilai_perbaikan->tampilData();
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8"> <!-- Mengatur karakter dan responsivitas halaman -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Memuat Bootstrap CSS dan JavaScript -->
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
    <!-- Membuat menu navigasi utama -->
    <ul class="nav navbar-nav">
        <!-- Mengecek role pengguna menggunakan parameter URL -->
          <!-- Menampilkan menu "Overview" jika role adalah admin, serta menjadikannya aktif -->
          <li class="active"><a href="beranda_data.php?role=admin">Overview</a></li>
          <!-- Menambahkan link ke halaman "Mahasiswa" untuk admin -->
          <li><a href="tampil_mahasiswa.php?role=admin">Mahasiswa</a></li>
          <!-- Membuat dropdown menu untuk nilai perbaikan -->
          <li class="dropdown">
            <!-- Teks untuk menu dropdown dan ikon caret -->
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
              Nilai Perbaikan <span class="caret"></span>
            </a>
            <!-- Dropdown menu untuk memilih mata kuliah yang tersedia -->
            <ul class="dropdown-menu">
              <!-- Link untuk mata kuliah Matematika dalam nilai perbaikan -->
              <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
              <!-- Link untuk mata kuliah Pemrograman Web dalam nilai perbaikan -->
              <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
            </ul>
          </li>  
      </ul>
    </div>
  </nav>
  
<div class="container mt-3">
  <!-- Header dan Tabel Mahasiswa -->
  <div class="row">
    <div class="col-md-12">
      <h2>Daftar Mahasiswa</h2>   <!-- Judul halaman -->
      <p>Daftar Mahasiswa D3 Teknik Informatika</p> 
       <!-- Membuat tabel Bootstrap dengan kelas 'table-bordered' -->
      <table class="table table-bordered" id="tableMahasiswa">
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
        </tbody>
      </table>
    </div>
  </div>

  <!-- Header dan Tabel Nilai Perbaikan -->
  <div class="row mt-5">
    <div class="col-md-12">
      <h2>Daftar Nilai Perbaikan Mahasiswa</h2> <!-- Judul halaman -->
      <p>Daftar Nilai Perbaikan MataKuliah Matematika & Pemrograman Web</p>
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
            <?php $no = 1; ?> <!-- Inisialisasi nomor urut, dimulai dari 1 untuk setiap nilai perbaikan -->
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
```
### Penjelasan:
1. Pengambilan data dari PHP: Mengambil data mahasiswa dan nilai perbaikan dari kelas Mahasiswa dan Nilai_Perbaikan.
2. Navigasi: Script menggunakan navbar Bootstrap dengan tampilan gaya invers (dark). Menggunakan navbar Bootstrap untuk menavigasi antara halaman beranda, overview, mahasiswa, dan perbaikan nilai (Matematika dan Pemrograman Web).
3. Tabel Mahasiswa: Setelah bagian navigasi, halaman menampilkan daftar mahasiswa dalam tabel. Menampilkan daftar mahasiswa (ID, NIM, Nama, Alamat, Email, No. Telepon).
4. Tabel Nilai Perbaikan: Setelah daftar mahasiswa, halaman menampilkan tabel kedua berisi data nilai perbaikan untuk mata kuliah Matematika dan Pemrograman Web. Menampilkan data nilai perbaikan (ID Perbaikan, Tanggal, Keterangan, Mahasiswa, Matkul, ID Semester,ID Nilai, ID Dosen).

### 7. Menampilkan Beranda untuk admin 
```html
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
    </ul>
  </div>
</nav>

<!-- Konten utama halaman -->
<div class="container center-content ">
  <div>
    <!-- Teks utama di halaman beranda admin yang berada di tengah dengan ukuran besar -->
    <h2>Selamat Datang, Admin!</h2>
    
    <!-- Subjudul atau teks tambahan untuk memberikan informasi kepada admin -->
    <p>Kelola data mahasiswa dan nilai perbaikan dengan efisien.</p>
  </div>
</div>

</body>
</html>
```
Output yang dihasilkan:
![alt text](beranda_admin.png)

### 8. Menampilkan Beranda Mahasiswa
```html
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
      <a class="navbar-brand" href="#">Beranda</a>
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
```

### Output yang dihasilkan:
![alt text](beranda_mhs.png)

### 9. Menampilkan nilai perbaikan mtk 
```php
<?php
// Memanggil file Matkul
require_once 'matkul.php';

// Membuat objek baru dari kelas Matkul
$Matematika = new Matematika();
// Mengambil data nilai perbaikan untuk mata kuliah "Matematika"
$dataMatematika = $Matematika->tampilData();
?>
```
```html
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
```
### Output yang Dihasilkan:
![alt text](nilaimtk_admin.png)
<br>

![alt text](nilaimtk_mhs.png)




### 10. Menampilkan Nilai perbaikan Pweb
```php
<?php
// Memanggil file Nilai_perbaikan.php
require_once 'matkul.php';

// Membuat objek baru dari kelas Matkul
$Pweb = new Pweb();
// Mengambil data nilai perbaikan untuk mata kuliah "Pemrograman Web"
$dataPweb = $Pweb->tampilData();
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>  <!-- Judul dan pengaturan dasar halaman -->
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
  <li class="dropdown active"> <!-- Dropdown menu untuk nilai perbaikan -->
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
      Nilai Perbaikan <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk admin -->
      <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
      <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
    </ul>
  </li>
    </div>
    
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
  <!-- Deskripsi singkat tentang daftar perbaikan untuk matkul Pemrograman Web -->
  <p>Daftar Nilai Perbaikan Matakuliah Pemrograman Web</p>           
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
          <?php if (!empty($dataPweb)): ?>
            <?php $no = 1; ?> <!-- Inisialisasi nomor urut, dimulai dari 1 untuk setiap mahasiswa -->
             <!-- Memulai perulangan untuk menampilkan data mahasiswa satu per satu -->
            <?php foreach ($dataPweb as $nilai): ?>
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
```
### Output yang Dihasilkan:
![alt text](/img/nilaipweb_admin.png)
<br>
![alt text](/img/nilaipweb_mhs.png)



### 11. Menampilkan Data Mahasiswa
```php
<?php
// Memanggil file Mahasiswa.php
require_once 'mahasiswa.php';

// Membuat instance dari kelas Mahasiswa
$mahasiswa = new Mahasiswa();

// Mengambil data mahasiswa
$dataMahasiswa = $mahasiswa->tampilData();
?>
```
```html
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>  <!-- Judul dan pengaturan dasar halaman -->
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

    <!-- Jika role adalah admin, tampilkan menu khusus untuk admin -->
    <li><a href="beranda_data.php?role=admin">Overview</a></li>
    <li class="active"><a href="tampil_mahasiswa.php?role=admin">Mahasiswa</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        Nilai Perbaikan <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <!-- Menu perbaikan nilai Matematika dan Pemrograman Web untuk mahasiswa -->
            <li><a href="perbaikan_mtk.php?role=admin">Matematika</a></li>
            <li><a href="perbaikan_pweb.php?role=admin">Pemrograman Web</a></li>
        </ul>
    </ul>
  </div>
</nav>
  
  
  
<div class="container mt-3">
  <!-- Judul halaman untuk daftar mahasiswa -->
  <h2>Daftar Mahasiswa </h2> 
  <!-- Deskripsi singkat tentang daftar mahasiswa D3 Teknik Informatika -->
  <p>Daftar Mahasiswa D3 Teknik Informatika</p>            
  <div class="card-body"> <!-- Bagian untuk menampilkan tabel nilai perbaikan -->
              <!-- Tabel dengan garis pembatas menggunakan Bootstrap -->
              <table class="table table-bordered" id="tableMahasiswa">
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
```

### Output yang Dihasilkan:
![alt text](/img/dataMahasiswa.png)