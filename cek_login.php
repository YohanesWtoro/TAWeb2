<?php 

session_start();

include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
 

$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

 
if($cek > 0){
 
    $data = mysqli_fetch_assoc($login);
 
    if($data['level']=="admin"){
 
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        
        header("location:homeAdmin.php");

    }else if($data['level']=="kasir"){
        
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "kasir";
    
    header("location:homeKasir.php");
    }else{
 
        // alihkan ke halaman login kembali
        header("location:login.php?pesan=salah");
    }   
}else{
    header("location:login.php?pesan=salah");
}
 
?>