<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card-header py-3">
        <h1 class="h3 mb-4"><?= esc($judul) ?></h1>
    </div>

    
    <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
            <?php endif; ?>

    <div class="card-body">
        <form action="<?= site_url('/lokasi/tambah') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Lokasi -->
            <div class="form-group">
                <label for="IdLokasi">ID Lokasi:</label>
                <input type="text" class="form-control <?= session('validation.IdLokasi') ? 'is-invalid' : '' ?>" 
                       id="IdLokasi" name="IdLokasi" value="<?= old('IdLokasi') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.IdLokasi') ?>
                </div>
            </div>

            <!-- Nama Lokasi -->
            <div class="form-group">
                <label for="NamaLokasi">Nama Lokasi:</label>
                <input type="text" class="form-control <?= session('validation.NamaLokasi') ? 'is-invalid' : '' ?>" 
                       id="NamaLokasi" name="NamaLokasi" value="<?= old('NamaLokasi') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.NamaLokasi') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/lokasi') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
