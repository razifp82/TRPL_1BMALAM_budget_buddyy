<?php
error_reporting(false);
session_start(); 
include('../../conf/koneksi.php');
$kategori = $_GET['kategori'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$status = $_GET['status'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"INSERT INTO rencana_anggaran (id_anggaran,id_user,kategori,periode,jumlah,deskripsi,status) VALUES ('','$id_user','$kategori','$periode','$jumlah','$deskripsi','$status')");
header('Location: ../index.php?page=rn');
?>