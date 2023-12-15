<?php
$id_transaksi = $_GET['id_transaksi'];
$query        = mysqli_query($koneksi,"SELECT * FROM transaksi_keuangan WHERE id_transaksi='$id_transaksi'");
$view         = mysqli_fetch_array($query);
?>
<section class="content">
    <div class="container-fluid">
      <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pengeluaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method='get' action='update/update_pn.php'>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kategori</label>
                        <select class="custom-select" id="inputGroupSelect" name="kategori">
                      <option value="<?php echo $view['kategori'];?>" selected><?php echo $view['kategori'];?></option>
                      <option value="Makanan">Makanan</option>
                      <option value="Belanja">Belanja</option>
                      <option value="Hiburan">Hiburan</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Periode</label>
                        <input type="date" class="form-control" placeholder="Periode" name="periode" value="<?php echo $view['periode'];?>">
                        <input type="number" class="form-control" placeholder="id_transaksi" name="id_transaksi" value="<?php echo $view['id_transaksi'];?>" hidden>
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