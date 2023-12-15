<?php
include("../../conf/koneksi.php");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil data dari tabel asal
$sqlSelect = "SELECT kategori, periode, jumlah, deskripsi FROM rencana_anggaran";
$result = $koneksi->query($sqlSelect);

// Periksa apakah query berhasil dijalankan
if ($result) {
    // Loop melalui hasil query dan masukkan data ke tabel tujuan
    while ($row = $result->fetch_assoc()) {
        $kategori = $row['kategori'];
        $periode = $row['periode'];
        $jumlah = $row['jumlah'];
        $deskripsi = $row['deskripsi'];

        // Query untuk menambahkan data ke tabel tujuan
        $sqlInsert = "INSERT INTO transaksi_keuangan (kategori, periode, jumlah, deskripsi) VALUES ('$kategori', '$periode', '$jumlah', '$deskripsi')";
        
        // Eksekusi query INSERT
        if ($koneksi->query($sqlInsert) === TRUE) {
            echo "Data berhasil ditambahkan ke tabel tujuan";
            header("Location: ../index.php?page=pn");
        } else {
            echo "Error: " . $sqlInsert . "<br>" . $koneksi->error;
        }
    }
} else {
    echo "Error: " . $sqlSelect . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>

