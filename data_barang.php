<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Data Barang</title>
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
          <a class="dropdown-item" href="input_terima.php">Input Data Terima Barang</a>
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
      <form class="form-inline my-2 my-lg-0" action="data_barang.php" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Cari..." name="cari">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>&nbsp;
        <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Keluar</a>
      </form>
    </div>
  </nav>

  <h1 class="text-center">Data Barang</h1><br>
  <div><a href="Input_Barang.php" class="btn  btn-success ml-3">Tambah Barang</a></div>

      <table class="table table-bordered table-hover table-striped mt-2">   
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Stock</th>
          <th>Harga</th>
          <td colspan="3" align="center" ><b>Aksi</b></th>
        </tr>

            <?php
         include 'koneksi.php';
              if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $barang = mysqli_query($koneksi, "SELECT * from barang where nama_barang like '%".$cari."%'");       
              }else{
                $barang = mysqli_query($koneksi, "SELECT * from barang");  
              }
        $no=1;
        foreach ($barang as $brg){
       echo "<tr>
                <td>$no</td>
                <td>".$brg['nama_barang']."</td>
                <td>".$brg['stock']."</td>
                <td>Rp.".number_format($brg['harga'])."</td>
                <td align='right' width='20px'><a href='form_editbarang.php?id_barang=$brg[id_barang]' type='button' class='btn btn-primary'>Perbaharui</a></td>
                <td  width='20px'><a href='hapusbarang.php?id_barang=$brg[id_barang]' class='btn btn-danger' onclick='return confirm(`Apakah Yakin Akan Dihapus?`)'>Hapus</a></td>
                  </tr>";
                  $no++;
      }
      ?>
         </table>
<?php include 'footer.php' ?>      
      </body>
</html>