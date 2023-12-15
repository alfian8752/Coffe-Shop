<?php 
include 'koneksi.php';

$id_keranjang = $_GET['id_keranjang'];
$jumlah = $_POST['jumlah'];

mysqli_query($koneksi, "UPDATE keranjang set jumlah = $jumlah where id = $id_keranjang");

header("location: pesanan_pembeli.php");