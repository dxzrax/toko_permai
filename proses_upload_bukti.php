<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $file = $_FILES['bukti'];

    if ($file['error'] === 0) {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = 'bukti_' . time() . '.' . $ext;
        $path = 'bukti/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $path)) {
            mysqli_query($conn, "UPDATE pemesanan SET bukti_pembayaran = '$filename', status = 'Menunggu Konfirmasi', status_pembayaran = 'Sudah Upload' WHERE id = $id");
            echo "<script>alert('Bukti pembayaran berhasil diupload!'); window.location.href='home.php';</script>";
        } else {
            echo "Upload gagal!";
        }
    } else {
        echo "Terjadi kesalahan saat upload.";
    }
} else {
    echo "Akses tidak sah.";
}
?>
