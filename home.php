<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: ../login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Toko Permai</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Slider
    ================================================== -->
<link href="css/owl.carousel.css" rel="stylesheet" media="screen">
<link href="css/owl.theme.css" rel="stylesheet" media="screen">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse"> 
        <span class="sr-only">Toggle navigation</span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand page-scroll" href="#page-top">Toko Permai</a>
    </div>
    
    <!-- Navigation links and dropdown -->
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">Home</a></li>
        <li><a href="#produk" class="page-scroll">Produk</a></li>
        <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
        <li><a href="#contact" class="page-scroll">Pesan</a></li>
        <!-- Dropdown Menu -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Menu <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="riwayat.php">Riwayat</a></li>
            <li><a href="profil.php">Profil</a></li>
          </ul>
        </li>

        <!-- Logout Icon -->
        <li>
          <a href="index.php" title="Logout">
            <i class="bi bi-box-arrow-right"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <!-- /.container-fluid --> 
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-offset-2 intro-text">
            <h1>Imajinari Bercahaya</h1>
            <p>Beri Kami Waktu Untuk Membuat Momen Mu Penuh Kenangan</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">Ayo Mulai</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- home -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
      <div class="about-text">
  <h2>Selamat Datang <span>Toko Permai</span></h2>
  <p>
    Adalah layanan penyewaan kamera, lensa, dan jasa fotografer yang menyediakan 
    berbagai perlengkapan fotografi dengan kualitas terbaik dan harga terjangkau. 
    Kami hadir untuk memenuhi kebutuhan dokumentasi momen penting Anda, baik untuk 
    keperluan pribadi, acara, maupun proyek profesional. Dengan sistem pemesanan 
    yang mudah dan pelayanan yang ramah, Toko Permai siap menjadi solusi terpercaya 
    bagi kebutuhan fotografi Anda.
  </p>
  <p>
    Penyewaan kamera, lensa, dan jasa fotografer terpercaya dengan pelayanan mudah 
    dan harga bersahabat – hanya di Toko Permai.
  </p>
  <a href="#produk" class="btn btn-custom btn-lg page-scroll">Mulai Pesan</a>
</div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="about-media"> <img src="img/about-1.jpg" alt=" "> </div>
        <div class="about-desc">
          <h3>Foto Wedding</h3>
          <p>Abadikan momen paling sakral dalam hidup Anda dengan sentuhan elegan dan penuh cinta. Kami menghadirkan dokumentasi pernikahan dengan gaya sinematik, romantis, dan natural agar setiap detik menjadi kenangan yang tak terlupakan.</p>
        </div>
      </div>
      <div class="col-xs-12 col-md-3">
        <div class="about-media"> <img src="img/about-2.jpg" alt=" "> </div>
        <div class="about-desc">
          <h3>Foto Komersil</h3>
          <p>Tampilkan produk, bisnis, atau brand Anda dengan visual yang kuat dan profesional. Layanan fotografi komersil kami siap mendongkrak citra bisnis Anda melalui konsep kreatif, pencahayaan optimal, dan hasil foto berkualitas tinggi.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- produk -->
