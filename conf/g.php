<?php
include 'koneksi.php';

// Ambil data dari tabel pemasukan
$queryPemasukan = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_pemasukan FROM pemasukan GROUP BY bulan";
$resultPemasukan = $koneksi->query($queryPemasukan);

// Ambil data dari tabel transaksi keuangan
$queryTransaksi = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_transaksi FROM transaksi_keuangan GROUP BY bulan";
$resultTransaksi = $koneksi->query($queryTransaksi);

// Ambil data dari tabel dana darurat
$queryDanaDarurat = "SELECT DATE_FORMAT(periode, '%Y-%m') as bulan, SUM(jumlah) as total_dana_darurat FROM dana_darurat GROUP BY bulan";
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

// Buat grafik menggunakan Chart.js
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

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode(array_keys($data)); ?>,
                datasets: [
                    {
                        label: 'Pemasukan',
                        data: <?php echo json_encode(array_column($data, 'pemasukan')); ?>,
                        borderColor: 'green',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Transaksi',
                        data: <?php echo json_encode(array_column($data, 'transaksi')); ?>,
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Dana Darurat',
                        data: <?php echo json_encode(array_column($data, 'dana_darurat')); ?>,
                        borderColor: 'red',
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
                        max: 100000000
                    }
                }
            }
        });
    </script>
</body>
</html>
