<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA TRANSAKSI
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=transaksi_tambah" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>TANGGAL PENJUALAN</th>
                  <th>TOTAL</th>
                  <th>NAMA PELANGGAN</th>
                  <th>KASIR</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $dt_transaksi = mysqli_query($koneksi, "SELECT * FROM penjualan
                  INNER JOIN user ON user.id_user = penjualan.id_user
                  INNER JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                  ");
                  $no = 1;
                  while ($transaksi = mysqli_fetch_array($dt_transaksi)) {
                  ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $transaksi['tgl_penjualan']; ?></td>
                    <td><?php echo "Rp. " . number_format($transaksi['total']) . " ,-"; ?></td>
                    <td><?php echo $transaksi['nm_pelanggan']; ?></td>
                    <td><?php echo $transaksi['nm_user']; ?></td>
                    <td>
                      <a href="index.php?page=transaksi_ubah&id_penjualan=<?= $transaksi['id_penjualan']; ?>" class="btn btn-xs btn-warning" role="button" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="index.php?page=transaksi_detail&id_penjualan=<?= $transaksi['id_penjualan']; ?>" class="btn btn-xs btn-success" role="button" title="Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="index.php?page=transaksi_hapus.php?id_penjualan=<?= $transaksi['id_penjualan']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
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