<?php
include 'header.php';

// Fungsi tambah, edit, hapus (sama seperti sebelumnya)

$jasa = mysqli_query($conn, "SELECT * FROM jasa");
?>

<style>
  .form-section, .table-section {
  margin: 30px 0;
}

.form-section form, .edit-modal form {
  background: #f4f4f4;
  padding: 20px;
  border-radius: 10px;
  max-width: 500px;
}

input[type="text"], textarea, input[type="number"], input[type="file"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

button {
  padding: 8px 15px;
  border: none;
  background: #5cb85c; /* sebelumnya: #007bff */
  color: white;
  border-radius: 6px;
  cursor: pointer;
}

button:hover {
  background: #4cae4c; /* sebelumnya: #0056b3 */
}

.edit-modal {
  display: none;
  position: fixed;
  z-index: 999;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
}

.edit-modal-content {
  background: white;
  padding: 25px;
  border-radius: 10px;
  width: 90%;
  max-width: 500px;
}

table {
  width: 100%;
  border-collapse: collapse;
  background: white;
  margin-top: 20px;
}

th, td {
  padding: 10px;
  text-align: center;
  border: 1px solid #ddd;
}

th {
  background: #e6f4e6; /* disesuaikan dari abu-abu ke nuansa hijau muda */
  color: #398439; /* teks tabel header jadi lebih menonjol dan serasi */
}

img {
  border-radius: 6px;
}

.action-buttons button {
  margin-right: 5px;
  background: #6aaf08;
}

.action-buttons button:hover {
  background: #398439;
}
</style>

<div class="form-section">
  <h2>Tambah Jasa Baru</h2>
  <form method="post" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Jasa" required>
    <textarea name="deskripsi" placeholder="Deskripsi" rows="3"></textarea>
    <input type="number" name="harga" placeholder="Harga" required>
    <input type="file" name="foto" required>
    <button type="submit" name="tambah">Tambah</button>
  </form>
</div>

<hr>

<div class="table-section">
  <h2>Daftar Jasa Fotografi</h2>
  <table>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Foto</th>
      <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($jasa)) : ?>
    <tr>
      <td><?= $no++ ?></td>
      <td><?= $row['nama_jasa'] ?></td>
      <td><?= $row['deskripsi'] ?></td>
      <td>Rp<?= number_format($row['harga']) ?></td>
      <td><img src="galeri/<?= $row['foto'] ?>" width="80"></td>
      <td class="action-buttons">
        <button onclick="bukaEditModal(<?= $row['id'] ?>, '<?= addslashes($row['nama_jasa']) ?>', '<?= addslashes($row['deskripsi']) ?>', <?= $row['harga'] ?>)">Edit</button>
        <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus jasa ini?')" style="background:#dc3545;">Hapus</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</div>

<!-- Modal Edit -->
<div class="edit-modal" id="editModal">
  <div class="edit-modal-content">
    <h3>Edit Jasa</h3>
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" id="editId">
      <input type="text" name="nama" id="editNama" placeholder="Nama Jasa" required>
      <textarea name="deskripsi" id="editDeskripsi" placeholder="Deskripsi" rows="3"></textarea>
      <input type="number" name="harga" id="editHarga" placeholder="Harga" required>
      <input type="file" name="foto">
      <button type="submit" name="edit">Simpan</button>
      <button type="button" onclick="tutupModal()" style="background:#6c757d;">Batal</button>
    </form>
  </div>
</div>

<script>
function bukaEditModal(id, nama, deskripsi, harga) {
  document.getElementById('editId').value = id;
  document.getElementById('editNama').value = nama;
  document.getElementById('editDeskripsi').value = deskripsi;
  document.getElementById('editHarga').value = harga;
  document.getElementById('editModal').style.display = 'flex';
}

function tutupModal() {
  document.getElementById('editModal').style.display = 'none';
}
</script>

<?php include 'footer.php'; ?>
