<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA KASIR
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Kasir</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=kasir_tambah" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA KASIR</th>
                  <th>USERNAME</th>
                  <th>ROLE</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $dt_user = mysqli_query($koneksi, "SELECT * FROM user");
                  $no = 1;
                  while ($user = mysqli_fetch_array($dt_user)) {
                  ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $user['nm_user']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                      <a href="index.php?page=user_ubah&id_user=<?= $user['id_user']; ?>" class="btn btn-xs btn-warning" role="button" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="index.php?page=user_detail&id_user=<?= $user['id_user']; ?>" class="btn btn-xs btn-success" role="button" title="Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="index.php?page=user_hapus.php?id_user=<?= $user['id_user']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
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