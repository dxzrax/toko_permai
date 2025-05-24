<body>
  <div class="container">
    <!-- Konten halaman -->
  </div>

  <footer class="footer">
    <div class="footer-content">
      <div class="social-links">
        <a href="https://www.facebook.com/share/1KMfmmZwLL/" target="_blank" title="Facebook" class="social-icon facebook">
          <i class="fa fa-facebook"></i>
        </a>
        <a href="https://www.instagram.com/dxzrax" target="_blank" title="Instagram" class="social-icon instagram">
          <i class="fa fa-instagram"></i>
        </a>
        <a href="https://youtube.com/@dxzrax" target="_blank" title="YouTube" class="social-icon youtube">
          <i class="fa fa-youtube-play"></i>
        </a>
      </div>
      <small>Toko Permai - Penyewaan Kamera, Lensa, dan Jasa</small>
      <p><strong>SEPTEO RIANSYAH PUTRA</strong>2271020156</p>
      <small>Tugas Akhir Implementasi dan Evaluasi Sistem Informasi</small>
    </div>
  </footer>
</body>


<style>
  /* FOOTER CONTAINER */
  .footer {
  background: linear-gradient(135deg, #0d0d0d 0%, #1a1a1a 100%);
  color: #fff;
  padding: 25px 20px;
  text-align: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 15px;
  box-shadow: inset 0 0 15px #000000cc;
  border-top: 3px solid #6aaf08;
  margin-top: auto;
}

html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: column;
}

body > .container {
  flex: 1;
}


  .footer-content p {
    margin: 10px 0 5px;
    font-weight: 700;
    font-size: 17px;
    letter-spacing: 0.05em;
    text-shadow: 0 0 5px #6aaf08;
  }

  .footer-content small {
    display: block;
    font-size: 12px;
    opacity: 0.6;
    margin-top: 4px;
    font-style: italic;
  }

  /* SOCIAL LINKS CONTAINER */
  .social-links {
    margin-bottom: 15px;
  }

  /* SOCIAL ICONS BASE STYLE */
  .social-icon {
    display: inline-block;
    margin: 0 12px;
    color: #fff;
    font-size: 24px;
    line-height: 1;
    transition: all 0.3s ease;
    border-radius: 50%;
    width: 44px;
    height: 44px;
    padding: 10px;
    box-shadow: 0 0 8px #6aaf08;
  }

  /* COLORS PER PLATFORM */
  .social-icon.facebook:hover {
    background-color: #3b5998;
    box-shadow: 0 0 12px #3b5998cc;
    color: #fff;
    transform: scale(1.15) rotate(10deg);
  }

  .social-icon.instagram:hover {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    box-shadow: 0 0 12px #d6249fcc;
    color: #fff;
    transform: scale(1.15) rotate(-10deg);
  }

  .social-icon.youtube:hover {
    background-color: #ff0000;
    box-shadow: 0 0 14px #ff0000cc;
    color: #fff;
    transform: scale(1.15) rotate(5deg);
  }

  /* RESPONSIVE */
  @media (max-width: 576px) {
    .footer {
      font-size: 13px;
      padding: 18px 12px;
    }

    .footer-content p {
      font-size: 15px;
    }

    .social-icon {
      font-size: 20px;
      width: 38px;
      height: 38px;
      padding: 8px;
      margin: 0 8px;
    }
  }
</style>

<!-- Pastikan Font Awesome sudah ada -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</body>
</html>
