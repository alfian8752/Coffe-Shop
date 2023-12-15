<?php 
include('koneksi.php');
$id = $_GET['id'];

$hapus= mysqli_query($koneksi, "DELETE FROM komentar WHERE id='$id'");
// untuk menghapus data tabel pesanan_produk
mysqli_query($koneksi, "DELETE from komentar where id = $id");

if($hapus)
	header('location: komen.php');
else
	echo "Hapus data gagal";

 ?>