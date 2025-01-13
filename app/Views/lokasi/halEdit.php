<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>
    
    <div class="card-body bg-gray-100">

        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
        <?php endif; ?>
        
        <form action="<?= site_url('/lokasi/update') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Lokasi (Readonly) -->
            <div class="form-group">
                <label for="IdLokasi">ID Lokasi:</label>
                <input type="text" class="form-control" id="IdLokasi" name="IdLokasi" value="<?= esc($lokasi['IdLokasi']) ?>" readonly>
            </div>

            <!-- Nama Lokasi -->
            <div class="form-group">
                <label for="NamaLokasi">Nama Lokasi:</label>
                <input type="text" class="form-control <?= session('validation.NamaLokasi') ? 'is-invalid' : '' ?>" 
                    id="NamaLokasi" name="NamaLokasi" value="<?= old('NamaLokasi', $lokasi['NamaLokasi']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.NamaLokasi') ?>
                </div>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('/lokasi') ?>" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>

<?= $this->endSection(); ?>