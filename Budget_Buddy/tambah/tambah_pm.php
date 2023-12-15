<?php
error_reporting(false);
session_start(); 
include('../../conf/koneksi.php');
$jenis_pemasukan = $_GET['jenis_pemasukan'];
$periode = $_GET['periode'];
$jumlah = $_GET['jumlah'];
$deskripsi = $_GET['deskripsi'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi,"INSERT INTO pemasukan (id_pemasukan,id_user,jenis_pemasukan,periode,jumlah,deskripsi) VALUES ('','$id_user','$jenis_pemasukan','$periode','$jumlah','$deskripsi')");
header('Location: ../index.php?page=pm');
?>