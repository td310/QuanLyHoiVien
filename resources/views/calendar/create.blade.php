@extends('index')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách lịch họp</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index.calendar') }}">Lịch họp</a></li>
                            <li class="breadcrumb-item active">Thêm mới</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Thêm lịch họp mới</h3>
                            </div>
                            <!-- /.card-header -->
                            <form action="{{ route('store.calendar') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="active">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Người chủ trì</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('host') is-invalid @enderror"
                                                                name="host" value="{{ old('host') }}">
                                                        </div>
                                                    </div>
                                                    @error('host')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Tiêu đề</label>
                                                        <div class="col-sm-9">
                                                            <input type="text"
                                                                class="form-control @error('title') is-invalid @enderror"
                                                                name="title" value="{{ old('title') }}">
                                                        </div>
                                                    </div>
                                                    @error('title')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <div class="row align-items-center mb-2">
                                                        <label class="col-sm-3 col-form-label">Nội dung</label>
                                                        <div class="col-sm-9">
                                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                                                rows="4">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                    @error('title')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
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
                                                        <label class="col-sm-3 col-form-label">Thời gian</label>
                                                        <div class="col-sm-9">
                                                            <input id="datetime-input" type="text"
                                                                class="form-control @error('date') is-invalid @enderror"
                                                                name="date" value="{{ old('date') }}">
                                                        </div>
                                                    </div>
                                                    @error('date')
                                                        <span class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <label class="col-sm-2 col-form-label">Người tham dự</label>
                                        <div class="d-flex align-items-center justify-content-between p-4">
                                            <div class="left-section">
                                                <label>Loại thành viên</label>
                                                <select name="" class="form-control" style="width: 150px;"
                                                    onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="left-section">
                                                <label>Lĩnh vực</label>
                                                <select name="" class="form-control" style="width: 150px;"
                                                    onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="left-section">
                                                <label>Thị trường</label>
                                                <select name="" class="form-control" style="width: 150px;"
                                                    onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="left-section">
                                                <label>Khách hàng mục tiêu</label>
                                                <select name="" class="form-control" style="width: 150px;"
                                                    onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="left-section">
                                                <label>Quy mô</label>
                                                <select name="" class="form-control" style="width: 150px;"
                                                    onchange="this.form.submit()">
                                                    <option value="">Tất cả</option>
                                                </select>
                                            </div>
                                            <div class="card-tools">
                                                <label>Tìm kiếm</label>
                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                    <input type="text" name="search" class="form-control float-right"
                                                        placeholder="Tìm kiếm..." value="{{ request('search') }}">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="select-all"></th>
                                                    <th>STT</th>
                                                    <th>Mã khách hàng</th>
                                                    <th>Tên khách hàng</th>
                                                    <th>Email</th>
                                                    <th>Loại thành viên</th>
                                                    <th>Lĩnh vực</th>
                                                    <th>Thị trường</th>
                                                    <th>Khách hàng mục tiêu</th>
                                                    <th>Quy mô</th>
                                                </tr>
                                            </thead>
                                            <tbody id="customerTable">
                                                @foreach ($committees as $key => $committee)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="selected[]"
                                                                value="committee_{{ $committee->id }}"
                                                                class="row-checkbox">
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $committee->id_login }}</td>
                                                        <td>{{ $committee->name }}</td>
                                                        <td>{{ $committee->email }}</td>
                                                        <td>Ban chấp hành</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($corporates as $corporate)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="selected[]"
                                                                value="corporate_{{ $corporate->id }}"
                                                                class="row-checkbox">
                                                        </td>
                                                        <td>{{ $loop->iteration + $committees->count() }}</td>
                                                        <td>{{ $corporate->id_login }}</td>
                                                        <td>{{ $corporate->name }}</td>
                                                        <td>{{ $corporate->email }}</td>
                                                        <td>Khách hàng doanh nghiệp</td>
                                                        <td>{{ optional($corporate->field)->field_name ?? '-' }}</td>
                                                        <td>{{ optional($corporate->market)->market_name ?? '-' }}</td>
                                                        <td>{{ optional($corporate->targetCustomer)->target_customer_name ?? '-' }}
                                                        </td>
                                                        <td>{{ $corporate->size_company ?? '-' }}</td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($personals as $personal)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="selected[]"
                                                                value="personal_{{ $personal->id }}"
                                                                class="row-checkbox">
                                                        </td>
                                                        <td>{{ $loop->iteration + $committees->count() + $corporates->count() }}
                                                        </td>
                                                        <td>{{ $personal->id_login }}</td>
                                                        <td>{{ $personal->name }}</td>
                                                        <td>{{ $personal->email }}</td>
                                                        <td>Khách hàng cá nhân</td>
                                                        <td>{{ optional($personal->field)->field_name ?? '-' }}</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                @endforeach

                                                @foreach ($partners as $partner)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="selected[]"
                                                                value="partner_{{ $partner->id }}" class="row-checkbox">
                                                        </td>
                                                        <td>{{ $loop->iteration + $committees->count() + $corporates->count() + $personals->count() }}
                                                        </td>
                                                        <td>{{ $partner->id_login }}</td>
                                                        <td>{{ $partner->name }}</td>
                                                        <td>-</td>
                                                        <td>Đối tác doanh nghiệp</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tbody id="manualEmailSection" style="display: none;">
                                                <tr>
                                                    <td><input type="checkbox" name="manual_email_checkbox"
                                                            class="row-checkbox"></td>
                                                    <td colspan="3">Khác</td>
                                                    <td><input type="email" name="manual_email" class="form-control">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" id="addEmailBtn">Thêm
                                            email</button>
                                    </div>
                                </div>
                        </div>

                        <div class="card-footer d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                            <a class="btn btn-secondary" href="{{ route('index.calendar') }}">Đóng</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select-all').change(function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        });

        $(document).ready(function() {
            $('#addEmailBtn').click(function() {
                $('#manualEmailSection').toggle();
            });

            $('#select-all').change(function() {
                $('.row-checkbox').prop('checked', this.checked);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datetime-input", {
                enableTime: true,
                dateFormat: "Y-m-d h:i K",
                time_24hr: false,
                minDate: new Date(),
                allowInput: true
            });
        });
    </script>
@endsection
