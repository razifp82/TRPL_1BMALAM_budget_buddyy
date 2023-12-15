<?php
include('../../conf/koneksi.php');
$id_anggaran = $_GET['id_anggaran'];
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$status = $_GET['status'];
$query = mysqli_query($koneksi,"UPDATE rencana_anggaran SET kategori='$kategori',periode='$periode',jumlah='$jumlah',deskripsi='$deskripsi',status='$status' WHERE  id_anggaran='$id_anggaran'");
header('Location: ../index.php?page=rn');
?>