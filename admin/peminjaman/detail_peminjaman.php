<?php
$id_peminjaman = $_GET['id_peminjaman'];

?>
    <di class="card">
        <div class="card-header">Detail Peminjaman</div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Inventaris</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">ket</th>
                    <th scope="col">Jumlah Pinjam</th>
                    <th scope="col">Tanggal Pinjam</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Pegawai</th>
                    <th scope="col">Status</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $query = mysqli_query($koneksi,"SELECT * FROM inventaris INNER JOIN detail_pinjam ON inventaris.id_inventaris = detail_pinjam.id_inventaris INNER JOIN peminjaman on detail_pinjam.id_peminjam = peminjaman.id_peminjaman INNER JOIN pegawai on peminjaman.id_pegawai = pegawai.id_pegawai where id_peminjaman = $id_peminjaman");
                $nomor = 1;
                while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <th scope="row"><?php echo $nomor++;?></th>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?php echo $data['kondisi'] ?></td>
                        <td><?php echo $data['ket'] ?></td>
                        <td><?php echo $data[13] ?></td>
                        <td><?php echo $data['tanggal_pinjam'] ?></td>
                        <td><?php echo $data['tanggal_kembali'] ?></td>
                        <td><?php echo $data['nama_pegawai'] ?></td>
                        <td><?php echo $data['status_peminjaman'] ?></td>


                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </di>
