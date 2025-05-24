<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT nama, email, role, password FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #e8f5e9, #a5d6a7);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .profil-box {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 100, 0, 0.2);
            width: 100%;
            max-width: 420px;
            transform: translateY(30px);
            opacity: 0;
            animation: fadeInUp 0.8s ease-out forwards;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .profil-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #2e7d32;
        }

        .profil-item {
            margin: 15px 0;
            font-size: 16px;
            color: #333;
        }

        .profil-item span {
            font-weight: 600;
            color: #388e3c;
            display: inline-block;
            width: 100px;
        }

        .password-hidden {
            letter-spacing: 4px;
            color: #aaa;
        }

        .back-button {
            display: block;
            text-align: center;
            background-color: #43a047;
            color: #fff;
            padding: 12px;
            margin-top: 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background-color: #2e7d32;
        }

        .avatar {
            width: 100px;
            height: 100px;
            background-color: #c8e6c9;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: #2e7d32;
            animation: popIn 0.6s ease-out;
        }

        @keyframes popIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="profil-box">
        <div class="avatar"><?= strtoupper(substr($user['nama'], 0, 1)) ?></div>
        <h2>Profil Saya</h2>
        <div class="profil-item"><span>Nama:</span> <?= htmlspecialchars($user['nama']) ?></div>
        <div class="profil-item"><span>Email:</span> <?= htmlspecialchars($user['email']) ?></div>
        <div class="profil-item"><span>Role:</span> <?= htmlspecialchars($user['role']) ?></div>
        <div class="profil-item"><span>Password:</span> <span class="password-hidden">********</span></div>

        <a href="home.php" class="back-button">← Kembali ke Home</a>
    </div>
</body>
</html>
