<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Transaksi
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Transaksi</a></li>
      <li class="active">Tambah Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <form role="form" method="POST" action="transaksi_proses.php">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">
              <div class="form-group">
                <label for="tanggal">Tanggal </label>
                <input class="form-control" name="tanggal" id="tanggal" value="<?php echo date('d-m-Y') ?>" readonly>
              </div>

              <div class="form-group">
                <label for="nm_user">Data Kasir</label>
                <?php
                $dt_user = mysqli_query($koneksi, "SELECT * FROM user where role='Kasir'");
                while ($user = mysqli_fetch_array($dt_user)) {
                ?>
                  <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $user['id_user']; ?>">
                  <input type="text" class="form-control" id="nm_user" name="nm_user" value="<?php echo $user['nm_user']; ?>" readonly>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="pelanggan">Pilih Pelanggan</label>
                <select class="form-control" name="pelanggan" id="pelanggan">
                  <option value="">-- Pilih Plenggan</option>
                  <?php
                  $dt_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                  while ($pelanggan = mysqli_fetch_array($dt_pelanggan)) {
                  ?>
                    <option value="<?php echo $p['id_pelanggan']; ?>"><?php echo $pelanggan['nm_pelanggan']; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">
              <form method="POST" action="transaksi_proses.php">
                <div class="form-group">
                  <label for="id_penjualan">Nomor Transaksi</label>
                  <?php
                  $dt_penjualan = mysqli_query($koneksi, "SELECT max(id_penjualan) as id_penjualan FROM penjualan");
                  $penjualan = mysqli_fetch_array($dt_penjualan);
                  $kode_penjualan = $penjualan['id_penjualan'];
                  $urutan = (int) substr($kode_penjualan, -4, 4);
                  $urutan++;
                  $huruf = date('ymd');
                  $kodeBarang = $huruf . sprintf("%04s", $urutan);
                  ?>
                  <input type="text" value="<?php echo $kodeBarang; ?>" class="form-control" id="id_penjualan" name="id_penjualan" readonly>
                </div>
                <div class="form-group">
                  <label for="produk">Pilih Produk</label>
                  <select class="form-control" name="produk" id="produk">
                    <option value="">Silahkan Pilih Produk</option>
                    <?php
                    $dt_produk = mysqli_query($koneksi, "SELECT * FROM produk");
                    while ($produk = mysqli_fetch_array($dt_produk)) {
                    ?>
                      <option value="<?php echo $produk['id_produk']; ?>"><?php echo $produk['nm_produk']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Pembelian">
                </div>
                <button type="submit" class="btn btn-info pull-right" id="tombol-tambah">
                  Tambah
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-body">
              <div class="form-group">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA BARANG</th>
                      <th>QTY</th>
                      <th>SUB TOTAL</th>
                      <th>OPSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../config/koneksi.php";
                    $dt_jumlah = mysqli_query($koneksi, "SELECT *, SUM(jml_produk) as jumlah from detail_penjualan INNER JOIN produk ON produk.id_produk = detail_penjualan.id_produk  GROUP BY detail_penjualan.id_produk");
                    $no = 1;
                    while ($penjualan = mysqli_fetch_array($dt_jumlah)) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $penjualan['nm_produk']; ?></td>
                        <td><?php echo $penjualan['jumlah']; ?></td>
                        <?php
                        $id_produk = $penjualan['id_produk'];
                        $dt_sub_total = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan WHERE detail_penjualan.id_produk = '$id_produk' ");
                        while ($dt_total = mysqli_fetch_array($dt_sub_total)) { ?>
                        <?php
                          $sub_total = +$dt_total['sub_total'];
                        } ?>
                        <td><?php echo "Rp. " . number_format($sub_total) . " ,-"; ?></td>
                        <td>
                          <a href="transaksi_barang_hapus.php?id_produk=<?= $penjualan['id_produk']; ?>&id_penjualan=<?= $penjualan['id_penjualan']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <?php
                      include "../config/koneksi.php";
                      $sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan WHERE id_penjualan='2402020001'");
                      while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { ?>
                      <?php
                        $total = +$total_belanja['sub_total'];
                      } ?>
                      <td colspan="3">Total Belanja</td>
                      <td colspan="2"><strong><?php echo "Rp. " . number_format($total) . " ,-"; ?></strong></td>
                    </tr>
                  </tfoot>
                </table>
                <button type="submit" class="btn btn-success pull-right">
                  Simpan
                </button>
              </div>
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

<?php
include "footer.php";
?>