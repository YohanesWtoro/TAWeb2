<?php
include 'koneksi.php';
// menyimpan data kedalam variabel
$nama_supplier            = $_POST['nama_supplier'];
$alamat          	    = $_POST['alamat'];
$no_telepon        			= $_POST['no_telepon'];
// query SQL untuk insert data
$query="INSERT INTO supplier SET nama_supplier='$nama_supplier',alamat='$alamat',no_telepon='$no_telepon'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:input_supplier.php?proses=sukses");
?>