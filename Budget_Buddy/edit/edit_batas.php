<?php
include("../../conf/koneksi.php");

// Ambil ID batas anggaran dari parameter URL
$id_batas = $_GET['id'];

// Ambil data batas anggaran berdasarkan ID
$query = "SELECT * FROM batas_anggaran WHERE id_batas = $id_batas";
$result = mysqli_query($koneksi, $query);
$batasAnggaran = mysqli_fetch_assoc($result);

// Proses form penyuntingan batas anggaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $periode = $_POST['periode'];
    $jumlah = $_POST['jumlah'];

    // Update data batas anggaran
    $queryUpdate = "UPDATE batas_anggaran SET periode = '$periode', jumlah = $jumlah WHERE id_batas = $id_batas";
    mysqli_query($koneksi, $queryUpdate);

    // Redirect kembali ke halaman menu
    header("Location: menu_batas.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Batas Anggaran</title>
</head>
<body>

<h1>Edit Batas Anggaran</h1>

<form action="" method="post">
    <label for="periode">Periode:</label>
    <input type="text" name="periode" id="periode" value="<?php echo $batasAnggaran['periode']; ?>">

    <label for="jumlah">Jumlah:</label>
    <input type="text" name="jumlah" id="jumlah" value="<?php echo $batasAnggaran['jumlah']; ?>">

    <button type="submit">Simpan</button>
</form>

</body>
</html>
