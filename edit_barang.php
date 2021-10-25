<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id_barang   	= $_POST['id_barang'];
$nama_barang    = $_POST['nama_barang'];
$stock          = $_POST['stock'];
$harga        	= $_POST['harga'];
// query SQL untuk insert data
$query="UPDATE barang SET nama_barang='$nama_barang',stock='$stock',harga='$harga' where id_barang='$id_barang'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_barang.php?proses=terupdate");
?>