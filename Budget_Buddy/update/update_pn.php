<?php
include('../../conf/koneksi.php');
$id_transaksi = $_GET['id_transaksi'];
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$query = mysqli_query($koneksi,"UPDATE transaksi_keuangan SET kategori='$kategori',periode='$periode',jumlah='$jumlah',deskripsi='$deskripsi' WHERE id_transaksi='$id_transaksi'");
header('Location: ../index.php?page=pn');
?>