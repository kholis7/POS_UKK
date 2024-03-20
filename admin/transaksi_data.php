<?php
include "header.php";
?>
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
            <a href="transaksi_tambah.php" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>
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
                  <th>NAMA PELANGGAN</th>
                  <th>KASIR</th>
                  <th>TOTAL</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id_user = $_SESSION['id_user'];
                $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan
                  INNER JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan
                  INNER JOIN user ON user.id_user = penjualan.id_user
                  ");
                $no = 1;
                while ($penjualan = mysqli_fetch_array($dt_penjualan)) {
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $penjualan['tgl_penjualan']; ?></td>
                    <td><?php echo $penjualan['nm_pelanggan']; ?></td>
                    <td><?php echo $penjualan['nm_user']; ?></td>
                    <td><?php echo "Rp. " . number_format($penjualan['total']) . " ,-"; ?></td>
                    <td>
                      <a href="transaksi_invoice_cetak.php?id_penjualan=<?= $penjualan['id_penjualan']; ?>" target="_blank" class="btn btn-xs btn-warning" role="button" title="Invoice"><i class="fa fa-print"></i></a>
                      <a href="transaksi_detail?id_penjualan=<?= $penjualan['id_penjualan']; ?>" class="btn btn-xs btn-success" role="button" title="Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="transaksi_hapus.php?id_penjualan=<?= $penjualan['id_penjualan']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
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
<?php
include "footer.php";
?>