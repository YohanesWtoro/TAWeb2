<!doctype html>
<html lang="en">
  <head>
       <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Laporan Terima Barang</title>
</head>
  <h1 class="text-center">Laporan Data Terima Barang</h1><br>

      <table class="table table-bordered table-hover table-striped mt-2">   
        <tr>
          <th>No</th>
          <th>Id Kiriman</th>
          <th>Nama Barang</th>
          <th>Nama Supplier</th>
          <th>Jumlah</th>
          <th>Tanggal</th>
        </tr>

            <?php
         include 'koneksi.php';
                $kirim = mysqli_query($koneksi, "SELECT * FROM kiriman_barang JOIN barang ON kiriman_barang.id_barang=barang.id_barang JOIN supplier ON kiriman_barang.id_supplier=supplier.id_supplier");               
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
      }
      ?>

         </table>

  <script>
    window.print();
  </script>

      </body>
</html>