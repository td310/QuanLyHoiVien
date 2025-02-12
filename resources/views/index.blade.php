<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('css/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('css/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('css/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('css/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('css/fullcalendar/main.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<style>
    .brand-link {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0.8125rem 0.5rem;
        min-height: 4rem;
        border-bottom: 1px solid #4f5962;
    }

    .modal-content {
            border-radius: 10px;
            border: none;
        }
        .modal-header {
            background-color: #ff7c1a;
            color: white;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            justify-content: center;
        }
        .modal-header .icon {
            font-size: 40px;
        }
        .modal-body {
            text-align: center;
            font-size: 18px;
        }
        .modal-footer {
            justify-content: center;
        }
        .btn-cancel {
            border: 2px solid #ff7c1a;
            color: #ff7c1a;
            font-weight: bold;
            border-radius: 5px;
        }
        .btn-cancel:hover {
            background-color: #ff7c1a;
            color: white;
        }
        .btn-confirm {
            background-color: #ff7c1a;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }
        .btn-confirm:hover {
            background-color: #e66900;
        }
</style>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white d-flex justify-content-center">
                <i class="bi bi-exclamation-triangle-fill text-white" style="font-size: 100px;"></i>
            </div>
            <div class="modal-body text-center">
                <p class="font-weight-bold">Bạn chắc chắn muốn đăng xuất khỏi hệ thống?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <button type="button" class="btn btn-primary" onclick="document.getElementById('logout-form').submit();">
                    Đồng ý
                </button>
            </div>
        </div>
    </div>
</div>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/AltaLogo.png') }}" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item d-flex align-items-center">
                        <img src="{{ Auth::user()->getFirstMediaUrl('avatar') ? Auth::user()->getFirstMediaUrl('avatar') : asset('dist/img/avatar.png') }}"
                            class="img-circle" alt="User Image" style="width: 30px; height: 30px; object-fit: cover;">
                        <a class="nav-link" href="{{ route('profile') }}">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link btn btn-link" data-toggle="modal" data-target="#logoutModal">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-3">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{ asset('dist/img/AltaLogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle">
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('main_index') }}"
                                        class="nav-link {{ Route::is(['main_index']) ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">Trang chủ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.club') }}"
                                        class="nav-link {{ str_contains(Route::currentRouteName(), 'club') ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">Câu lạc bộ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.customer_partner') }}"
                                        class="nav-link {{ request()->routeIs('*.customer_partner') ||
                                        request()->routeIs('*.customer_corporate') ||
                                        request()->routeIs('*.customer_personal') ||
                                        request()->routeIs('*.partner')
                                            ? 'active'
                                            : '' }}">
                                        <p class="nav-item-sidebar">Khách hàng & Đối tác</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.activity') }}"
                                        class="nav-link {{ str_contains(Route::currentRouteName(), 'activity') ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">Hoạt động</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.membership_fee') }}"
                                        class="nav-link {{ str_contains(Route::currentRouteName(), 'membership_fee') ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">Hội Phí</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.sponsorship') }}"
                                        class="nav-link {{ request()->routeIs('index.sponsorship') ||
                                        (str_contains(Route::currentRouteName(), 'sponsorship') &&
                                            !str_contains(Route::currentRouteName(), 'customer_partner') &&
                                            !str_contains(Route::currentRouteName(), 'customer_corporate'))
                                            ? 'active'
                                            : '' }}">
                                        <p class="nav-item-sidebar">Tài trợ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.notification') }}"
                                        class="nav-link {{ str_contains(Route::currentRouteName(), 'notification') ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">Thông báo</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('index.calendar') }}"
                                        class="nav-link {{ str_contains(Route::currentRouteName(), 'calendar') ? 'active' : '' }}">
                                        <p>Lịch</p>
                                    </a>
                                </li>
                                @php
                                    $settingsRoutes = ['index.membership_level', 'index.role', 'index.major'];
                                    $isSettingsActive = in_array(Route::currentRouteName(), $settingsRoutes);
                                @endphp

                                <li class="nav-item {{ $isSettingsActive ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link {{ $isSettingsActive ? 'active' : '' }}">
                                        <p class="nav-item-sidebar">
                                            Cài đặt
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('index.membership_level') }}"
                                                class="nav-link {{ Route::currentRouteName() == 'index.membership_level' ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p>Hạng thành viên</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('index.role') }}"
                                                class="nav-link {{ Route::currentRouteName() == 'index.role' ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p>Quản lý người dùng</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('index.major') }}"
                                                class="nav-link {{ Route::currentRouteName() == 'index.major' ? 'active' : '' }}">
                                                <i class="nav-icon"></i>
                                                <p>Danh mục</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        {{-- Main Content --}}
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('css/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('css/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('css/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('css/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('css/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('css/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('css/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('css/moment/moment.min.js') }}"></script>
    <script src="{{ asset('css/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('css/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('css/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('css/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('css/fullcalendar/main.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageUpload = document.getElementById('image-upload');
            const previewImage = document.getElementById('preview-image');
            const avatarForm = document.getElementById('avatar-form');

            if (imageUpload && previewImage) {
                imageUpload.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewImage.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                        avatarForm.submit();
                    }
                });
            }
        });
    </script>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show position-fixed"
            style="top: 20px; right: 20px; min-width: 300px; z-index: 1050;" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <script>
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        </script>
    @endif


    @yield('script')
</body>

</html>
