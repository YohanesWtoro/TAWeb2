<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_barang   = $_GET['id_barang'];
// query SQL untuk insert data
$query="DELETE from barang where id_barang='$id_barang'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_barang.php");
?>