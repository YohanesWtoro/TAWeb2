<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id_kiriman			  = $_POST['id_kiriman'];
$id_barang            = $_POST['id_barang'];
$id_supplier          = $_POST['id_supplier'];
$jumlah        		  = $_POST['jumlah'];
// query SQL untuk insert data
$query="UPDATE kiriman_barang SET id_barang='$id_barang',id_supplier='$id_supplier',jumlah='$jumlah',
tanggal='".date('Y-m-d')."' where id_kiriman='$id_kiriman'";

mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_terima.php");
?>