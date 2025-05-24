<?php
include 'header.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

// Tambah user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $query = "INSERT INTO users (email, password, role) VALUES ('$email', '$password', '$role')";
    mysqli_query($conn, $query);
    header("Location: user.php");
    exit();
}

// Hapus user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus'])) {
    $id = (int) $_POST['hapus'];
    mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    header("Location: user.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola User</title>
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
    background: #5cb85c; /* dari #007bff */
    border: none;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

.form-box button:hover {
    background: #4cae4c; /* dari #0056b3 */
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
}

table th, table td {
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    text-align: left;
}

table th {
    background: #398439; /* dari #007bff */
    color: white;
}
        table tr:hover {
            background: #f1f1f1;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-delete:hover {
            background: #c82333;
        }
        .note {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>

    <h2>👤 Kelola User</h2>

    <!-- Form Tambah User -->
    <div class="form-box">
        <h3>➕ Tambah User Baru</h3>
        <form method="POST">
            <input type="email" name="email" placeholder="Email pengguna" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="" disabled selected>Pilih Role</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Tambah User</button>
        </form>
    </div>

    <!-- Tabel Daftar User -->
    <table>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php
        $users = mysqli_query($conn, "SELECT * FROM users");
        $no = 1;
        while ($row = mysqli_fetch_assoc($users)) :
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= ucfirst($row['role']) ?></td>
            <td>
                <?php if ($_SESSION['email'] !== $row['email']) : ?>
                <form method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')" style="display:inline;">
                    <input type="hidden" name="hapus" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn-delete">🗑 Hapus</button>
                </form>
                <?php else : ?>
                    <span class="note">(Login Anda)</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

<?php include 'footer.php'; ?>
