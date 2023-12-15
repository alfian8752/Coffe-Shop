<?php
include('koneksi.php');
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location: login.php");
}
// var_dump($_SESSION['login_user']);
$user = $_SESSION['login_user']['id_user'];
$result = mysqli_query($koneksi, "SELECT * FROM keranjang where user = '$user'");
// $listKeranjang = mysqli_fetch_assoc($result);
// var_dump($listKeranjang['id_menu']);
// echo mysqli_num_rows($result);
// if (mysqli_num_rows($result) <= 0) {

// echo "<script>location= 'pesanan_pembeli.php'</script>";
// echo '<h1 style="text-align: center;">Tidak ada item</h1>';
// }
?>

<!doctype html>
<html lang="en">

<head>

  <link rel="icon" href="favicon.ico" type="image" />
  <title>Pesen Kopi</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>

<body>
  <div class="container">
    <div class="judul-pesanan mt-5">

      <h3 class="text-center font-weight-bold">KERANJANG ANDA</h3>

    </div>
    <table class="table table-bordered" id="example">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Produk Pesanan</th>
          <th scope="col">Harga</th>
          <th scope="col">Jumlah</th>
          <th scope="col">Harga</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor = 1; ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($result as $keranjang) :
          // var_dump($keranjang);
          $id_menu = $keranjang['id_menu'];
          $ambil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_menu='$id_menu'");
          // $ambil1 = mysqli_query($koneksi, "SELECT * FROM user");
          $pecah = $ambil->fetch_assoc();
          // $pecah1 = $ambil1->fetch_assoc();
          $jumlah = $keranjang['jumlah'];
          $subharga = $pecah["harga"] * $jumlah;
        ?>


          <tr>
            <td><?php echo $nomor; ?></td>
            <!-- <td><?php echo $_SESSION["username"]; ?></td> -->
            <td><?= $_SESSION['login_user']['username'] ?></td>
            <td><?php echo $pecah["nama_menu"]; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
            <!-- <td><?php echo $jumlah; ?></td> -->
            <td>
              <form action="update_pesanan.php?id_keranjang=<?php echo $keranjang['id'] ?>" method="post">
                <input type="number" value="<?= $jumlah ?>" name="jumlah" min="1" style="max-width: 50px; text-align: center;">
              <button class="btn badge badge-primary">Perbarui</button>
              </form>
            </td>
            <td>Rp. <?php echo number_format($subharga); ?></td>
            <td>
              <a href="hapus_pesanan.php?id_keranjang=<?php echo $keranjang['id'] ?>" class="btn badge badge-danger">Hapus</a>
            </td>
          </tr>

          <?php $nomor++; ?>
          <?php $totalbelanja += $subharga; ?>
        <?php endforeach ?>

      </tbody>
      <tfoot>


        <tr>
          <th colspan="4">Total Belanja</th>
          <th colspan="2">Rp. <?php echo number_format($totalbelanja) ?></th>
        </tr>


      </tfoot>
    </table><br>
    <form method="POST" action="">
      <a href="produk.php" class="btn btn-primary btn-sm">Lihat Menu</a>
      <button class="btn btn-success btn-sm" name="konfirm">Konfirmasi Pesanan</button>
    </form>



    <div class="modal fade" id="konfirmasiPesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <form class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Pembayaran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Lanjut</button>
          </div>
        </div>
      </form>
    </div>

    <?php
    if (isset($_POST['konfirm'])) {
      $tanggal_pemesanan = date("Y-m-d");
      $id_user = $_SESSION['login_user']['id_user'];
      $user = mysqli_query($koneksi, "SELECT username from user where id_user = '$id_user'")->fetch_assoc();
      $username = $user['username'];
      // var_dump($username);
      $pesanan = mysqli_query($koneksi, "SELECT * FROM keranjang");

      $insert = mysqli_query($koneksi, "INSERT INTO pemesanan (id_user, nama_pemesan, tanggal_pemesanan, total_belanja) VALUES ('$id_user', '$username', '$tanggal_pemesanan', '$totalbelanja')");


      $id_terbaru = $koneksi->insert_id;

      foreach ($pesanan as $item) {
        $jumlah = $item['jumlah'];
        $id_menu = $item['id_menu'];
        $insert = mysqli_query($koneksi, "INSERT INTO pemesanan_produk (id_pemesanan, id_menu, jumlah) 
              VALUES ('$id_terbaru', '$id_menu', '$jumlah') ");
              $id_keranjang = $item['id'];
              if($insert) {
                mysqli_query($koneksi, "DELETE from keranjang where id = $id_keranjang");
              }
      }


      unset($_SESSION["pesanan"]);
      
      // header('location: pesanan_pembeli.php');

      //echo "<script>alert('Pemesanan Sukses!');

      echo "<script>alert('Pemesanan Sukses');</script>"; 
      echo "<script>location= 'produk.php'</script>";
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>