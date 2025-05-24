CREATE DATABASE permai;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) AFTER id;
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
);

CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    harga INT,
    kategori ENUM('kamera','lensa') NOT NULL,
    gambar VARCHAR(255)
    stok INT NOT NULL DEFAULT 0;
);

CREATE TABLE jasa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jasa VARCHAR(100) NOT NULL,
    deskripsi TEXT,
    harga INT NOT NULL,
    foto VARCHAR(255)
);

CREATE TABLE pemesanan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  produk VARCHAR(255),
  jumlah INT,
  jasa_id INT,
  nama VARCHAR(255),
  email VARCHAR(255),
  phone VARCHAR(50),
  use_date DATE,
  payment_method VARCHAR(50),
  message TEXT,
  total_harga INT,
  bukti_pembayaran VARCHAR(255),
  status VARCHAR(50) DEFAULT 'Menunggu Pembayaran',
  status_pembayaran VARCHAR(50) DEFAULT 'Belum Bayar',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
