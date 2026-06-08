<?php
// Deteksi apakah sedang di Laragon atau di Hosting
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Pengaturan untuk LARAGON
    $servername = "localhost";
    $username   = "root";
    $password   = "";            // Kosongkan untuk Laragon
    $dbname     = "db_sibori";
} else {
    // Pengaturan untuk INFINITYFREE
    $servername = "sql303.infinityfree.com";
    $username   = "if0_40382552";
    $password   = "admind123456";
    $dbname     = "if0_40382552_db_sibori";
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Set charset untuk mendukung karakter Indonesia
$conn->set_charset("utf8");
?>