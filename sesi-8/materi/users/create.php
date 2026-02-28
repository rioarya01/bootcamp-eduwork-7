<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //  Validasi sederhana
    if (empty($name) || empty($email) || empty($password)) {
        echo "Semua field harus diisi.";
        exit;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email tidak valid.";
        exit;
    }

    // Proses
    $query = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");

    if ($query) {
        $query->bind_param("sss", $name, $email, $password);

        if ($query->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . $query->error;
        }

        $query->close();
    } else {
        echo "Prepare gagal: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Data</title>
</head>
<body>

<h1>Tambah Data</h1>

<form method="POST">
    <input type="text" name="name" placeholder="Nama"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="password" placeholder="Password"><br><br>
    <button type="submit" name="submit">Simpan</button>
</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>