@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="title-alta">Chỉnh sửa hoạt động</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.notification') }}">Hoạt động</a></li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                            <form action="{{ route('update.activity', $activity->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tên hoạt động</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="activity_name"
                                                                value="{{ $activity->activity_name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian bắt đầu</label>
                                                        <div class="col-sm-9">
                                                            <input id="datetime-input" type="text" class="form-control"
                                                                name="date_start" value="{{ $activity->date_start }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Thời gian kết thúc</label>
                                                        <div class="col-sm-9">
                                                            <input id="datetime-input" type="text" class="form-control"
                                                                name="date_end" value="{{ $activity->date_end }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Địa điểm</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="location"
                                                                value="{{ $activity->location }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Nội dung</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="description"
                                                                value="{{ $activity->description }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">File đính kèm</label>
                                                        <div class="col-sm-9">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control file-display"
                                                                    readonly
                                                                    value="{{ $activity->getFirstMedia('activity_file')?->file_name }}">
                                                                <div class="custom-file">
                                                                    <input type="file"
                                                                        class="custom-file-input file-input" name="file">
                                                                    <label class="custom-file-label">Chọn file mới</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Đối tượng</label>
                                                        <div class="col-sm-9">
                                                            <div class="form-group">
                                                                <select class="form-control" name="customer_type">
                                                                    <option value="all"
                                                                        {{ count($activity->customer_type) === 4 ? 'selected' : '' }}>
                                                                        Tất cả
                                                                    </option>
                                                                    <option value="committee"
                                                                        {{ $activity->customer_type == ['committee'] ? 'selected' : '' }}>
                                                                        Ban chấp hành
                                                                    </option>
                                                                    <option value="corporate"
                                                                        {{ $activity->customer_type == ['corporate'] ? 'selected' : '' }}>
                                                                        Khách hàng doanh nghiệp
                                                                    </option>
                                                                    <option value="personal"
                                                                        {{ $activity->customer_type == ['personal'] ? 'selected' : '' }}>
                                                                        Khách hàng cá nhân
                                                                    </option>
                                                                    <option value="partner"
                                                                        {{ $activity->customer_type == ['partner'] ? 'selected' : '' }}>
                                                                        Đối tác
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <label class="col-sm-2 col-form-label">Người nhận</label>
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
                                                @if (!empty($activity->manual_name))
                                                    @foreach ($activity->manual_name as $key => $name)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                <input type="text" class="form-control"
                                                                    name="manual_name[]" value="{{ $name }}">
                                                            </td>
                                                            <td>
                                                                <input type="email" class="form-control"
                                                                    name="manual_email[]"
                                                                    value="{{ $activity->manual_email[$key] ?? '' }}">
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm delete-btn">
                                                                    Xóa
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                        </div>


                        <div class="card-footer d-flex justify-content-center">
                            <button class="btn btn-primary  mr-2" type="submit">Chỉnh sửa</button>
                            <a class="btn btn-secondary" href="{{ route('index.activity') }}">Đóng</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

            const fileInput = document.querySelector('.file-input');
            const fileDisplay = document.querySelector('.file-display');
            const fileLabel = fileInput?.closest('.custom-file')?.querySelector('.custom-file-label');
        
            if (fileInput && fileDisplay && fileLabel) {
                fileInput.addEventListener('change', function(e) {
                    if (this.files.length > 0) {
                        const fileName = this.files[0].name;
                        fileDisplay.value = fileName;
                        fileLabel.textContent = fileName;
                    } else {
                        fileDisplay.value = '{{ $activity->getFirstMedia("activity_file")?->file_name }}';
                        fileLabel.textContent = 'Chọn file mới';
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
    </script>

@endsection
