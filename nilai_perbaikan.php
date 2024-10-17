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