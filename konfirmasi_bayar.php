<?php 
include('koneksi.php');
session_start();
  if(!isset($_SESSION['login_user'])) {
    header("location: login.php");
  }

  $id_pesanan = $_GET['id'];

  $pesanan = mysqli_query($koneksi, "SELECT * from pemesanan where id_pemesanan = $id_pesanan")->fetch_assoc();
  if($pesanan['status'] == 'belum dibayar') {
    mysqli_query($koneksi, "UPDATE pemesanan set status = 'sudah dibayar' where id_pemesanan = $id_pesanan");
    $detail = mysqli_query($koneksi, "SELECT * from pemesanan_produk where id_pemesanan = $id_pesanan");
    print_r($pesanan);
    echo "<br>";
  print_r($detail);
  
  $nama_pemesan = $pesanan['nama_pemesan'];
  $id_user = $pesanan['id_user'];
  $tanggal_pemesanan = $pesanan['tanggal_pemesanan'];
  $total_belanja = $pesanan['total_belanja'];
  $query = mysqli_query($koneksi, "INSERT into history values ('', '$nama_pemesan', '$id_user', '$tanggal_pemesanan', '$total_belanja')");
  $id_pemesanan = $koneksi->insert_id;
  
  foreach($detail as $item) {
    $id_menu = $item ['id_menu'];
    $jumlah = $item['jumlah'];
    mysqli_query($koneksi, "INSERT into detail_history values ('', '$id_pemesanan', '$id_menu', '$jumlah')");
  }
}
  header('location: pesanan.php');