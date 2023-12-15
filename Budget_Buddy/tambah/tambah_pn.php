<?php
 error_reporting(false);
 session_start(); 
include('../../conf/koneksi.php');
$id_transaksi = $_GET['id_transaksi'];
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"INSERT INTO transaksi_keuangan (id_transaksi,id_user, kategori,periode,jumlah,deskripsi) VALUES ('','$id_user','$kategori','$periode','$jumlah','$deskripsi')");
header('Location: ../index.php?page=pn');
?>