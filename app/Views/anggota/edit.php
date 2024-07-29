<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Anggota</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <form action="/anggota/update/<?= $anggota['id_anggota']; ?>" method="post">
            <div class="form-group">
                <label for="nama_anggota">Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control" value="<?= $anggota['nama_anggota']; ?>" required>
            </div>
            <div class="form-group">
                <label for="prodi_anggota">Prodi Anggota</label>
                <input type="text" name="prodi_anggota" class="form-control" value="<?= $anggota['prodi_anggota']; ?>" required>
            </div>
            <div class="form-group">
                <label for="hp_anggota">HP Anggota</label>
                <input type="text" name="hp_anggota" class="form-control" value="<?= $anggota['hp_anggota']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
