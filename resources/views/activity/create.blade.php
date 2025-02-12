@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Thêm mới hoạt động</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('main_index') }}">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('index.activity') }}">Hoạt động</a></li>
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
                            <!-- /.card-header -->
                            <form action="{{ route('store.activity') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="status" value="active">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tên hoạt động</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('activity_name') is-invalid @enderror"
                                                                name="activity_name" value="{{ old('activity_name') }}">
                                                        </div>
                                                    </div>
                                                    @error('activity_name')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                                                        <div class="col-sm-9">
                                                            <input id="datetime-input" type="text" class="form-control"
                                                                name="date_start" value="{{ old('date_start') }}">
                                                        </div>
                                                    </div>
                                                    @error('date_start')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                                                        <div class="col-sm-9">
                                                            <input id="datetime-input" type="text" class="form-control"
                                                                name="date_end" value="{{ old('date_end') }}">
                                                        </div>
                                                    </div>
                                                    @error('date_end')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Địa điểm</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('location') is-invalid @enderror"
                                                                name="location" value="{{ old('location') }}">
                                                        </div>
                                                    </div>
                                                    @error('location')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Nội dung</label>
                                                        <div class="col-sm-9">
                                                            <textarea id="content" name="description" class="form-control">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Đính kèm</label>
                                                        <div class="col-sm-9 input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input"
                                                                    id="fileInput" name="file"
                                                                    onchange="displayFileName(this)">
                                                                <label for="fileInput" id="fileInputLabel"
                                                                    class="custom-file-label">Chọn tệp đính kèm</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-4 col-form-label">Đối tượng</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name="customer_type">
                                                                <option value="all">Tất cả</option>
                                                                <option value="committee">Ban chấp hành</option>
                                                                <option value="coporate">Khách hàng doanh nghiệp</option>
                                                                <option value="personal">Khách hàng cá nhân</option>
                                                                <option value="partner">Đối tác</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="button" id="add-row-btn" class="btn btn-primary mb-2">Thêm
                                                người nhận</button>
                                        </div>

                                        <table class="table" id="manualTable">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Email</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="manual_name[]">
                                                    </td>
                                                    <td><input type="email" class="form-control" name="manual_email[]">
                                                    </td>
                                                    <td><button type="button"
                                                            class="btn btn-danger btn-sm delete-btn">Xóa</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary  mr-2">Thêm</button>
                                    <a class="btn btn-secondary" href="{{ route('index.activity') }}">Đóng</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.getElementById('add-row-btn').addEventListener('click', function() {
            const tbody = document.querySelector('#manualTable tbody');
            const rowCount = tbody.getElementsByTagName('tr').length;
            const newRow = document.createElement('tr');

            newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" name="manual_name[]"></td>
        <td><input type="email" class="form-control" name="manual_email[]"></td>
        <td><button type="button" class="btn btn-danger btn-sm delete-btn">Xóa</button></td>
        `;

            tbody.appendChild(newRow);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const manualTable = document.querySelector('#manualTable');
            const addRowBtn = document.getElementById('addRow');

            if (addRowBtn && manualTable) {
                addRowBtn.addEventListener('click', function() {
                    const tbody = manualTable.querySelector('tbody');
                    const rowCount = tbody.getElementsByTagName('tr').length;
                    const newRow = document.createElement('tr');

                    newRow.innerHTML = `
                <td>${rowCount + 1}</td>
                <td><input type="text" class="form-control" name="manual_name[]"></td>
                <td><input type="email" class="form-control" name="manual_email[]"></td>
                <td><button type="button" class="btn btn-danger btn-sm delete-btn">Xóa</button></td>
            `;

                    tbody.appendChild(newRow);
                });

                manualTable.addEventListener('click', function(e) {
                    if (e.target.classList.contains('delete-btn')) {
                        const tbody = manualTable.querySelector('tbody');
                        if (tbody.querySelectorAll('tr').length > 1) {
                            e.target.closest('tr').remove();
                            const rows = tbody.querySelectorAll('tr');
                            rows.forEach((row, index) => {
                                row.cells[0].textContent = index + 1;
                            });
                        }
                    }
                });
            }
        });


        flatpickr("#datetime-input", {
            enableTime: true,
            dateFormat: "Y-m-d h:i K",
            time_24hr: false,
            minDate: new Date(),
            allowInput: true
        });

        function displayFileName(input) {
            var fileName = input.files[0].name;

            var label = document.getElementById('fileInputLabel');
            label.textContent = fileName;
        }
    </script>
@endsection
