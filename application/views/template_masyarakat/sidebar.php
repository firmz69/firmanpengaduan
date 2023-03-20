<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard_masyarakat') ?>">  <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-pen"></i>
                </div>
    <div class="sidebar-brand-text mx-3"> <div class="text-white-50 "> Masyarakat</div> Pengaduan </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-3">
    

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('dashboard_masyarakat') ?>">
            <i class="fa fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaduan
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengaduan_masyarakat') ?>">
        <i class="fas fa-fw fa-desktop"></i>
            <span>Pengaduan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('riwayat_masyarakat') ?>">
        <i class="fas fa-fw fa-desktop"></i>
            <span>Riwayat</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->