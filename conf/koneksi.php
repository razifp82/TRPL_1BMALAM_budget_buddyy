<?php
$koneksi = mysqli_connect('localhost','root','','budget_buddy');
// Koneksi
if(!$koneksi){
  die("Koneksi Gagal:". mysqli_connect_error());
}
else{
  // echo "Koneksi Berhasil";
}
?>