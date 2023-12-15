<?php
include('../../conf/koneksi.php');

    //mengambil data dari form input
    $deskripsi  = $_POST['deskripsi'];
    $periode      = $_POST['periode'];
    $jumlah    = $_POST['jumlah'];

    //insert data ke dalam database
    mysqli_query($koneksi, "insert into pengingat set deskripsi='$deskripsi', periode='$periode', jumlah='$jumlah' ");
    

    //kembali ke halaman index.php
    header("location: ../index.php?page=kalender");

?>