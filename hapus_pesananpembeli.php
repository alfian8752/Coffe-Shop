<?php 
include('koneksi.php');
$id = $_GET['id'];

$hapus= mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");
// untuk menghapus data tabel pesanan_produk
mysqli_query($koneksi, "DELETE from pemesanan_produk where id_pemesanan = $id");

if($hapus)
	header('location: pesanan.php');
else
	echo "Hapus data gagal";

 ?>