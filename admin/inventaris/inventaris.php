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
                <th scope="col">Nama</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Keterangan</th>
                <th scope="col">jumlah</th>


            </tr>
            </thead>
            <tbody>
            <?php
            $query = mysqli_query($koneksi,"SELECT * FROM inventaris ");
            $nomor = 1;
            while($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <th scope="row"><?php echo $nomor++;?></th>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['kondisi'] ?></td>
                    <td><?php echo $data['ket'] ?></td>
                    <td><?php echo $data['jumlah'] ?></td>


                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>