<?php
include('../../conf/koneksi.php');
$id_batas = $_GET['id_batas'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$query = mysqli_query($koneksi,"UPDATE batas anggaran SET periode='$periode',jumlah='$jumlah',deskripsi='$deskripsi' WHERE  id_batas='$id_batas'");
header('Location: ../index.php?page=bts');
?>