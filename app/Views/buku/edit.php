<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <form action="/buku/update/<?= $buku['id_buku']; ?>" method="post">
            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="<?= $buku['judul_buku']; ?>" required>
            </div>
            <div class="form-group">
                <label for="pengarang_buku">Pengarang Buku</label>
                <input type="text" name="pengarang_buku" class="form-control" value="<?= $buku['pengarang_buku']; ?>" required>
            </div>
            <div class="form-group">
                <label for="penerbit_buku">Penerbit Buku</label>
                <input type="text" name="penerbit_buku" class="form-control" value="<?= $buku['penerbit_buku']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
