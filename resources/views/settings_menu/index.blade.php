@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách ngành</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.major') }}">Cài đặt</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @php
            $excludedRoutes = [
                'create.major',
                'edit.major',
                'show.major',
                'create.field',
                'edit.field',
                'show.field',
                'create.market',
                'edit.market',
                'show.market',
                'create.target_customer',
                'edit.target_customer',
                'show.target_customer',
                'create.certificate',
                'edit.certificate',
                'show.certificate',
                'create.organization',
                'edit.organization',
                'show.organization',
                'create.business',
                'edit.business',
                'show.business',
            ];
        @endphp
        <section class="content">
            @unless (in_array(Route::currentRouteName(), $excludedRoutes))
                <div class="nav nav-pills d-flex">
                    <a href="{{ route('index.major') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.major') ? 'active' : '' }}">Ngành</a>
                    <a href="{{ route('index.field') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.field') ? 'active' : '' }}">Lĩnh vực</a>
                    <a href="{{ route('index.market') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.market') ? 'active' : '' }}">Thị trường</a>
                    <a href="{{ route('index.target_customer') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.target_customer') ? 'active' : '' }}">Khách hàng mục
                        tiêu</a>
                    <a href="{{ route('index.certificate') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.certificate') ? 'active' : '' }}">Chứng chỉ</a>
                    <a href="{{ route('index.organization') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.organization') ? 'active' : '' }}">Tổ chức</a>
                    <a href="{{ route('index.business') }}"
                        class="nav-link mr-2 {{ request()->routeIs('index.business') ? 'active' : '' }}">Doanh nghiệp</a>
                </div>
            @endunless
            <div class="container-fluid">
                @yield('setting_menu_content')
            </div>
        </section>
    </div>
    <script>
        document.querySelector('select[name="status"]').addEventListener('change', function() {
            window.location.href = '{{ route('index.customer_partner') }}?status=' + this.value;
        });
    </script>
@endsection
