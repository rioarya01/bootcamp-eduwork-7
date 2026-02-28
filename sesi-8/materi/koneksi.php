<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "bootcamp_eduwork_sesi_8";

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// } else {
//     echo "Koneksi berhasil";
// }

?>