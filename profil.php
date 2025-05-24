<?php
session_start();
include 'koneksi.php'; // file koneksi ke database

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT nama, email, role FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9f5e9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profil-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .profil-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2e7d32;
        }

        .profil-item {
            margin: 10px 0;
            font-size: 16px;
        }

        .profil-item span {
            font-weight: bold;
            color: #333;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
            background-color: #2e7d32;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #256428;
        }
    </style>
</head>
<body>
    <div class="profil-box">
        <h2>Profil Saya</h2>
        <div class="profil-item"><span>Nama:</span> <?= htmlspecialchars($user['nama']) ?></div>
        <div class="profil-item"><span>Email:</span> <?= htmlspecialchars($user['email']) ?></div>
        <div class="profil-item"><span>Role:</span> <?= htmlspecialchars($user['role']) ?></div>
        <a class="back-button" href="home.php">← Kembali ke Home</a>
    </div>
</body>
</html>
