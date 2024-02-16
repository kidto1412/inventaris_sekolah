<?php
$id_peminjaman = $_GET['id_peminjaman'];

$query = mysqli_query($koneksi, "SELECT * FROM inventaris INNER JOIN detail_pinjam ON inventaris.id_inventaris = detail_pinjam.id_inventaris INNER JOIN peminjaman on detail_pinjam.id_peminjam = peminjaman.id_peminjaman INNER JOIN pegawai on peminjaman.id_pegawai = pegawai.id_pegawai where id_peminjaman = $id_peminjaman");
$data = mysqli_fetch_array($query);
?>
<?php if ($data == null) {
    ?>
    <h1>Not Found </h1>
    <?php
} else {

?>
<div class="card">
    <div class="card-header">Form Pengembalian</div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">

                <input type="hidden" name="id_pinjam" value="<?php echo $data['id_peminjaman']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama Inventaris</label>
                <input type="text" class="form-control" name="nama_inventaris" value="<?php echo $data['nama']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kondisi</label>
                <input type="text" class="form-control" name="kondisi" value="<?php echo $data['kondisi']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?php echo $data['ket']?>" disabled>
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
                <label  class="form-label">Status</label>
                <input type="text" class="form-control" name="status" value="<?php echo $data['status_peminjaman']?>" disabled>
            </div>
            <div class="mb-3">
                <label  class="form-label">Pegawai</label>
                <input type="text" class="form-control" name="pegawai" value="<?php echo $data['nama_pegawai']?>" disabled>
            </div>

            <input type="submit" class="btn btn-primary mt-3 mb-3" name="kembali" value="Submit">
            <a href="?page=peminjaman" class="btn btn-danger mt-3 mb-3"  value="Submit">Cancel</a>
        </form>
    </div>
</div>
    <?php
}
    ?>
<?php
if (isset($_POST['kembali'])){

//    Inventaris
    $id_peminjaman = $_GET['id_peminjaman'];
    $query = mysqli_query($koneksi, "SELECT * FROM inventaris INNER JOIN detail_pinjam ON inventaris.id_inventaris = detail_pinjam.id_inventaris INNER JOIN peminjaman on detail_pinjam.id_peminjam = peminjaman.id_peminjaman INNER JOIN pegawai on peminjaman.id_pegawai = pegawai.id_pegawai where id_peminjaman = $id_peminjaman");
    $result = mysqli_fetch_array($query);
    $jumlahInventaris = $result[4];
    $id_inventaris = $result['id_inventaris'];



    $id_detail_pinjam = $result['id_detail_pinjam'];
    $id_peminjam = $result['id_peminjam'];


//  Perhitungan
    $total = 0;
    $jumlahPinjam = $result[13];
    $total =  $jumlahInventaris + $jumlahPinjam;


//    mysqli_query($koneksi,"DELETE FROM detail_pinjam WHERE id_detail_pinjam = $id_detail_pinjam ");
    mysqli_query($koneksi,"UPDATE peminjaman SET status_peminjaman= 'Kembali' WHERE id_peminjaman = $id_peminjaman");
    mysqli_query($koneksi,"UPDATE inventaris SET jumlah = $total WHERE id_inventaris = $id_inventaris");
?>
<script type="text/javascript">
    alert('berhasil dikembalikan');
    document.location.href="?page=pengembalian";
</script>
<?php
}
?>