<!DOCTYPE html>
<html>
<head>
	<title>data barang</title>
</head>
<body>
<table border="1">
	<tr>
		  <th>No</th>
          <th>Nama Barang</th>
          <th>Stock</th>
          <th>Harga</th>
          <td colspan="2" align="center" ><b>Aksi</b></th>
	</tr>
		 <?php
         include 'koneksi.php';
                $barang = mysqli_query($koneksi, "SELECT * from barang");
	$no=1;
        foreach ($barang as $brg){
       echo "<tr>
                <td>$no</td>
                <td>".$brg['nama_barang']."</td>
                <td>".$brg['stock']."</td>
                <td>Rp.".number_format($brg['harga'])."</td>
                <td><a href='hapusbarang.php?id_barang=$brg[id_barang]'>hapus</a></td>
                <td><a href='e_barang.php?id_barang=$brg[id_barang]'>edit</a></td>
                  </tr>";
                  $no++;
      }
      ?>

</table>
<a href="t_barang.php">Input barang
</body>
</html>