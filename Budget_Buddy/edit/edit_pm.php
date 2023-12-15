<?php
$id_pemasukan = $_GET['id_pemasukan'];
$query        = mysqli_query($koneksi,"SELECT * FROM pemasukan WHERE id_pemasukan='$id_pemasukan'");
$view         = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pemasukan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='get' action='update/update_pm.php'>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Jenis</label>
                        <select class="custom-select" id="inputGroupSelect" name="jenis_pemasukan">
                      <option value="<?php echo $view['jenis_pemasukan'];?>" selected><?php echo $view['jenis_pemasukan'];?></option>
                      <option value="Gaji">Gaji</option>
                      <option value="Bonus">Bonus</option>
                      <option value="Hasil Usaha">Hasil Usaha</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Periode</label>
                        <input type="date" class="form-control" placeholder="Periode" name="periode" value="<?php echo $view['periode'];?>">
                        <input type="number" class="form-control" placeholder="id pemasukan" name="id_pemasukan" value="<?php echo $view['id_pemasukan'];?>" hidden>
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
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi" value="<?php echo isset($view['deskripsi'])? : ''; ?>"> 
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