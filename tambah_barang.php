<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nama_barang            = $_POST['nama_barang'];
$stock          	    = $_POST['stock'];
$harga        			= $_POST['harga'];
// query SQL untuk insert data
$query="INSERT INTO barang SET nama_barang='$nama_barang',stock='$stock',harga='$harga'";

mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:input_barang.php?proses=sukses");


?>