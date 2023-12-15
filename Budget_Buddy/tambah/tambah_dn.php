<?php
error_reporting(false);
session_start(); 
include('../../conf/koneksi.php');
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$deskripsi = $_GET['deskripsi'];
$jumlah = $_GET['jumlah'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"INSERT INTO dana_darurat (id_dana,id_user,kategori,periode,deskripsi,jumlah) VALUES ('','$id_user','$kategori','$periode','$deskripsi','$jumlah')");
header('Location: ../index.php?page=dn');
?>