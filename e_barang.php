<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	include 'koneksi.php';
  $id         = $_GET['id_barang'];
  $barang  = mysqli_query($koneksi, "select * from barang where id_barang='$id'");
  $brg        = mysqli_fetch_array($barang);
  ?>
	<form action="proses_tambah.php" method="post">
		<TABLE>
			<tr>
				<td>kode barang</td>
				<td><input type="text" name="kode" value="<?php echo $brg['id_barang'];?>"></td>
			</tr>
			<tr>
				<td>nama barang</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>harga</td>
				<td><input type="text" name="harga"></td>
			</tr>
			<tr>
				<td>stock</td>
				<td><input type="text" name="stock"></td>
			</tr>
			<TR>
				<td></td>
				<td colspan="2"><button>SImpan</button>&nbsp;<a href="barang.php">kembali</a></td>
			</TR>
		</TABLE>
	</form>

</body>
</html>