<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ATUR RENCANA</h3>
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
                    <th width='3%'>Kategori</th>
                    <th width='3%'>Periode</th>
                    <th width='3%'>Jumlah</th>
                    <th width='3%'>Deskripsi</th>
                    <th width='3%'>Status</th>
                    <th width='5%'>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    error_reporting(false);
                    session_start(); 
                    $no = 0;
                    $id_user = $_SESSION['id_user'];
                    $query = mysqli_query($koneksi,"SELECT * FROM rencana_anggaran WHERE id_user='$id_user'");
                    while($rn = mysqli_fetch_array($query)){
                      $no++
                    ?>
                  <tr>
                    <td width='3%'><?php echo $no; ?></td>
                    <td><?php echo $rn['kategori']; ?></td>
                    <td><?php echo $rn['periode']; ?></td>
                    <td><?php echo $rn['jumlah']; ?></td>
                    <td><?php echo isset($rn['deskripsi']) ? $rn['deskripsi'] : ''; ?></td>
                    <td>
                    <a href="update/update_status.php">BERJALAN</a>
                    <a href="#" >TERTUNDA</a>
</td>
<td>
  <a onclick="hapus_rn('<?php echo $rn['id_anggaran']; ?>')" class="btn btn-sm btn-danger">HAPUS</a>
  <a href="index.php?page=edit_rn&id_anggaran=<?php echo $rn['id_anggaran']; ?>" class="btn btn-sm btn-success">EDIT</a>
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
              <h4 class="modal-title">INPUT RENCANA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="get" action="tambah/tambah_rn.php">
            <div class="modal-body">
              
            <div class="form-row">
              <div class="col">
              <select class="custom-select" id="inputGroupSelect01" name="kategori" required>
                <option selected>Kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Belanja">Belanja</option>
                <option value="Hiburan">Hiburan</option>
                <option value="Lain-lain">Lain-lain</Lain-lain></option>
              </select>
            </div>
              <div class="col">
                <input type="date" class="form-control" name="periode" placeholder="Periode" required>
              </div>
              <div class="col">
                <input type="jumlah" class="form-control" name="jumlah" placeholder="Jumlah" required>
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
            <form method="get" action="tambah/tambah_rn.php">
            <div class="modal-body">
              <div class="form-row">
                <div class="col">
                <select class="custom-select" id="inputGroupSelect" name="kategori" required>
                <option>Kategori</option>
                <option value="Makanan">Makanan</option>
                <option value="Belanja">Belanja</option>
                <option value="Hiburan">Hiburan</option>
                <option value="Lain-lain">Lain-lain</option>
                </select>
              </div>
                  <div class="col">
                    <input type="date" class="form-control" placeholder="Periode" name="periode" required>
                  </div>
                  <div class="col">
                <input type="jumlah" class="form-control" name="jumlah" placeholder="Jumlah" required>
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
        function hapus_rn(rn_id){
         //alert('ok')
         //window.location=("delete/hapus_rn.php?id_anggaran="+rn_id);
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
            window.location=("delete/hapus_rn.php?id_anggaran="+rn_id);
          }
         })
        }
</script>

 