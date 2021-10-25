<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Pembayaran</title>
</head>
<?php 
session_start();
require 'koneksi.php';
require 'item.php';
//Simpan pesanan baru
$nama            = $_POST['nama'];
$alamat          = $_POST['alamat'];
$telepon      = $_POST['telepon'];
$query="INSERT INTO pembelian SET nama='$nama',alamat='$alamat',no_telepon='$telepon',
tanggal='".date('Y-m-d')."'";
mysqli_query($koneksi, $query);
$id_pembelian = mysqli_insert_id($koneksi); 
$cart = unserialize(serialize($_SESSION['cart'])); //Set $cart sebagai array, serialize () mengubah string menjadi array
for($i=0; $i<count($cart);$i++) {
$sql = 'INSERT INTO invoice (id_barang, id_pembelian, harga, stock) VALUES ('.$cart[$i]->id.', '.$id_pembelian.', '.$cart[$i]->price.', '.$cart[$i]->quantity.')';
mysqli_query($koneksi, $sql);
}
//Menghapus semua produk dalam keranjang
unset($_SESSION['cart']);
 ?>
 <center><a href="homeAdmin.php" class="btn btn-success mt-5">Kembali Ke Kasir</a></center>