<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Form Edit Vendor -->
            <form action="<?= site_url('/vendor/update') ?>" method="post">
                <?= csrf_field(); ?>

                <input type="hidden" name="IdVendor" value="<?= esc($vendor['IdVendor']); ?>">

                <div class="form-group">
                    <label for="NamaVendor">Nama Vendor</label>
                    <input type="text" class="form-control" id="NamaVendor" name="NamaVendor" value="<?= esc($vendor['NamaVendor']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <textarea class="form-control" id="Alamat" name="Alamat" rows="3" required><?= esc($vendor['Alamat']); ?></textarea>
                </div>

                <div class="form-group">
                    <label for="Kota">Kota</label>
                    <input type="text" class="form-control" id="Kota" name="Kota" value="<?= esc($vendor['Kota']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="Telpon">Telepon</label>
                    <input type="text" class="form-control" id="Telpon" name="Telpon" value="<?= esc($vendor['Telpon']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="Fax">Fax</label>
                    <input type="text" class="form-control" id="Fax" name="Fax" value="<?= esc($vendor['Fax']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email" name="Email" value="<?= esc($vendor['Email']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="ContactPerson">Contact Person</label>
                    <input type="text" class="form-control" id="ContactPerson" name="ContactPerson" value="<?= esc($vendor['ContactPerson']); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Vendor</button>
                <a href="<?= site_url('/vendor/halVendor') ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div> 
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
