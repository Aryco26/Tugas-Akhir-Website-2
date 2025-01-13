<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Transaksi Kalibrasi</h1>
    
    <div class="card shadow mb-4"> 
        <div class="card-body">
            <a href="<?= site_url('/transaksi/create') ?>" class="btn btn-primary">Tambah Data Transaksi</a>
            <hr>

            <!-- Flash Messages -->
            <?php if ($message = session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= esc($message) ?></div>
            <?php endif; ?>

            <?php if ($errors = session()->getFlashdata('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>IdKalibrasi</th>
                            <th>TransType</th>
                            <th>TransDate</th>
                            <th>Petugas</th>
                            <th>NoSPMB</th>
                            <th>NoSPK</th>
                            <th>Vendor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($transaksi as $trans) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= esc($trans['IdKalibrasi']); ?></td>
                                <td><?= esc($trans['TransType']); ?></td>
                                <td><?= esc($trans['TransDate']); ?></td>
                                <td><?= esc($trans['Petugas']); ?></td>
                                <td><?= esc($trans['NoSPMB']); ?></td>
                                <td><?= esc($trans['NoSPK']); ?></td>
                                <td><?= esc($trans['Vendor']); ?></td>
                                <td>
                                    <a href="<?= site_url('/transaksi/edit/' . $trans['IdKalibrasi']) ?>" class="btn btn-warning">Ubah</a>
                                    <form action="<?= site_url('/transaksi/delete/' . $trans['IdKalibrasi']) ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
