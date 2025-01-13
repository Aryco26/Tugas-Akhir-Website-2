<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
    <h2><?= esc($judul) ?></h2>
    <a href="<?= site_url('/pemakai/halTambah') ?>" class="btn btn-primary mb-3">Tambah Pemakai</a>
    
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success"><?= session()->getFlashdata('berhasil') ?></div>
    <?php endif; ?>
    
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID Pemakai</th>
                    <th>Nama Pemakai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getdata as $row) : ?>
                    <tr>
                        <td><?= esc($row['IdPemakai']) ?></td>
                        <td><?= esc($row['NamaPemakai']) ?></td>
                        <td>
                            <a href="<?= site_url('/pemakai/edit/' . $row['IdPemakai']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?= site_url('/pemakai/hapus/' . $row['IdPemakai']) ?>" method="post" class="d-inline">
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

<?= $this->endSection(); ?>
