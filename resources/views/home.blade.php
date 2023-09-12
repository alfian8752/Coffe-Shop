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
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="shoping-cart"><i data-feather="shopping-cart"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Awali Hari Dengan <span>Secangkir Kopi</span></h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nulla, ipsam!</p>
            <a href="#" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Memilih Kopi Kami</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima enim suscipit officiis adipisci harum vero!</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum, consectetur!</p>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Menu Section Start -->
    <seciton id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus fuga error rem beatae perferendis harum.</p>

        <div class="row">
        @foreach ($products as $product)
            <div class="menu-card">
                <img src="img/menu/{{ $product->gambar }}" alt="es pisang ijo" class="menu-card-img">
                <h3 class="menu-card-title">{{ $product->nama }}</h3>
                <p class="menu-card-price">IDR {{ $product->harga }}</p>
            </div>
            @endforeach
        </div>
    </seciton>
    <!-- Menu Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus fuga error rem beatae perferendis harum.</p>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7899.272629385999!2d112.57951484069783!3d-8.138456317566057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e789fbca36ae481%3A0xfbcc208e1777df19!2sSMK%20Negeri%201%20Kepanjen!5e0!3m2!1sid!2sid!4v1694240634094!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <!-- Contact Section End -->

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
