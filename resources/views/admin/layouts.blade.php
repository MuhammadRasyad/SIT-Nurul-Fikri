<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        .main-header {
            background: #e0f2fe;
        }
        .main-sidebar {
            background: #082f49;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <!-- Ikon di sebelah nama -->
        <i class="fas fa-cogs brand-image img-circle elevation-3" style="opacity: .8; font-size: 24px; margin-right: 10px;"></i>
        <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>
    <div class="sidebar text-white">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.tkit.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link">
                        <i class="fas fa-newspaper nav-icon"></i>
                        <p>Berita</p>
                    </a>
                </li>
                <li class="nav-item">
    <a href="{{ route('ppdb.index') }}" class="nav-link">
        <i class="fas fa-folder-open nav-icon"></i> <!-- Folder Open icon -->
        <p>PPDB</p>
    </a>
</li>

            </ul>
        </nav>
    </div>
</aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="container">
            <strong>&copy; <span id="current-year"></span> <a href="#">Nurul Fikri</a>.</strong>
            All rights reserved.
        </div>
    </footer>

    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE Script -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
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
