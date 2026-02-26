<?php

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {

    // Ambil dan bersihkan data
    $name  = htmlspecialchars(trim($_POST['name']));
    $price = htmlspecialchars(trim($_POST['price']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validasi sederhana
    if (!empty($name) && !empty($price) && !empty($message)) {

        echo "<h2>Data Berhasil Dikirim!</h2>";
        echo "Nama : " . $name . "<br>";
        echo "Harga : " . $price . "<br>";
        echo "Deskripsi : " . $message . "<br>";

    } else {
        echo "<h1>Semua field wajib diisi!</h1>";
    }

} else {
    echo "Akses tidak diizinkan!";
}

?>