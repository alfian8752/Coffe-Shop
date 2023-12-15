<?php 
session_start();
include 'koneksi.php';
$id = $_GET["id_keranjang"];

mysqli_query($koneksi, "DELETE from keranjang where id = '$id'");
// unset($_SESSION["pesanan"][$id_menu]);


echo "<script>alert('Produk telah dihapus');</script>"; 
echo "<script>location= 'pesanan_pembeli.php'</script>";


?>