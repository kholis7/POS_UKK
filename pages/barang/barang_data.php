<div class="container-fluid px-4">
  <h1 class="mt-4">Data Pelanggan</h1>
  <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">POS UKK SMK YAPIIM INDRAMAYU</li>
  </ol>
  <div class="card mb-4">
    <div class="card-body">
      <table id="datatablesSimple">
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
              <td><?php echo $produk['harga']; ?></td>
              <td><?php echo $produk['stok']; ?></td>
              <td>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
              </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>