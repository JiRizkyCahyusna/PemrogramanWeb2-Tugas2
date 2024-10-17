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

Penjelasan kode:  