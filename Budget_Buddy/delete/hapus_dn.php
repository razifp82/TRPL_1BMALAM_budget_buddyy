<?php
include('../../conf/koneksi.php');
$id_dana = $_GET['id_dana'];

$query = mysqli_query($koneksi,"DELETE FROM dana_darurat WHERE id_dana='$id_dana'");
header('Location:../index.php?page=dn');
?>