<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <a href="/anggota/create" class="btn btn-primary mb-3">Tambah Anggota</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($anggota as $a): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $a['nama_anggota']; ?></td>
                        <td><?= $a['prodi_anggota']; ?></td>
                        <td><?= $a['hp_anggota']; ?></td>
                        <td>
                            <a href="/anggota/edit/<?= $a['id_anggota']; ?>" class="btn btn-warning">Edit</a>
                            <form action="/anggota/delete/<?= $a['id_anggota']; ?>" method="post" style="display:inline-block;">
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
