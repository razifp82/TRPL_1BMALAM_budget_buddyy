<?php
$id_dana = $_GET['id_dana'];
$query        = mysqli_query($koneksi,"SELECT * FROM dana_darurat WHERE id_dana='$id_dana'");
$view         = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Dana Darurat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='get' action='update/update_dn.php'>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kategori</label>
                        <select class="custom-select" id="inputGroupSelect" name="kategori">
                      <option value="<?php echo $view['kategori'];?>" selected><?php echo $view['kategori'];?></option>
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="Kesehatan">Kesehatan</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Periode</label>
                        <input type="date" class="form-control" placeholder="Periode" name="periode" value="<?php echo $view['periode'];?>">
                        <input type="number" class="form-control" placeholder="id_dana" name="id_dana" value="<?php echo $view['id_dana'];?>" hidden>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi" value="<?php echo isset($view['deskripsi'])? : ''; ?>"> 
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
                  <button type="submit" class="btn btn-sm btn-success">SIMPAN</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
</section>