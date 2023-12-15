<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
}

// Fetch user orders from the database

$id_user = $_SESSION['login_user']['id_user'];
// var_dump($id_user);
$history_result = mysqli_query($koneksi, "SELECT * FROM history WHERE id_user = '$id_user'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="favicon.ico" type="image" />
    <title>Riwayat Pemesanan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="judul-pesanan mt-5">
            <h3 class="text-center font-weight-bold">RIWAYAT PEMESANAN</h3>
        </div>

        <table class="table table-bordered" id="example">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Pemesanan</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Total Bayar</th>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php while ($history = mysqli_fetch_assoc($history_result)) : ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $history['id']; ?></td>
                        <td><?= $history['nama_pemesan']; ?></td>
                        <td><?= $history['tanggal_pemesanan']; ?></td>
                        <td>Rp. <?= number_format($history['total_belanja']); ?></td>
                        <td>
                            <a href="detail_riwayat.php?id=<?php echo $history['id'] ?>" class="badge badge-primary">Detail</a>
                            <a href="nota.php?id=<?php echo $history['id'] ?>" class="badge badge-primary">Cetak Nota</a>
                            <a href="hapus-riwayat.php?id=<?php echo $history['id'] ?>" class="badge badge-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="produk.php" class="btn btn-primary btn-sm">Lihat Menu</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"></script>
</body>

</html>