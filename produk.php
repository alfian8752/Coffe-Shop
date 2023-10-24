<?php
include 'koneksi.php';
$produk = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesen Kopi</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/produk.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Pesen<span>Kopi</span>.</a>

        <div class="navbar-nav">
            <a href="#">Beranda</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="navbar-extra">
            <a id="search"><i data-feather="search"></i></a>
            <a id="shoping-cart"><i data-feather="shopping-cart"></i></a>
            <a id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <!-- <section class="hero" id="home">
        <main class="content">
            <h1>Awali Hari Dengan <span>Secangkir Kopi</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, ipsam!</p>
            <a href="#" class="cta">Beli Sekarang</a>
        </main>
    </section> -->
    <!-- Hero Section End -->



    <!-- Menu Section Start -->
    <seciton id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus fuga error rem beatae perferendis harum.</p>

        <div class="row">
            <?php foreach($produk as $item) : ?>
            <div class="menu-card">
                <img src="img/menu/<?= $item['gambar'] ?>" alt="es pisang ijo" class="menu-card-img">
                <h3 class="menu-card-title"><?= $item['judul'] ?></h3>
                <p class="menu-card-price">IDR <?= $item['harga'] ?>K</p>
            </div>
            <?php endforeach ?>
        </div>
    </seciton>
    <!-- Menu Section End -->

    <!-- Footer Start -->
    <footer>
        <div class="social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="links">
            <a href="#home">Beradnda</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="credit">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio voluptatibus beatae assumenda?</p>
        </div>
    </footer>
    <!-- Footer End -->
    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

    <!-- My JavaScript -->
    <script src="js/script.js"></script>
</body>

</html>