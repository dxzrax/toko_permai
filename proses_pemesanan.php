<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $produk_nama = $_POST['produk_terpilih'] ?? '';
    $jumlah = isset($_POST['jumlah']) ? intval($_POST['jumlah']) : 0;
    $jasa_id = isset($_POST['jasa_id']) && $_POST['jasa_id'] !== '' ? intval($_POST['jasa_id']) : null;
    $phone = $_POST['phone'];
    $use_date = $_POST['use_date'];
    $payment_method = $_POST['payment_method'];
    $message = $_POST['message'];

    $total_harga = 0;

    // Hitung harga produk
    if (!empty($produk_nama)) {
        $produk_query = mysqli_query($conn, "SELECT harga FROM produk WHERE nama_produk = '".mysqli_real_escape_string($conn, $produk_nama)."'");
        if ($p = mysqli_fetch_assoc($produk_query)) {
            $total_harga += $p['harga'] * $jumlah;
        }
    }

    // Hitung harga jasa
    if (!is_null($jasa_id)) {
        $jasa_query = mysqli_query($conn, "SELECT harga FROM jasa WHERE id = $jasa_id");
        if ($j = mysqli_fetch_assoc($jasa_query)) {
            $total_harga += $j['harga'];
        }
    }

    // Buat query insert
    $stmt = mysqli_prepare($conn, "INSERT INTO pemesanan 
        (produk, jumlah, jasa_id, nama, email, phone, use_date, payment_method, message, total_harga, status, status_pembayaran) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Menunggu Pembayaran', 'Belum Bayar')");

    mysqli_stmt_bind_param($stmt, 'siissssssi', 
        $produk_nama, $jumlah, $jasa_id, $nama, $email, $phone, $use_date, $payment_method, $message, $total_harga);

    if (mysqli_stmt_execute($stmt)) {
        $id_pemesanan = mysqli_insert_id($conn);
        header("Location: upload_bukti.php?id=$id_pemesanan");
        exit;
    } else {
        echo "Gagal memproses pemesanan.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
