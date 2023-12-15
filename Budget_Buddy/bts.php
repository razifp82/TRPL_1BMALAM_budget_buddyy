<?php
error_reporting(false);
session_start(); 
include("../conf/koneksi.php");

//if (mysqli_connect_errno()) {
    //die("Koneksi database gagal: " . mysqli_connect_error());
//}

// Langkah 1: Hitung Total Pengeluaran
// Langkah 1: Hitung Total Pengeluaran
$jumlah = 0;
$periode = "tanggal_anda_di_sini"; // Ganti dengan tanggal sebenarnya
$batas_anggaran = 10000; // Ganti dengan nilai batas anggaran yang sesuai

$id_user = $_SESSION['id_user'];
// Langkah 1: Hitung Total Pengeluaran
$queryBatas = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM transaksi_keuangan WHERE periode = '$periode' AND id_user = '$id_user'");
// $queryBatas = mysqli_query($koneksi, "SELECT SUM(jumlah) as total FROM transaksi_keuangan");
$hasilPengeluaran = mysqli_fetch_assoc($queryBatas);

// Pastikan hasil query tidak null
if ($hasilPengeluaran['total'] !== null) {
    $jumlah = $hasilPengeluaran['total'];
}

// Langkah 2: Bandingkan dengan Batas Anggaran
if ($jumlah > $batas_anggaran) {
    echo "<script>alert('Jumlah sudah melebihi batas anggaran');</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>
<div class="col-12" id="accordion">
                <div class="card card-info card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="index.php?page=bts">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                BATAS ANGGARAN
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg">
                      SET BATAS
                    </button>
                  </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width='5%'>No</th>
                    <th width='20%'>Tanggal Setting</th>
                    <th width='30%'>Jumlah</th>
                    <th width='30%'>Deskripsi</th>
                    <th width='50%'>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    error_reporting(false);
                    session_start(); 
                    $no = 0;
                    $id_user = $_SESSION['id_user'];
                    $query = mysqli_query($koneksi,"SELECT * FROM batas_anggaran WHERE id_user='$id_user'");
                    while($bts = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='5%'><?php echo $no;?></td>
                    <td><?php echo $bts['periode'];?></td>
                    <td><?php echo $bts['jumlah'];?></td>
                    <td><?php echo $bts['deskripsi'];?></td>
                    <td><a onclick="hapus_bts('<?php echo $bts['id_batas']; ?>')" class="btn btn-sm btn-danger">HAPUS</a>
                      <a href="index.php?page=edit_bts&id_batas=<?php echo $bts['id_batas']; ?>"  class="btn btn-sm btn-success">EDIT</a>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">SET BATAS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="tambah/tambah_bts.php">
            <div class="modal-body">
              
            <div class="form-row">
              <div class="col">
                <input type="date" class="form-control" name="periode" placeholder="Tanggal Setting" required>
              </div>
              <div class="col">
                <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
              </div>
              <div class="col">
                <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
              </div>
            </div>
          
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Apakah Anda Yakin?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="tambah/tambah_bts.php">
            <div class="modal-body">
              
                <div class="form-row">
                  <div class="col">
                    <input type="date" class="form-control" placeholder="Tanggal Setting" name="periode" required>
                  </div>
                  <div class="col">
                    <input type="number" class="form-control" placeholder="Jumlah" name="jumlah">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Deskripsi" name="Deskripsi">
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="submit" class="btn btn-danger" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <script>
        function hapus_bts(bts_id){
         //alert('ok')
         //window.location=("delete/hapus_bts.php?id_batas="+bts_id);
         Swal.fire({
          title: "Apakah anda ingin menghapus perubahan?",
          //showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'HAPUS DATA',
          confirmButtonColor: 'red',
          //denyButoonText: 'Jangan Simpan',
         }).then((result) => {
         /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            window.location=("delete/hapus_bts.php?id_batas="+bts_id);
          }
         })
        }
    </script>
    