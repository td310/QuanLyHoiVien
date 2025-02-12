@extends('index')
@section('content')

    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="title-alta">Chỉnh sửa Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item active">Chỉnh sửa người dùng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <form id="avatar-form" method="POST" action="{{ route('profile_update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <label for="image-upload" style="cursor: pointer;">
                                                <img class="profile-user-img img-fluid img-circle" id="preview-image"
                                                    src="{{ $user->getFirstMediaUrl('avatar') }}"
                                                    alt="User profile picture">
                                            </label>
                                            <input type="file" id="image-upload" name="image" class="d-none"
                                                accept="image/png,image/jpeg,image/jpg">
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link">Chỉnh sửa người dùng</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="">
                                        <div class="tab-pane">
                                            <form class="form-horizontal" method="POST"
                                                action="{{ route('profile_update', $user->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-4 col-form-label">Tên người
                                                                dùng</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="name"
                                                                    name="name" value="{{ $user->name }}">
                                                            </div>
                                                            @error('name')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-sm-4 col-form-label">Số điện
                                                                thoại</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="phone"
                                                                    name="phone" value="{{ $user->phone }}">
                                                            </div>
                                                            @error('phone')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="email" class="col-sm-4 col-form-label">Tên đăng
                                                                nhập</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="email"
                                                                    name="email" value="{{ $user->email }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="password" class="col-sm-4 col-form-label">Mật
                                                                khẩu</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <input type="password" class="form-control"
                                                                        id="password" name="password"
                                                                        value="{{ $user->password }}">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text" id="togglePassword">
                                                                            <i class="fas fa-eye"></i>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @error('password')
                                                                <span style="color: red">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="email"
                                                            name="email" value="{{ $user->email }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="role" class="col-sm-2 col-form-label">Vai trò</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="role"
                                                            name="role" value="{{ $user->role }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex justify-content-center">
                                                    <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                                                    <a class="btn btn-secondary" href="{{ route('profile') }}">Đóng</a>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- jQuery -->
    </body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const toggleButton = document.getElementById("togglePassword");
    
            if (passwordInput && toggleButton) {
                toggleButton.addEventListener("click", function() {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i>';
                    } else {
                        passwordInput.type = "password";
                        toggleButton.innerHTML = '<i class="fas fa-eye"></i>';
                    }
                });
            }
        });
    </script>
    
@endsection
