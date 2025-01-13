<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    
    <div class="card shadow mb-4"> 
        <div class="card-body">
            <a href="<?= site_url('/lokasi/halTambah') ?>" class="btn btn-primary">Tambah Data Lokasi</a>
            <hr>
            
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('berhasil')) : ?>
                <div class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('gagal')) : ?>
                <div class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Lokasi</th>
                            <th scope="col">Nama Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($getdata as $info): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($info['IdLokasi']); ?></td>
                                <td><?= esc($info['NamaLokasi']); ?></td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="<?= site_url('/lokasi/halEdit/' . $info['IdLokasi']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    <!-- Tombol Hapus -->
                                    <form action="<?= site_url('/lokasi/hapus/' . $info['IdLokasi']) ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($getdata)): ?>
                            <tr>
                                <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 
<?= $this->endSection(); ?>
