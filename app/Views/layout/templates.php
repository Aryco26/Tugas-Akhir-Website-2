<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Admin">
    <meta name="description" content="Aplikasi Kalibrasi Data Vendor dan Lokasi">
    <meta name="keywords" content="Kalibrasi, Data Vendor, Lokasi, Petugas, Transaksi">
    <meta name="robots" content="index, follow">

    <title><?= $judul ?></title>

    <!-- Font for template -->
    <link href="<?= base_url('templates/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for template -->
    <link href="<?= base_url('templates/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion border-right-dark" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <div class="bg-primary">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('/lokasi') ?>">
                    <div class="sidebar-brand-text mx-3">Kalibrasi</div>
                </a>
            </div>

            <div class="nav-link mt-3 mb-3 text-center">        
                <img class="img-profile rounded-circle" alt="Foto Admin" src="<?= base_url('templates/img/ardhi.png') ?>" style="width: 50px; height: 50px;">
                <h6 class="sidebar-brand-text mx-3 text-gray-100 small">Ardhi Rahardhian Yudistira</h6>
            </div>    


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Menu</div>

            <!-- Links - Data Master -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/lokasi') ?>">
                    <i class="fas fa-fw fa-map-marker-alt"></i>
                    <span>Data Lokasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/pemakai/pemakai') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pemakai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/petugas') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Petugas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/alat/daftar') ?>">
                    <i class="fas fa-fw fa-tools"></i>
                    <span>Data Alat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/vendor/halVendor') ?>">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Data Vendor</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('/transaksi') ?>">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Data Transaksi</span>
                </a>
            </li>

            <!-- Tombol Logout -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('/') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggle Button -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-primary bg-primary topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-100 small">Ardhi Rahardhian Yudistira</span>
                                <img class="img-profile rounded-circle" src="<?= base_url('templates/img/ardhi.png') ?>">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <?= $this->renderSection('content') ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= date('Y') ?> Ardhi Rahardhian Yudistira</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('/') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('templates/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('templates/js/sb-admin-2.min.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('templates/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('templates/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('templates/js/demo/chart-bar-demo.js') ?>"></script>
</body>

</html>
