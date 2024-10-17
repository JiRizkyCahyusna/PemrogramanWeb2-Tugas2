<?php
// Memastikan file nilai_perbaikan.php sudah di-include
require_once 'nilai_perbaikan.php';
// Membuat kelas Matkul yang mewarisi kelas Nilai_Perbaikan
class Matematika extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan nama mata kuliah
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah yang diberikan
        // Jika $matkul adalah null, query ini bisa menjadi tidak efektif, sebaiknya dilakukan pemeriksaan lebih lanjut
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
        return $hasil; // Mengembalikan array yang berisi Matakuliah
     }
 
 }
 class Pweb extends Nilai_Perbaikan{
    // Construktor untuk inisialisasi koneksi
     public function __construct() {
         parent::__construct(); // Mewarisi koneksi dari kelas Database
     }
 
    // Metode untuk mengambil data nilai perbaikan berdasarkan nama mata kuliah
    public function tampilData() {
        // Membuat query SQL untuk mengambil semua data nilai perbaikan yang sesuai dengan mata kuliah yang diberikan
        // Jika $matkul adalah null, query ini bisa menjadi tidak efektif, sebaiknya dilakukan pemeriksaan lebih lanjut
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
        return $hasil; // Mengembalikan array yang berisi Matakuliah
     }
 
 }
 ?>