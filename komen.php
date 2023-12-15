<?php 
    include('koneksi.php');
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }
?>

<!doctype html>
<html lang="en">
  <head>

  <link rel="icon" href="favicon.ico" type="image" />
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Halaman Komentara Pelanggan</title>
    
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">


    <script src="https://unpkg.com/feather-icons"></script>
    

    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

  <nav class="navbar">
        <a href="#" class="navbar-logo">Pesen<span>Kopi</span></a>
  

        <div class="navbar-nav">
            <a href="daftar_menu.php#menu">Menu</a>
        </div>

  
        <div class="navbar-nav">
            <a href="pesanan.php#pesanan">Pesanan</a>
    </div>
    
        <div class="navbar-nav">
            <a href="komen.php">Komentar</a>
    </div>

        <div class="navbar-nav">
            <a href="logout.php">Logout</a>
    </div>
</nav>
<br>
        
        <br>
        <br>




    <div class="container">
      <div class="judul-pesanan mt-5">
       
        <h3 class="text-center font-weight-bold">DATA KOMENTAR PELANGGAN</h3>
        
      </div>
      <table class="table table-bordered" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">Komentar</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php $nomor=1; ?>
          <?php 
            $ambil = mysqli_query($koneksi, 'SELECT * FROM komentar');
            $result = mysqli_fetch_all($ambil, MYSQLI_ASSOC);
          ?>
          <?php foreach($result as $result) : ?>

          <tr>
            <th scope="row" style='color: white'><?php echo $nomor; ?></th>
            <td style='color: white'><?php echo $result["nama"]; ?></td>
            <td style='color: white'><?php echo $result["komen"]; ?></td>
            <td>
              <a href="hapus_komen.php?id=<?php echo $result['id'] ?>" class="badge badge-danger">Hapus Data</a>
            </td>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
      
        </tbody>
      </table>

    </div>


  </body>
</html>