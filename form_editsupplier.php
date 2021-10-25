<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Edit Data Supplier</title>
</head>

  <?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }

    include 'koneksi.php';
  $id         = $_GET['id_supplier'];
  $supplier  = mysqli_query($koneksi, "select * from supplier where id_supplier='$id'");
  $spr        = mysqli_fetch_array($supplier);
  ?>

<?php include 'navbarAdmin.php' ?>
<body>
  <h1 class="text-center">Form Edit Data Supplier</h1>
  <div class="row justify-content-center">
    <div class="card mt-2" style="width: 70rem; height: 27rem;  background-color: #eccb91;">
    <div class="card-body">
          <form method="post" action="edit_supplier.php">
        <input type="hidden" value="<?php echo $spr['id_supplier'];?>" name="id_supplier">
        <div class="form-group">
          <label for="nama_barang1">Nama Supplier</label>
          <input type="text" class="form-control" id="nama_barang1" name="nama_supplier" value="<?php echo $spr['nama_supplier'];?>">
        </div>
        <div class="form-group">
          <label for="stock1">Alamat</label>
          <input type="text" class="form-control" id="stock1" name="alamat" value="<?php echo $spr['alamat'];?>">
        </div>
        <div class="form-group">
          <label for="harga1">Nomer Telepn</label>
          <input type="text" class="form-control" id="harga1" name="no_telepon" value="<?php echo $spr['no_telepon'];?>">
        </div>
        <button type="submit" class="btn btn-success btn-block mt-4" name="submit">Ubah Data</button>
      </form>       
    </div>
    </div>    
  </div>
  </body>
  <?php include 'footer.php' ?>   
</div>
</html>