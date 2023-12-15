<?php
session_start();
include ('koneksi.php');
$id_user = $_POST['id_user'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"UPDATE pengguna SET password='$password' WHERE id_user='$id_user'");
if(mysqli_affected_rows($koneksi)==1){
   header('Location:index.php');
   }
?>