<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Basyir</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Umum
            </div>

            <?php if ($session->get('role') == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/amalan_yaumi_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Amalan Yaumi</span></a>
                </li>
            <?php endif ?>   

            <?php if ($session->get('role') == 1 || $session->get('role') == 2): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/berita_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Berita</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/doa_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Doa</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kutipan_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Kutipan</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1 || $session->get('role') == 4): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/rencana_kegiatan_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Rencana Kegiatan</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="/saran_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Saran</span></a>
                </li>
            <?php endif ?>

            <?php if ($session->get('role') == 1 || $session->get('role') == 3): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/wawasan_islami_master">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Wawasan Islami</span></a>
                </li>
            <?php endif ?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->