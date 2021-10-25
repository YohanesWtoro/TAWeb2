<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Input Supplier</title>
</head>

  <?php 
  session_start();
  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }
 
  ?>
<?php include 'navbarAdmin.php' ?>
<body>
  <div class="container-fluid">
  <h1 class="text-center">Form Input Data Supplier</h1>
  <div class="row justify-content-center">
    <div class="card mt-2" style="width: 70rem; height: 27rem; background-color: #eccb91;">
    <div class="card-body">
          <form method="post" action="tambah_supplier.php">
        <div class="form-group">
        
        
    <?php 
      if(isset($_GET['proses'])){
        if($_GET['proses'] == "sukses"){
        echo "<div class='alert alert-success' align='center'>Data Berhasil Disimpan</div>";
        }else if($_GET['proses'] == "gagal"){
         echo "<div class='alert alert-danger' align='center'>Data Gagal Disimpan</div>";
        }
      }
    ?>

          <label for="nama_barang1">Nama Supplier</label>
          <input type="text" class="form-control" id="nama_barang1" name="nama_supplier">
        </div>
        <div class="form-group">
          <label for="stock1">Alamat</label>
          <input type="text" class="form-control" id="stock1" name="alamat">
        </div>
        <div class="form-group">
          <label for="harga1">No Telepon</label>
          <input type="text" class="form-control" id="harga1" name="no_telepon">
        </div>
        <button type="submit" class="btn btn-success btn-block mt-4" name="submit">Tambah Data</button>
      </form>        
    </div>
    </div>    
  </div>
  
<?php include 'footer.php'?>
  </body>
</div>
</html>