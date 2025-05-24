<?php
include 'koneksi.php';
$nama = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];
$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file($tmp, "uploads/".$gambar);

mysqli_query($conn, "INSERT INTO produk (nama_produk, deskripsi, harga, kategori, gambar) 
VALUES ('$nama', '$deskripsi', '$harga', '$kategori', '$gambar')");
header("Location: admin_produk.php");
