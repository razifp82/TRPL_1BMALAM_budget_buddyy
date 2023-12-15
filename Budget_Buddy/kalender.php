<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- bootstrap cdn  -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- fullcalendar css  -->
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-4">
                    <div class="alert alert-info" role="alert">
                        <h4>Kalendar</h4>
                    </div>
                    <div class="card">
                        <form action="tambah/proses.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-label">Deskripsi</div>
                                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" cols="30"
                                        rows="2">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Periode</div>
                                    <input type="datetime-local" class="form-control" name="periode" id="periode">
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Jumlah</div>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                // Tambahkan data dari tabel pengingat ke sini
                <?php
                $id_user = $_SESSION['id_user'];
                    $koneksi = mysqli_connect('localhost', 'root', '', 'budget_buddy');
                    $data = mysqli_query($koneksi, "select * from pengingat where id_user='$id_user'");
                    while ($d = mysqli_fetch_array($data)) {
                        $periode = $d['periode']; // Ini adalah tanggal dari data pengingat
                ?>{
                        title: '<?php echo $d['deskripsi']; ?>',
                        start: '<?php echo $d['periode']; ?>',
                        color: 'green', // Sesuaikan dengan warna yang diinginkan
                        jumlah: '<?php echo $d['jumlah']; ?>'
                    },
                <?php } ?>
            ],
            selectOverlap: function (event) {
                return event.rendering === 'background';
            },
            eventClick: function (info) {
                // Menampilkan informasi lebih lanjut, Anda dapat menggantinya dengan modal atau tindakan lainnya
                alert('Deskripsi: ' + info.event.title + '\nPeriode: ' + info.event.start + '\nJumlah: ' + info.event.extendedProps.jumlah);
            }
        });

        calendar.render();
    });
</script>

        
    </body>
    
    </html>