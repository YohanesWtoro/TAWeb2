<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>HOME ADMIN</title>

</style>
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
      <a class="navbar-brand" href="homeAdmin.php">KASIR</a>
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
          <a class="dropdown-item" href="data_barang.php">Data Barang</a>
          <a class="dropdown-item" href="input_barang.php">Input Barang</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Supplier
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="data_supplier.php">Data Supplier</a>
          <a class="dropdown-item" href="input_supplier.php">Input Supplier</a>
          <a class="dropdown-item" href="data_terima.php">Data Terima Barang</a>
          <a class="dropdown-item" href="input_terima.php">Input Data Kiriman</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="laporan_transaksi.php">Laporan Transaksi</a>
          <a class="dropdown-item" href="laporan_barang.php">Laporan Barang</a>
          <a class="dropdown-item" href="laporan_supplier.php">Laporan Supplier</a>
          <a class="dropdown-item" href="laporan_terima.php">Laporan Terima Barang</a>
        </div>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="homeAdmin.php" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari..." name="cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>&nbsp;
        <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Keluar</a>
      </form>
    </div>
  </nav>

<h1 class="text-center">Kasir</h1><br>

    <table class="table table-bordered table-hover table-striped mt-2">   
      <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Stock</th>
        <th>Harga</th>
        <th>Aksi</th>
      </tr>

      <?php
      require 'koneksi.php';
        if(isset($_GET['cari'])){
          $cari = $_GET['cari'];
          $sql = mysqli_query($koneksi, "SELECT * from barang where nama_barang like '%".$cari."%'");       
          }else{
          $sql = mysqli_query($koneksi, "SELECT * from barang");  
          }     
       while ($barang = mysqli_fetch_object($sql)) 
        {?>
      <tr>
        <td> <?php echo $barang->id_barang; ?> </td>
        <td> <?php echo $barang->nama_barang; ?> </td>
        <td> <?php echo $barang->stock; ?> </td>
        <td> Rp.<?php echo number_format($barang->harga); ?> </td>
        <td> <a href="cart.php?id= <?php echo $barang->id_barang; ?> &action=add" class="btn btn-sm btn-success">Order Now</a> </td>
      </tr>
    <?php } ?>
    <tr>
      <td colspan="5" style="text-align:right;"><a href="cart_admin.php" class="btn btn-primary">Keranjang Belanja</a></td>
    </tr>
         </table>

 <?php include 'footer.php'?>
   </body>
</html>