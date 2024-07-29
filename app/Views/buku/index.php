<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Buku</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <a href="/buku/create" class="btn btn-primary mb-3">Tambah Buku</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($buku as $b): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $b['judul_buku']; ?></td>
                        <td><?= $b['pengarang_buku']; ?></td>
                        <td><?= $b['penerbit_buku']; ?></td>
                        <td>
                            <a href="/buku/edit/<?= $b['id_buku']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/buku/delete/<?= $b['id_buku']; ?>" method="post" style="display:inline-block;">
                                <button type="submit" class="btn btn-danger">Hapus</button>
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
