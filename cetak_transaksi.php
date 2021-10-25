<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Laporan Transaksi</title>
</head>
  <h1 class="text-center">Laporan Transaksi Barang</h1><br>

      <table class="table table-bordered table-hover table-striped mt-2">   
        <tr>
          <th>No</th>
          <th>Id Pembelian</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Nama </th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <th>Tanggal</th>
        </tr>

            <?php
         include 'koneksi.php';
                $kirim = mysqli_query($koneksi, "SELECT * FROM invoice join pembelian on invoice.id_pembelian=pembelian.id_pembelian join barang on invoice.id_barang=barang.id_barang");               
        $no=1;
        foreach ($kirim as $krm){
       echo "<tr>
                <td>$no</td>
                <td>".$krm['id_pembelian']."</td>
                <td>".$krm['nama_barang']."</td>
                <td>Rp.".number_format($krm['harga'])."</td>
                <td>".$krm['stock']."</td>
                <td>".$krm['nama']."</td>
                <td>".$krm['alamat']."</td>
                <td>".$krm['no_telepon']."</td>
                <td>".date('d-F-Y',strtotime($krm['tanggal']))."</td>
                  </tr>";
                  $no++;
      }
      ?>
         </table>
         <script>
           window.print();
         </script>   
      </body>
</html>