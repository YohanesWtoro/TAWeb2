<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Keranjang Pembelian</title>
</head>
<body>

<?php 
// Mulai sesi
session_start();
require 'koneksi.php';
require 'item.php';

if(isset($_GET['id']) && !isset($_POST['update']))  { 
    $sql = "SELECT * FROM barang WHERE id_barang=".$_GET['id'];
    $result = mysqli_query($koneksi, $sql);
    $barang = mysqli_fetch_object($result); 
    $item = new Item();
    $item->id = $barang->id_barang;
    $item->name = $barang->nama_barang;
    $item->price = $barang->harga;
    $iteminstock = $barang->stock;
    $item->quantity = 1;
    //Periksa produk dalam keranjang
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart);$i++)
        if ($cart[$i]->id == $_GET['id']){
            $index = $i;
            break;
        }
        if($index == -1) 
            $_SESSION['cart'][] = $item; //$ _SESSION ['cart']: set $ cart sebagai variabel _session
        else {

            if (($cart[$index]->quantity) < $iteminstock)
                 $cart[$index]->quantity ++;
                 $_SESSION['cart'] = $cart;
        }
}
//Menghapus produk dalam keranjang
if(isset($_GET['index']) && !isset($_POST['update'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}
// Perbarui jumlah dalam keranjang
if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i];
  }
  $_SESSION['cart'] = $cart;
}
?>
<h3> Barang Dalam Keranjang Belanja </h3>
<form method="POST">
<table class="table table-hover">
  <thead class="thead-dark">
<tr>
    <th>Option</th>
    <th>Id Barang</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Jumlah</th>

    <th>Total</th>
</tr>
<?php 
     $cart = unserialize(serialize($_SESSION['cart']));
     $s = 0;
     $index = 0;
    for($i=0; $i<count($cart); $i++){
        $s += $cart[$i]->price * $cart[$i]->quantity;
 ?> 
   <tr>
        <td><a href="cart.php?index=<?php echo $index; ?>" onclick="return confirm('Apakah Yakin Akan Dihapus?')" class="btn btn-danger">Delete</a> </td>
        <td> <?php echo $cart[$i]->id; ?> </td>
        <td> <?php echo $cart[$i]->name; ?> </td>
        <td>Rp. <?php echo number_format($cart[$i]->price); ?> </td>
        <td> <input type="number" min="1" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]"> </td>  
        <td> Rp.<?php echo $cart[$i]->price * $cart[$i]->quantity; ?> </td> 
   </tr>
    <?php 
        $index++;
    } ?>
    <tr class="table-success">
        <td colspan="5" style="text-align:right;"> 
         <button class="btn btn-sm btn-warning">Ubah</button>
         <input type="hidden" name="update">
        </td>
        <td> Rp.<?php echo $s; ?> </td>
    </tr>
    <tr>
      <td colspan="6" style="text-align:right;"><a href="homeKasir.php" class="btn btn-success">Tambah Barang Lagi</a><a href="data_pembeli.php"class="btn btn-primary">Pembayaran</a></td>
    </tr>
</table>
</form>
<br>
<?php 
if(isset($_GET["id"]) || isset($_GET["index"])){
 header('Location: cart.php');
} 
?>
</body>
 </html>