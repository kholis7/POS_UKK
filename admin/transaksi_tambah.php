<?php
include "header.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-transaksi"><i class="glyphicon glyphicon-plus"></i>
      Tambah
    </button>
    <section class="content">
      <div class="row">
        <form method="POST" action="transaksi_detail_proses.php">
          <div class="col-md-9">
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
                      $dt_penjualan = mysqli_query($koneksi, "SELECT max(id_penjualan) as id_penjualan FROM penjualan");
                      $penjualan = mysqli_fetch_array($dt_penjualan);
                      $kode_penjualan = $penjualan['id_penjualan'];
                      $urutan = (int) substr($kode_penjualan, -4, 4);
                      $urutan++;
                      $huruf = date('ymd');
                      $kodeBarang = $huruf . sprintf("%04s", $urutan);
                      $dt_jumlah = mysqli_query($koneksi, "SELECT *, SUM(jml_produk) as jumlah from detail_penjualan 
                    INNER JOIN produk ON produk.id_produk = detail_penjualan.id_produk
                    WHERE id_penjualan = '$kodeBarang'
                    GROUP BY detail_penjualan.id_produk
                    ");
                      $no = 1;
                      while ($penjualan = mysqli_fetch_array($dt_jumlah)) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $penjualan['nm_produk']; ?></td>
                          <td><?php echo $penjualan['jumlah']; ?></td>
                          <?php
                          $id_penjualan = $kodeBarang;
                          $id_produk = $penjualan['id_produk'];
                          $dt_sub_total = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan 
                        WHERE detail_penjualan.id_produk = '$id_produk' AND id_penjualan = '$id_penjualan'
                        ");
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
                        $id_penjualan = $kodeBarang;
                        $sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan 
                      WHERE id_penjualan='$id_penjualan'");
                        while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { ?>
                        <?php
                          $total = +$total_belanja['sub_total'];
                        } ?>
                        <td colspan="3">Total Belanja</td>
                        <td colspan="2"><strong><?php echo "Rp. " . number_format($total) . " ,-"; ?></strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form action="transaksi_proses.php" method="POST">
          <div class="col-md-3">
            <div class="box box-primary">
              <div class="box-body">
                <div class="form-group">
                  <input type="text" class="form-control" name="total" id="total" value="<?php echo $total; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal </label>
                  <input class="form-control" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d') ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="id_penjualan">Nomor Transaksi</label>
                  <input type="text" value="<?php echo $kodeBarang; ?>" class="form-control" id="id_penjualan" name="id_penjualan" readonly>
                </div>
                <div class="form-group">
                  <label for="nm_user">Data Kasir</label>
                  <?php
                  $id_user = $_SESSION['id_user'];
                  $dt_user = mysqli_query($koneksi, "SELECT * FROM user where id_user =$id_user");
                  while ($user = mysqli_fetch_array($dt_user)) {
                  ?>
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo $user['id_user']; ?>" readonly>
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
                      <option value="<?php echo $pelanggan['id_pelanggan']; ?>"><?php echo $pelanggan['nm_pelanggan']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-success pull-right">
                  Simpan
                </button>
              </div>
            </div>
          </div>
        </form>
    </section>
  </section>
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Transaksi-->
<div class="modal fade" id="tambah-transaksi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Pembelian</h4>
      </div>
      <form method="POST" action="transaksi_detail_proses.php">
        <div class="modal-body">
          <?php
          $dt_penjualan = mysqli_query($koneksi, "SELECT max(id_penjualan) as id_penjualan FROM penjualan");
          $penjualan = mysqli_fetch_array($dt_penjualan);
          $kode_penjualan = $penjualan['id_penjualan'];
          $urutan = (int) substr($kode_penjualan, -4, 4);
          $urutan++;
          $huruf = date('ymd');
          $kodeBarang = $huruf . sprintf("%04s", $urutan);
          ?>
          <div class="form-group">
            <label for="jumlah">Nomor Transaksi</label>
            <input type="number" class="form-control" id="id_penjualan" name="id_penjualan" value="<?php echo $kodeBarang; ?>" readonly>
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

<?php
include "footer.php";
?>