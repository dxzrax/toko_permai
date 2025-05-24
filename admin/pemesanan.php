<?php
include 'header.php';

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pemesanan WHERE id = $id");
    header("Location: pemesanan.php");
    exit;
}

// Update status
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $status_pembayaran = $_POST['status_pembayaran'];
    mysqli_query($conn, "UPDATE pemesanan SET status = '$status', status_pembayaran = '$status_pembayaran' WHERE id = $id");
}

// Ambil semua data
$result = mysqli_query($conn, "
    SELECT p.*, j.nama_jasa 
    FROM pemesanan p 
    LEFT JOIN jasa j ON p.jasa_id = j.id 
    ORDER BY p.created_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Semua Pemesanan</title>
  <style>
        body 
        .form-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            max-width: 500px;
        }
        .form-box h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #444;
        }
        .form-box input, .form-box select {
            padding: 10px;
            width: 100%;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        .form-box button {
            padding: 10px 20px;
            background: #007bff;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
        .form-box button:hover {
            background: #0056b3;
        }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #eee;
      text-align: left;
      font-size: 14px;
    }

    th {
      background-color: #218838;
      color: white;
      text-transform: uppercase;
    }

    tr:hover {
      background: #f1f1f1;
    }

    img {
      max-width: 100px;
      height: auto;
    }

    select, button {
      padding: 6px 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-right: 4px;
    }

    button {
      background-color: #28a745;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }

    .delete {
      color: #dc3545;
      font-weight: bold;
      text-decoration: none;
    }

    .delete:hover {
      text-decoration: underline;
    }

    form {
      margin: 0;
      display: inline;
    }
  </style>
</head>
<body>

<h2>Semua Pemesanan User</h2>

<table>
  <tr>
    <th>Nama</th>
    <th>Email / Telepon</th>
    <th>Produk & Jumlah</th>
    <th>Jasa</th>
    <th>Tanggal Pakai</th>
    <th>Metode Bayar</th>
    <th>Pesan</th>
    <th>Total Harga</th>
    <th>Bukti</th>
    <th>Status</th>
    <th>Bayar</th>
    <th>Atur</th>
    <th>Hapus</th>
  </tr>
  <?php while ($data = mysqli_fetch_assoc($result)): ?>
  <tr>
    <td><?= htmlspecialchars($data['nama']) ?></td>
    <td>
      <?= htmlspecialchars($data['email']) ?><br>
      <?= htmlspecialchars($data['phone']) ?>
    </td>
    <td><?= $data['produk'] ?> (<?= $data['jumlah'] ?>x)</td>
    <td><?= $data['nama_jasa'] ?? '-' ?></td>
    <td><?= $data['use_date'] ?></td>
    <td><?= $data['payment_method'] ?></td>
    <td><?= nl2br(htmlspecialchars($data['message'])) ?></td>
    <td>Rp<?= number_format($data['total_harga'], 0, ',', '.') ?></td>
    <td>
      <?php if ($data['bukti_pembayaran']): ?>
        <a href="bukti/<?= $data['bukti_pembayaran'] ?>" target="_blank">
          <img src="bukti/<?= $data['bukti_pembayaran'] ?>" alt="Bukti">
        </a>
      <?php else: ?>
        <em>Belum ada</em>
      <?php endif; ?>
    </td>
    <td><?= $data['status'] ?></td>
    <td><?= $data['status_pembayaran'] ?></td>
    <td>
      <form method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <select name="status">
          <option <?= $data['status'] == 'Menunggu Pembayaran' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
          <option <?= $data['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
          <option <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
        </select>
        <select name="status_pembayaran">
          <option <?= $data['status_pembayaran'] == 'Belum Bayar' ? 'selected' : '' ?>>Belum Bayar</option>
          <option <?= $data['status_pembayaran'] == 'Sudah Bayar' ? 'selected' : '' ?>>Sudah Bayar</option>
        </select>
        <button type="submit">Simpan</button>
      </form>
    </td>
    <td>
      <a class="delete" href="?hapus=<?= $data['id'] ?>" onclick="return confirm('Hapus pesanan ini?')">Hapus</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

</body>
</html>
<?php include 'footer.php'; ?>