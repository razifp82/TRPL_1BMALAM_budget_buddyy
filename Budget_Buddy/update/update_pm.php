<?php
include('../../conf/koneksi.php');
$id_pemasukan = $_GET['id_pemasukan'];
$jenis_pemasukan = $_GET['jenis_pemasukan'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$query = mysqli_query($koneksi,"UPDATE pemasukan SET jenis_pemasukan='$jenis_pemasukan',periode='$periode',jumlah='$jumlah',deskripsi='$deskripsi' WHERE  id_pemasukan='$id_pemasukan'");
header('Location: ../index.php?page=pm');
?>