<?php
include('../../conf/koneksi.php');
$id_pemasukan = $_GET['id_pemasukan'];

$query = mysqli_query($koneksi,"DELETE FROM pemasukan WHERE id_pemasukan='$id_pemasukan'");
header('Location:../index.php?page=pm');
?>