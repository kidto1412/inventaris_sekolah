<div class="card">
    <div class="card-header">Tambah Peminjaman</div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label  class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tanggal_pinjam">
            </div>
            <div class="mb-3">
                <label  class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_kembali">
            </div>
            <div class="mb-3">
                <label  class="form-label">Pegawai</label>
                <?php
                $query = "select * from pegawai";
                $result = mysqli_query($koneksi,$query);
                ?>
                <select name="id_pegawai" id="" class="form-control">
                    <option value="">Pilih Petugas</option>
                    <?php while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['id_pegawai'] ?>"><?php echo $row['nama_pegawai'] ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-primary mt-3 mb-3" name="tambah" value="Submit">
            <a href="?page=peminjaman" class="btn btn-danger mt-3 mb-3"  value="Submit">Cancel</a>
        </form>
        <?php
        if (isset($_POST['tambah'])){
            $tanggal_pinjam = $_POST['tanggal_pinjam'];
            $tanggal_kembali= $_POST['tanggal_kembali'];
            $status = 'Pinjam';
            $id_pegawai = $_POST['id_pegawai'];

            mysqli_query($koneksi,"INSERT INTO peminjaman VALUES('','$tanggal_pinjam','$tanggal_kembali','$status', '$id_pegawai')");

            ?>
            <script type="text/javascript">
                alert('berhasil ditambahkan');
                document.location.href="?page=peminjaman";
            </script>
            <?php
        }
        ?>


    </div>
</div>