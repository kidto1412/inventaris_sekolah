<?php
$id_peminjaman = $_GET['id_peminjaman'];
$query = mysqli_query($koneksi, "select * from peminjaman where id_peminjaman='$id_peminjaman'");
$data = mysqli_fetch_array($query);
?>
<di class="card">
    <div class="card-header">Pinjam</div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label  class="form-label">Tanggal Pinjam</label>
                <input type="hidden" name="id_pinjam" value="<?php echo $data['id_peminjaman']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo $data['tanggal_pinjam']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_kembali" value="<?php echo $data['tanggal_kembali']?>" disabled>
            </div>

            <div class="mb-3">
                <label  class="form-label">Inventaris</label>
                <?php
                $query = "SELECT * FROM inventaris INNER JOIN petugas ON inventaris.id_petugas = petugas.id_petugas";
                $result = mysqli_query($koneksi,$query);
                ?>
                <select name="id_inventaris" id="" class="form-control">
                    <option value="">Pilih Invenaris</option>
                    <?php while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['id_inventaris'] ?>"><?php echo $row['nama'] ?></option>
                        <?php
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label  class="form-label">Jumlah</label>
                <input type="text" class="form-control" name="jumlah">
            </div>

            <input type="submit" class="btn btn-primary mt-3 mb-3" name="tambah" value="Submit">
            <a href="?page=peminjaman" class="btn btn-danger mt-3 mb-3"  value="Submit">Cancel</a>
        </form>
    </div>
</di>
<?php
if (isset($_POST['tambah'])){
    $id_peminjaman = $_GET['id_peminjaman'];
    $id_inventaris = $_POST['id_inventaris'];
    $jumlah = $_POST['jumlah'];
    $queryGetInventaris = mysqli_query($koneksi, "SELECT * from inventaris where id_inventaris = '$id_inventaris'");
    $resultInventaris = mysqli_fetch_array($queryGetInventaris);
//   dd $resultInventaris;
    $sisaInventaris = 0;
    $jumlahInventaris = $resultInventaris['jumlah'];
    $sisaInventaris =  $jumlahInventaris - $jumlah;

    echo $sisaInventaris;
    mysqli_query($koneksi,"INSERT INTO detail_pinjam VALUES('','$id_peminjaman','$id_inventaris','$jumlah')");
    mysqli_query($koneksi,"UPDATE inventaris SET jumlah = $sisaInventaris  WHERE id_inventaris = $id_inventaris");

}
?>