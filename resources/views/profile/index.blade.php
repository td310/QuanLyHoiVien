@extends('index')
@section('content')

    <body class="hold-transition sidebar-mini">
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">User Profile</li>
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
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>  
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link" href="{{route('profile_edit', $user->id)}}">Chỉnh sửa người dùng</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="">
                                        <div class="tab-pane">
                                            <form class="form-horizontal" method="POST" action="">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Tên người dùng</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name"
                                                               name="name" value="{{$user->name}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="email"
                                                               name="email" value="{{$user->email}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-sm-2 col-form-label">Số điện thoại</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone"
                                                               name="phone" value="{{$user->phone}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control" id="password"
                                                               name="password" value="{{ $user->password }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="email"
                                                               name="email" value="{{$user->email}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="role" class="col-sm-2 col-form-label">Vai trò</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="role"
                                                               name="role" value="{{$user->role}}" readonly>
                                                    </div>
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
@endsection
