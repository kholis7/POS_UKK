<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      DATA BARANG / PRODUK
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Barang</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <a href="index.php?page=barang_tambah" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i>
              Tambah
            </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>NAMA BARANG</th>
                  <th>KATEGORI</th>
                  <th>HARGA</th>
                  <th>STOK</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $dt_produk = mysqli_query($koneksi, "SELECT * FROM produk
                  INNER JOIN kategori ON kategori.id_kategori = produk.id_kategori");
                  $no = 1;
                  while ($produk = mysqli_fetch_array($dt_produk)) {
                  ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $produk['nm_produk']; ?></td>
                    <td><?php echo $produk['nm_kategori']; ?></td>
                    <td><?php echo "Rp. " . number_format($produk['harga']) . " ,-"; ?></td>
                    <td><?php echo $produk['stok']; ?></td>
                    <td>
                      <a href="index.php?page=barang_ubah&id_produk=<?= $produk['id_produk']; ?>" class="btn btn-xs btn-warning" role="button" title="Edit Data"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="index.php?page=barang_detail&id_produk=<?= $produk['id_produk']; ?>" class="btn btn-xs btn-success" role="button" title="Detail"><i class="glyphicon glyphicon-eye-open"></i></a>
                      <a href="index.php?page=barang_hapus.php?id_produk=<?= $produk['id_produk']; ?>" class="btn btn-xs btn-danger" role="button" title="Hapus Data"><i class="glyphicon glyphicon-trash"></i></a>
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