<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Daftar Produk - Toko Permai</title>
  <style>
  /* Reset margin dan padding dasar */
  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f0f8f4, #d9ecd9); /* hijau muda */
    margin: 0;
    padding: 30px 20px;
    color: #2c3e50;
  }

  h2 {
    text-align: center;
    font-weight: 700;
    font-size: 2.6rem;
    color: #398439;
    margin-bottom: 0.2em;
    letter-spacing: 1.5px;
  }

  hr {
    width: 60px;
    height: 3px;
    background: #4cae4c;
    border: none;
    margin: 0 auto 15px auto;
    border-radius: 3px;
  }

  .section-title p {
    text-align: center;
    font-size: 1.15rem;
    color: #555;
    margin-bottom: 40px;
    font-style: italic;
    letter-spacing: 0.05em;
  }

  .produk-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 28px;
    max-width: 1200px;
    margin: 0 auto;
  }

  .produk-card {
    background: #fff;
    border-radius: 16px;
    width: 280px;
    padding: 18px 20px 30px;
    box-shadow: 0 6px 20px rgba(92, 184, 92, 0.15);
    transition: transform 0.25s ease, box-shadow 0.25s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .produk-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 28px rgba(92, 184, 92, 0.3);
  }

  .produk-card img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 18px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
  }

  .produk-card h3 {
    font-size: 1.5rem;
    color: #2c3e50;
    margin: 0 0 8px 0;
    text-align: center;
  }

  .produk-card p {
    font-size: 0.95rem;
    color: #657786;
    line-height: 1.4;
    margin: 6px 0;
    text-align: center;
    min-height: 10px;
    user-select: none;
  }

  .harga {
    font-weight: 700;
    color: #5cb85c;
    font-size: 1.25rem;
    margin-top: 6px;
  }

  .kategori {
    display: inline-block;
    margin-top: 10px;
    padding: 6px 14px;
    font-size: 0.85rem;
    background: #e9fbe7;
    color: #6aaf08;
    border-radius: 20px;
    font-weight: 600;
    letter-spacing: 0.05em;
    user-select: none;
  }

  .stok {
    margin-top: 10px;
    font-size: 0.9rem;
    font-weight: 600;
    color: #27ae60;
    user-select: none;
  }

  button {
    margin-top: 18px;
    padding: 10px 28px;
    background: #5cb85c;
    color: white;
    border: none;
    border-radius: 30px;
    font-weight: 700;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s ease;
    box-shadow: 0 5px 15px rgba(92, 184, 92, 0.4);
    user-select: none;
  }

  button:hover:not(:disabled) {
    background: #4cae4c;
    box-shadow: 0 8px 22px rgba(76, 174, 76, 0.6);
  }

  button:disabled {
    background: #bbb;
    cursor: not-allowed;
    box-shadow: none;
    color: #666;
  }

  /* Responsive */
  @media (max-width: 960px) {
    .produk-container {
      gap: 18px;
    }
    .produk-card {
      width: 90%;
      max-width: 320px;
    }
  }
</style>

</head>
<body>

  <div id="produk">
    <div class="container">
      <div class="section-title">
        <h2>Daftar Produk Toko Permai</h2>
        <hr>
        <p>Tentukan Kamu mau Sewa Kamera atau Lensa? Apa malah mau memesan Jasa?</p>
      </div>

      <div class="produk-container">
        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY kategori, nama_produk");
        while ($row = mysqli_fetch_assoc($query)) :
        ?>
          <div class="produk-card">
            <img src="admin/uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
            <h3><?= htmlspecialchars($row['nama_produk']) ?></h3>
            <p><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
            <p class="harga">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
            <span class="kategori"><?= ucfirst(htmlspecialchars($row['kategori'])) ?></span>
            <p class="stok">Stok: <?= (int)$row['stok'] ?></p>
            <?php if ($row['stok'] > 0): ?>
              <button onclick="isiFormPesanan('<?= addslashes(htmlspecialchars($row['nama_produk'])) ?>', <?= (int)$row['stok'] ?>)">Pesan Sekarang</button>
            <?php else: ?>
              <button disabled>Stok Habis</button>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  function isiFormPesanan(namaProduk, stok) {
    const contactSection = document.getElementById('contact');
    if (contactSection) {
      contactSection.scrollIntoView({ behavior: 'smooth' });
    }
  }
</script>


  <!-- Jasa -->
  <div id="portfolio" style="margin-top: 60px;">
    <div class="section-title text-center center">
      <h2>Project Gallery</h2>
      <hr>
      <p>Jasa Fotografer bisa kamu pilih sesuai dengan keperluan Kamu.</p>
    </div>

    <div style="display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px;">
      <?php
      $jasa = mysqli_query($conn, "SELECT * FROM jasa");
      while ($row = mysqli_fetch_assoc($jasa)) {
      ?>
        <div style="border: 1px solid #ccc; padding: 15px; width: 280px; background: #fff; border-radius: 10px;">
          <img src="admin/galeri/<?php echo $row['foto']; ?>" width="100%" height="180" style="object-fit: cover; border-radius: 5px;">
          <br><br>
          <strong><?php echo $row['nama_jasa']; ?></strong><br>
          <p><?php echo $row['deskripsi']; ?></p>
          <span style="color: green;">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></span>
          <a href="#contact" class="order-btn" onclick="isiJasa('<?php echo $row['nama_jasa']; ?>')">Pesan Sekarang</a>
        </div>
      <?php } ?>
    </div>
  </div>
  <style>
#contact {
  padding: 50px 20px;
  background: #fff;
}

.section-title {
  text-align: center;
  margin-bottom: 40px;
}

.section-title h2 {
  font-size: 32px;
  color: #398439; /* hijau tua */
}

.section-title p {
  color: #555;
}

.contact-info {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-bottom: 50px;
}

