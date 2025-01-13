<?= $this->extend('layout/templates'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>
    
    <div class="card shadow mb-4"> 
        <div class="card-body">
            <a href="<?= site_url('/alat/halTambah') ?>" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Tambah Data Alat
            </a>
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
                            <th scope="col">ID Alat</th>
                            <th scope="col">Nama Alat</th>
                            <th scope="col">Merk/Type</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Foto</th> <!-- Kolom Foto -->
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getdata as $index => $info): ?>
                            <tr>
                                <th scope="row"><?= $index + 1; ?></th>
                                <td><?= esc($info['IdAlat']); ?></td>
                                <td><?= esc($info['NamaAlat']); ?></td>
                                <td><?= esc($info['MerkType']); ?></td>
                                <td><?= esc($info['Lokasi']); ?></td>
                                <td><?= esc($info['Status']); ?></td>
                                <td>
                                    <!-- Foto Alat -->
                                    <?php if (!empty($info['LokasiFoto'])): ?>
                                        <img src="<?= base_url('public/templates/img/' . esc($info['LokasiFoto'])); ?>" 
                                             alt="Foto Alat" 
                                             style="width: 50px; height: 50px; object-fit: cover;">
                                    <?php else: ?>
                                        <span class="text-muted">Tidak Ada Foto</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Tombol Ubah -->
                                    <a href="<?= site_url('/alat/edit/' . $info['IdAlat']) ?>" class="btn btn-warning btn-sm" title="Ubah Data">
                                       <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="<?= site_url('/alat/hapus/' . $info['IdAlat']) ?>" method="post"  class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                title="Hapus Data" 
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
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
<!-- /.container-fluid -->

<?= $this->endSection(); ?>
