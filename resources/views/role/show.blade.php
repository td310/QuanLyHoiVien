@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Chi tiết vai trò</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Vai trò</a></li>
                            <li class="breadcrumb-item active">Chi tiết</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class=" col-md-6">
                                        <div class="card col mb-3">
                                            <div class="card-header2">
                                                <h3 class="card-title">Thông tin</h3>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Tên vai trò</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="role_name"
                                                            value="{{ $role->role_name }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row align-items-center mb-2">
                                                    <label class="col-sm-5 col-form-label">Mã vai trò</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" name="role_code"
                                                            value="{{ $role->role_code }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card col-md-6">
                                        <div class="card-header2">
                                            <h3 class="card-title">Phân quyền</h3>
                                        </div>
                                        <div class="permission-groups">
                                            @foreach ($groupedPermissions as $groupNumber => $permissions)
                                                <div class="form-group mb-3">
                                                    <div class="mb-2">
                                                        <input type="checkbox" disabled
                                                            {{ $permissions->count() === count($permissions) ? 'checked' : '' }}>
                                                        <label class="mb-0">
                                                            Nhóm chức năng {{ $groupNumber }} (Chọn tất cả)
                                                        </label>
                                                    </div>
                                                    <div class="ml-4">
                                                        @foreach ($permissions as $permission)
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" disabled checked>
                                                                <label>
                                                                    {{ $permission->permission_name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <hr>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-primary mr-2" href="{{ route('edit.role', $role->id) }}">Chỉnh sửa</a>
                                    <a class="btn btn-secondary" href="{{ route('index.role') }}">Đóng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