.contact-item {
  background: #e8f5e9; /* hijau muda */
  padding: 20px;
  border-radius: 10px;
  margin: 10px;
  width: 300px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.contact-form {
  max-width: 600px;
  margin: 0 auto;
  background: #ffffff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form input[type="date"],
.contact-form input[type="file"],
.contact-form select,
.contact-form textarea {
  width: 100%;
  padding: 12px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
}

.contact-form textarea {
  resize: vertical;
}

.submit {
  background: #4cae4c;
  color: white;
  border: none;
  cursor: pointer;
  padding: 14px;
  font-weight: bold;
  border-radius: 8px;
  transition: background 0.3s ease;
}

.submit:hover {
  background: #398439;
}

.bukti-preview {
  width: 100%;
  max-width: 300px;
  margin-top: 10px;
  border-radius: 8px;
  display: block;
}

.payment-info {
  background: #f1f8e9;
  padding: 15px;
  border-radius: 10px;
  margin-top: 20px;
  font-size: 14px;
  color: #333;
}

.logos img {
  max-height: 70px;
  margin: 35px;
}

.order-btn {
  display: inline-block;
  background: #5cb85c;
  color: #fff;
  padding: 10px 16px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: bold;
  transition: background 0.3s ease;
}

.order-btn:hover {
  background: #398439;
}

@media (max-width: 768px) {
  .contact-info {
    flex-direction: column;
    align-items: center;
  }

  .contact-item {
    width: 90%;
  }
}

html {
  scroll-behavior: smooth;
}
  </style>
</body>
<script>
  function isiJasa(namaJasa) {
    // Scroll otomatis (sudah dibantu anchor #contact)
    // Isi input nama_jasa di formulir
    document.getElementById("nama_jasa").value = namaJasa;
  }
</script>
</html>
  <!-- pemesanan -->
<section id="contact">
  <style>
 #contact {
  padding: 40px;
  background-color: #f9f9f9;
  font-family: Arial, sans-serif;
  color: #333;
}

.section-title {
  text-align: center;
  margin-bottom: 30px;
}

.section-title h2 {
  font-size: 32px;
  margin-bottom: 10px;
  color: #398439; /* hijau tua */
}

.section-title hr {
  width: 60px;
  border: 2px solid #398439; /* hijau tua */
  margin: 10px auto;
}

.contact-info {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.contact-item {
  flex: 1;
  min-width: 200px;
  margin: 10px;
  padding: 10px;
  background-color: #ffffff;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.contact-item h3 {
  margin-bottom: 10px;
  color: #4cae4c; /* hijau sedang */
}

form#formPemesanan {
  max-width: 600px;
  margin: 0 auto 40px;
  display: flex;
  flex-direction: column;
  gap: 15px;
}

form#formPemesanan input,
form#formPemesanan select,
form#formPemesanan textarea,
form#formPemesanan button {
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  width: 100%;
  box-sizing: border-box;
}

form#formPemesanan button {
  background-color: #5cb85c; /* hijau utama */
  color: white;
  border: none;
  cursor: pointer;
  transition: 0.3s;
}

form#formPemesanan button:hover {
  background-color: #398439; /* hijau lebih gelap */
}

select[name="jasa_id"] {
  max-width: 600px;
  margin: 0 auto 30px;
  display: block;
  padding: 10px;
}

.logos {
  display: flex;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
  margin-bottom: 20px;
}

.logos img {
  max-height: 60px;
  opacity: 0.8;
  transition: 0.3s;
}

.logos img:hover {
  opacity: 1;
  transform: scale(1.05);
}

.alert-info {
  max-width: 700px;
  margin: 0 auto;
  background-color: #eafaf1; /* hijau sangat muda */
  border-left: 6px solid #4cae4c; /* hijau medium */
  padding: 15px;
  border-radius: 8px;
  color: #2e7d32;
}

@media (max-width: 768px) {
  .contact-info {
    flex-direction: column;
    align-items: center;
  }
}
  </style>

  <div class="section-title">
    <h2>PESAN AJA</h2>
    <hr>
    <p>Silakan tentukan pilihanmu untuk sewa barang atau jasa fotografer.</p>
  </div>

  <!-- Informasi Kontak -->
  <div class="contact-info">
    <div class="contact-item">
      <h3>Alamat</h3>
      <p>RSS. Holindo, Baturaja</p>
      <p>Sumatra Selatan, 32112</p>
    </div>
    <div class="contact-item">
      <h3>Jam Kerja</h3>
      <p>Senin–Jum'at: 08:00–19:00</p>
      <p>Sabtu–Minggu: 10:30–23:00</p>
    </div>
    <div class="contact-item">
      <h3>Contact Info</h3>
      <p>Phone: +82 896-3009-4051</p>
      <p>Email: tokopermai@gmail.com</p>
    </div>
  </div>
