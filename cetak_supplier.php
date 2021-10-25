<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Laporan Supplier</title>
</head>
    <body>
  <h1 class="text-center">Laporan Data Supplier</h1><br>

      <table class="table table-bordered table-hover table-striped">   
        <tr>
          <th>No</th>
          <th>Nama Supplier</th>
          <th>Alamat</th>
          <th>No Telepon</th>
        </tr>

            <?php
         include 'koneksi.php';
              if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $supplier = mysqli_query($koneksi, "SELECT * from supplier where nama_supplier like '%".$cari."%' or alamat like '%".$cari."%'" );       
              }else{
                $supplier = mysqli_query($koneksi, "SELECT * from supplier");  
              }
        $no=1;
        foreach ($supplier as $spr){
       echo "<tr>
                <td>$no</td>
                <td>".$spr['nama_supplier']."</td>
                <td>".$spr['alamat']."</td>
                <td>".$spr['no_telepon']."</td>
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