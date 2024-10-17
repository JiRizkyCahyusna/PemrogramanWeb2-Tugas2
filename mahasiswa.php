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