<?php
// Ambil nama/email user dari session jika sudah login
$nama_user = $_SESSION['nama'] ?? '';
$email_user = $_SESSION['email'] ?? '';
?>

<h3 style="text-align: center;">Form Pemesanan Produk & Jasa</h3>
<form id="formPemesanan" action="proses_pemesanan.php" method="POST">
  <input type="text" name="name" placeholder="Nama Lengkap Anda" value="<?= $nama_user ?>" required>
  <input type="email" name="email" placeholder="Email Aktif" value="<?= $email_user ?>" required>
  <p><strong>Silakan centang layanan yang ingin Anda pesan:</strong></p>
  <label><input type="checkbox" id="sewa_produk" onchange="toggleProduk()"> Saya ingin menyewa produk</label><br>
  <label><input type="checkbox" id="sewa_jasa" onchange="toggleJasa()"> Saya ingin menyewa jasa fotografer</label><br><br>

  <!-- SEWA PRODUK -->
<div id="produk_section">
  <div class="form-group">
    <label for="produk_terpilih">Produk Terpilih</label>
    <input type="text" id="produk_terpilih" name="produk_terpilih" placeholder="Pilih produk dari katalog" readonly disabled>
  </div>
  <div class="form-group">
    <label for="jumlah">Jumlah Produk</label>
    <input type="number" id="jumlah" name="jumlah" min="1" value="1" disabled>
    <input type="hidden" id="maks_stok" name="maks_stok">
  </div>
</div>

<!-- SEWA FOTOGRAFER -->
<div id="jasa_section">
  <div class="form-group">
    <label for="jasa_id">Pilih Jasa Fotografer</label>
    <select name="jasa_id" id="jasa_id" disabled>
      <option value="">-- Pilih Jasa --</option>
      <?php
      $jasa = mysqli_query($conn, "SELECT * FROM jasa ORDER BY nama_jasa");
      while($j = mysqli_fetch_assoc($jasa)) {
        echo '<option value="'.$j['id'].'">'.$j['nama_jasa'].' - Rp'.number_format($j['harga'],0,',','.').'</option>';
      }
      ?>
    </select>
  </div>
</div>
    </select>
  </div>

  <br>

  <!-- DATA TAMBAHAN -->
  <label for="phone">Nomor HP</label>
  <input type="text" name="phone" placeholder="Nomor WhatsApp / Telepon" required>
  <label for="use_date">Tanggal Penggunaan</label>
  <input type="date" name="use_date" required>
  <label for="payment_method">Metode Pembayaran</label>
  <select name="payment_method" required>
    <option value="">-- Pilih Metode Pembayaran --</option>
    <option value="bayar-ditempat">Bayar Ditempat</option>
    <option value="transfer">Transfer</option>
    <option value="e-wallet">E-Wallet</option>
  </select>
  <label for="message">Catatan Tambahan</label>
  <textarea name="message" placeholder="Catatan tambahan seperti alamat, waktu, dll..."></textarea>
  <button type="submit">Kirim Pemesanan</button>
  <!-- CSS TERINTEGRASI -->
  <style>
form {
  max-width: 700px;
  margin: 30px auto;
  background: linear-gradient(145deg, #ffffff, #f0f0f0);
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

form h3 {
  font-size: 24px;
  color: #2c3e50;
  margin-bottom: 20px;
  border-bottom: 2px solid #28a745;
  padding-bottom: 10px;
}

form label {
  display: block;
  margin-top: 14px;
  font-weight: 600;
  color: #333;
}

form input[type="text"],
form input[type="email"],
form input[type="number"],
form input[type="date"],
form select,
form textarea {
  width: 100%;
  padding: 12px;
  margin-top: 6px;
  border: 1px solid #ccc;
  border-radius: 8px;
  transition: 0.3s;
}

form input:focus,
form select:focus,
form textarea:focus {
  border-color: #28a745;
  box-shadow: 0 0 5px rgba(40, 167, 69, 0.3);
  outline: none;
}

form button {
  margin-top: 25px;
  padding: 14px 30px;
  background: linear-gradient(to right, #28a745, #218838);
  color: white;
  font-size: 17px;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s ease;
}

form button:hover {
  background: linear-gradient(to right, #218838, #1e7e34);
}

.logos-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 25px;
  margin: 35px auto 0;
}

.logos-group img {
  width: 90px;
  height: 90px;
  object-fit: contain;
  filter: grayscale(100%);
  transition: transform 0.3s ease, filter 0.3s ease;
}

.logos-group img:hover {
  filter: grayscale(0%);
  transform: scale(1.05);
}

  </style>

</form>

<!-- SCRIPT JS -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.pilih-produk').forEach(function(tombol) {
      tombol.addEventListener('click', function() {
        const namaProduk = this.getAttribute('data-nama');
        const stokMaks = this.getAttribute('data-stok');
        // Set isi produk terpilih
        document.getElementById('produk_terpilih').value = namaProduk;
        document.getElementById('produk_terpilih').disabled = false;
        // Aktifkan jumlah dan atur maksimal stok
        const jumlahInput = document.getElementById('jumlah');
        jumlahInput.disabled = false;
        jumlahInput.max = stokMaks;
        // Simpan stok maksimum ke input tersembunyi
        document.getElementById('maks_stok').value = stokMaks;
      });
    });
  });
