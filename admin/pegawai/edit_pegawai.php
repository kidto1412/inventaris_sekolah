<?php
$id_pegawai = $_GET['id_pegawai'];
$query = mysqli_query($koneksi,"select * from pegawai where  id_pegawai = '$id_pegawai'");
$result = mysqli_fetch_array($query);
?>
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ubah Pegawai</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST">
                        <div class="form-group">
                            <label for="basicInput">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" placeholder="Masukan Nama Anda" required="Sesuai SOP Kerja Harus Di isi" name="nama_pegawai" value="<?php echo $result['nama_pegawai']?>"/>
                        </div>

                        <div class="form-group">
                            <label for="helpInputTop">NIP</label>
                            <small class="text-muted">eg.<i>12345678</i></small>
                            <input type="number" class="form-control" id="nip" placeholder="Masukan Kode NIP" name="nip" value="<?php echo $result['nip']?>">
                        </div>

                        <div class="form-group">
                            <label for="basicInput">Alamat</label>
                            <textarea class="form-control"  name="alamat"><?php echo $result['alamat']?></textarea>
                        </div>

                        <button type="submit" name="simpan" class="btn btn-primary">Ubah</button>
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

    $sql = mysqli_query($koneksi,"UPDATE pegawai set nama_pegawai ='$nama_pegawai', nip = '$nip', alamat = '$alamat' where id_pegawai = '$id_pegawai'");
    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Data Berhasil Di Ubah!");
            window.location = "index.php?page=pegawai";
        </script>
        <?php
    }

}
?>