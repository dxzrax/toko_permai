<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "permai";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$email    = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

// Cek apakah email sudah terdaftar
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah terdaftar!'); window.location='register.php';</script>";
} else {
    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', 'user')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
