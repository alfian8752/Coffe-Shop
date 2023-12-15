<?php 
include('koneksi.php');

// Mendapatkan data produk berdasarkan id_menu
if (isset($_GET['id_menu'])) {
    $id_menu = $_GET['id_menu'];

    $query_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu = $id_menu");
    $row_produk = mysqli_fetch_assoc($query_produk);

    // Memeriksa apakah data produk ditemukan
    if ($row_produk) {
        $gambar_produk = $row_produk['gambar'];
        $nama_menu = $row_produk['nama_menu'];
        $harga_menu = $row_produk['harga'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .about {
            display: flex;
            align-items: center;
            justify-content: center; /* Mengatur gambar dan konten ke tengah */
            margin-bottom: 20px; /* Memberi jarak bawah */
        }

        .about img {
            max-width: 30%;
            margin-right: 20px; /* Memberi jarak kanan */
            border-radius: 5px; /* Membuat sudut gambar agak melengkung */
        }

        .content {
            flex: 1;
            max-width: 50%; /* Mengatur lebar konten */
        }

        .detail-title {
            text-align: center;
            margin-bottom: 20px; 
            font-size: 2.6rem;
            color: var(--primary);
        }

        .content-text {
            margin-top: 10px; /* Menambahkan jarak atas pada teks detail */
        }
    </style>
</head>
<body>
    <nav class = "navbar">
    <h2 style="color: white; text-align: center; font-size: 2.6rem; margin:auto;"><span class="detail-title">Detail</span> Produk</h2>
    </nav>
    <div class="about">
        <img src="img/menu/<?php echo $gambar_produk; ?>" alt="Gambar Produk" />
        <div class="content">
            <h3><?php echo $nama_menu; ?></h3>
            <p>Rp. <?php echo $harga_menu; ?></p>
                   
            <p>Deskripsi</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab animi doloribus quis ipsum facere dolores enim dignissimos maiores assumenda excepturi ullam tempore illum, praesentium sint laboriosam pariatur rerum? Sint reiciendis numquam, voluptatibus optio fugiat porro corrupti deserunt. Reiciendis quia ea, quaerat aliquid saepe illum magnam maiores fuga consequuntur. Voluptates, impedit tenetur, aliquam quod blanditiis quos dignissimos reiciendis sint animi beatae numquam quibusdam repellendus. Eveniet molestiae, mollitia cumque animi rem tempore tenetur adipisci. Explicabo illo iusto fugiat dolorum. Veritatis repellendus nesciunt tenetur.</p>
            <br><p>
                <a href="beli.php?id_menu=<?= $id_menu ?>"><button type="button" style="background-color: #b6895b; border-radius: 0.2rem; padding: 0.3rem 1rem; color: white;">Pesan</button></a>
                <a href="produk.php"><button type="button" style="background-color: #b6895b; border-radius: 0.2rem; padding: 0.3rem 1rem; color: white;">Menu lainnya</button></a>
            </p>
        </div>
    </div>
    
</body>
</html>
