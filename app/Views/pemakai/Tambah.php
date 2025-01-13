<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2><?= esc($judul) ?></h2>
    <form action="<?= site_url('/pemakai/tambah') ?>" method="post">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="IdPemakai">ID Pemakai</label>
            <input type="text" name="IdPemakai" id="IdPemakai" class="form-control <?= session('validation.IdPemakai') ? 'is-invalid' : '' ?>" value="<?= old('IdPemakai') ?>">
            <div class="invalid-feedback"><?= session('validation.IdPemakai') ?></div>
        </div>
        
        <div class="form-group">
            <label for="NamaPemakai">Nama Pemakai</label>
            <input type="text" name="NamaPemakai" id="NamaPemakai" class="form-control <?= session('validation.NamaPemakai') ? 'is-invalid' : '' ?>" value="<?= old('NamaPemakai') ?>">
            <div class="invalid-feedback"><?= session('validation.NamaPemakai') ?></div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        <a href="<?= site_url('/pemakai/pemakai') ?>" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>


<?= $this->endSection(); ?>
