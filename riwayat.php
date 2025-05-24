<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['email']) || $_SESSION['role'] != 'user') {
    echo "Akses ditolak.";
    exit;
}

$email = $_SESSION['email'];

// Ambil semua pesanan user
$query = "SELECT p.*, j.nama_jasa 
          FROM pemesanan p
          LEFT JOIN jasa j ON p.jasa_id = j.id
          WHERE p.email = '$email'
          ORDER BY p.created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pesanan Saya</title>
    <style>
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: #e6f4ea;
  padding: 20px;
}

.back-button {
  display: inline-block;
  margin-bottom: 20px;
  background-color: #28a745;
  color: white;
  padding: 10px 16px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: bold;
  box-shadow: 0 4px 10px rgba(0, 128, 0, 0.3);
  transition: background 0.3s ease;
}
.back-button:hover {
  background-color: #218838;
}

h2 {
  text-align: center;
  color: #1e4620;
  font-size: 28px;
  margin-bottom: 30px;
  text-shadow: 1px 1px 2px #a3d9a5;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: #ffffff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 100, 0, 0.1);
}

th {
  background-color: #2e7d32;
  color: #fff;
  text-transform: uppercase;
  font-size: 14px;
  letter-spacing: 0.5px;
}

th, td {
  padding: 14px;
  border-bottom: 1px solid #d4e6d4;
  text-align: left;
}

tr:hover {
  background-color: #f0fdf4;
}

img {
  max-width: 80px;
  height: auto;
  border-radius: 6px;
  box-shadow: 0 2px 6px rgba(0, 100, 0, 0.2);
}

select, button {
  padding: 8px 12px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 14px;
}

button {
  background-color: #43a047;
  color: white;
  cursor: pointer;
  transition: background 0.3s;
}

button:hover {
  background-color: #388e3c;
}

.delete {
  color: #e53935;
  text-decoration: none;
  font-weight: bold;
}

.delete:hover {
  text-decoration: underline;
}

    </style>
</head>
<body>
<a href="home.php" class="back-button">← Kembali ke Home</a>
<h2>Riwayat Pesanan Anda</h2>

<div class="pesanan-section">
    <h3>Pesanan Belum Selesai</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Jasa</th>
            <th>Tanggal Pakai</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Bukti</th>
        </tr>
        <?php
        mysqli_data_seek($result, 0); // reset pointer
        $ada = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['status'] != 'Selesai') {
                $ada = true;
                echo "<tr>
                        <td>{$row['created_at']}</td>
                        <td>{$row['produk']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>" . ($row['nama_jasa'] ?? '-') . "</td>
                        <td>{$row['use_date']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['status_pembayaran']}</td>
                        <td>";
                        if ($row['bukti_pembayaran']) {
                            echo "<img src='bukti/{$row['bukti_pembayaran']}' alt='Bukti'>";
                        } else {
                            echo "<em>Belum ada</em>";
                        }
                echo "</td>
                    </tr>";
            }
        }
        if (!$ada) echo "<tr><td colspan='8'><em>Tidak ada pesanan yang sedang berjalan.</em></td></tr>";
        ?>
    </table>
</div>

<div class="pesanan-section">
    <h3>Pesanan Selesai</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Jasa</th>
            <th>Tanggal Pakai</th>
            <th>Status</th>
            <th>Pembayaran</th>
            <th>Bukti</th>
        </tr>
        <?php
        mysqli_data_seek($result, 0); // reset pointer
        $ada = false;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['status'] == 'Selesai') {
                $ada = true;
                echo "<tr>
                        <td>{$row['created_at']}</td>
                        <td>{$row['produk']}</td>
                        <td>{$row['jumlah']}</td>
                        <td>" . ($row['nama_jasa'] ?? '-') . "</td>
                        <td>{$row['use_date']}</td>
                        <td>{$row['status']}</td>
                        <td>{$row['status_pembayaran']}</td>
                        <td>";
                        if ($row['bukti_pembayaran']) {
                            echo "<img src='bukti/{$row['bukti_pembayaran']}' alt='Bukti'>";
                        } else {
                            echo "<em>Belum ada</em>";
                        }
                echo "</td>
                    </tr>";
            }
        }
        if (!$ada) echo "<tr><td colspan='8'><em>Belum ada pesanan selesai.</em></td></tr>";
        ?>
    </table>
</div>

</body>
</html>
