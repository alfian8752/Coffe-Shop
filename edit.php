<?php 
include('koneksi.php');

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$harga = $_POST['harga'];
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = 'img/menu/';

// Cek apakah ada gambar yang diunggah
if ($nama_file != '') {
    // Mendapatkan informasi menu yang akan diubah
    $result = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
    $row = mysqli_fetch_assoc($result);
    $gambar_lama = $row['gambar'];

    // Hapus gambar lama jika ada
    if (file_exists($folder . $gambar_lama)) {
        unlink($folder . $gambar_lama);
    }

    // Pindahkan gambar yang baru diunggah ke folder
    move_uploaded_file($source, $folder . $nama_file);

    // Perbarui informasi menu beserta gambar baru di database
    $edit = mysqli_query($koneksi, "UPDATE produk SET nama_menu='$nama_menu', harga='$harga', gambar='$nama_file' WHERE id_menu='$id_menu'");
} else {
    // Jika tidak ada gambar yang diunggah, hanya perbarui informasi menu tanpa mengubah gambar
    $edit = mysqli_query($koneksi, "UPDATE produk SET nama_menu='$nama_menu', harga='$harga' WHERE id_menu='$id_menu'");
}

if ($edit) {
    header('location: daftar_menu.php');
} else {
    echo "Edit Menu Gagal";
}
?>
