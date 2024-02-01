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
                <label for="no_trans">Nomor Transaksi</label>
                <?php
                $dt_penjualan = mysqli_query($koneksi, "SELECT max(id_penjualan) as id_penjualan FROM detail_penjualan");
                $penjualan = mysqli_fetch_array($dt_penjualan);
                $kode_penjualan = $penjualan['id_penjualan'];
                $urutan = (int) substr($kode_penjualan, 3, 3);
                $urutan++;
                $huruf = date("dmy");
                $kodeBarang = $huruf . sprintf("%04s", $urutan);
                ?>
                <input type="text" value="<?php echo $kodeBarang; ?>" class="form-control" id="no_trans" name="no_trans">
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
        <div class="col-md-9">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- form start -->
            <div class="box-body">
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
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" readonly>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Pembelian">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-info pull-right">Tambah</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
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
                  <tr>
                    <?php
                    $dt_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    $no = 1;
                    while ($pelanggan = mysqli_fetch_array($dt_pelanggan)) {
                    ?>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php";
?>