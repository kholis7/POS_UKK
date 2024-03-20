<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Transaksi || Aplikasi Kasir</title>
  <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>
  <?php
  include "../config/koneksi.php";

  session_start();
  // Membuat sebuah kondisi untuk melakukan pengecekan
  // apakah yang mengakses halaman ini sudah login atau belum
  if ($_SESSION['role'] == "") {
    header("location:../index.php");
  }
  ?>
  <div class="container">
    <?php
    $id_penjualan = $_GET['id_penjualan'];
    $dt_penjualan = mysqli_query($koneksi, "SELECT * FROM penjualan INNER JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan where id_penjualan='$id_penjualan'");
    while ($p = mysqli_fetch_array($dt_penjualan)) {
    ?>
      <h2 class="text-center"><strong>KASIR TOKO ABC</strong></h2>
      <p class="text-center">Jl. Jenderal Soedirman No. 175 - Indramayu Jawa Barat</p>
      <br>
      <br>
      <table class="table table-striped">
        <tr>
          <th width="10%">No. Penjualan</th>
          <th width="5%">:</th>
          <td><?php echo $p['id_penjualan']; ?></td>
        </tr>
        <tr>
          <th width="20%">Pelanggan</th>
          <th width="5%">:</th>
          <td><?php echo $p['nm_pelanggan']; ?></td>
        </tr>
        <tr>
          <th width="20%">Tanggal</th>
          <th width="5%">:</th>
          <td><?php echo $p['tgl_penjualan']; ?></td>
        </tr>
        <tr>
          <th width="20%">Total Bayar</th>
          <th width="5%">:</th>
          <td>
            <?php
            $id_penjualan = $id_penjualan;
            $sub_total_belanja = mysqli_query($koneksi, "SELECT SUM(sub_total) AS sub_total FROM detail_penjualan 
                      WHERE id_penjualan='$id_penjualan'");
            while ($total_belanja = mysqli_fetch_array($sub_total_belanja)) { ?>
            <?php
              $total = +$total_belanja['sub_total'];
            } ?>
            <strong><?php echo "Rp. " . number_format($total) . " ,-"; ?></strong>
          </td>
        </tr>
      </table>
      <br>
      <h4 class="text-center">Data Barang</h4>
      <table class="table table-bordered">
        <thead class="text-center">
          <td>NO</td>
          <td>NAMA BARANG</td>
          <td>QTY</td>
          <td>SUB TOTAL</td>
        </thead>
        <tbody>
          <?php
          $id_penjualan = $p['id_penjualan'];
          $data_belanjaan = mysqli_query($koneksi, "SELECT *, SUM(jml_produk) as jumlah from detail_penjualan 
                    INNER JOIN produk ON produk.id_produk = detail_penjualan.id_produk
                    WHERE id_penjualan = '$id_penjualan'
                    GROUP BY detail_penjualan.id_produk
          ");
          $no = 1;
          while ($db = mysqli_fetch_array($data_belanjaan)) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $db['nm_produk']; ?></td>
              <td><?= $db['jml_produk']; ?></td>
              <td><?= "Rp. " . number_format($db['sub_total']) . ",-"; ?></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <br>
      <p>
        <center><i>" Terima Kasih Sudah Berbelanja Ditoko Kami ".</i></center>
      </p>
    <?php } ?>
  </div>

  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>