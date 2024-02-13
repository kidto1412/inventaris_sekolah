<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                    <div class="form-group">
                        <label for="basicInput">Nama Pegawai</label>
                        <input type="text" class="form-control" id="nama_pegawai" placeholder="Masukan Nama Anda" required="Sesuai SOP Kerja Harus Di isi" name="nama_pegawai">
                    </div>

                    <div class="form-group">
                        <label for="helpInputTop">NIP</label>
                        <small class="text-muted">eg.<i>12345678</i></small>
                        <input type="number" class="form-control" id="nip" placeholder="Masukan Kode NIP" name="nip">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Alamat</label>
                        <textarea class="form-control" name="alamat"></textarea>
                    </div>

                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>



                </div>
            </div>
        </div>
    </div>
</section>



<?php
if (isset($_POST['simpan'])) {
  $nama_pegawai = $_POST['nama_pegawai'];
  $nip = $_POST['nip'];
  $alamat = $_POST['alamat'];

  $sql = mysqli_query($koneksi,"INSERT INTO pegawai VALUES ('','$nama_pegawai','$nip','$alamat')");
  if ($sql) {
    ?>
    <script type="text/javascript">
      alert("Data Berhasil Di Tambahkan!");
      window.location = "index.php?page=pegawai";
    </script>
    <?php
  }

}
?>