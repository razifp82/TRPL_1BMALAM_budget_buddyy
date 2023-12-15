<?php
error_reporting(false);
session_start(); 
include ('koneksi.php');
$email = isset($_POST['email']) ? mysqli_real_escape_string($koneksi, $_POST['email']) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($koneksi, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($koneksi, $_POST['password']) : '';


$query = mysqli_query($koneksi, "INSERT INTO pengguna (email, username, password) VALUES ('$email', '$username', '$password')");
if(mysqli_affected_rows($koneksi)==1){
   header('Location:../index.php');
}
else if($email == '' && $username ==  '' && $password == ''){
    header('Location:../registrasi.php?error=2');
}
else{
    header('Location:../registrasi.php?error=1');
}

?>