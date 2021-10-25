<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Data Terima Barang</title>
</head>


      <?php 
      session_start();
     
      // cek apakah yang mengakses halaman ini sudah login
      if($_SESSION['level']==""){
        header("location:login.php?pesan=gagal");
      }
     
      ?>
    <body>

  <div style="text-align: center; background-color: #e39434; font-family: arial;"><h1>TOKO FURNITURE</h1></div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="homeKasir.php">Kasir</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Barang
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="data_barang_kasir.php">Data Barang</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Supplier
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="data_supplier_kasir.php">Data Supplier</a>
          <a class="dropdown-item" href="data_terima_kasir.php">Data terima Barang</a>
        </div>
      </li>
      </ul>
      <form action="data_terima_kasir.php" method="get" class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari..." name="cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>&nbsp;
        <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Keluar</a>
      </form>
    </div>
  </nav>

  <h1 class="text-center">Data Terima Barang</h1><br>

      <table class="table table-bordered table-hover table-striped mt-2">   
        <tr>
          <th>No</th>
          <th>Id Terima</th>
          <th>Nama Barang</th>
          <th>Nama Supplier</th>
          <th>Jumlah</th>
          <th>Tanggal</th>
        </tr>

            <?php
         include 'koneksi.php';
               if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $kirim = mysqli_query($koneksi, "SELECT * FROM kiriman_barang JOIN barang ON kiriman_barang.id_barang=barang.id_barang JOIN supplier ON kiriman_barang.id_supplier=supplier.id_supplier where nama_barang like '%".$cari."%' or nama_supplier like '%".$cari."%'");       
              }else{
                $kirim = mysqli_query($koneksi, "SELECT * FROM kiriman_barang JOIN barang ON kiriman_barang.id_barang=barang.id_barang JOIN supplier ON kiriman_barang.id_supplier=supplier.id_supplier");  
              }
        $no=1;
        foreach ($kirim as $krm){
       echo "<tr>
                <td>$no</td>
                <td>".$krm['id_kiriman']."</td>
                <td>".$krm['nama_barang']."</td>
                <td>".$krm['nama_supplier']."</td>
                <td>".$krm['jumlah']."</td>
                <td>".date('d-F-Y',strtotime($krm['tanggal']))."</td>
                  </tr>";
                  $no++;
      }
      ?>
         </table>
<?php include 'footer.php' ?>      
      </body>
</html>