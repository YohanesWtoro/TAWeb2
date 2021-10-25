<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Edit Data Barang</title>
</head>

  <?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }

    include 'koneksi.php';
  $id         = $_GET['id_barang'];
  $barang  = mysqli_query($koneksi, "select * from barang where id_barang='$id'");
  $brg        = mysqli_fetch_array($barang);
  ?>

<?php include 'navbarAdmin.php' ?>
<body>
  <h1 class="text-center">Form Edit Data Barang</h1>
  <div class="row justify-content-center">
    <div class="card mt-2" style="width: 70rem; height: 27rem; background-color: #eccb91;">
    <div class="card-body">
          <form method="post" action="edit_barang.php">
        <input type="hidden" value="<?php echo $brg['id_barang'];?>" name="id_barang">
        <div class="form-group">
          <label for="nama_barang1">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang1" name="nama_barang" value="<?php echo $brg['nama_barang'];?>">
        </div>
        <div class="form-group">
          <label for="stock1">Stock</label>
          <input type="text" class="form-control" id="stock1" name="stock" value="<?php echo $brg['stock'];?>">
        </div>
        <div class="form-group">
          <label for="harga1">Harga</label>
          <input type="text" class="form-control" id="harga1" name="harga" value="<?php echo $brg['harga'];?>">
        </div>
        <button type="submit" class="btn btn-success btn-block mt-4" name="submit">Ubah Data</button>
      </form>  
      
    </div>
    </div>    



  </div>



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</div>
</html>