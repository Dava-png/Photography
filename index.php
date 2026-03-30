<!-- 241080200013 Dava Rengga Andika Putra --->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Style/PBW.css">
    <title>F2P Photography</title>
</head>
<body>
    <header>
    <nav class="navbar">
        <div class="logo">F2P Photography</div>
        <ul class="nav-link">
            <li><a href="#" title="Home Website">Home</a></li>
            <li><a href="https://en.wikipedia.org/wiki/The_Beatles" title="About Website">About</a></li>
            <li><a href="Admin/gallery.php" title="Gallery Website">Gallery</a></li>
            <li><a href="mailto:dava.rengga@gmail.com" title="Customer Service">Contact</a></li>
            <li><a href="Admin/login.php" title="Login">Login</a></li>
        </ul>
    </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1><span class="line"></span>Photography</h1>
            <article>
                F2P Photography adalah sebuah website jual dan membeli foto modern yang dirancang 
                untuk menampilkan karya visual secara elegan, minimalis, dan profesional. <br>
                Website ini hadir dengan tampilan yang bagus serta minimalis, menampilkan gambar 
                besar beresolusi tinggi sebagai latar belakang untuk menciptakan kesan pertama 
                yang mendalam bagi pengunjung.
            </article>
            <a href="#" class="lmore" title="Learn more about this website">Learn more</a>
        </div>
    </section>

    <section class="buy-image-section" Id="formPembelian">
    <div class="buy-card">
        <?php
        $previewImg = "https://images.unsplash.com/photo-1500534623283-312aade485b7?w=800";
        $fotoId = 1;

        if (!empty($_GET['img'])) {
            $previewImg = $_GET['img'];
        }

        // ✅ FIX DI SINI (pakai id, bukan foto_id)
        if (!empty($_GET['Id']) && is_numeric($_GET['Id'])) {
            $fotoId = (int) $_GET['Id'];
        }
        ?>

        <img src="<?= htmlspecialchars($previewImg); ?>" class="preview-img">

        <h2>Beli Foto Ini</h2>
        <p class="desc">
            Foto resolusi tinggi dengan kualitas profesional. Cocok untuk poster,
            wallpaper, atau kebutuhan komersial lain.
        </p>

        <?php
        if (isset($_SESSION['status'])) {
            if ($_SESSION['status'] === 'success') {
                echo '<p style="color:green;">Pembelian berhasil! <br> Lanjutkan pembayaran di Email yang anda daftarkan.</p>';
            } elseif ($_SESSION['status'] === 'error') {
                echo '<p style="color:red;">Terjadi kesalahan, coba lagi.</p>';
            }
            unset($_SESSION['status']);
        }
        ?>

        <form action="proses-beli.php" method="POST">

            <input type="hidden" name="foto_id" value="<?= $fotoId; ?>">

            <label>Pilih Resolusi</label>
            <select name="Resolusi" required>
                <option value="small">(1280px) - Small</option>
                <option value="medium">(1920px) - Medium</option>
                <option value="large">(3840px) - Large</option>
                <option value="full">(7680px) - Full</option>
            </select>

            <label>Email</label>
            <input type="email" name="Email" placeholder="YourMail@gmail.com" required>

            <button type="submit" class="btn-buy">Beli Sekarang</button>

        </form>

    </div>
    </section>

    <section class="features-section">
        <h2 class="features-title">Kelebihan F2P Photography</h2>
        <ul class="hero-list">
            <li>- Harga yang terjangkau</li>
            <li>- Mengabadikan cerita dalam setiap foto</li>
            <li>- Menyajikan karya visual dengan sentuhan profesional</li>
        </ul>
    </section>

    <footer>
        <p class="copyright">&#x00A9; 2026 F2P Photography. Hak Cipta By OrangGanteng</p>
        <div class="logo-sosmed">
            <a href="https://www.instagram.com/windahbasudara" target="_blank">
                <img src="Logo-Instagram-Transparan.png" alt="Logo Instagram">
            </a>
            <a href="https://www.youtube.com/@WindahBasudara" target="_blank">
                <img src="1656503919white-youtube-logo.png" alt="Logo Yutub">
            </a>
        </div>
    </footer>

    <script src="script.js" defer></script>
</body>
</html>
