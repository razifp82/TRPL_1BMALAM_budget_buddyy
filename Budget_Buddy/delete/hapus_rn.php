<?php
include('../../conf/koneksi.php');
$id_anggaran = $_GET['id_anggaran'];

$query = mysqli_query($koneksi,"DELETE FROM rencana_anggaran WHERE id_anggaran='$id_anggaran'");
header('Location:../index.php?page=rn');
?>