@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="nav nav-pills d-flex">
                <a href="{{ route('index.customer_partner') }}"
                    class="nav-link mr-2 {{ request()->routeIs('index.customer_partner') ? 'active' : '' }}">
                    <i class="fas fa-users mr-1"></i> Ban chấp hành
                </a>
                <a href="{{ route('index.customer_corporate') }}"
                    class="nav-link {{ request()->routeIs('index.customer_corporate') ? 'active' : '' }}">
                    <i class="fas fa-building mr-1"></i> Khách hàng doanh nghiệp
                </a>
                <a href="{{ route('index.customer_personal') }}"
                    class="nav-link {{ request()->routeIs('index.customer_personal') ? 'active' : '' }}">
                    <i class="fas fa-user mr-1"></i> Khách hàng cá nhân
                </a>
                <a href="{{ route('index.partner') }}"
                    class="nav-link {{ request()->routeIs('index.partner') ? 'active' : '' }}">
                    <i class="fas fa-handshake mr-1"></i> Đối tác doanh nghiệp
                </a>
            </div>
            <div class="container-fluid">
                @yield('customer_partner_content')
            </div>
        </section>
    </div>
    <script>
        document.querySelector('select[name="status"]').addEventListener('change', function() {
            window.location.href = '{{ route('index.customer_partner') }}?status=' + this.value;
        });
    </script>
@endsection
