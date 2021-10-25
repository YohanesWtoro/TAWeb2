<?php
include 'koneksi.php';
// menyimpan data id kedalam variabel
$id_supplier   = $_GET['id_supplier'];
// query SQL untuk insert data
$query="DELETE from supplier where id_supplier='$id_supplier'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_supplier.php");
?>