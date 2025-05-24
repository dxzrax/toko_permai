<?php
include 'header.php';

// Ambil data statistik
$jumlah_produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk"))['total'];
$jumlah_jasa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM jasa"))['total'];
$jumlah_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "
  SELECT COUNT(*) AS total 
  FROM pemesanan 
  WHERE DATE(created_at) = CURDATE()
"))['total'];
$jumlah_user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role = 'user'"))['total'];

// Statistik tambahan
$total_transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pemesanan"))['total'];

$pendapatan_hari_ini = mysqli_fetch_assoc(mysqli_query($conn, "
  SELECT IFNULL(SUM(total_harga), 0) AS total 
  FROM pemesanan 
  WHERE DATE(created_at) = CURDATE()
"))['total'];

// Inisialisasi default supaya tidak null
$pendapatan_bulan_ini = 0;

// Query untuk hitung total pendapatan bulan ini
$result = mysqli_query($conn, "
  SELECT IFNULL(SUM(total_harga), 0) AS total 
  FROM pemesanan 
  WHERE MONTH(created_at) = MONTH(CURDATE()) 
    AND YEAR(created_at) = YEAR(CURDATE())
");

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $pendapatan_bulan_ini = $row['total'];
    }
}

// Lalu di tampilkan dengan aman
echo number_format($pendapatan_bulan_ini);


$jumlah_selesai = mysqli_fetch_assoc(mysqli_query($conn, "
  SELECT COUNT(*) AS total 
  FROM pemesanan 
  WHERE status = 'selesai'
"))['total'];

$jumlah_proses = mysqli_fetch_assoc(mysqli_query($conn, "
  SELECT COUNT(*) AS total 
  FROM pemesanan 
  WHERE status = 'proses'
"))['total'];

$jumlah_belum_bayar = mysqli_fetch_assoc(mysqli_query($conn, "
  SELECT COUNT(*) AS total 
  FROM pemesanan 
  WHERE status = 'belum_bayar'
"))['total'];

$jumlah_admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE role = 'admin'"))['total'];

$total_stok = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(stok), 0) AS total FROM produk"))['total'];
?>

<div class="card stats-card">
    <h2>📊 Statistik Lengkap Dashboard</h2>
    <div class="row text-center">
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">📦</div>
                <div>Produk</div>
                <strong><?= $jumlah_produk ?></strong>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">📷</div>
                <div>Jasa Foto</div>
                <strong><?= $jumlah_jasa ?></strong>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">💰</div>
                <div>Transaksi Hari Ini</div>
                <strong><?= $jumlah_transaksi ?></strong>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">👤</div>
                <div>User</div>
                <strong><?= $jumlah_user ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">💸</div>
                <div>Pendapatan Hari Ini</div>
                <strong>Rp <?= number_format($pendapatan_hari_ini, 0, ',', '.') ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">📅</div>
                <div>Pendapatan Bulan Ini</div>
                <strong>Rp <?= number_format($pendapatan_bulan_ini, 0, ',', '.') ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">✅</div>
                <div>Transaksi Selesai</div>
                <strong><?= $jumlah_selesai ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">⌛</div>
                <div>Transaksi Proses</div>
                <strong><?= $jumlah_proses ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">⚠️</div>
                <div>Belum Bayar</div>
                <strong><?= $jumlah_belum_bayar ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">👔</div>
                <div>Admin Terdaftar</div>
                <strong><?= $jumlah_admin ?></strong>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="stat-box bg-light shadow-sm rounded p-3">
                <div class="stat-icon text-success fs-3 mb-2">📦</div>
                <div>Total Stok Produk</div>
                <strong><?= $total_stok ?></strong>
            </div>
        </div>
    </div>
</div>

<style>
    /* Container card */
    .stats-card {
        background: #f0fff4;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(56, 142, 60, 0.15);
        margin-top: 30px;
    }
    /* Statistik box */
    .stat-box {
        background: #d0f0c0;
        border: 1px solid #8bc34a;
        color: #33691e;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(76, 175, 80, 0.3);
    }
    /* Icon warna hijau */
    .stat-icon {
        font-size: 32px;
        color: #4caf50;
    }
    /* Judul card */
    .stats-card h2 {
        color: #2e7d32;
        margin-bottom: 20px;
        font-weight: 700;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    /* Responsive untuk layar kecil */
    @media (max-width: 768px) {
        .stat-box {
            font-size: 14px;
        }
        .stat-icon {
            font-size: 28px;
        }
    }
</style>

<?php
include 'footer.php';
?>
