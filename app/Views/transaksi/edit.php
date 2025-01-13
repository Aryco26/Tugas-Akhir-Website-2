<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('/transaksi/update/' . $transaksi['IdKalibrasi']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- IdKalibrasi -->
                <div class="form-group">
                    <label for="IdKalibrasi">ID Kalibrasi</label>
                    <input type="text" name="IdKalibrasi" id="IdKalibrasi" class="form-control" value="<?= old('IdKalibrasi', $transaksi['IdKalibrasi']) ?>" required>
                </div>

                <!-- Tipe Transaksi -->
                <div class="form-group">
                    <label for="TransType">Tipe Transaksi</label>
                    <select name="TransType" id="TransType" class="form-control" required>
                        <option value="Kalibrasi Internal" <?= old('TransType', $transaksi['TransType']) == 'Kalibrasi Internal' ? 'selected' : '' ?>>Kalibrasi Internal</option>
                        <option value="Kalibrasi Eksternal" <?= old('TransType', $transaksi['TransType']) == 'Kalibrasi Eksternal' ? 'selected' : '' ?>>Kalibrasi Eksternal</option>
                    </select>
                </div>

                <!-- Petugas -->
                <div class="form-group">
                    <label for="Petugas">Petugas</label>
                    <input type="text" name="Petugas" id="Petugas" class="form-control" value="<?= old('Petugas', $transaksi['Petugas']) ?>" required>
                </div>

                <!-- Alat -->
                <div class="form-group">
                    <label for="Alat">ID Alat</label>
                    <input type="text" name="Alat" id="Alat" class="form-control" value="<?= old('Alat', $transaksi['Alat']) ?>" required>
                </div>

                <!-- No SPMB -->
                <div class="form-group">
                    <label for="NoSPMB">No SPMB</label>
                    <input type="text" name="NoSPMB" id="NoSPMB" class="form-control" value="<?= old('NoSPMB', $transaksi['NoSPMB']) ?>" required>
                </div>

                <!-- Tanggal SPMB -->
                <div class="form-group">
                    <label for="TglSPMB">Tanggal SPMB</label>
                    <input type="date" name="TglSPMB" id="TglSPMB" class="form-control" value="<?= old('TglSPMB', $transaksi['TglSPMB']) ?>" required>
                </div>

                <!-- No SPK -->
                <div class="form-group">
                    <label for="NoSPK">No SPK</label>
                    <input type="text" name="NoSPK" id="NoSPK" class="form-control" value="<?= old('NoSPK', $transaksi['NoSPK']) ?>" required>
                </div>

                <!-- Tanggal SPK -->
                <div class="form-group">
                    <label for="TglSPK">Tanggal SPK</label>
                    <input type="date" name="TglSPK" id="TglSPK" class="form-control" value="<?= old('TglSPK', $transaksi['TglSPK']) ?>" required>
                </div>

                <!-- Vendor -->
                <div class="form-group">
                    <label for="Vendor">Vendor</label>
                    <input type="text" name="Vendor" id="Vendor" class="form-control" value="<?= old('Vendor', $transaksi['Vendor']) ?>" required>
                </div>

                <!-- Tanggal Kalibrasi -->
                <div class="form-group">
                    <label for="TglKalibrasi">Tanggal Kalibrasi</label>
                    <input type="date" name="TglKalibrasi" id="TglKalibrasi" class="form-control" value="<?= old('TglKalibrasi', $transaksi['TglKalibrasi']) ?>" required>
                </div>

                <!-- Tanggal Expire -->
                <div class="form-group">
                    <label for="TglExpire">Tanggal Expire</label>
                    <input type="date" name="TglExpire" id="TglExpire" class="form-control" value="<?= old('TglExpire', $transaksi['TglExpire']) ?>" required>
                </div>

                <!-- No Dokumen -->
                <div class="form-group">
                    <label for="NoDokumen">No Dokumen</label>
                    <input type="text" name="NoDokumen" id="NoDokumen" class="form-control" value="<?= old('NoDokumen', $transaksi['NoDokumen']) ?>" required>
                </div>

                <!-- Status -->
                <div class="form-group">
                    <label for="Status">Status</label>
                    <input type="text" name="Status" id="Status" class="form-control" value="<?= old('Status', $transaksi['Status']) ?>" required>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="btn btn-success">Perbarui</button>
                <a href="<?= site_url('/transaksi') ?>" class="btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
