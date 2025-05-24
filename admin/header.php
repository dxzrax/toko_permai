<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include 'koneksi.php';

// Cek apakah admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
  
    // Upload gambar
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";
    $path = $folder . $foto;
  
    if (move_uploaded_file($tmp, $path)) {
      mysqli_query($conn, "INSERT INTO jasa (nama_jasa, deskripsi, harga, foto) 
                           VALUES ('$nama', '$deskripsi', '$harga', '$foto')");
      echo "<script>alert('Jasa berhasil ditambahkan!'); location.href='manajemen_jasa.php';</script>";
    } else {
      echo "<script>alert('Gagal upload gambar.');</script>";
    }
  }
  
  // Proses Edit
  if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
  
    if ($_FILES['foto']['name'] != '') {
      $foto = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];
      $folder = "uploads/";
      $path = $folder . $foto;
      move_uploaded_file($tmp, $path);
      mysqli_query($conn, "UPDATE jasa SET 
        nama_jasa='$nama',
        deskripsi='$deskripsi',
        harga='$harga',
        foto='$foto'
        WHERE id=$id");
    } else {
      mysqli_query($conn, "UPDATE jasa SET 
        nama_jasa='$nama',
        deskripsi='$deskripsi',
        harga='$harga'
        WHERE id=$id");
    }
    echo "<script>alert('Data berhasil diupdate'); location.href='manajemen_jasa.php';</script>";
  }
  
  // Proses Hapus
  if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM jasa WHERE id=$id");
    echo "<script>alert('Data berhasil dihapus'); location.href='manajemen_jasa.php';</script>";
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Toko Permai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    padding-bottom: 60px; /* untuk memberi ruang ke footer */
}

header {
    background: #5cb85c;
    color: white;
    padding: 20px;
    text-align: center;
    font-size: 24px;
}

nav {
    background: #4cae4c;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.nav-left a {
    color: white;
    margin-right: 20px;
    text-decoration: none;
    font-weight: 500;
}

.nav-left a:hover {
    text-decoration: underline;
    color: #dfffdf;
}

.nav-right a {
    color: white;
    font-size: 18px;
}

.container {
    padding: 20px;
}

.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    border-left: 5px solid #6aaf08;
}

.card h2 {
    color: #398439;
}

footer {
    background: #398439;
    color: white;
    padding: 12px;
    text-align: center;
    font-size: 14px;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
}

/* Responsif */
@media (max-width: 768px) {
    .nav-left {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-left a {
        margin-bottom: 10px;
    }

    .nav-right {
        margin-top: 10px;
    }
}

    </style>
</head>
<body>

<header>Admin Dashboard - Toko Permai</header>

<nav>
    <div class="nav-left d-flex flex-wrap">
        <a href="admin.php">Dashboard</a>
        <a href="manajemen_jasa.php">Manajemen Jasa</a>
        <a href="user.php">Data User</a>
        <a href="manajemen_produk.php">Kelola Produk</a>
        <a href="pemesanan.php">Pesanan Masuk</a>
    </div>
    <div class="nav-right">
        <a href="../logout.php" title="Logout" onclick="return confirm('Yakin ingin logout?')">
            <i class="bi bi-box-arrow-right"></i>
        </a>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
