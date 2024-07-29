<?= $this->extend('layouts/main'); ?>

<?= $this->section('content'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Peminjaman Buku</h6>
    </div>
    <div class="card-body">
        <?= $this->include('layouts/partials/messages'); ?>
        <form action="/peminjaman-buku/store" method="post">
            <div class="form-group">
                <label for="id_anggota">Nama Anggota</label>
                <select name="id_anggota" class="form-control" required>
                    <?php foreach($anggota as $a): ?>
                    <option value="<?= $a['id_anggota']; ?>"><?= $a['nama_anggota']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_buku">Judul Buku</label>
                <select name="id_buku" class="form-control" required>
                    <?php foreach($buku as $b): ?>
                    <option value="<?= $b['id_buku']; ?>"><?= $b['judul_buku']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jml_pinjam">Jumlah Pinjam</label>
                <input type="number" name="jml_pinjam" min="1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a class="btn btn-danger" href="/peminjaman-buku">cancel</a>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>
