<?php
session_start();
include ('koneksi.php');
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM pengguna WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query)==1){
   header('Location:../Budget_Buddy/index.php?page=beranda');
   $user = mysqli_fetch_array($query);
   $_SESSION['id_user'] = $user['id_user'];
   $_SESSION['username'] = $user['username'];
   $_SESSION['level'] = $user['level'];
   }
else if($username == '' || $password== ''){
    header('Location:../index.php?error=2');
}
else{
    header('Location:../index.php?error=1');
}

?>