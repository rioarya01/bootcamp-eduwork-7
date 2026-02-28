<?php
include "../koneksi.php";

$id = $_GET['id'];

$query= $conn->prepare("SELECT * FROM users WHERE id=?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name  = $_POST['name'];
    $email = $_POST['email'];

    // Jika password diisi, hash ulang
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = $conn->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
        $query->bind_param("sssi", $name, $email, $password, $id);
    } else {
        // Jika password tidak diubah
        $query = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $query->bind_param("ssi", $name, $email, $id);
    }

    //  Validasi sederhana
    if (empty($name) || empty($email) || empty($password)) {
        echo "Semua field harus diisi.";
        exit;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email tidak valid.";
        exit;
    }

    if ($query->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $data['name']; ?>" required><br><br>
    <input type="email" name="email" value="<?= $data['email']; ?>" required><br><br>
    <input type="text" name="password" value="<?= $data['password']; ?>" required><br><br>
    <button type="submit" name="update">Update</button>
</form>

<br>
<a href="index.php">Kembali</a>

</body>
</html>