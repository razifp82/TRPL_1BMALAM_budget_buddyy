<?php
include('../../conf/koneksi.php');
$id_batas = $_GET['id_batas'];

$query = mysqli_query($koneksi,"DELETE FROM batas_anggaran WHERE id_batas='$id_batas'");
header('Location:../index.php?page=bts');
?>