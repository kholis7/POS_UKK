  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Jenis Pembayaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Tambah Jenis Pembayaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" method="POST" action="pages/pembayaran/jenis_tambah_proses.php">
        <div class="row">
          <div class="col-md-9">
            <!-- general form elements -->
            <div class="box box-primary">
              <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="pos">POS</label>
                  <select class="form-control" name="pos" id="pos">
                    <?php
                    $pos = mysqli_query($koneksi, "SELECT * FROM tb_pos");
                    while ($p = mysqli_fetch_array($pos)) {
                    ?>
                      <option value="<?php echo $p['id_pos']; ?>"><?php echo $p['nama_pos']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="periode">Tahun Ajaran</label>
                  <select class="form-control" name="periode" id="periode">
                    <?php
                    $periode = mysqli_query($koneksi, "SELECT * FROM tb_periode");
                    while ($pr = mysqli_fetch_array($periode)) {
                    ?>
                      <option value="<?php echo $pr['id_periode']; ?>"><?php echo $pr['periode_start'] . '/' . $pr['periode_end']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenis">TIPE</label>
                  <select class="form-control" name="jenis" id="jenis">
                    <option value="BEBAS">Bebas</option>
                    <option value="BULAN">Bulanan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-body">
                <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                <a class="btn btn-block btn-warning" href="index.php?page=jenis_pembayaran">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->