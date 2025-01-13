<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data Petugas</h1>
    <a href="<?= base_url('petugas/halTambah') ?>" class="btn btn-primary mb-3">Tambah Petugas</a>
    <div class="card mb-4">

        <!-- Flash Message -->
        <?php if (session()->getFlashdata('berhasil')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('berhasil') ?></div>
        <?php endif; ?>

        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tabel Petugas
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($petugas as $ptgs): ?>
                    <tr>
                        <td><?= esc($ptgs['IdPetugas']) ?></td>
                        <td><?= esc($ptgs['NamaPetugas']) ?></td>
                        <td>
                            <a href="<?= base_url('petugas/edit/' . $ptgs['IdPetugas']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?= site_url('/petugas/hapus/' . $ptgs['IdPetugas']) ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<?= $this->endSection() ?>
