<?php
session_start();
include 'koneksi.php';

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];

// Cek data di database
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['nama'] = $user['nama'];

    // Redirect berdasarkan role
    if ($user['role'] == 'admin') {
        header("Location: admin/admin.php");
        exit();
    } elseif ($user['role'] == 'user') {
        header("Location: home.php");
        exit();
    } else {
        echo "Role tidak dikenal.";
    }
} else {
    echo "<script>
        alert('Email atau password salah!');
        window.location.href='index.php';
    </script>";
}
?>
