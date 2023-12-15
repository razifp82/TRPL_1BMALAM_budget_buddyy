<?php
include("../conf/koneksi.php");

// Pastikan bahwa $koneksi sudah didefinisikan sebelumnya
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk mendapatkan batas pengeluaran pengguna dari database
function getBatasPengeluaranPengguna($id_user, $periode) {
    global $koneksi;
    $query = "SELECT id_batas, jumlah FROM batas_anggaran WHERE id_user = $id_user AND tgl_set = '$periode'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error: " . mysqli_error($koneksi));
    }

    $row = mysqli_fetch_assoc($result);
    return $row ? [$row['id_batas'], $row['jumlah']] : [null, null];
}

// Fungsi untuk menghitung total pengeluaran bulanan
function hitungTotalPengeluaranBulanan($id_user, $periode) {
    global $koneksi;
    $query = "SELECT jumlah FROM transaksi_keuangan WHERE id_user = $id_user AND periode LIKE '$periode%'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Error: " . mysqli_error($koneksi));
    }

    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $total += $row['jumlah'];
    }
    return $total;
}

// ID pengguna (gantilah dengan cara mendapatkan ID pengguna dari sesi atau metode lainnya)
$id_user = 1;

// Bulan dan tahun saat ini (gantilah dengan metode yang sesuai)
$bulanSekarang = date('Y-m');

// Ambil batas pengeluaran bulanan dari database
list($id_batas, $batasPengeluaranBulanan) = getBatasPengeluaranPengguna($id_user, $bulanSekarang);

// Hitung total pengeluaran bulanan
$totalPengeluaranBulanan = hitungTotalPengeluaranBulanan($id_user, $bulanSekarang);

// Periksa apakah total pengeluaran bulanan melebihi batas
if ($totalPengeluaranBulanan > $batasPengeluaranBulanan) {
    echo "<script>alert('Pengeluaran bulanan melebihi batas!');</script>";
} else {
    echo "<script>alert('Pengeluaran bulanan masih dalam batas yang diizinkan.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Sertakan jQuery dari CDN jika dibutuhkan -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script>
        // Script JavaScript (jika dibutuhkan)
        // ...
    </script>
</head>
<body>
    <header>
        <h1></h1>
    </header>

    <main>
        <p></p>
    </main>

    <footer>
        <p></p>
    </footer>
</body>
</html>
