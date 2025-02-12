@extends('index')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới vai trò</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{route('index.role')}}">Vai trò</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                            <form action="{{route('store.role')}}" method="POST">
                                @csrf
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
                                                                value="{{ old('role_name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-5 col-form-label">Mã vai trò</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" name="role_code"
                                                                value="{{ old('role_code') }}">
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
                                                <div class="form-group mb-3">
                                                    <div class="mb-2">
                                                        <input type="checkbox" id="group1-select-all"
                                                            class="mr-2 group-select-all">
                                                        <label for="group1-select-all" class="mb-0">Nhóm chức năng 1 (Chọn
                                                            tất
                                                            cả)</label>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function1-1" name="permissions[]"
                                                                value="1.1">
                                                            <label for="function1-1">Chức năng
                                                                1.1</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function1-2" name="permissions[]"
                                                                value="1.2">
                                                            <label for="function1-2">Chức năng
                                                                1.2</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function1-3" name="permissions[]"
                                                                value="1.3">
                                                            <label for="function1-3">Chức năng
                                                                1.3</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function1-4" name="permissions[]"
                                                                value="1.4">
                                                            <label for="function1-4">Chức năng
                                                                1.4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="form-group mb-3">
                                                    <div class="mb-2">
                                                        <input type="checkbox" id="group2-select-all"
                                                            class="mr-2 group-select-all">
                                                        <label for="group1-select-all" class="mb-0">Nhóm chức năng 2 (Chọn
                                                            tất
                                                            cả)</label>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function2-1" name="permissions[]"
                                                                value="2.1">
                                                            <label for="function2-1">Chức năng
                                                                2.1</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function2-2" name="permissions[]"
                                                                value="2.2">
                                                            <label for="function2-2">Chức năng
                                                                2.2</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function2-3" name="permissions[]"
                                                                value="2.3">
                                                            <label for="function2-3">Chức năng
                                                                2.3</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function2-4" name="permissions[]"
                                                                value="2.4">
                                                            <label for="function2-4">Chức năng
                                                                2.4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group mb-3">
                                                    <div class="mb-2">
                                                        <input type="checkbox" id="group3-select-all"
                                                            class="mr-2 group-select-all">
                                                        <label for="group1-select-all" class="mb-0">Nhóm chức năng 3
                                                            (Chọn tất
                                                            cả)</label>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function3-1" name="permissions[]"
                                                                value="3.1">
                                                            <label for="function3-1">Chức năng
                                                                3.1</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function3-2" name="permissions[]"
                                                                value="3.2">
                                                            <label for="function3-2">Chức năng
                                                                3.2</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function3-3" name="permissions[]"
                                                                value="3.3">
                                                            <label for="function3-3">Chức năng
                                                                3.3</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" id="function2-4" name="permissions[]"
                                                                value="3.4">
                                                            <label for="function3-4">Chức năng
                                                                3.4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="d-flex justify-content-center mb-3">
                                                <button type="button" class="btn btn-primary add-manager">
                                                    <i class="fas fa-plus"></i> Thêm nhóm chức năng
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary  mr-2">Thêm</button>
                                        <a class="btn btn-secondary" href="{{ route('index.club') }}">Đóng</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("group1-select-all").addEventListener("click", function() {
            const checkboxes = document.querySelectorAll("#function1-1, #function1-2, #function1-3, #function1-4");
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        document.getElementById("group2-select-all").addEventListener("click", function() {
            const checkboxes = document.querySelectorAll("#function2-1, #function2-2, #function2-3, #function2-4");
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        document.getElementById("group3-select-all").addEventListener("click", function() {
            const checkboxes = document.querySelectorAll("#function3-1, #function3-2, #function3-3, #function3-4");
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const permissionGroups = document.querySelector('.permission-groups');
            const addManagerBtn = document.querySelector('.add-manager');

            if (permissionGroups && addManagerBtn) {
                let groupCounter = 4;

                addManagerBtn.addEventListener('click', function() {
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

                    permissionGroups.insertAdjacentHTML('beforeend', newGroup);
                    groupCounter++;
                });
            }

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('group-select-all')) {
                    const group = e.target.closest('.form-group');
                    const checkboxes = group.querySelectorAll('input[name="permissions[]"]');
                    checkboxes.forEach(checkbox => checkbox.checked = e.target.checked);
                }
            });
        });
    </script>
@endsection
