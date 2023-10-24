<?php 
include 'koneksi.php';
 for ($i=1; $i <= 8; $i++) { 
    $produk = 'Produk ' . $i;
    $gambar = $i.'.jpg';
    $harga = $i;
    mysqli_query($conn, "INSERT INTO produk VALUES ('', '$gambar', '$produk', '$harga')");
 }