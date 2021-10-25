<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$id_supplier  	= $_POST['id_supplier'];
$nama_supplier    = $_POST['nama_supplier'];
$alamat          = $_POST['alamat'];
$no_telepon        	= $_POST['no_telepon'];
// query SQL untuk insert data
$query="UPDATE supplier SET nama_supplier='$nama_supplier',alamat='$alamat',no_telepon='$no_telepon' where id_supplier='$id_supplier'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:data_supplier.php");
?>