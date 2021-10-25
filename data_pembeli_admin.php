<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Pembayaran</title>
</head>
  <?php 
  session_start();
 
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }
 
  ?>
<body>
 <h1 class="text-center">Data Pembeli</h1>
  <div class="row justify-content-center">
    <div class="card mt-2" style="width: 60rem; height: 27rem;">
    <div class="card-body">
          <form method="post" action="bayar_admin.php">
        <div class="form-group">
          <label>Nama Pembeli</label>
          <input type="text" class="form-control"name="nama">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control"name="alamat">
        </div>
        <div class="form-group">
          <label>No Telepon</label>
          <input type="text" class="form-control"name="telepon">
        </div>
        <button type="submit" class="btn btn-success btn-block mt-4" name="submit">Input</button>
          <a href="cart_admin.php" class="btn btn-primary btn-block mt-2">Kembali Ke Keranjang Belanja</a>
      </form>  
      
    </div>
    </div>    



  </div>

  </body>
</html>