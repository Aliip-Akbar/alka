@if ($user->level == 1)
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ ('home') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Labani POS</div>
    </a>

    <li class="nav-item">
        <a class="nav-link">
            <img class="img-profile rounded-circle" src="img/manager.png">
                <span class="mr-2 d-none d-lg-inline text-light">{{ $user->name }}</span>
        </a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sistem Utility</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-users"></i> Data User :</h6>
                <a class="collapse-item" href="/user"> User</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-store"></i> Data Toko:</h6>
                <a class="collapse-item" href="/kategori">Kategori Barang</a>
                <a class="collapse-item" href="/satuan">Data Satuan</a>
                <a class="collapse-item" href="/barang">Data Barang</a>
                <a class="collapse-item" href="/pelanggan">Data Pelanggan</a>
                <a class="collapse-item" href="/mitra">Data Mitra</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-shopping-basket"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-dollar-sign"></i> Data Transaksi :</h6>
                <a class="collapse-item" id="" href="/stok">Set Stok Awal</a>
                {{-- <a class="collapse-item" href="/point">Transaksi Point</a> --}}
                <a class="collapse-item" href="/pembelian">Pembelian Barang</a>
                <a class="collapse-item" href="/penjualan">Penjualan Barang</a>
                <a class="collapse-item" href="/penjualanmitra">Penjualan Barang Mitra</a>

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-print"></i>
            <span>Cetak</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-copy"></i> Data Cetak :</h6>
                <a class="collapse-item" id="" href="/laporan">Laporan</a>

            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@elseif ($user->level == 2)
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ ('home') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Labani POS</div>
    </a>

    <li class="nav-item dropdown no-arrow">
        <a class="nav-link">
            <img class="img-profile" src="img/cashier.png">
                <span class="mr-2 d-none d-lg-inline text-light">{{ $user->name }}</span>
        </a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-shopping-basket"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-dollar-sign"></i> Data Transaksi :</h6>
                {{-- <a class="collapse-item" href="/point">Transaksi Point</a> --}}
                <a class="collapse-item" href="/penjualan">Penjualan Barang</a>
                <a class="collapse-item" href="/penjualanmitra">Penjualan Barang Mitra</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-print"></i>
            <span>Cetak</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-copy"></i> Data Cetak :</h6>
                <a class="collapse-item" id="" href="/laporan">Laporan</a>

            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@elseif ($user->level == 3)
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ ('home') }}">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Labani POS</div>
    </a>

    <!-- Divider -->

    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle">
            <img class="img-profile rounded-circle" src="img/inventory.png">
                <span class="mr-2 d-none d-lg-inline text-light">{{ $user->name }}</span>
        </a>
    </li>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-database"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-store"></i> Data Toko:</h6>
                <a class="collapse-item" href="/kategori">Kategori Barang</a>
                <a class="collapse-item" href="/satuan">Data Satuan</a>
                <a class="collapse-item" href="/barang">Data Barang</a>

            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-shopping-basket"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-dollar-sign"></i> Data Transaksi :</h6>
                <a class="collapse-item" id="" href="/stok">Set Stok Awal</a>
                <a class="collapse-item" href="/pembelian">Pembelian Barang</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-print"></i>
            <span>Cetak</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><i class="fas fa-copy"></i> Data Cetak :</h6>
                <a class="collapse-item" id="" href="/laporan">Laporan</a>

            </div>
        </div>
    </li>
    <!-- Divider -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
@endif
