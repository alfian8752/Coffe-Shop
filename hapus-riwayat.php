<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}
$id_history = $_GET['id'];
mysqli_query($koneksi, "DELETE from history where id = $id_history");
mysqli_query($koneksi, "DELETE from detail_history where id_history = $id_history");

header('location: pesanan1.php');
