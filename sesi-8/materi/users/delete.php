<?php
include "../koneksi.php";

$id = $_GET['id'];

$query = "DELETE FROM users WHERE id = $id";
if ($conn->query($query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $conn->error;
}

?>