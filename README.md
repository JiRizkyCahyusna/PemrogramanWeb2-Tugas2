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
## 1. Membuat View berbasis OOP, dengan mengambil data dari database MySQL
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
        // Memanggil metode koneksi() untuk membuka koneksi ke database saat kelas diinstansiasi
        $this->koneksi();
    }

    // Metode koneksi yang bertugas membuat koneksi ke database
    public function koneksi() {
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
## Penjelasan: 
1. Mendefinisikan Kelas Database:
Kelas Database dibuat untuk mengelola koneksi dan operasi terhadap database MySQL.
    - Properti: Ada beberapa properti yang disiapkan untuk menyimpan informasi koneksi ke database. <br>
`$host`: Menyimpan nama host, dalam contoh ini diatur ke "localhost".<br>
`$username`: Menyimpan nama pengguna untuk koneksi database, yaitu "root".<br>
`$password`: Menyimpan kata sandi untuk pengguna database, diatur kosong karena tidak ada password pada database lokal.<br>
`$database`: Menyimpan nama database yang akan digunakan, yaitu "persuratan".<br>
Protected Property `$koneksi`: Properti ini digunakan untuk menyimpan objek koneksi yang dibuat menggunakan mysqli.
2. Mendefinisikan Konstruktor: Fungsi ini akan memanggil metode koneksi() untuk langsung membuat koneksi ke database saat kelas di-instantiate.
3. Membuat Metode koneksi(): digunakan untuk membuka koneksi ke MySQL dengan menggunakan informasi properti yang telah didefinisikan.<br>
Menggunakan new mysqli(), metode ini mencoba membuat koneksi ke database.
Jika terjadi kesalahan dalam proses koneksi, metode ini akan menghentikan eksekusi dan menampilkan pesan error.
4. Membuat Metode query(): untuk menjalankan query SQL ke database. Hasil query akan dikembalikan oleh metode ini, sehingga bisa digunakan untuk manipulasi atau penampilan data.
5. Metode tampilData(): sebagai template kosong yang bisa diperluas pada kelas turunan untuk menampilkan data dari database.
<br>
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
### Penjelasan langkah2nya:

1. Mendefinisikan Struktur Dasar HTML:
Dimulai dengan `<!DOCTYPE html>` yang menentukan tipe dokumen sebagai HTML5.
2. Membuat Navigasi Bar: Menggunakan Bootstrap  untuk membuat navigasi bar dengan tautan ke halaman admin dan mahasiswa.
3. Konten Utama: Membuat konten tengah dengan judul besar "Selamat Datang di Sistem Informasi Akademik". Menambahkan subjudul deskriptif yang menjelaskan akses ke data mahasiswa dan nilai perbaikan.


### Output yang dihasilkan: 
![alt text](/img/beranda.png)


## 2. Gunakan _construct sebagai link ke database
```php
// Konstruktor kelas yang otomatis dijalankan saat objek dibuat
    public function __construct() {
        // Memanggil metode koneksi() untuk membuka koneksi ke database saat kelas diinstansiasi
        $this->koneksi();
    }

    // Metode koneksi yang bertugas membuat koneksi ke database
    public function koneksi() {
        // Membuat koneksi menggunakan mysqli dengan informasi yang telah didefinisikan di properti
        $this->koneksi = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        // Mengecek apakah koneksi gagal, jika iya akan menampilkan pesan error
        if ($this->koneksi->connect_error) {
            // Jika gagal koneksi, program akan berhenti dan menampilkan pesan error
            die("Koneksi database gagal: " . $this->koneksi->connect_error);
        }
    }
```
- construktor akan memanggil metode koneksi() secara otomatis untuk membuka koneksi ke database. Metode koneksi() bertugas untuk membuat koneksi ke database menggunakan mysqli.

## 3. Terapkan enkapsulasi sesuai logika studi kasus

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
        // Memanggil metode koneksi() untuk membuka koneksi ke database saat kelas diinstansiasi
        $this->koneksi();
    }

    // Metode koneksi yang bertugas membuat koneksi ke database
    public function koneksi() {
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
- Penerapan Enkapsulasi: Properti seperti `host`, `username`, `password`, dan `database` disimpan sebagai private, artinya hanya bisa diakses dari dalam kelas.
Koneksi ke database disimpan sebagai protected, artinya bisa diakses oleh kelas turunan (pewarisan).
Pengaksesan dan pengelolaan data dilakukan melalui metode yang jelas, seperti `query()` dan `koneksi()`, memastikan bahwa informasi sensitif seperti kredensial database tidak bisa diakses langsung dari luar kelas.

## 4. Membuat kelas turunan menggunakan konsep pewarisan
```php
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
```
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
    public function tampilData($matkul=null) {
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
```php
<?php
// Memastikan file nilai_perbaikan.php sudah di-include
require_once 'nilai_perbaikan.php';
// Membuat kelas Matkul yang mewarisi kelas Nilai_Perbaikan
class Matkul extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan nama mata kuliah
    public function tampilData($matkul=null) {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah yang diberikan
        // Jika $matkul adalah null, query ini bisa menjadi tidak efektif, sebaiknya dilakukan pemeriksaan lebih lanjut
        $sql = "SELECT * FROM nilai_perbaikan where matkul = '". $matkul ."'";
        $result = $this->koneksi->query($sql); // Menjalankan query dan menyimpan hasilnya
        // Membuat array kosong untuk menampung hasil query
        $hasil = [];
        if ($result && $result->num_rows > 0) { // Mengecek apakah hasil query tidak kosong
            // Mengambil setiap baris data dari hasil query dan menyimpannya ke dalam array
             while ($row = $result->fetch_assoc()) { 
                 $hasil[] = $row;  // Menambahkan data ke dalam array hasil
             }
         }
        return $hasil; // Mengembalikan array yang berisi Matakuliah
     }
 
 }
 ?>
 ```

 

        

 
