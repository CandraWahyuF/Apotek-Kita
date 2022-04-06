<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion font-weight-bold" style="background: #57AD9E;"
    id="accordionSidebar">
    <!-- Sidebar - LOGO-->
    <div class="d-flex justify-content-center">
        <!-- logo info -->
        <div class=" logo_pic">
            <img src="<?php echo base_url('assets/img/profile/logo.png') ?>" alt="..." class="img-circle" width="200"
                height="200"></a>
        </div>
    </div>
    <div class="profile">
        <div class="font-weight-bold text-center" style="color: white;"><span style="font-size: 20px;">
                APOTEK KIKI FARMA
            </span></div>
    </div>


    <!-- Divider Garis -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/index')?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider Garis -->
    <hr class="sidebar-divider">


    <!-- Menu Obat -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObat" aria-expanded="true"
            aria-controls="collapseObat">
            <i class="fa fa-fw fa-medkit"></i>
            <span>Obat</span>
        </a>
        <div id="collapseObat" class="collapse" aria-labelledby="headingObat" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_obat')?>">Tambah Obat</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_obat')?>">Lihat Obat</a>
                <a class="collapse-item" href="cards.html">Obat Kadaluarsa</a>
                <a class="collapse-item" href="cards.html">Obat Akan Habis</a>
            </div>
        </div>
    </li>

    <!-- Menu Kategori -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKategori"
            aria-expanded="true" aria-controls="collapseKategori">
            <i class="fa fa-fw fa-plus-square"></i>
            <span>Kategori</span>
        </a>
        <div id="collapseKategori" class="collapse" aria-labelledby="headingKategori" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_kategori')?>">Tambah Kategori</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_kategori')?>">Lihat Kategori</a>
            </div>
        </div>
    </li>

    <!-- Menu Pemasok -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemasok"
            aria-expanded="true" aria-controls="collapsePemasok">
            <i class="fa fa-fw fa-users"></i>
            <span>Pemasok</span>
        </a>
        <div id="collapsePemasok" class="collapse" aria-labelledby="headingPemasok" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/form_pemasok')?>">Tambah Pemasok</a>
                <a class="collapse-item" href="<?= base_url('user/lihat_pemasok')?>">Lihat Pemasok</a>
            </div>
        </div>
    </li>

    <!-- Menu Transaksi -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi"
            aria-expanded="true" aria-controls="collapseTransaksi">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="utilities-color.html">Penjualan</a>
                <a class="collapse-item" href="utilities-border.html">Pembelian</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->