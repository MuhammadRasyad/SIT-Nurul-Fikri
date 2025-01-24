<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    .main-header{
        background: #e0f2fe
    }
    .main-sidebar{
        background: #082f49;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Profile and Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                </a>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Super Admin Dashboard</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar text-white">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('super.admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Dropdown for Data Akun Guru (SD-SMP) -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Akun Guru
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('super.admin.guru.tk.index', ['level' => 'tk']) }}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- Ikon Guru -->
                                    <p>Guru TK</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('super.admin.guru.sd.index', ['level' => 'sd']) }}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- Ikon Guru -->
                                    <p>Guru SD</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('super.admin.guru.smp.index', ['level' => 'smp']) }}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher nav-icon"></i> <!-- Ikon Guru -->
                                    <p>Guru SMP</p>
                                </a>
                            </li>
                        </ul>
                        
                    </li>

                    <!-- Dropdown for Data Akun Admin (TK-SMP) -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Data Akun Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('super.admin.admin.tkit.index', ['level' => 'tk']) }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i> <!-- Ikon Admin -->
                                    <p>Admin TKIT</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('super.admin.admin.sd.index', ['level' => 'sd']) }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i> <!-- Ikon Admin -->
                                    <p>Admin SDIT</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('super.admin.admin.smp.index', ['level' => 'smp']) }}" class="nav-link">
                                    <i class="fas fa-user-cog nav-icon"></i> <!-- Ikon Admin -->
                                    <p>Admin SMPIT</p>
                                </a>
                            </li>
                        </ul>
                        
                    </li>

                    <!-- Data Akun Kepala Sekolah SD & SMP -->
                    <li class="nav-item">
                        <a href="{{ route('super.admin.kepala.sekolah.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Akun Kepala Sekolah</p>
                        </a>
                    </li>

                    <!-- Data Akun Staf -->
                    <li class="nav-item">
                        <a href="{{ route('super.admin.staf.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>Data Akun Staf</p>
                        </a>
                    </li>

                    <!-- Data Akun Super Admin -->
                    <li class="nav-item">
                        <a href="{{ route('super.admin.super.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>Data Akun Super Admin</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- Dynamic Content -->
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>

    <!-- Main Footer -->
<footer class="main-footer">
    <div class="container">
        <strong>&copy; <span id="current-year"></span> <a href="#">Nurul Fikri</a>.</strong>
        All rights reserved.
    </div>
</footer>

<script>
    // Mengambil elemen dengan ID 'current-year' dan mengatur tahun saat ini
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>

</div>

<!-- AdminLTE Script -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE Script -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Ensure that the sidebar treeview works
        $('[data-widget="treeview"]').Treeview();
        
        // Optionally, toggle sidebar menu if not functioning properly
        $('[data-widget="pushmenu"]').PushMenu();
    });
</script>

</body>
</html>
