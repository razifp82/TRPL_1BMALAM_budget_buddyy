
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ATUR PEMASUKAN</h3>
              </div>
                <!-- /.card-header -->
                  <div class= "card-body">
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                      TAMBAH
                    </button>
                  </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width='3%'>No</th>
                    <th width='3%'>Jenis Pemasukan</th>
                    <th width='3%'>Periode</th>
                    <th width='3%'>Jumlah</th>
                    <th width='8%'>Deskripsi</th>
                    <th width='5%'>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                   error_reporting(false);
                   session_start(); 
                    $no = 0;

                    $id_user = $_SESSION['id_user'];
                    
                    $query = mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_user='$id_user'");
                    while($pm = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='3%'><?php echo $no;?></td>
                    <td><?php echo isset($pm['jenis_pemasukan']) ? $pm['jenis_pemasukan']:'';?></td>
                    <td><?php echo $pm['periode'];?></td>
                    <td><?php echo $pm['jumlah'];?></td>
                    <td><?php echo isset($pm['deskripsi']) ? $pm['deskripsi']:'';?></td>
                    <td><a onclick="hapus_pm('<?php echo $pm['id_pemasukan']; ?>')" class="btn btn-sm btn-danger">HAPUS</a>
                      <a href="index.php?page=edit_pm&id_pemasukan=<?php echo $pm['id_pemasukan']; ?>"  class="btn btn-sm btn-success">EDIT</a>
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
              <h4 class="modal-title">INPUT PEMASUKAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="tambah/tambah_pm.php">
            <div class="modal-body">
              
            <div class="form-row">
              <div class="col">
              <select class="custom-select" id="inputGroupSelect01" name="jenis_pemasukan" required>
                <option selected>Jenis</option>
                <option value="Gaji">Gaji</option>
                <option value="Bonus">Bonus</option>
                <option value="Hasil Usaha">Hasil usaha</option>
                <option value="Lain-lain">Lain-lain</Lain-lain></option>
              </select>
            </div>
              <div class="col">
                <input type="date" class="form-control" name="periode" placeholder="Periode" required>
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
              <h4 class="modal-title">Yakin ingin menambah?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="tambah/tambah_data.php">
            <div class="modal-body">
              
                <div class="form-row">
                <div class="col">
                    <select class="custom-select" id="inputGroupSelect" name="jenis" required>
                      <option selected>Pilih Jenis Pemasukan</option>
                      <option value="Gaji">Gaji</option>
                      <option value="Bonus">Bonus</option>
                      <option value="Hasil Usaha">Hasil Usaha</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>
                  </div>
                  <div class="col">
                    <input type="date" class="form-control" placeholder="Periode" name="periode" required>
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
        function hapus_pm(pm_id){
         //alert('ok')
         //window.location=("delete/hapus_pm.php?id_pemasukan="+pm_id);
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
            window.location=("delete/hapus_pm.php?id_pemasukan="+pm_id);
          }
         })
        }
    </script>
    
 