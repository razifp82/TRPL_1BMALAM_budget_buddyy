<?php
error_reporting(false);
session_start(); 
 $id_user = $_SESSION['id_user'];
// Ambil data dari tabel pemasukan
$queryPemasukan = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_pemasukan FROM pemasukan WHERE id_user='$id_user' GROUP BY bulan ORDER BY bulan";
$resultPemasukan = $koneksi->query($queryPemasukan);

// Ambil data dari tabel transaksi keuangan
$queryTransaksi = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_transaksi FROM transaksi_keuangan WHERE id_user='$id_user' GROUP BY bulan ORDER BY bulan";
$resultTransaksi = $koneksi->query($queryTransaksi);

// Ambil data dari tabel dana darurat
$queryDanaDarurat = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_dana_darurat FROM dana_darurat WHERE id_user='$id_user' GROUP BY bulan ORDER BY bulan";
$resultDanaDarurat = $koneksi->query($queryDanaDarurat);

// Format data untuk Chart.js
$data = [];
while ($row = $resultPemasukan->fetch_assoc()) {
    $data[$row['bulan']]['pemasukan'] = $row['total_pemasukan'];
}

while ($row = $resultTransaksi->fetch_assoc()) {
    $data[$row['bulan']]['transaksi'] = $row['total_transaksi'];
}

while ($row = $resultDanaDarurat->fetch_assoc()) {
    $data[$row['bulan']]['dana_darurat'] = $row['total_dana_darurat'];
}

$totalsPerBulan = [];

foreach ($data as $bulan => $bulanData) {
    $totalsPerBulan[$bulan]['pemasukan'] = isset($bulanData['pemasukan']) ? $bulanData['pemasukan'] : 0;
    $totalsPerBulan[$bulan]['transaksi'] = isset($bulanData['transaksi']) ? $bulanData['transaksi'] : 0;
    $totalsPerBulan[$bulan]['dana_darurat'] = isset($bulanData['dana_darurat']) ? $bulanData['dana_darurat'] : 0;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Keuangan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

     <!-- Menampilkan total pemasukan, transaksi, dan dana darurat dalam tabel -->
     <br><center><table border="1">
        <tr>
            <th>Bulan</th>
            <th>Total Pemasukan</th>
            <th>Total Pengeluaran</th>
            <th>Total Dana Darurat</th>
        </tr>
        <?php foreach ($totalsPerBulan as $bulan => $totals): ?>
            <tr>
                <td><?php echo date('F', strtotime($bulan)); ?></td>
                <td><?php echo number_format($totals['pemasukan'], 2); ?></td>
                <td><?php echo number_format($totals['transaksi'], 2); ?></td>
                <td><?php echo number_format($totals['dana_darurat'], 2); ?></td>
            </tr>
        <?php endforeach; ?>
    </table></center></br>


    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_map(function($key) {
                    return date('F', strtotime($key));
                }, array_keys($data))); ?>,
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: <?php echo json_encode(array_values(array_map(function($key) use ($data) {
                            return isset($data[$key]['pemasukan']) ? $data[$key]['pemasukan'] : 0;
                        }, array_keys($data)))); ?>,
                        borderColor: 'green',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Pengeluaran',
                        data: <?php echo json_encode(array_values(array_map(function($key) use ($data) {
                            return isset($data[$key]['transaksi']) ? $data[$key]['transaksi'] : 0;
                        }, array_keys($data)))); ?>,
                        borderColor: 'red',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Dana Darurat',
                        data: <?php echo json_encode(array_values(array_map(function($key) use ($data) {
                            return isset($data[$key]['dana_darurat']) ? $data[$key]['dana_darurat'] : 0;
                        }, array_keys($data)))); ?>,
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        max: 50000000
                    }
                }
            }
        });
    </script>
</body>
</html>
