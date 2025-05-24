<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "permai";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) 
    die("Koneksi gagal: " . $conn->connect_error);

    
    if (!$conn) {
        die("Koneksi database tidak aktif.");
    }
    
?>
