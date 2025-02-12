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
        @if ($errors->any() || session('error'))
            <div class="card-body">
                <div class="alert alert-danger">
                    <p class="font-weight-bold">Errors:</p>
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                    @if (session('error'))
                        <p class="mb-0">{{ session('error') }}</p>
                    @endif
                </div>
            </div>
        @endif
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('update.role', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
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
                                                                value="{{ $role->role_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã vai trò</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="role_code"
                                                                value="{{ $role->role_code }}">
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
                                                @php
                                                    $permissionValues = $role->permissions
                                                        ->pluck('permission_name')
                                                        ->map(function ($name) {
                                                            preg_match('/Chức năng (\d+\.\d+)/', $name, $matches);
                                                            return $matches[1];
                                                        })
                                                        ->toArray();
                                                @endphp

                                                @foreach (range(1, 3) as $groupNum)
                                                    <div class="form-group mb-3">
                                                        <div class="mb-2">
                                                            <input type="checkbox" id="group{{ $groupNum }}-select-all"
                                                                class="mr-2 group-select-all">
                                                            <label for="group{{ $groupNum }}-select-all" class="mb-0">
                                                                Nhóm chức năng {{ $groupNum }} (Chọn tất cả)
                                                            </label>
                                                        </div>
                                                        <div class="ml-4">
                                                            @foreach (range(1, 4) as $funcNum)
                                                                @php $value = "$groupNum.$funcNum"; @endphp
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        id="function{{ $groupNum }}-{{ $funcNum }}"
                                                                        name="permissions[]" value="{{ $value }}"
                                                                        {{ in_array($value, $permissionValues) ? 'checked' : '' }}>
                                                                    <label
                                                                        for="function{{ $groupNum }}-{{ $funcNum }}">
                                                                        Chức năng {{ $value }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach

                                                <!-- Dynamic groups from DB -->
                                                @foreach ($groupedPermissions as $groupNum => $permissions)
                                                    @if ($groupNum > 3)
                                                        <div class="form-group mb-3">
                                                            <div class="mb-2">
                                                                <input type="checkbox"
                                                                    id="group{{ $groupNum }}-select-all"
                                                                    class="mr-2 group-select-all">
                                                                <label for="group{{ $groupNum }}-select-all"
                                                                    class="mb-0">
                                                                    Nhóm chức năng {{ $groupNum }} (Chọn tất cả)
                                                                </label>
                                                            </div>
                                                            <div class="ml-4">
                                                                @foreach ($permissions as $permission)
                                                                    @php
                                                                        preg_match(
                                                                            '/Chức năng (\d+\.\d+)/',
                                                                            $permission->permission_name,
                                                                            $matches,
                                                                        );
                                                                        $value = $matches[1];
                                                                    @endphp
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox"
                                                                            id="function{{ str_replace('.', '-', $value) }}"
                                                                            name="permissions[]"
                                                                            value="{{ $value }}" checked>
                                                                        <label
                                                                            for="function{{ str_replace('.', '-', $value) }}">
                                                                            Chức năng {{ $value }}
                                                                        </label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <button type="button" class="btn btn-primary add-manager">
                                                    <i class="fas fa-plus"></i> Thêm nhóm chức năng
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary mr-2">Chỉnh sửa</button>
                                        <a class="btn btn-secondary" href="{{ route('index.role') }}">Đóng</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let maxGroupNum = {{ max(3, $groupedPermissions->keys()->max()) }};
            let groupCounter = maxGroupNum + 1;

            document.querySelector('.add-manager').addEventListener('click', function() {
                const newGroup = `
                    <div class="form-group mb-3">
                        <div class="mb-2">
                            <input type="checkbox" id="group${groupCounter}-select-all" class="mr-2 group-select-all">
                            <label for="group${groupCounter}-select-all" class="mb-0">
                                Nhóm chức năng ${groupCounter} (Chọn tất cả)
                            </label>
                        </div>
                        <div class="ml-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="function${groupCounter}-1" name="permissions[]" value="${groupCounter}.1">
                                <label for="function${groupCounter}-1">Chức năng ${groupCounter}.1</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="function${groupCounter}-2" name="permissions[]" value="${groupCounter}.2">
                                <label for="function${groupCounter}-2">Chức năng ${groupCounter}.2</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="function${groupCounter}-3" name="permissions[]" value="${groupCounter}.3">
                                <label for="function${groupCounter}-3">Chức năng ${groupCounter}.3</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" id="function${groupCounter}-4" name="permissions[]" value="${groupCounter}.4">
                                <label for="function${groupCounter}-4">Chức năng ${groupCounter}.4</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                `;

                document.querySelector('.permission-groups').insertAdjacentHTML('beforeend', newGroup);
                groupCounter++;
            });

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('group-select-all')) {
                    const group = e.target.closest('.form-group');
                    const checkboxes = group.querySelectorAll('input[name="permissions[]"]');
                    checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
                }
            });

            document.querySelectorAll('.group-select-all').forEach(function(selectAll) {
                const group = selectAll.closest('.form-group');
                const checkboxes = group.querySelectorAll('input[name="permissions[]"]');
                const checkedBoxes = group.querySelectorAll('input[name="permissions[]"]:checked');
                selectAll.checked = checkboxes.length === checkedBoxes.length;
            });
        });
    </script>
@endsection
