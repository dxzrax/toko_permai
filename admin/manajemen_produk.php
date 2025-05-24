<?php
include 'header.php';

// Proses tambah produk
if (isset($_POST['submit'])) {
    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    // Upload gambar baru jika ada
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";
    if ($gambar != "") {
        move_uploaded_file($tmp, $folder . $gambar);
    } else {
        $gambar = $_POST['gambar_lama'] ?? '';
    }

    if ($_POST['submit'] == 'Simpan') {
        $query = "INSERT INTO produk (nama_produk, deskripsi, harga, kategori, gambar, stok) 
                  VALUES ('$nama', '$deskripsi', '$harga', '$kategori', '$gambar', '$stok')";
    } else {
        $id = $_POST['id'];
        $query = "UPDATE produk SET 
                    nama_produk='$nama', 
                    deskripsi='$deskripsi', 
                    harga='$harga', 
                    kategori='$kategori', 
                    gambar='$gambar',
                    stok='$stok'
                  WHERE id=$id";
    }

    mysqli_query($conn, $query);
    echo "<script>alert('Produk berhasil disimpan'); window.location.href='produk_admin.php';</script>";
}

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM produk WHERE id=$id");
    echo "<script>alert('Produk berhasil dihapus'); window.location.href='produk_admin.php';</script>";
}

// Ambil data jika ingin edit
$edit_mode = false;
if (isset($_GET['edit'])) {
    $edit_mode = true;
    $id_edit = $_GET['edit'];
    $edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id=$id_edit"));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: auto;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        form, table {
            background: #fff;
            padding: 20px;
            margin-bottom: 40px;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
        }

        input, textarea, select, button {
            display: block;
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background: #28a745;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background: #eee;
        }

        img {
            max-width: 100px;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2><?= $edit_mode ? 'Edit Produk' : 'Tambah Produk' ?></h2>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $edit_mode ? $edit['id'] : '' ?>">
    <input type="hidden" name="gambar_lama" value="<?= $edit_mode ? $edit['gambar'] : '' ?>">

    <input type="text" name="nama_produk" placeholder="Nama Produk" required value="<?= $edit_mode ? $edit['nama_produk'] : '' ?>">
    <textarea name="deskripsi" placeholder="Deskripsi Produk"><?= $edit_mode ? $edit['deskripsi'] : '' ?></textarea>
    <input type="number" name="harga" placeholder="Harga" required value="<?= $edit_mode ? $edit['harga'] : '' ?>">
    <select name="kategori" required>
        <option value="">Pilih Kategori</option>
        <option value="kamera" <?= $edit_mode && $edit['kategori'] == 'kamera' ? 'selected' : '' ?>>Kamera</option>
        <option value="lensa" <?= $edit_mode && $edit['kategori'] == 'lensa' ? 'selected' : '' ?>>Lensa</option>
    </select>
    <input type="number" name="stok" placeholder="Stok" required value="<?= $edit_mode ? $edit['stok'] : '' ?>">
    <input type="file" name="gambar" <?= $edit_mode ? '' : 'required' ?>>
    <?php if ($edit_mode && $edit['gambar']) { ?>
        <p>Gambar saat ini: <img src="uploads/<?= $edit['gambar'] ?>" width="100"></p>
    <?php } ?>
    <button type="submit" name="submit" value="<?= $edit_mode ? 'Update' : 'Simpan' ?>">
        <?= $edit_mode ? 'Update Produk' : 'Simpan Produk' ?>
    </button>
</form>

<h2>Data Produk</h2>
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Stok</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_produk'] ?></td>
        <td><?= $row['deskripsi'] ?></td>
        <td>Rp<?= number_format($row['harga']) ?></td>
        <td><?= ucfirst($row['kategori']) ?></td>
        <td><?= $row['stok'] ?></td>
        <td><img src="uploads/<?= $row['gambar'] ?>" alt="<?= $row['nama_produk'] ?>"></td>
        <td>
            <a href="?edit=<?= $row['id'] ?>">Edit</a> | 
            <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus produk ini?')">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
<?php include 'footer.php'; ?>