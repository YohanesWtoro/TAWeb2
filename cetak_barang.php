<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Laporan Barang</title>
</head>
    <body>
  <h1 class="text-center">Laporan Data Barang</h1><br>

      <table class="table table-bordered table-hover table-striped">   
        <tr>
          <th>No</th>
          <th>Id Barang</th>
          <th>Nama Barang</th>
          <th>Stock</th>
          <th>Harga</th>
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
                <td>".$brg['id_barang']."
                <td>".$brg['nama_barang']."</td>
                <td>".$brg['stock']."</td>
                <td>Rp.".number_format($brg['harga'])."</td>

                  </tr>";
                  $no++;
      }
      ?>
         </table>
</div>  
<script>
  window.print();
</script>     
      </body>
</html>