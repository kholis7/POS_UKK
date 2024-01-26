<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA SISWA
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=tambah_siswa" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
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
                      <a href="#">Edit</a>
                      <a href="#">Hapus</a>
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