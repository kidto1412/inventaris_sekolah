<div class="card">
    <div class="card-body">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
            </ol>
        </nav>
        <a href="?page=tambah_peminjaman" type="button" class="btn btn-primary">Tambah Data</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Pegawai</th>
                <th scope="col">Status</th>

                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai where status_peminjaman = 'Pinjam' ")or die(mysql_error());
            $nomor = 1;
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++;?></th>
                    <td><?php echo $data['tanggal_pinjam'] ?></td>
                    <td><?php echo $data['tanggal_kembali'] ?></td>
                    <td><?php echo $data['nama_pegawai'] ?></td>
                    <td><?php echo $data['status_peminjaman'] ?></td>

                    <td>
                        <a href="?page=pinjam&id_peminjaman=<?php echo $data['id_peminjaman']?>"  class="btn btn-primary" title="Pinjam"> Pinjam </a>
                        <a href="?page=detail&id_peminjaman=<?php echo $data['id_peminjaman']?>" class="btn btn-info" title="Detail"> Detail </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>