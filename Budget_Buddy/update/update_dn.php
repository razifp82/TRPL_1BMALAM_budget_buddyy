<?php
include('../../conf/koneksi.php');
$id_dana = $_GET['id_dana'];
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$deskripsi = $_GET['deskripsi'];
$jumlah = $_GET['jumlah'];
$query = mysqli_query($koneksi,"UPDATE dana_darurat SET kategori='$kategori',periode='$periode',deskripsi='$deskripsi',jumlah='$jumlah' WHERE  id_dana='$id_dana'");
header('Location: ../index.php?page=dn');
?>