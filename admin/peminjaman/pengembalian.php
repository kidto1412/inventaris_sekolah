<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
            </ol>
        </nav>
        <a href="?page=tambah_peminjaman" type="button" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Inventaris</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Pegawai</th>
                <th scope="col">Jumlah Pengembalian</th>
                <th scope="col">Status</th>


            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM inventaris INNER JOIN detail_pinjam ON inventaris.id_inventaris = detail_pinjam.id_inventaris INNER JOIN peminjaman on detail_pinjam.id_peminjam = peminjaman.id_peminjaman INNER JOIN pegawai on peminjaman.id_pegawai = pegawai.id_pegawai where status_peminjaman = 'Kembali' ")or die(mysql_error());
            $nomor = 1;
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++;?></th>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['tanggal_pinjam'] ?></td>
                    <td><?php echo $data['tanggal_kembali'] ?></td>
                    <td><?php echo $data['nama_pegawai'] ?></td>
                    <td><?php echo $data[13] ?></td>
                    <td><?php echo $data['status_peminjaman'] ?></td>



                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>