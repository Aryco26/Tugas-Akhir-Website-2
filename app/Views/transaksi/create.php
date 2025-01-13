<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Flash Messages -->
            <?php if ($errors = session()->getFlashdata('errors')): ?>
                <?php if (is_array($errors)): ?> <!-- Cek apakah $errors array -->
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?>
                            <p><?= esc($error) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?> <!-- Jika $errors string -->
                    <div class="alert alert-danger">
                        <p><?= esc($errors) ?></p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <form action="<?= site_url('/transaksi/store') ?>" method="post">
                <?= csrf_field() ?>

                <!-- IdKalibrasi -->
                <div class="form-group">
                    <label for="IdKalibrasi">ID Kalibrasi</label>
                    <input type="text" name="IdKalibrasi" id="IdKalibrasi" class="form-control" value="<?= old('IdKalibrasi') ?>" required>
                </div>

                <!-- Tipe Transaksi -->
                <div class="form-group">
                    <label for="TransType">Tipe Transaksi</label>
                    <select name="TransType" id="TransType" class="form-control" required>
                        <option value="">Pilih Tipe Transaksi</option>
                        <option value="Kalibrasi Internal" <?= old('TransType') == 'Kalibrasi Internal' ? 'selected' : '' ?>>Kalibrasi Internal</option>
                        <option value="Kalibrasi Eksternal" <?= old('TransType') == 'Kalibrasi Eksternal' ? 'selected' : '' ?>>Kalibrasi Eksternal</option>
                    </select>
                </div>

                <!-- Petugas -->
                <div class="form-group">
                    <label for="Petugas">ID Petugas</label>
                    <input type="text" name="Petugas" id="Petugas" class="form-control" value="<?= old('Petugas') ?>" required>
                </div>

                <!-- Alat -->
                <div class="form-group">
                    <label for="Alat">ID Alat</label>
                    <input type="text" name="Alat" id="Alat" class="form-control" value="<?= old('Alat') ?>" required>
                </div>

                <!-- No SPMB -->
                <div class="form-group">
                    <label for="NoSPMB">No SPMB</label>
                    <input type="text" name="NoSPMB" id="NoSPMB" class="form-control" value="<?= old('NoSPMB') ?>" required>
                </div>

                <!-- Tanggal SPMB -->
                <div class="form-group">
                    <label for="TglSPMB">Tanggal SPMB</label>
                    <input type="date" name="TglSPMB" id="TglSPMB" class="form-control" value="<?= old('TglSPMB') ?>" required>
                </div>

                <!-- No SPK -->
                <div class="form-group">
                    <label for="NoSPK">No SPK</label>
                    <input type="text" name="NoSPK" id="NoSPK" class="form-control" value="<?= old('NoSPK') ?>" required>
                </div>

                <!-- Tanggal SPK -->
                <div class="form-group">
                    <label for="TglSPK">Tanggal SPK</label>
                    <input type="date" name="TglSPK" id="TglSPK" class="form-control" value="<?= old('TglSPK') ?>" required>
                </div>

                <!-- Vendor -->
                <div class="form-group">
                    <label for="Vendor">Vendor</label>
                    <input type="text" name="Vendor" id="Vendor" class="form-control" value="<?= old('Vendor') ?>" required>
                </div>

                <!-- Tanggal Kalibrasi -->
                <div class="form-group">
                    <label for="TglKalibrasi">Tanggal Kalibrasi</label>
                    <input type="date" name="TglKalibrasi" id="TglKalibrasi" class="form-control" value="<?= old('TglKalibrasi') ?>" required>
                </div>

                <!-- Tanggal Expire -->
                <div class="form-group">
                    <label for="TglExpire">Tanggal Expire</label>
                    <input type="date" name="TglExpire" id="TglExpire" class="form-control" value="<?= old('TglExpire') ?>" required>
                </div>

                <!-- No Dokumen -->
                <div class="form-group">
                    <label for="NoDokumen">No Dokumen</label>
                    <input type="number" name="NoDokumen" id="NoDokumen" class="form-control" value="<?= old('NoDokumen') ?>" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status" class="form-control" value="<?= old('Status') ?>" required>
                </div>

               
                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="<?= site_url('/transaksi') ?>" class="btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
