<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/backoffice/dashboard" class="brand-link">
        <div class="d-flex ">
            <div class="brand-image">
                <img src="{{ asset('images/pt-zen.png') }}" alt="AdminLTE Logo" class="brand-image"
                    style="opacity: .8; width: 100%">
            </div>
            {{-- <div class="ml-2">
                <span class="brand-text" style="text-transform: uppercase"> <b></b> </span>
            </div> --}}
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 mb-3 text-center">

            <div class="info">
                <p style="text-transform: uppercase">
                    <b>{{ auth()->user()->role->role }}</b>
                </p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/backoffice/dashboard"
                        class="nav-link {{ request()->is('backoffice/dashboard', 'backoffice/dashboard/*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                @if (auth()->user()->role_id == 1)

                    <li class="nav-item has-treeview {{ request()->is('backoffice/user-data/*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('backoffice/user-data/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chalkboard-user"></i>
                            <p>
                                Data Pengguna
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/backoffice/user-data/role"
                                    class="nav-link {{ request()->is('backoffice/user-data/role', 'backoffice/user-data/role/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Peran</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/backoffice/user-data/user"
                                    class="nav-link {{ request()->is('backoffice/user-data/user', 'backoffice/user-data/user/*') ? 'active' : '' }}">
                                    <i class="fa fa-circle fa-regular nav-icon"></i>
                                    <p>Pengguna</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endif

                @if (auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <a href="/backoffice/absensi-data/qrcode"
                            class="nav-link {{ request()->is('backoffice/absensi-data/qrcode', 'backoffice/absensi-data/qrcode/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-file-signature"></i>
                            <p>
                                Qr Code
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/absensi-data/absensi"
                            class="nav-link {{ request()->is('backoffice/absensi-data/absensi', 'backoffice/absensi-data/absensi/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Data Karyawan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/absensi-data/absensi"
                            class="nav-link {{ request()->is('backoffice/absensi-data/absensi', 'backoffice/absensi-data/absensi/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Data Absensi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/absensi-data/pengajuan"
                            class="nav-link {{ request()->is('backoffice/absensi-data/pengajuan', 'backoffice/absensi-data/pengajuan/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Data Pengajuan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/backoffice/absensi-data/pengajuan"
                            class="nav-link {{ request()->is('backoffice/absensi-data/pengajuan', 'backoffice/absensi-data/pengajuan/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-tasks"></i>
                            <p>
                                Data Report
                            </p>
                        </a>
                    </li>
                @endif

                {{-- @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                <li class="nav-item has-treeview {{ request()->is('backoffice/pengguna/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('backoffice/pengguna/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chalkboard-user"></i>
                        <p>
                            Akun Pengguna
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/admin"
                                class="nav-link {{ request()->is('backoffice/pengguna/admin', 'backoffice/pengguna/admin/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/dosen"
                                class="nav-link {{ request()->is('backoffice/pengguna/dosen', 'backoffice/pengguna/dosen/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/backoffice/pengguna/mahasiswa"
                                class="nav-link {{ request()->is('backoffice/pengguna/mahasiswa', 'backoffice/pengguna/mahasiswa/*') ? 'active' : '' }}">
                                <i class="fa fa-circle fa-regular nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
