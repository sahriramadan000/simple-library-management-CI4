<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Peminjaman Buku</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <a href="/peminjaman-buku/create" class="btn btn-primary mb-3">Tambah Peminjaman Buku</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Jumlah Pinjam</th>
                        <th>Lama Pinjam</th>
                        <th>Denda</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($peminjaman as $row): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_anggota']; ?></td>
                        <td><?= $row['judul_buku']; ?></td>
                        <td><?= $row['tgl_pinjam']; ?></td>
                        <td><?= $row['tgl_kembali']; ?></td>
                        <td><?= $row['jml_pinjam']; ?></td>
                        <td>
                            <?php
                            $tgl_pinjam = new DateTime($row['tgl_pinjam']);
                            $tgl_kembali = new DateTime($row['tgl_kembali']);
                            $lama_pinjam = $tgl_kembali->diff($tgl_pinjam)->days;
                            echo "{$lama_pinjam} hari";
                            ?>
                        </td>
                        <td>
                            <?php
                            $denda = ($lama_pinjam > 2) ? ($lama_pinjam - 2) * 5000 : 0;
                            echo "Rp. {$denda}";
                            ?>
                        </td>
                        <td>
                            <form action="/peminjaman-buku/delete/<?= $row['id_pinjam']; ?>" method="post">
                                <button type="submit" class="btn btn-danger">Batal</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>