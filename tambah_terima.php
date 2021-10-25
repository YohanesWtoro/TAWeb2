<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id_barang            = $_POST['id_barang'];
$id_supplier          = $_POST['id_supplier'];
$jumlah        		  = $_POST['jumlah'];
// query SQL untuk insert data
$query="INSERT INTO kiriman_barang SET id_barang='$id_barang',id_supplier='$id_supplier',jumlah='$jumlah',tanggal='".date('Y-m-d')."'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:input_terima.php?proses=sukses");
?>