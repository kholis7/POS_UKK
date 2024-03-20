<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA PELANGGAN
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Pelanggan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-pelanggan"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </button>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA PELANGGAN</th>
                  <th>ALAMAT</th>
                  <th>NO TELP</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $dt_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                  $no = 1;
                  while ($pelanggan = mysqli_fetch_array($dt_pelanggan)) {
                  ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $pelanggan['nm_pelanggan']; ?></td>
                    <td><?php echo $pelanggan['alamat']; ?></td>
                    <td><?php echo $pelanggan['no_telp']; ?></td>
                    <td>
                      <button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit-pelanggan<?php echo $pelanggan['id_pelanggan']; ?>"><i class="glyphicon glyphicon-edit"></i></button>
                      <!-- Modal Edit Pelanggan -->
                      <div class="modal fade" id="edit-pelanggan<?php echo $pelanggan['id_pelanggan']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Data Pelanggan</h4>
                            </div>
                            <form method="POST" action="pelanggan_update.php">
                              <div class="modal-body">
                                <div class="form-group">
                                  <label for="nm_pelanggan">Nama Pelanggan</label>
                                  <input type="hidden" class="form-control" id="nm_pelanggan" name="id_pelanggan" value="<?php echo $pelanggan['id_pelanggan']; ?>">
                                  <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan" value="<?php echo $pelanggan['nm_pelanggan']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="alamat">Alamat</label>
                                  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $pelanggan['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                  <label for="no_hp">No. HP</label>
                                  <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $pelanggan['no_telp']; ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-info pull-right">Update</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->

                      <a href="pelanggan_hapus.php?id_pelanggan=<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Pelanggan-->
<div class="modal fade" id="tambah-pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Pelanggan</h4>
      </div>
      <form method="POST" action="pelanggan_proses.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="nm_pelanggan">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nm_pelanggan" name="nm_pelanggan">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat">
          </div>
          <div class="form-group">
            <label for="no_hp">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info pull-right">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php
include "footer.php";
?>