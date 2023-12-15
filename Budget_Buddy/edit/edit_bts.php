<?php
$id_batas = $_GET['id_batas'];
$query        = mysqli_query($koneksi,"SELECT * FROM batas_anggaran WHERE id_batas='$id_batas'");
$view         = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Batas Anggaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='get' action='update/update_bts.php'>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Setting</label>
                        <input type="date" class="form-control" placeholder="Tanggal_Setting" name="periode" value="<?php echo $view['periode'];?>">
                        <input type="number" class="form-control" placeholder="id_batas" name="id_batas" value="<?php echo $view['id_batas'];?>" hidden>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" rows="3" placeholder="Jumlah" name="jumlah" value="<?php echo $view['jumlah'];?>">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi" value="<?php echo $view['deskripsi'];?>">
                        </div>
                    </div>
                    </div>
                  <button type="submit" class="btn btn-sm btn-success">SIMPAN</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</section>