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
  </div>
</div>