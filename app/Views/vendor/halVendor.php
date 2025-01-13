<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <a href="<?= site_url('/vendor/halTambah') ?>" class="btn btn-primary mb-3">Tambah Vendor</a>

    <!-- Flash Messages -->
    <?php if (session()->getFlashdata('berhasil')) : ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
    <?php elseif (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Vendor</th>
                        <th>Nama Vendor</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($getdata as $vendor): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= esc($vendor['IdVendor']); ?></td>
                            <td><?= esc($vendor['NamaVendor']); ?></td>
                            <td><?= esc($vendor['Alamat']); ?></td>
                            <td><?= esc($vendor['Kota']); ?></td>
                            <td><?= esc($vendor['Telpon']); ?></td>
                            <td><?= esc($vendor['Email']); ?></td>
                            <td>
                                <a href="<?= site_url('/vendor/edit/' . $vendor['IdVendor']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <form action="<?= site_url('/vendor/hapus/' . $vendor['IdVendor']) ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
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

<?= $this->endSection(); ?>
