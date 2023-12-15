<?php
include('../../conf/koneksi.php');
$id_transaksi = $_GET['id_transaksi'];

$query = mysqli_query($koneksi,"DELETE FROM transaksi_keuangan WHERE id_transaksi='$id_transaksi'");
header('Location:../index.php?page=pn');
?>