<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Form Tambah Vendor -->
            <form action="<?= site_url('/vendor/tambah') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="IdVendor">ID Vendor</label>
                    <input type="text" class="form-control <?= session('validation.IdVendor') ? 'is-invalid' : '' ?>" id="IdVendor" name="IdVendor" value="<?= esc(old('IdVendor')); ?>">
                    <div class="invalid-feedback"><?= session('validation.IdVendor') ?></div>
                </div>

                <div class="form-group">
                    <label for="NamaVendor">Nama Vendor</label>
                    <input type="text" class="form-control <?= session('validation.NamaVendor') ? 'is-invalid' : '' ?>" id="NamaVendor" name="NamaVendor" value="<?= esc(old('NamaVendor')); ?>">
                    <div class="invalid-feedback"><?= session('validation.NamaVendor') ?></div>
                </div>

                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <textarea class="form-control <?= session('validation.Alamat') ? 'is-invalid' : '' ?>" id="Alamat" name="Alamat" rows="3"><?= esc(old('Alamat')); ?></textarea>
                    <div class="invalid-feedback"><?= session('validation.Alamat') ?></div>
                </div>

                <div class="form-group">
                    <label for="Kota">Kota</label>
                    <input type="text" class="form-control <?= session('validation.Kota') ? 'is-invalid' : '' ?>" id="Kota" name="Kota" value="<?= esc(old('Kota')); ?>">
                    <div class="invalid-feedback"><?= session('validation.Kota') ?></div>
                </div>

                <div class="form-group">
                    <label for="Telpon">Telepon</label>
                    <input type="text" class="form-control <?= session('validation.Telpon') ? 'is-invalid' : '' ?>" id="Telpon" name="Telpon" value="<?= esc(old('Telpon')); ?>">
                    <div class="invalid-feedback"><?= session('validation.Telpon') ?></div>
                </div>

                <div class="form-group">
                    <label for="Fax">Fax</label>
                    <input type="text" class="form-control <?= session('validation.Fax') ? 'is-invalid' : '' ?>" id="Fax" name="Fax" value="<?= esc(old('Fax')); ?>">
                    <div class="invalid-feedback"><?= session('validation.Fax') ?></div>
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control <?= session('validation.Email') ? 'is-invalid' : '' ?>" id="Email" name="Email" value="<?= esc(old('Email')); ?>">
                    <div class="invalid-feedback"><?= session('validation.Email') ?></div>
                </div>

                <div class="form-group">
                    <label for="ContactPerson">Contact Person</label>
                    <input type="text" class="form-control <?= session('validation.ContactPerson') ? 'is-invalid' : '' ?>" id="ContactPerson" name="ContactPerson" value="<?= esc(old('ContactPerson')); ?>">
                    <div class="invalid-feedback"><?= session('validation.ContactPerson') ?></div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Vendor</button>
                <a href="<?= site_url('/vendor/halVendor') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
