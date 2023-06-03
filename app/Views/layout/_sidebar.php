<?php
$uri = service('uri')->getSegments();
$uri1 = $uri[1] ?? 'admin';
$uri2 = $uri[2] ?? '';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SewaRuko</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user.png" class="img-circle elevation-2" alt="user">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= user()->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="admin" class="nav-link <?= ($uri1 == 'admin') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if (in_groups('admin')) : ?>
                    <li class="nav-item <?= ($uri1 == 'data-master') ? 'menu-open' : '' ?>">
                        <a href="javascript:void(0)" class="nav-link <?= ($uri1 == 'data-master') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Data Master
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admin/data-master/kriteria" class="nav-link <?= ($uri2 == 'kriteria') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kriteria</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admin/data-master/subkriteria" class="nav-link <?= ($uri2 == 'subkriteria') ? 'active' : '' ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subkriteria</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="/admin/ruko" class="nav-link <?= ($uri1 == 'ruko') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Ruko
                            <span class="badge badge-warning right" id="countRuko"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pesanan" class="nav-link <?= ($uri1 == 'pesanan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>
                            Pesanan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/laporan" class="nav-link <?= ($uri1 == 'laporan') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>