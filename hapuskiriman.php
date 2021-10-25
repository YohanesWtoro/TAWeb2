<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_kiriman   = $_GET['id_kiriman'];
// query SQL untuk insert data
$query="DELETE from kiriman_barang where id_kiriman='$id_kiriman'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_terima.php");
?>