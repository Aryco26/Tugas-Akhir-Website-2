<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Data Petugas</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= base_url('petugas/update/' . $petugas['IdPetugas']) ?>" method="post">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="IdPetugas" class="form-label">ID Petugas</label>
                    <input type="text" class="form-control" id="IdPetugas" name="IdPetugas" value="<?= $petugas['IdPetugas'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="NamaPetugas" class="form-label">Nama Petugas</label>
                    <input type="text" class="form-control" id="NamaPetugas" name="NamaPetugas" value="<?= $petugas['NamaPetugas'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('petugas') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
