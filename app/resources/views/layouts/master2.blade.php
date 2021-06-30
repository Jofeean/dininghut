<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url("admin-lte/dist/css/adminlte.min.css") }}">
    <link rel="shortcut icon" type="image/jpg" href="{{ url('images/favicon.png') }}"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Big+Shoulders+Stencil+Display&family=Dela+Gothic+One&family=Jomhuria&family=Lobster&family=Lobster+Two:ital@1&family=Open+Sans&family=Oswald&family=Poppins&family=Roboto&family=Teko&display=swap"
        rel="stylesheet">
    <style>
        body:not(.layout-fixed) .main-sidebar .sidebar {
            overflow-y: unset;
        }

        [class*=sidebar-dark] .user-panel {
            border-bottom: unset;
        }
    </style>
    @yield("css")
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url("admin/admin") }}" class="brand-link">
            <img src="{{ url("images/logo.png") }}" alt="Logo" class="brand-image"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Cafe Garden</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::guard("admin")->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                    <li class="nav-header">LISTS</li>
                    <li class="nav-item">
                        <a href="{{ url("admin/admin") }}" class="nav-link">
                            <i class="nav-icon fas fa-user-lock"></i>
                            <p>
                                Administrators
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("admin/user") }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("admin/menu") }}" class="nav-link">
                            <i class="nav-icon fas fa-utensils"></i>
                            <p>
                                Menu
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">CMS</li>
                    <li class="nav-item">
                        <a href="{{ url("admin/cms") }}" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Contents
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("admin/reservation") }}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>
                                Reservations
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Others</li>
                    <li class="nav-item">
                        <a href="{{ url("admin/audits") }}" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Audit Trail
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url("logout") }}" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <a data-widget="pushmenu" href="#" role="button" style="color: black">
                                <i class="fas fa-bars"></i></a> @yield("title")</h1>
                    </div>
                </div>
            </div>
        </div>
        @yield("content")
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>

    <footer class="main-footer">
        <strong>Copyright &copy; {{ date("Y") }} <a href="{{ url("/") }}">Garden Cafe</a>.</strong>
    </footer>
</div>

<script src="{{ url("admin-lte/plugins/jquery/jquery.min.js") }}"></script>
<script src="{{ url("admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<script src="{{ url("admin-lte/dist/js/adminlte.js") }}"></script>

@yield("js")
</body>
</html>
