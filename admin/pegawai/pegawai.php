<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pegawai</h3>
                <p class="text-subtitle text-muted">
                    <a href="?page=tambah_pegawai" class="btn btn-outline-success">Tambah</a>
                </p>
                
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                List Orang Yang Tidak Penggangguran 
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM pegawai ");
                    $nomor = 1;
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $nomor++;?></th>
                            <td><?php echo $data['nama_pegawai'] ?></td>
                            <td><?php echo $data['nip'] ?></td>
                            <td><?php echo $data['alamat'] ?></td>
                            <td>
                                <a href="?page=edit_pegawai&id_pegawai=<?php echo $data['id_pegawai']?>"  class="btn btn-primary" title="Pinjam"> Ubah </a>

                                <a href="?page=hapus_pegawai&id_pegawai=<?php echo $data['id_pegawai']?>"  class="btn btn-danger" title="Kembali"> Hapus </a>

                            </td>


                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>