<?php
include 'koneksi.php';

$id = $_GET['id'] ?? 0;
$pemesanan = mysqli_query($conn, "SELECT p.*, j.nama_jasa, pr.harga as harga_produk, j.harga as harga_jasa 
  FROM pemesanan p 
  LEFT JOIN jasa j ON p.jasa_id = j.id 
  LEFT JOIN produk pr ON p.produk = pr.nama_produk 
  WHERE p.id = $id");

$data = mysqli_fetch_assoc($pemesanan);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Bukti Pembayaran</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f0f2f5;
      padding: 40px;
    }

    .container {
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .info {
      margin-bottom: 20px;
    }

    .info p {
      margin: 8px 0;
      font-size: 16px;
      color: #555;
    }

    .total {
      font-weight: bold;
      font-size: 18px;
      color: #d43f3a;
    }

    input[type="file"], button {
      display: block;
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      font-size: 16px;
    }

    button {
      background: #28a745;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 6px;
      transition: 0.3s;
    }

    button:hover {
      background: #218838;
    }

    .note {
      font-size: 14px;
      color: #999;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Upload Bukti Pembayaran</h2>

    <div class="info">
      <p><strong>Nama:</strong> <?= $data['nama'] ?></p>
      <p><strong>Email:</strong> <?= $data['email'] ?></p>
      <p><strong>Produk:</strong> <?= $data['produk'] ?> (x<?= $data['jumlah'] ?>)</p>

      <?php if (!empty($data['nama_jasa'])): ?>
        <p><strong>Jasa Fotografer:</strong> <?= $data['nama_jasa'] ?></p>
      <?php endif; ?>

      <p class="total">Total Harga: Rp<?= number_format($data['total_harga'], 0, ',', '.') ?></p>
    </div>

    <form action="proses_upload_bukti.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $data['id'] ?>">
      <input type="file" name="bukti" required>
      <button type="submit">Upload Bukti Pembayaran</button>
    </form>

    <p class="note">Pastikan bukti transfer jelas dan terbaca.</p>
  </div>
</body>
</html>