</script>
<script>
  function toggleProduk() {
    const isChecked = document.getElementById('sewa_produk').checked;
    document.getElementById('produk_terpilih').disabled = !isChecked;
    document.getElementById('jumlah').disabled = !isChecked;
  }

  function toggleJasa() {
    const isChecked = document.getElementById('sewa_jasa').checked;
    document.getElementById('jasa_id').disabled = !isChecked;
  }

  function isiFormPesanan(namaProduk, stok) {
    document.getElementById('produk_terpilih').value = namaProduk;
    document.getElementById('jumlah').max = stok;
    document.getElementById('maks_stok').value = stok;
  }
</script>
<!-- Logo Partner & Info Pembayaran -->
<div class="logos-group">
  <img src="img/logo1.png" alt="Logo 1">
  <img src="img/logo2.png" alt="Logo 2">
  <img src="img/logo3.png" alt="Logo 3">
</div>

<!-- Info Rekening & E-Wallet -->
<div class="payment-info">
  <h3>Metode Pembayaran</h3>
  <ul class="payment-list">
    <li>
      <img src="img/BCA.png" alt="Logo BCA">
      <span><strong>Bank BCA:</strong> 1234567890 a.n. Toko Permai</span>
    </li>
    <li>
      <img src="img/MANDIRI.png" alt="Logo Mandiri">
      <span><strong>Bank Mandiri:</strong> 9876543210 a.n. Toko Permai</span>
    </li>
    <li>
      <img src="img/BRI.png" alt="Logo BRI">
      <span><strong>Bank BRI:</strong> 1122334455 a.n. Toko Permai</span>
    </li>
    <li>
      <img src="img/BNI.png" alt="Logo BNI">
      <span><strong>Bank BNI:</strong> 5566778899 a.n. Toko Permai</span>
    </li>
    <li>
      <img src="img/DANA.png" alt="Logo DANA">
      <img src="img/GoPay.png" alt="Logo GoPay">
      <img src="img/OVO.png" alt="Logo OVO">
      <span><strong>E-Wallet:</strong> 0896-3009-4051 a.n. Toko Permai</span>
    </li>
  </ul>
</div>
<style>
  .payment-info {
    background-color: #f8f8f8;
    padding: 25px;
    margin-top: 30px;
    border-radius: 12px;
    box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
    text-align: left;
  }

  .payment-info h3 {
    margin-bottom: 15px;
    color: #2c3e50;
    font-size: 22px;
    border-bottom: 2px solid #ccc;
    padding-bottom: 10px;
  }

  .payment-info ul {
    list-style-type: none;
    padding-left: 0;
  }

  .payment-info ul li {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
    font-size: 16px;
    color: #333;
    background-color: #ffffff;
    border-radius: 8px;
    padding: 12px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.08);
  }

  .payment-info ul li img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .payment-info ul li img:hover {
    transform: scale(1.1);
  }

  .payment-info ul li strong {
    min-width: 150px;
    display: inline-block;
    color: #000;
  }
</style>

<div class="alert alert-info">
  <strong>Info:</strong> Setelah melakukan pembayaran, Anda akan menerima konfirmasi otomatis dan bukti transaksi. Proses cepat, tanpa ribet.
</div>


<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/owl.carousel.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
<!-- jQuery dan Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    $('.dropdown-toggle').dropdown();
  });
</script>
<script>
  function previewImage() {
    const input = document.getElementById("bukti");
    const preview = document.getElementById("preview");
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = "block";
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
</body>
</html>
<?php include 'footer.php'; ?>
