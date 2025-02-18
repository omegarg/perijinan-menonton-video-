<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-1 mb-2" href="<?= base_url('customer/beranda'); ?>">
                <img src="<?= base_url('assets/img/icon.png'); ?>" width="50px">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Beranda -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('customer/beranda'); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

                <!-- Nav Item - Permintaan Pembelian -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('customer/permintaan'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Permintaan Video</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link btn-logout" href="">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="text-left mt-2">
                        <p class="mb-0 font-weight-bold">Customer
                        </p>
                        <p>
                            Sistem Informasi Video</p>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php $customer = $this->session->userdata('customer'); ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hey, <?= $customer['nama']; ?><br></span>
                                <?php if (!empty($customer['foto_user'])) : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/user/' . $customer['foto_user']); ?>">
                                <?php else : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/avatar.jpg'); ?>">
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('customer/beranda'); ?>">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Beranda
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item btn-logout" href="">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Logout sweetalert -->
                    <script>
                        $(document).ready(function() {
                            $(".btn-logout").on("click", function(e) {
                                e.preventDefault();
                                swal({
                                        title: "Apakah kamu yakin?",
                                        text: "untuk keluar akun",
                                        icon: "warning",
                                        buttons: ["Batal", "Logout"],
                                        dangerMode: true,
                                    })
                                    .then((willLogout) => {
                                        if (willLogout) {
                                            //disini ajax hapus data
                                            $.ajax({
                                                url: "<?= base_url("customer/logout"); ?>",
                                                success: function() {
                                                    swal("Logout Berhasil!", {
                                                        icon: "success",
                                                        button: true,
                                                    }).then((oke) => {
                                                        if (oke) {
                                                            location = "<?= base_url("/login"); ?>"
                                                        }
                                                    });
                                                }
                                            })
                                        }
                                    });
                            })
                        })
                    </script>