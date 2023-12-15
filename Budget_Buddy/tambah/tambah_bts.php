<?php
error_reporting(false);
session_start(); 
include('../../conf/koneksi.php');
$periode = $_POST['periode'];
$jumlah = $_POST['jumlah'];
$deskripsi = $_POST['deskripsi'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"INSERT INTO batas_anggaran (id_batas,id_user,periode,jumlah,deskripsi) VALUES ('','$id_user','$periode','$jumlah','$deskripsi')");
header('Location: ../index.php?page=bts');
?>