<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Input Terima Barang</title>
</head>


  <?php 
  session_start();
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:login.php?pesan=gagal");
  }
 
  ?>
   <?php include 'navbarAdmin.php' ?>
<body >
  <div class="container-fluid">
  <h1 class="text-center">Form Input Data Terima Barang</h1>
  <div class="row justify-content-center">
    <div class="card mt-2" style="width: 55rem; height: 27rem; background-color: #eccb91;">
    <div class="card-body">
          <form method="post" action="tambah_terima.php">
          <div class="form-group">

      <?php 
      if(isset($_GET['proses'])){
        if($_GET['proses'] == "sukses"){
        echo "<div class='alert alert-success' align='center'>Data Berhasil Disimpan</div>";
        }else if($_GET['proses'] == "terupdate"){
         echo "<div class='alert alert-danger' align='center'>Data Berhasil Diubah</div>";
        }
      }
    ?>
              <label for="nama_barang">Nama Barang</label>
              <select name="id_barang" onchange="changeValuebarang(this.value)" class="form-control">
                <option value="">--Pilih Nama Barang--</option>
                <?php
                include 'koneksi.php';
                $resultbarang = mysqli_query($koneksi, "SELECT * FROM barang"); 
                $jsArraybarang = "var dtbarang = new Array();\n";       
                while ($row = mysqli_fetch_array($resultbarang)) 
                {   
                  echo '<option value="' . $row['id_barang'] . '">' . $row['nama_barang'] . '</option>';   
                  $jsArraybarang .= "dtbarang['" . $row['id_barang'] . "'] = {id_barang:'" . addslashes($row['id_barang'])."'};\n";   
                }     
                ?>
                </select>
                <input type="hidden" name="id_barang" id="IdBarang" readonly >
            </div>
            <div class="form-group">
              <label for="nama_barang">Nama Barang</label>
              <select name="id_supplier" onchange="changeValuesupplier(this.value)" class="form-control">
                <option value="">--Pilih Nama Barang--</option>
                <?php
                include 'koneksi.php';
                $resultsupplier = mysqli_query($koneksi, "SELECT * FROM supplier"); 
                $jsArraysupplier = "var dtsupplier = new Array();\n";       
                while ($row = mysqli_fetch_array($resultsupplier)) 
                {   
                  echo '<option value="' . $row['id_supplier'] . '">' . $row['nama_supplier'] . '</option>';   
                  $jsArraysupplier .= "dtsupplier['" . $row['id_supplier'] . "'] = {id_supplier:'" . addslashes($row['id_supplier'])."'};\n";   
                }     
                ?>
                </select>
                <input type="hidden" name="id_supplier" id="IdSupplier" readonly >
            </div>
        <div class="form-group">
          <label for="jumlah">jumlah</label>
          <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
        <button type="submit" class="btn btn-success btn-block mt-4" name="submit">Tambah Data</button>
      </form>        
    </div>
    </div>    
  </div>

  <script type="text/javascript">   
  <?php echo $jsArraybarang; ?> 
    function changeValuebarang(item){ 
    document.getElementById('IdBarang').value = dtbarang[item].id_barang;  
  };

    <?php echo $jsArraysupplier; ?> 
    function changeValuesupplier(item){ 
    document.getElementById('IdSupplier').value = dtsupplier[item].id_supplier;  
  };
  </script>


<?php include 'footer.php';?>
  </body>
</div>
</html>