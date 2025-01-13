<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= site_url('/alat/tambah') ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <!-- ID Alat -->
                <div class="form-group">
                    <label for="IdAlat">ID Alat</label>
                    <input type="text" class="form-control <?= session('validation.IdAlat') ? 'is-invalid' : '' ?>" 
                           id="IdAlat" name="IdAlat" value="<?= old('IdAlat') ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.IdAlat') ?>
                    </div>
                </div>

                <!-- Nama Alat -->
                <div class="form-group">
                    <label for="NamaAlat">Nama Alat</label>
                    <input type="text" class="form-control <?= session('validation.NamaAlat') ? 'is-invalid' : '' ?>" 
                           id="NamaAlat" name="NamaAlat" value="<?= old('NamaAlat') ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.NamaAlat') ?>
                    </div>
                </div>

                <!-- Merk/Type -->
                <div class="form-group">
                    <label for="MerkType">Merk/Type</label>
                    <input type="text" class="form-control <?= session('validation.MerkType') ? 'is-invalid' : '' ?>" 
                           id="MerkType" name="MerkType" value="<?= old('MerkType') ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.MerkType') ?>
                    </div>
                </div>

                <!-- Lokasi -->
                <div class="form-group">
                    <label for="Lokasi">Lokasi</label>
                    <input type="text" class="form-control <?= session('validation.Lokasi') ? 'is-invalid' : '' ?>" 
                           id="Lokasi" name="Lokasi" value="<?= old('Lokasi') ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.Lokasi') ?>
                    </div>
                </div>

                <!-- Foto -->
                <div class="form-group">
                    <label for="LokasiFoto">Foto Alat</label>
                    <input type="file" class="form-control-file <?= session('validation.LokasiFoto') ? 'is-invalid' : '' ?>" 
                           id="LokasiFoto" name="LokasiFoto">
                    <div class="invalid-feedback">
                        <?= session('validation.LokasiFoto') ?>
                    </div>
                </div>

                <!-- Fungsi -->
                <div class="form-group">
                    <label for="Fungsi">Fungsi</label>
                    <textarea class="form-control <?= session('validation.Fungsi') ? 'is-invalid' : '' ?>" 
                              id="Fungsi" name="Fungsi"><?= old('Fungsi') ?></textarea>
                    <div class="invalid-feedback">
                        <?= session('validation.Fungsi') ?>
                    </div>
                </div>

                <!-- Pemakai -->
                <div class="form-group">
                    <label for="Pemakai">Pemakai</label>
                    <input type="text" class="form-control <?= session('validation.Pemakai') ? 'is-invalid' : '' ?>" 
                           id="Pemakai" name="Pemakai" value="<?= old('Pemakai') ?>">
                    <div class="invalid-feedback">
                        <?= session('validation.Pemakai') ?>
                    </div>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="Status">Status</label>
                    <select class="form-control <?= session('validation.Status') ? 'is-invalid' : '' ?>" 
                            id="Status" name="Status">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="Aktif" <?= old('Status') == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option value="Tidak Aktif" <?= old('Status') == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= session('validation.Status') ?>
                    </div>
                </div>

                <!-- Button -->
                <a href="<?= site_url('/alat/daftar') ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
